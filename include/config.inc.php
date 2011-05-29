<?php
/* Current version. */
define('RELEASE', '1.3.0');
define('RELEASE_TOOLS', '1.3.0');
define('RELEASE_DEBIAN', '1.2.1');

/* News items on the front page. */
define('NEWS_ITEMS', 4);
/* Number of heroes header files. */
define('HEROES_NUM', 4);
/* Time zone to use for news items etc. */
date_default_timezone_set("UTC");

/* Base URL to the website. */
if ($_SERVER['SERVER_PORT'] == '80') {
	$url = "http://{$_SERVER['SERVER_NAME']}" . dirname($_SERVER['PHP_SELF']);
} else {
	$url = "http://{$_SERVER['SERVER_NAME']}:{$_SERVER['SERVER_PORT']}" . dirname($_SERVER['PHP_SELF']);
}

if (substr($url, -1) != '/') {
	$url .= '/';
}
define('URL_BASE', $url);
unset($url);

/* Paths. */
define('DIR_INCLUDE', 'include');
define('DIR_DATA', 'data');
define('DIR_IMAGES', 'images');
define('DIR_NEWS', 'data/news');
define('DIR_COMPAT', 'data/compatibility');
define('DIR_DOWNLOADS', 'downloads');
define('DIR_SCREENSHOTS', 'data/screenshots');

/**
 * Smarty configuration. The Smarty team does not recommend putting any of the
 * directories used under the web server root. 'SMARTY_DIR_COMPILE' and
 * 'SMARTY_DIR_CACHE' must be writable by the web server (chown).
 */
define('SMARTY_DIR_BASE', 'include/smarty');
define('SMARTY_DIR_TEMPLATE', 'templates');
define('SMARTY_DIR_COMPILE', SMARTY_DIR_BASE . '/template_c');
define('SMARTY_DIR_CACHE', SMARTY_DIR_BASE . '/cache');
define('SMARTY_DIR_CONFIG', SMARTY_DIR_BASE . '/config');
define('SMARTY_USE_GLOBALS', false);
/**
 * Smarty caching options, makes it possible to cache the generated HTML to
 * speed things up. More information is available at [1].
 *
 * [1] http://www.smarty.net/manual/en/caching.php
 */
define('SMARTY_CACHING_ENABLE', 0);
define('SMARTY_CACHING_LIFETIME', (60 * 60));
define('SMARTY_CACHING_COMPILE_CHECK', true); # used when developing
define('SMARTY_CACHING_FORCE_RECHECK', true); # used when developing
?>
