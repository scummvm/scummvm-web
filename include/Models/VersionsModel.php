<?php
namespace ScummVM\Models;

use ScummVM\Objects\CreditsSection;

/**
 * The VersionsModel is used to cross reference versions across the website
 */
abstract class VersionsModel extends BasicModel
{
    /* Get all versions from YAML */
    public static function getAllVersions()
    {
        $fname = DIR_DATA . '/versions.yaml';
        $versions = \yaml_parse_file($fname);
        $data = [];
        foreach ($versions as $version) {
            $obj = new Version($version);
            $data[$obj->getId()] = $obj;
        }
        return $data;
    }
}
