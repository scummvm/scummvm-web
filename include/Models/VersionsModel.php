<?php
namespace ScummVM\Models;

use ScummVM\OrmObjects\Version;
use ScummVM\OrmObjects\VersionQuery;

/**
 * The VersionsModel is used to cross reference versions across the website
 */
class VersionsModel extends BasicModel
{
    /**
     * Get all versions from YAML
     *
     * @return Version[]
     */
    public function getAllVersions(): array
    {
        $data = $this->getFromCache();
        if (is_null($data)) {
            $data = VersionQuery::create()->orderByReleaseDate()->find();
            $this->saveToCache($data);
        }
        return $data;
    }
}
