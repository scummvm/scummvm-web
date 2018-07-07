<?php
require_once(SMARTY_DIR . '/Smarty.class.php');
require_once('Models/MenuModel.php');
/**
 * The Controller class will create an instance of the Smarty object configured
 * as specified in config.inc. Should be subclassed by all webpages so they can
 * take advantage of Smarty.
 */
class Controller {
	private $_smarty;
	private $_template;
	private $_title;
	private $_css_files;
	private $_js_files;
	private $_show_intro;
	private $_content_title;
	private $_content;

	/**
	 * Constructor that will create a Smarty object and configure it according
	 * to what's been specified in config.inc.
	 */
	public function __construct() {
		/* Create a Smarty object. */
		$this->_smarty = new Smarty();

		# Stick it globally so we could refer the translations
		global $Smarty;
		$Smarty = $this->_smarty;

		global $lang;
		global $available_languages;

		/* Configure smarty. */
		$this->_smarty->compile_dir = SMARTY_DIR_COMPILE;
		$this->_smarty->cache_dir = SMARTY_DIR_CACHE;
		$this->_smarty->config_dir = SMARTY_DIR_CONFIG;
		$this->_smarty->caching = SMARTY_CACHING_ENABLE;
		$this->_smarty->cache_lifetime = SMARTY_CACHING_LIFETIME;
		$this->_smarty->compile_check = SMARTY_CACHING_COMPILE_CHECK;
		$this->_smarty->force_compile = SMARTY_CACHING_FORCE_RECHECK;
		$this->_smarty->template_dir = array("templates_$lang", 'templates');
		$this->_smarty->compile_id = $lang;
		$this->_smarty->config_dir = ".";

		# First we read English, so all defaults are there
		$this->_smarty->configLoad(DIR_LANG . "/lang.ini");

		# Now we try to read translations
		if (is_file(($fname = DIR_LANG . "/lang.$lang.ini"))
			&& is_readable($fname)) {
			$this->_smarty->configLoad($fname);
		}
    
		setlocale(LC_TIME, $Smarty->getConfigVars('locale'));

		/**
		 * Add a output-filter to make sure ampersands are properly encoded to
		 * HTML-entities.
		 */
		$this->_smarty->registerFilter('output', array($this, 'outputFilter'));

		/* Give Smarty-template access to date(). */
		$this->_smarty->registerPlugin('modifier', 'date_f', array(&$this, 'date_f'));
		$this->_smarty->registerPlugin('modifier', 'date_localized', array(&$this, 'date_localized'));

		/* Give Smarty-templates access to the ampersandEntity() function. */
		$this->_smarty->registerPlugin(
      'modifier',
			'escapeAmpersand',
			array(&$this, 'ampersandEntity')
		);

		$this->_title = '';
		$this->_css_files = array();
		$this->_js_files = array();
		$this->_show_intro = false;
		$this->_content_title = '';
		$this->_content = '';

		/* The menus have caused an exception, need to skip them. */
		if (!ExceptionHandler::skipMenus()) {
			$menus = MenuModel::getAllMenus();
		}

		# Construct lang URL
		$pageurl = preg_replace('/\?lang=[a-z]*$/', '', $_SERVER['REQUEST_URI']);

		/* Set up the common variables before displaying. */
		$vars = array(
			'release' => RELEASE,
			'baseurl' => URL_BASE,
			'heroes_num' => HEROES_NUM,
			'menus' => $menus,
			'pageurl' => $pageurl,
			'available_languages' => $available_languages,
		);
		$this->_smarty->assign($vars);
	}

	/** Smarty outputfilter, run just before displaying. */
	public function outputFilter($string, $smarty) {
		/* Properly encode all ampersands as "&amp;". */
		$string = preg_replace('/&(?!([a-z]+|(#\d+));)/i', '&amp;', $string);
		/* Replace weird characters that appears in some of the data. */
		return $string;
	}

	/** Escape ampersands to the HTML-entitiy '&amp;'. */
	static public function ampersandEntity($string) {
		//return preg_replace('/&(?!amp|nbsp|lt|gt|quot;)/', '&amp;', $string);
		//return preg_replace('/&(?![a-z];|#[0-9];)/', '&amp;', $string);
		return $string;
	}

	/** Formating of dates, registered as a modifier for Smarty templates. */
	public function date_f($timestamp, $format) {
		return date($format, $timestamp);
	}

	/** Formating of dateAs, registered as a modifier for Smarty templates. */
	public function date_localized($timestamp, $format) {
		return strftime($format, $timestamp);
	}

	/* Render the HTML using the template and any set variables and displays it. */
	public function display($content) {
		if (!is_string($content) || strlen($content) == 0) {
		}
		$vars = array(
			'css_files' => $this->_css_files,
			'js_files' => $this->_js_files,
			'content' => $content,
		);
		$this->_smarty->assign($vars);
		return $this->_smarty->display('index.tpl');
	}

	/* Render the HTML using the template and any set variables and returns it. */
	public function fetch($template, $vars=Null) {
		if (!is_file(SMARTY_DIR_TEMPLATE . "/{$template}")) {
		}
		if (!is_null($vars)) {
			$this->_smarty->assign($vars);
		}
		return $this->_smarty->fetch($template);
	}

	/* Set up the variables used by the template and render the page. */
	public function renderPage($vars, $template) {
		if (!is_string($template)) {
		}
		return $this->display($this->fetch($template, $vars));
	}

	/* Assign extra CSS files needed by the different pages/templates. */
	public function addCSSFiles($extra_css) {
		if (is_array($extra_css)) {
			$this->_css_files = array_merge(
				$this->_css_files,
				$extra_css
			);
		} else if (is_string($extra_css) && strlen($extra_css) > 0) {
			$this->_css_files[] = $extra_css;
		}
	}

	/* Assign javascripts files needed by the different pages/templates. */
	public function addJSFiles($extra_js) {
		if (is_array($extra_js)) {
			$this->_js_files = array_merge(
				$this->_js_files,
				$extra_js
			);
		} else if (is_string($extra_js) && strlen($extra_js) > 0) {
			$this->_js_files[] = $extra_js;
		}
	}
}
?>
