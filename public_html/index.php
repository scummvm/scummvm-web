<?php
namespace ScummVM;

require_once __DIR__ . '/../vendor/autoload.php';

use ScummVM\Constants;

new Constants();

/**
 * Multilingual support
 */
global $lang, $available_languages;
$languages = array_slice(scandir(DIR_LANG),2);
$available_languages = [];
foreach ($languages as $lang) {
  $available_languages[$lang] = \locale_get_display_language($lang, $lang);
}

if (!empty($_GET['lang'])) {
    $lang = $_GET['lang'];
    setcookie("lang", $lang, time()+86400, "/");
} elseif (!empty($_COOKIE['lang'])) {
    $lang = $_COOKIE['lang'];
} elseif (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
    $lang = locale_accept_from_http($_SERVER['HTTP_ACCEPT_LANGUAGE']);
}

if (!array_key_exists($lang, $available_languages)) {
    $lang = DEFAULT_LOCALE;
}

/* Time zone to use for news items etc. */
date_default_timezone_set("UTC");

// set_include_path(get_include_path() . PATH_SEPARATOR . DIR_INCLUDE);
error_reporting(E_ALL ^ E_NOTICE);  // disable notices

if (!is_writeable(SMARTY_DIR_COMPILE)) {
    print "Smarty compile dir (" . SMARTY_DIR_COMPILE . ") isn't writeable!<br>\n";
    die(1);
}

/* Exception handling. */
set_exception_handler(array('ScummVM\ExceptionHandler', 'handleException'));

/* Page mapping. */
$pages = array(
    '/compatibility'                         => '\ScummVM\Pages\CompatibilityPage',
    '/compatibility/[cId:version]'           => '\ScummVM\Pages\CompatibilityPage',
    '/compatibility/[cId:version]/[a:game]'  => '\ScummVM\Pages\CompatibilityPage',
    '/contact'                               => '\ScummVM\Pages\ContactPage',
    '/credits'                               => '\ScummVM\Pages\CreditsPage',
    '/demos'                                 => '\ScummVM\Pages\DemosPage',
    '/documentation'                         => '\ScummVM\Pages\DocumentationPage',
    '/downloads'                             => '\ScummVM\Pages\DownloadsPage',
    '/games'                                 => '\ScummVM\Pages\GamesPage',
    '/faq'                                   => '\ScummVM\Pages\FAQPage',
    '/feeds'                                 => '\ScummVM\Pages\FeedsPage',
    '/feeds/[a:type]'                        => '\ScummVM\Pages\FeedsPage',
    '/links'                                 => '\ScummVM\Pages\LinksPage',
    '/'                                      => '\ScummVM\Pages\NewsPage',
    '/news'                                  => '\ScummVM\Pages\NewsPage',
    '/news/[a:date]'                         => '\ScummVM\Pages\NewsPage',
    '/press'                                 => '\ScummVM\Pages\PressPage',
    '/presssnowberry'                        => '\ScummVM\Pages\PressSnowberryPage', // HACK
    '/screenshots'                           => '\ScummVM\Pages\ScreenshotsPage',
    '/screenshots/[a:category]'              => '\ScummVM\Pages\ScreenshotsPage',
    '/screenshots/[a:category]/[:game]'      => '\ScummVM\Pages\ScreenshotsPage',
    '/subprojects'                           => '\ScummVM\Pages\SubprojectsPage',
    '/sponsors'                              => '\ScummVM\Pages\SponsorsPage',
);

$router = new \AltoRouter();

// Custom match for Compatability ID.
$router->addMatchTypes(array('cId' => "dev|[\d\.]+([rc\d]+)?"));

foreach ($pages as $key => $value) {
    $router->map('GET', $key, $value);
    $router->map('GET', $key . '/', $value);
}

$match = $router->match(strtolower($_SERVER['REQUEST_URI']));
if ($match) {
    $page = new $match['target']();
    return $page->index($match['params']);
} else {
  $page = new \ScummVM\Pages\NewsPage();
  return $page->index(array());
}


