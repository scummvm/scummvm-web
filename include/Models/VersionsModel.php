<?php
namespace ScummVM\Models;

use ScummVM\OrmObjects\Version;
use ScummVM\OrmObjects\VersionQuery;

/**
 * The VersionsModel is used to cross reference versions across the website
 */
class VersionsModel extends BasicModel
{
    /* Get all versions from YAML */
    public function getAllVersions()
    {
        $data = $this->getFromCache();
        if (is_null($data)) {
            $dev = VersionQuery::create()->findPk('DEV');
            if (!$dev) {
                $dev = new Version();
                $dev->fromArray(["Id" => 'DEV', 'Major' => 9, 'Minor' => 9, 'Patch' => 9]);
                $dev->save();
            }
            $data = VersionQuery::create()->orderByReleaseDate()->find();
            $this->saveToCache($data);
        }
        return $data;
    }
}
