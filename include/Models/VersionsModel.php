<?php
namespace ScummVM\Models;

use ScummVM\Objects\Version;

/**
 * The VersionsModel is used to cross reference versions across the website
 */
class VersionsModel extends BasicModel
{
    /* Get all versions from YAML */
    public function getAllVersions()
    {
        $fname = DIR_DATA . '/versions.yaml';
        $versions = \yaml_parse_file($fname);

        $data = [];
        foreach ($versions as $version) {
            $obj = new Version($version);
            $data[$obj->getId()] = $obj;
        }

        \uasort($data, "version_compare");

        if (!array_key_exists('DEV', $data)) {
            $data['DEV'] = new Version(["id" => 'DEV', "date" => "1/1/2099"]);
        }
        return array_reverse($data, true);
    }
}
