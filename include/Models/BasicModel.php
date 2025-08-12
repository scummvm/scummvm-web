<?php
namespace ScummVM\Models;

use Phpfastcache\Helper\Psr16Adapter;
use Phpfastcache\Drivers\Predis\Config as PredisConfig;
use Phpfastcache\Drivers\Redis\Config as RedisConfig;
use Phpfastcache\Exceptions\PhpfastcacheDriverException;

abstract class BasicModel
{
    const FILE_NOT_FOUND = 'The filename %s could not be found';

    protected static Psr16Adapter $cache;

    public function __construct()
    {
        if (!isset(self::$cache)) {
            try {
                $driver = extension_loaded('redis') ? 'redis' : 'predis';
                $database = DEV_SERVER ? 7 : 8;
                $config = extension_loaded('redis')
                    ? new RedisConfig(['database' => $database])
                    : new PredisConfig(['database' => $database]);
                self::$cache = new Psr16Adapter($driver, $config);
            } catch (PhpfastcacheDriverException $ex) {
                // Fallback to files based cache
                self::$cache = new Psr16Adapter('files');
            }

            if (\file_exists(DIR_BASE . '/.clear-cache')) {
                self::$cache->clear();
                unlink(DIR_BASE . '/.clear-cache');
            }
        }
    }

    protected function getLocalizedFile(string $filename): string
    {
        global $lang;
        if (!$lang) {
            $lang = DEFAULT_LOCALE;
        }
        $localizedFilename = DIR_DATA . "/$lang/$filename";
        $defaultFilename = DIR_DATA . "/" . DEFAULT_LOCALE . "/$filename";
        if (is_file($localizedFilename) && is_readable($localizedFilename)) {
            return $localizedFilename;
        } elseif (is_file($defaultFilename) && is_readable($defaultFilename)) {
            return $defaultFilename;
        } else {
            throw new \ErrorException(\sprintf(self::FILE_NOT_FOUND, $filename));
        }
    }

    protected function saveToCache(mixed $data, string $key = ''): void
    {
        if ($key) {
            $key = "_$key";
        }
        global $lang;
        $cacheKey = str_replace("\\", "_", \get_called_class() . $key . "_$lang");
        $cacheKey = str_replace(":", "_", $cacheKey);
        self::$cache->set($cacheKey, $data, 3600);
    }

    protected function getFromCache(string $key = ''): mixed
    {
        if (\file_exists(DIR_BASE . '/.no-cache')) {
            return null;
        }

        if ($key) {
            $key = "_$key";
        }
        global $lang;
        $cacheKey = str_replace("\\", "_", \get_called_class() . $key . "_$lang");
        $cacheKey = str_replace(":", "_", $cacheKey);
        $cachedData = self::$cache->get($cacheKey);
        return $cachedData;
    }
}
