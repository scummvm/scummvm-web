<?php

namespace ScummVM\OrmObjects;

use ScummVM\OrmObjects\Base\Download as BaseDownload;

/**
 * Skeleton subclass for representing a row from the 'scummvm_downloads' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 */
class Download extends BaseDownload
{
    public function getName()
    {
        $name = parent::getName();
        $version = $this->getVersion();
        // If it's not the latest version and not daily, prefix with the version number
        if ($version != null && $version != RELEASE && $version != 'Daily') {
            return str_replace('{$version}', $version, "$version $name");
        }
        return $name;
    }
}
