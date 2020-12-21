<?php

namespace ScummVM\OrmObjects;

use ScummVM\OrmObjects\Base\Screenshot as BaseScreenshot;

/**
 * Skeleton subclass for representing a row from the 'screenshot' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 */
class Screenshot extends BaseScreenshot
{
    public function getFiles()
    {
        if (!$this->files) {
            foreach (glob("./" . DIR_SCREENSHOTS . "/" . $this->getFilemask()) as $file) {
                if (\strpos($file, "_full.") !== false) {
                    continue;
                }
                // Remove the base folder and extension
                $name = str_replace("./" . DIR_SCREENSHOTS . "/", "", $file);
                $name = \substr($name, 0, \strlen($name) - 4);
                $this->files[] = [
                    'filename' => $name,
                    'caption' => $this->getCaption(),
                ];
            }
        }
        return $this->files;
    }

    public function addFiles($files)
    {
        if (is_array($this->files)) {
            $this->files = array_merge($this->files, $files);
        } else {
            $this->files = $files;
        }
    }

    public function getCategory()
    {
        $series = $this->getGame()->getSeries();
        if ($series) {
            return $series->getId();
        } else {
            return $this->getId();
        }
    }

    public function getName()
    {
        $series = $this->getGame()->getSeries();
        if ($series) {
            return "{$series->getName()} (Series)";
        } else {
            return $this->getGame()->getName();
        }
    }

    public function getCaption()
    {
        $name =  $this->getGame()->getName();
        $extras = [];
        if ($this->getVariant()) {
            $extras[] = $this->getVariant();
        }
        if ($this->getPlatform()) {
            $extras[] = $this->getPlatform()->getName();
        }
        if ($this->getLanguage()) {
            $extras[] = \locale_get_display_language($this->getLanguage(), "en");
        }

        if (count($extras) > 0) {
            $extra = \join("/", $extras);
            return "$name ($extra)";
        }

        return $name;
    }

    public function __toString()
    {
        return $this->getCaption();
    }
}
