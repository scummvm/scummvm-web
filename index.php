<?php
/**
 * Multilingual support
 */
global $lang;
/* Default to English */
$lang = 'en';
/* Check if the user has set a language preference before (cookies) */
if (!empty($_COOKIE['lang']))
  $lang = $_COOKIE['lang'];
/* The GET language parameter should override any stored setting */
if (!empty($_GET['lang']))
  $lang = $_GET['lang'];
/* Make sure that the language is known, otherwise fall back to English */
if (!in_array($lang, array("en", "de", "fr", "ru")))
	$lang = "en";

/* We have to clean the mess introduced by double cookie at the wrong level */
if (empty($_COOKIE['clear_lang'])) {
	setcookie("lang", 'deleted', 1); // Setting it a current domain level, as it stays one level up
	setcookie("clear_lang", "deleted", 1456167472); // Hardcoded to 22-Feb-2016 when previous cookie expires
}

/* Load the configuration. */
require_once('include/config.inc.php');
/* Set up the include path. */
set_include_path(get_include_path() . PATH_SEPARATOR . DIR_INCLUDE);
error_reporting(E_ALL ^ E_NOTICE);	// disable notices

if (!is_writeable(SMARTY_DIR_COMPILE)) {
	print "Smarty compile dir (" . SMARTY_DIR_COMPILE . ") isn't writeable!<br>\n";
	die (1);
}

/* Exception handling. */
require_once('ExceptionHandler.php');
set_exception_handler(array('ExceptionHandler', 'handleException'));

/* Page mapping. */
$pages = array(
	'compatibility' => 'CompatibilityPage',
	'contact' => 'ContactPage',
	'credits' => 'CreditsPage',
	'demos' => 'DemosPage',
	'documentation' => 'DocumentationPage',
	'downloads' => 'DownloadsPage',
	'games' => 'GamesPage',
	'faq' => 'FAQPage',
	'feeds' => 'FeedsPage',
	'links' => 'LinksPage',
	'news' => 'NewsPage',
	'press' => 'PressPage',
	'presssnowberry' => 'PressSnowberryPage',
	'screenshots' => 'ScreenshotsPage',
	'subprojects' => 'SubprojectsPage',
);

/* Default to the news page. */
if (!array_key_exists(($page = isset($_GET['p']) ? $_GET['p'] : null), $pages)) {
	$page = 'news';
}

/* Switch to the requested page */
require_once ("Pages/{$pages[$page]}.php");
$p = new $pages[$page]();
return $p->index();

?>
