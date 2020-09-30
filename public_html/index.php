<?php
namespace ScummVM;

/**
 * Development only
 * Don't re-route static file requests to index.php
 * And change directory context to public_html
 */
if (isset($_SERVER['SERVER_SOFTWARE']) &&
\preg_match("/PHP [\d\.]+ Development Server/",$_SERVER['SERVER_SOFTWARE'])) {
  chdir('public_html');
  if (\preg_match('/\.(?:png|jpg|jpeg|gif|css|js)/', $_SERVER["REQUEST_URI"])) {
    return false;
  }
}

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../include/Constants.php';

/**
 * Multilingual support
 */
global $lang, $available_languages;
$languages = array_slice(scandir(DIR_LANG),2);
$available_languages = [];
foreach ($languages as $l) {
    $available_languages[$l] = \locale_get_display_name($l, $l);
}

// Backwards compatibility for lang query param & cookie
// TODO: Remove this eventually
$oldLangs = [
  "en_US" => "en",
  "el_GR" => "el",
  "es_ES" => "es",
  "fr_FR" => "fr",
  "he_IL" => "he",
  "it_IT" => "it",
  "pl_PL" => "pl",
  "pt_BR" => "pt-BR",
  "pt_PT" => "pt-PT",
  "ru_RU" => "ru"
];
if (!empty($_GET['lang'])) {
  $lang = $_GET['lang'];
  $uri = \preg_replace("/[?&]lang=$lang/i", "", $_SERVER['REQUEST_URI']);
  if (array_key_exists($lang, $available_languages)) {
    header("Location: " . "/$lang" . $uri);
  } elseif (array_key_exists($lang, $oldLangs)) {
    header("Location: /" . $oldLangs[$lang] . $uri);
  }
} elseif (!empty($_COOKIE['lang'])) {
  $lang = $_COOKIE['lang'];
  $cookie_options = [
    'expires' => time()-86400,
    'path' => '/',
    'domain' => $_SERVER['HTTP_HOST'],
    'secure' => true,
    'samesite' => 'None'
  ];
  if (\strpos($_SERVER['REQUEST_URI'], "/$lang/") === false) {
    if (array_key_exists($lang, $available_languages)) {
      header("Location: " . "/$lang" . $_SERVER['REQUEST_URI']);
    } elseif (array_key_exists($lang, $oldLangs)) {
      header("Location: /" . $oldLangs[$lang] . $_SERVER['REQUEST_URI']);
    }
  }
  setcookie("lang", "", $cookie_options);
}

$langs = join("|", array_keys($available_languages));
$langMatches = [];

if (\preg_match("/^\/($langs)(\/|$)/i", $_SERVER['REQUEST_URI'], $langMatches)) {
    $lang = $langMatches[1];
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
    'compatibility'                         => '\ScummVM\Pages\CompatibilityPage',
    'compatibility/[cId:version]'           => '\ScummVM\Pages\CompatibilityPage',
    'compatibility/[cId:version]/[a:game]'  => '\ScummVM\Pages\CompatibilityPage',
    'contact'                               => '\ScummVM\Pages\ContactPage',
    'credits'                               => '\ScummVM\Pages\CreditsPage',
    'demos'                                 => '\ScummVM\Pages\DemosPage',
    'documentation'                         => '\ScummVM\Pages\DocumentationPage',
    'downloads'                             => '\ScummVM\Pages\DownloadsPage',
    'games'                                 => '\ScummVM\Pages\GamesPage',
    'faq'                                   => '\ScummVM\Pages\FAQPage',
    'feeds'                                 => '\ScummVM\Pages\FeedsPage',
    'feeds/[a:type]'                        => '\ScummVM\Pages\FeedsPage',
    'links'                                 => '\ScummVM\Pages\LinksPage',
    ''                                      => '\ScummVM\Pages\NewsPage',
    'news'                                  => '\ScummVM\Pages\NewsPage',
    'news/[a:date]'                         => '\ScummVM\Pages\NewsPage',
    'press'                                 => '\ScummVM\Pages\PressPage',
    'presssnowberry'                        => '\ScummVM\Pages\PressSnowberryPage', // HACK
    'screenshots'                           => '\ScummVM\Pages\ScreenshotsPage',
    'screenshots/[a:category]'              => '\ScummVM\Pages\ScreenshotsPage',
    'screenshots/[a:category]/[:game]'      => '\ScummVM\Pages\ScreenshotsPage',
    'subprojects'                           => '\ScummVM\Pages\SubprojectsPage',
    'sponsors'                              => '\ScummVM\Pages\SponsorsPage',
);

$router = new \AltoRouter();

// Custom match for Compatibility ID.
$router->addMatchTypes([
  'cId' => "dev|[\d\.]+([rc\d]+)?",
  'lang' => \join("|", array_keys(array_change_key_case($available_languages, CASE_LOWER)))
]);

foreach ($pages as $key => $value) {
    $router->map('GET', "/[lang:lang]?/$key", $value);
    $router->map('GET', "/[lang:lang]?/$key/", $value);
}

$match = $router->match(strtolower($_SERVER['REQUEST_URI']));

if ($match) {
    $page = new $match['target']();
    return $page->index($match['params']);
} else {
  $page = new \ScummVM\Pages\NewsPage();
  return $page->index(array());
}


