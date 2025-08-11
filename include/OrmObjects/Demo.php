<?php

namespace ScummVM\OrmObjects;

use ScummVM\OrmObjects\Base\Demo as BaseDemo;

/**
 * Skeleton subclass for representing a row from the 'demo' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 */
class Demo extends BaseDemo
{
    public function getName(): string
    {
        $gameName = $this->getGame()->getName();
        $platformName = $this->getPlatform()->getName();
        $category = $this->getCategory();
        return "$gameName ($platformName $category Demo)";
    }

    public function __toString(): string
    {
        return $this->getName();
    }
}
