<?php
namespace ScummVM;

class Constants
{
    public function __construct()
    {
        /* Current version. */
        define('RELEASE', '2.5.1');
        define('RELEASE_TOOLS', '2.5.0');
        define('RELEASE_DEBIAN', '2.2.0');
        define('RELEASE_SNAP_STORE', '2.5.1');
        define('RELEASE_ANDROID_STORE', '2.5.0');

        /* News items on the front page. */
        define('NEWS_ITEMS', 5);

        /* Number of heroes header files. */
        define('HEROES_NUM', 6);

        /* Base URL to the website. */
        $url = "";
        if (array_key_exists('SERVER_PORT', $_SERVER)) {
            if ($_SERVER['SERVER_PORT'] == '80') {
                $url = "http://{$_SERVER['SERVER_NAME']}";
            } elseif ($_SERVER['SERVER_PORT'] == '443') {
                $url = "https://{$_SERVER['SERVER_NAME']}";
            } else {
                $url = "http://{$_SERVER['SERVER_NAME']}:{$_SERVER['SERVER_PORT']}";
            }
        }

        if (substr($url, -1) != '/') {
            $url .= '/';
        }
        define('URL_BASE', $url);

        /* Paths */
        define('DIR_BASE', __DIR__  . '/..');
        define('DIR_DATA', DIR_BASE . '/data');
        define('DIR_DOWNLOADS', '/downloads');
        define('DIR_SCREENSHOTS', '/data/screenshots');
        define('DIR_SERVER_ROOT', '/.0');
        define('DIR_FRS', DIR_SERVER_ROOT . '/frs');

        /* Locale */
        define('DEFAULT_LOCALE', 'en');

        /* Downloads */
        define('DOWNLOADS_BASE', 'https://downloads.scummvm.org');
        define('DOWNLOADS_URL', 'frs/scummvm/{$version}/');
        define('DOWNLOADS_DAILY_URL', 'frs/daily/');
        define('DOWNLOADS_EXTRAS_URL', 'frs/extras/');

        /* Themes */
        define('THEMES', [
            'scumm' => 'SCUMM',
            'residual' => 'Residual',
            'retro' => 'Retro'
        ]);
        define('DEFAULT_THEME', 'scumm');

        /**
         * Smarty configuration. The Smarty team does not recommend putting any of the
         * directories used under the web server root. 'SMARTY_DIR_COMPILE' and
         * 'SMARTY_DIR_CACHE' must be writable by the web server (chown).
         */
        define('SMARTY_DIR', DIR_BASE            . '/vendor/smarty/smarty/libs/');
        define('SMARTY_DIR_TEMPLATE', DIR_BASE            . '/templates');
        define('SMARTY_DIR_COMPILE', SMARTY_DIR_TEMPLATE . '/compiled');
        define('SMARTY_DIR_CACHE', SMARTY_DIR          . 'cache');
    }
}

if (!defined('RELEASE')) {
    new Constants();
}
