<?php
namespace ScummVM\Models;

use Phpfastcache\Helper\Psr16Adapter;
use Phpfastcache\Drivers\Redis\Config;

abstract class BasicModel
{
    protected static $cache;
    private $data;

    public function __construct()
    {
        if (is_null(self::$cache)) {
            $config = new Config(['database' => 8]);
            self::$cache = new Psr16Adapter('redis', $config);
        }
    }

    protected function saveToCache($data, $key = '')
    {
        if ($key) {
            $key = "_$key";
        }
        $cacheKey = str_replace("\\", "_", \get_called_class() . $key);
        self::$cache->set($cacheKey, $data, 3600);
    }

    protected function getFromCache($key = '')
    {
        if ($key) {
            $key = "_$key";
        }
        $cacheKey = str_replace("\\", "_", \get_called_class() . $key);
        $cachedData = self::$cache->get($cacheKey);
        return $cachedData;
    }
}
