<?php

global $lang;

/**
 * Multilanguage suppot
 */
if (empty($_SESSION['lang']) || !empty($_GET['lang'])) {
  $_SESSION['lang'] = empty($_GET['lang']) ? '' : $_GET['lang'];
}
if (empty($_SESSION['lang']) || !empty($_COOKIE['lang'])) {
  $_SESSION['lang'] = empty($_COOKIE['lang']) ? '' : $_COOKIE['lang'];
}

$lang = $_SESSION['lang'];

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
