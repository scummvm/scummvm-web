<?php

namespace ScummVM\OrmObjects;

use ScummVM\OrmObjects\Base\Compatibility as BaseCompatibility;

/**
 * Skeleton subclass for representing a row from the 'compatibility' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 */
class Compatibility extends BaseCompatibility
{
    private function processPlatforms($values)
    {
        $platforms = \explode(",", $values);

        $data = PlatformQuery::create()->findPks($platforms);
        $retVal = '';
        foreach ($data as $platform) {
            $retVal .= "- {$platform->getName()} \n";
        }
        return $retVal;
    }

    public function getNotes()
    {
        $notes = "**Support Level:**\n\n";
        $notes .= "%{$this->getSupport()}%\n\n";

        if ($stable = $this->getStablePlatforms()) {
            $notes .= "**Supported Platforms:**\n";
            $notes .= "{$this->processPlatforms($stable)}\n";
        }

        if ($unstable = $this->getUnstablePlatforms) {
            $notes .= "**Unsupported Platforms:**\n";
            $notes .= "{$this->processPlatforms($unstable)}\n";
        }

        if ($this->notes) {
            $notes .= "**Additional Notes:**\n";
            $notes .= str_replace("- ", "\n- ", parent::getNotes()) . "\n";
        }

        if ($this->getMobyId() != '-1') {
            $notes .= "\n\n**External Links:**\n";
            $notes .= "- <a href=\"https://www.mobygames.com/game/{$this->getMobyId()}\">MobyGames</a>\n";
        }

        $config = \HTMLPurifier_Config::createDefault();
        $purifier = new \HTMLPurifier($config);
        $parsedown = new \Parsedown();
        $notes = $parsedown->text($notes);
        $notes = $purifier->purify($notes);
        return $notes;
    }

    public function getDataFiles()
    {
        return $this->getGame()->getDataFiles();
    }

    public function getMobyId()
    {
        return $this->getGame()->getMobyId();
    }
}
