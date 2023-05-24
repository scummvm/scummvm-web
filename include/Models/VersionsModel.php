<?php
namespace ScummVM\Models;

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
            $data = VersionQuery::create()->orderByReleaseDate()->find();
            $this->saveToCache($data);
        }
        return $data;
    }
}
