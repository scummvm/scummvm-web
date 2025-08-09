<?php
namespace ScummVM;

use Smarty\Smarty;
use ScummVM\Models\SimpleYamlModel;
use ScummVM\SiteUtils;

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
        $this->smarty->configLoad(join(DIRECTORY_SEPARATOR, [DIR_DATA, DEFAULT_LOCALE, "strings.ini"]));

        // Now we try to read translations
        if (is_file(($fname = join(DIRECTORY_SEPARATOR, [DIR_DATA, $lang, "strings.ini"])))
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
        $this->smarty->registerPlugin('modifier', 'lang', array(SiteUtils::class, 'localizePath'));
        $this->smarty->registerPlugin('modifier', 'download', array(&$this, 'downloadsSmartyModifier'));
        $this->smarty->registerPlugin('modifier', 'release', array(&$this, 'releaseSmartyModifier'));

        /* Register PHP functions used by pages */
        $this->smarty->registerPlugin('modifier', 'htmlspecialchars', '\htmlspecialchars');
        $this->smarty->registerPlugin('modifier', 'locale_get_display_language', '\locale_get_display_language');
        $this->smarty->registerPlugin('modifier', 'preg_replace', '\preg_replace');
        $this->smarty->registerPlugin('modifier', 'rand', '\rand');
        $this->smarty->registerPlugin('modifier', 'str_contains', '\str_contains');
        $this->smarty->registerPlugin('modifier', 'strpos', '\strpos');

        $this->css_files = array();
        $this->js_files = array();

        $this->menuModel = new SimpleYamlModel("MenuItem", "menus.yaml");
        $menus = [];
        /* The menus have caused an exception, need to skip them. */
        if (!ExceptionHandler::skipMenus()) {
            $menus = $this->menuModel->getAllData();
        }

        // Construct lang URL
        $langs = join("|", array_keys($available_languages));
        $pageurl = preg_replace("/\/\b($langs)\b\/?/i", '/', $_SERVER['REQUEST_URI']);
        // Remove leading /
        $pageurl = substr($pageurl, 1);
        /* Check RTL */
        $rtl = $this->isRtl($available_languages[$lang]);

        /* Set up the common variables before displaying. */
        $vars = array(
            'release' => RELEASE,
            'baseurl' => URL_BASE,
            'heroes_num' => HEROES_NUM,
            'menus' => $menus,
            'pageurl' => $pageurl,
            'themes' => THEMES,
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

    /**
     * Formating of dateAs, registered as a modifier for Smarty templates.
     */
    public function dateLocalizedSmartyModifier($timestamp)
    {
        global $lang;
        $formatter = datefmt_create($lang, \IntlDateFormatter::MEDIUM, \IntlDateFormatter::NONE);
        return $formatter->format($timestamp);
    }

    /**
     * Formating of download URLs, registered as a modifier for Smarty templates.
     */
    public function downloadsSmartyModifier($path)
    {
        if (\strpos($path, "http") === 0) {
            return $path;
        } elseif (\strpos($path, "/frs") === 0) {
            return DOWNLOADS_BASE . $path;
        } elseif (\strpos($path, "frs") === 0) {
            return DOWNLOADS_BASE . "/$path";
        }

        return $path;
    }

    /**
     * Formating of version, registered as a modifier for Smarty templates.
     */
    public function releaseSmartyModifier($string)
    {
        $string = preg_replace("/\{[$]?release\}/", RELEASE, $string);
        $string = preg_replace("/\{[$]?release_tools\}/", RELEASE_TOOLS, $string);
        return $string;
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

    protected function getHeadline($body)
    {
        $headline = '';
        for ($line = \strtok($body, PHP_EOL); $line !== false; $line = \strtok(PHP_EOL)) {
            $line = \strip_tags($line);
            $headline .= $line . ' ';
            if (\strlen($headline) > 250) {
                $headline = substr($headline, 0, 249);
                $headline .= "\u{2026}";
                break;
            }
        }
        return $headline;
    }
}
