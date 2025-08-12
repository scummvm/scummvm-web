<?php // phpcs:ignore PSR1.Files.SideEffects.FoundWithSymbols
namespace ScummVM;

class Constants
{
    public function __construct()
    {
        /* Current version. */
        define('RELEASE', '2.9.1');
        define('RELEASE_TOOLS', '2.9.0');

        /* News items on the front page. */
        define('NEWS_ITEMS', 5);

        /* Number of heroes header files. */
        define('HEROES_NUM', 6);

        /* Base URL to the website. */
        if (isset($_SERVER['SERVER_NAME'])) {
            define('URL_SCHEME', "http" . (empty($_SERVER['HTTPS']) ? '' : 's'));
            $host = $_SERVER['SERVER_NAME'];
            if (($_SERVER['SERVER_PORT'] != '80'  &&  empty($_SERVER['HTTPS'])) ||
                ($_SERVER['SERVER_PORT'] != '443' && !empty($_SERVER['HTTPS']))) {
                $host .= ":{$_SERVER['SERVER_PORT']}";
            }
            define('URL_HOST', $host);
            define('URL_BASE', URL_SCHEME . "://$host/");
        } else {
            /* For PHPStan */
            define('URL_SCHEME', '');
            define('URL_HOST', '');
            define('URL_BASE', '');
        }

        if (defined('DEV_SERVER') && DEV_SERVER) {
            define('SITE_HOSTS', [
                'www.scummvm.org',
                'scummvm.org',
                URL_HOST
            ]);
        } else {
            define('SITE_HOSTS', [
                'www.scummvm.org',
                'scummvm.org'
            ]);
        }

        /* External URLs */
        define('GOG_URL_PREFIX', "https://www.gog.com/game/");
        define('STEAM_URL_PREFIX', 'https://store.steampowered.com/app/');
        define('ZOOM_URL_PREFIX', 'https://www.zoom-platform.com/product/');
        // ScummVM affiliate id
        define('ZOOM_URL_SUFFIX', '?affiliate=c049516c-9c4c-42d6-8649-92ed870e8b53');

        /* Paths */
        define('DIR_BASE', __DIR__  . '/..');
        define('DIR_DATA', DIR_BASE . '/data');
        define('DIR_STATIC', DIR_BASE . '/public_html');
        define('DIR_DOWNLOADS', '/downloads');
        define('DIR_SCREENSHOTS', '/data/screenshots');
        define('DIR_SERVER_ROOT', '/.0');
        define('DIR_FRS', DIR_SERVER_ROOT . '/frs');

        /* Locale */
        define('DEFAULT_LOCALE', 'en');

        /* Downloads */
        define('DOWNLOADS_BASE', 'https://downloads.scummvm.org');
        define('DOWNLOADS_URL', 'frs/scummvm/{$version}/');
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
