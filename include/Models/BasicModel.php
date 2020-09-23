<?php
namespace ScummVM\Models;

use Phpfastcache\Helper\Psr16Adapter;

abstract class BasicModel
{
    protected static $cache;
    private array $data;

    public function __construct()
    {
        if (is_null(self::$cache)) {
            self::$cache = new Psr16Adapter('redis');
        }
    }

    protected function saveToCache($data, $key = '')
    {
        $cacheKey = str_replace("\\", "_", \get_called_class() . "_$key");
        self::$cache->set($cacheKey, $data, 900);
    }

    protected function getFromCache($key = '')
    {
        $cacheKey = str_replace("\\", "_", \get_called_class() . "_$key");
        $cachedData = self::$cache->get($cacheKey);
        return $cachedData;
    }
}
