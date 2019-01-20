<?php
namespace ScummVM\Web;

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

if (!empty($_REQUEST['lang'])) {
    $lang = $_REQUEST['lang'];
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

/* We have to clean the mess introduced by double cookie at the wrong level */
if (empty($_COOKIE['clear_lang'])) {
    setcookie("lang", 'deleted', 1); // Setting it a current domain level, as it stays one level up
    setcookie("clear_lang", "deleted", 1456167472); // Hardcoded to 22-Feb-2016 when previous cookie expires
}

/* Load the configuration. */
require_once('include/config.inc.php');
/* Set up the include path. */
set_include_path(get_include_path() . PATH_SEPARATOR . DIR_INCLUDE);
error_reporting(E_ALL ^ E_NOTICE);  // disable notices

if (!is_writeable(SMARTY_DIR_COMPILE)) {
    print "Smarty compile dir (" . SMARTY_DIR_COMPILE . ") isn't writeable!<br>\n";
    die(1);
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
require_once("Pages/{$pages[$page]}.php");
$p = new $pages[$page]();
return $p->index();
