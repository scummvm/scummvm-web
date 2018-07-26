<?php
/* Current version. */
define('RELEASE', '2.0.0');
define('RELEASE_TOOLS', '2.0.0');
define('RELEASE_DEBIAN', '1.9.0');
/* Version when the percentages on the compat page were removed */
define('COMPAT_LAYOUT_CHANGE', '1.7.0');

/* News items on the front page. */
define('NEWS_ITEMS', 5);
/* Number of heroes header files. */
define('HEROES_NUM', 4);
/* Time zone to use for news items etc. */
date_default_timezone_set("UTC");

/* Base URL to the website. */
if ($_SERVER['SERVER_PORT'] == '80') {
	$url = "http://{$_SERVER['SERVER_NAME']}" . dirname($_SERVER['PHP_SELF']);
} else if ($_SERVER['SERVER_PORT'] == '443') {
	$url = "https://{$_SERVER['SERVER_NAME']}" . dirname($_SERVER['PHP_SELF']);
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
define('DIR_NEWS', 'data/news');
define('DIR_LANG', 'lang');
define('DIR_COMPAT', 'data/compatibility');
define('DIR_DOWNLOADS', '/downloads');
define('DIR_SCREENSHOTS', '/data/screenshots');

/**
 * Smarty configuration. The Smarty team does not recommend putting any of the
 * directories used under the web server root. 'SMARTY_DIR_COMPILE' and
 * 'SMARTY_DIR_CACHE' must be writable by the web server (chown).
 */
define('SMARTY_DIR', 'vendor/smarty/smarty/libs/');
define('SMARTY_DIR_TEMPLATE', 'templates');
define('SMARTY_DIR_COMPILE', SMARTY_DIR . '/template_c');
define('SMARTY_DIR_CACHE', SMARTY_DIR . '/cache');
define('SMARTY_DIR_CONFIG', SMARTY_DIR . '/config');
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
