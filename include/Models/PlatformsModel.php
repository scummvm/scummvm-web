<?php
namespace ScummVM\Models;

use ScummVM\Objects\Platform;

/**
 * The PlatformsModel is used to cross reference Platforms across the website
 */
abstract class PlatformsModel extends BasicModel
{
    /* Get all Platforms from YAML */
    public static function getAllPlatforms()
    {
        $fname = DIR_DATA . '/platforms.yaml';
        $platforms = \yaml_parse_file($fname);
        $data = [];
        foreach ($platforms as $platform) {
            $obj = new Platform($platform);
            $data[$obj->getId()] = $obj;
        }
        return $data;
    }
}
