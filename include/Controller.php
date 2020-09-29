<?php
namespace ScummVM;

use Smarty;
use ScummVM\Models\SimpleModel;

/**
 * The Controller class will create an instance of the Smarty object configured
 * as specified in config.inc. Should be subclassed by all webpages so they can
 * take advantage of Smarty.
 */
class Controller
{
    protected $template;
    private $smarty;
    private $css_files;
    private $js_files;
    private $menuModel;

    /**
     * Constructor that will create a Smarty object and configure it according
     * to what's been specified in config.inc.
     */
    public function __construct()
    {
        /* Create a Smarty object. */
        $this->smarty = new Smarty();

        global $lang;
        global $available_languages;

        /* Configure smarty. */
        $this->smarty->setCompileDir(SMARTY_DIR_COMPILE);
        $this->smarty->setCacheDir(SMARTY_DIR_CACHE);
        $this->smarty->setTemplateDir(SMARTY_DIR_TEMPLATE);
        $this->smarty->compile_id = $lang;

        // First we read English, so all defaults are there
        $this->smarty->configLoad(join(DIRECTORY_SEPARATOR, [DIR_LANG, DEFAULT_LOCALE, "strings.ini"]));

        // Now we try to read translations
        if (is_file(($fname = join(DIRECTORY_SEPARATOR, [DIR_LANG, $lang, "strings.ini"])))
            && is_readable($fname)
        ) {
            $this->smarty->configLoad($fname);
        }

        /**
         * Add a output-filter to make sure ampersands are properly encoded to
         * HTML-entities.
         */
        $this->smarty->registerFilter('output', array($this, 'outputFilter'));

        /* Give Smarty-template access to date(). */
        $this->smarty->registerPlugin('modifier', 'date_localized', array(&$this, 'dateLocalizedSmartyModifier'));
        $this->smarty->registerPlugin('modifier', 'lang', array(&$this, 'langModifier'));

        $this->css_files = array();
        $this->js_files = array();

        $this->menuModel = new SimpleModel("MenuItem", "menus.yaml");
        $menus = [];
        /* The menus have caused an exception, need to skip them. */
        if (!ExceptionHandler::skipMenus()) {
            $menus = $this->menuModel->getAllData();
        }

        // Construct lang URL
        $langs = join("|", array_keys($available_languages));
        $pageurl = preg_replace("/\/($langs)/i", '', $_SERVER['REQUEST_URI']);
        /* Check RTL */
        $rtl = $this->isRtl($available_languages[$lang]);

        /* Set up the common variables before displaying. */
        $vars = array(
            'release' => RELEASE,
            'baseurl' => URL_BASE,
            'heroes_num' => HEROES_NUM,
            'menus' => $menus,
            'pageurl' => $pageurl,
            'available_languages' => $available_languages,
            'lang' => $lang,
            'rtl' => $rtl,
        );
        $this->smarty->assign($vars);
    }

    /**
     * Checks whether a locale string is RTL or LTR
     */
    private function isRtl($localeName)
    {
        $rtl_chars_pattern = '/[\x{0590}-\x{05ff}\x{0600}-\x{06ff}]/u';
        return preg_match($rtl_chars_pattern, $localeName);
    }

    /**
     * Smarty outputfilter, run just before displaying.
     */
    public function outputFilter($string, $smarty)
    {
        /* Properly encode all ampersands as "&amp;". */
        $string = preg_replace('/&(?!([a-z]+|(#\d+));)/i', '&amp;', $string);
        /* Replace weird characters that appears in some of the data. */
        return $string;
    }

    public function langModifier($path) {
        global $lang;
        if ($lang == DEFAULT_LOCALE || !$lang) {
            return $path;
        }

        // Absolute path (https://www.scummvm.org/*)
        $host = $_SERVER['HTTP_HOST'];
        if (\preg_match("/$host/i", $path)) {
            return preg_replace("/$host(\/|$)?/i", "$host/$lang", $path);
        }

        // Relative path (/screenshots/)
        if (\preg_match("/^\//", $path)) {
            return "/$lang" . $path;
        }

        // Can't replace
        return $path;
    }

    /**
     * Formating of dateAs, registered as a modifier for Smarty templates.
     */
    public function dateLocalizedSmartyModifier($timestamp)
    {
        global $lang;
        $formatter = datefmt_create($lang, \IntlDateFormatter::MEDIUM, \IntlDateFormatter::NONE);
        return $formatter->format($timestamp);
    }

    /* Render the HTML using the template and any set variables and displays it. */
    public function display($content)
    {
        $vars = array(
            'css_files' => $this->css_files,
            'js_files' => $this->js_files,
            'content' => $content,
        );
        $this->smarty->assign($vars);
        return $this->smarty->display('pages/index.tpl');
    }

    /* Render the HTML using the template and any set variables and returns it. */
    public function fetch($template, $vars = null)
    {
        if (!is_null($vars)) {
            $this->smarty->assign($vars);
        }
        return $this->smarty->fetch($template);
    }

    /* Set up the variables used by the template and render the page. */
    public function renderPage($vars)
    {
        return $this->display($this->fetch($this->template, $vars));
    }

    /* Assign extra CSS files needed by the different pages/templates. */
    public function addCSSFiles($extra_css)
    {
        if (is_array($extra_css)) {
            $this->css_files = array_merge(
                $this->css_files,
                $extra_css
            );
        } elseif (is_string($extra_css) && strlen($extra_css) > 0) {
            $this->css_files[] = $extra_css;
        }
    }

    /* Assign javascripts files needed by the different pages/templates. */
    public function addJSFiles($extra_js)
    {
        if (is_array($extra_js)) {
            $this->js_files = array_merge(
                $this->js_files,
                $extra_js
            );
        } elseif (is_string($extra_js) && strlen($extra_js) > 0) {
            $this->js_files[] = $extra_js;
        }
    }

    protected function getConfigVars($title)
    {
        return $this->smarty->getConfigVars($title);
    }
}
