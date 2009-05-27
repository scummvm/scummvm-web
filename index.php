<?php
/* Load the configuration. */
require_once('include/config.inc.php');
/* Set up the include path. */
set_include_path(get_include_path() . PATH_SEPARATOR . DIR_INCLUDE);

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
	'faq' => 'FAQPage',
	'feeds' => 'FeedsPage',
	'links' => 'LinksPage',
	'news' => 'NewsPage',
	'press' => 'PressPage',
	'screenshots' => 'ScreenshotsPage',
	'subprojects' => 'SubprojectsPage',
);

/* Default to the news page. */
if (!array_key_exists(($page = $_GET['p']), $pages)) {
	$page = 'news';
}

/* Switch to the requested page */
require_once ("Pages/{$pages[$page]}.php");
$p = new $pages[$page]();
return $p->index();

?>
