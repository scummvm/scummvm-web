<?php
namespace ScummVM;

require_once '/../vendor/autoload.php';

/**
 * Multilingual support
 */
global $lang;
global $available_languages;
$available_languages = array(
  'en' => 'English',
  'de' => 'Deutsch',
  'fr' => 'Français',
  'it' => 'Italiano',
  'ru' => 'Русский'
);

function get_preferred_languages()
{
    $lang_parse = array();
    preg_match_all('/([a-z]{1,8}(-[a-z]{1,8})?)\s*(;\s*q\s*=\s*(1|0\.[0-9]+))?/i', $_SERVER['HTTP_ACCEPT_LANGUAGE'], $lang_parse);

    if (count($lang_parse[1])) {
        $langs = array_combine($lang_parse[1], $lang_parse[4]);
        foreach ($langs as $candidate => $quality) {
            if ($quality === '') {
                $langs[$candidate] = 1;
            }
        }
        arsort($langs, SORT_NUMERIC);
        return array_keys($langs);
    }

    return array();
}

if (!empty($_GET['lang'])) {
    $lang = $_GET['lang'];
    setcookie("lang", $lang, time()+86400, "/");
} elseif (!empty($_COOKIE['lang'])) {
    $lang = $_COOKIE['lang'];
} elseif (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
    foreach (get_preferred_languages() as $candidate) {
        $candidate_major = current(explode('-', $candidate, 1));
        if (isset($available_languages[$candidate_major])) {
            $lang = $candidate_major;
            break;
        }
    }
}

if (!array_key_exists($lang, $available_languages)) {
    $lang = 'en';
}

/* Load the global constants. */
new Constants();

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
    '/screenshots/[a:category]/[a:game]'     => '\ScummVM\Pages\ScreenshotsPage',
    '/subprojects'                           => '\ScummVM\Pages\SubprojectsPage',
);

$router = new \AltoRouter();

// Custom match for Compatability ID.
$router->addMatchTypes(array('cId' => '(DEV)|[0-9\.]++'));

foreach ($pages as $key => $value) {
    $router->map('GET', $key, $value);
    $router->map('GET', $key . '/', $value);
}

$match = $router->match();
if ($match) {
    $page = new $match['target']();
    return $page->index($match['params']);
} else {
  $page = new \ScummVM\Pages\NewsPage();
  return $page->index(array());
}


