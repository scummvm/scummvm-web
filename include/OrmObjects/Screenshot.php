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
    /**
     * @var array<array{'filename': string, 'caption': string, 'url': string}>
     */
    private array $files;

    /**
     * @return array<array{'filename': string, 'caption': string, 'url': string}>
     */
    public function getFiles(): array
    {
        if (!isset($this->files)) {
            $this->files = [];
            $gameId = str_replace(':', '/', $this->getGame()->getId());
            $screenshots = glob(DIR_STATIC . DIR_SCREENSHOTS . '/' . $gameId . '/' . $this->getFileMask());
            if ($screenshots === false) {
                $screenshots = array();
            }
            foreach ($screenshots as $file) {
                // Remove the base folder
                $name = str_replace(DIR_STATIC . DIR_SCREENSHOTS . '/', '', $file);
                // Remove the suffix, eg. "_full.png"
                $name = \substr($name, 0, \strlen($name) - 9);
                $this->files[] = [
                    'filename' => $name,
                    'caption' => $this->getCaption(),
                    'url' => "compatibility/DEV/" . $this->getGame()->getId()
                ];
            }
        }
        return $this->files;
    }

    /**
     * @param array<array{'filename': string, 'caption': string, 'url': string}> $files
     */
    public function addFiles(array $files): void
    {
        if (isset($this->files)) {
            $this->files = array_merge($this->files, $files);
        } else {
            $this->files = $files;
        }
    }

    public function getCategory(): string
    {
        $series = $this->getGame()->getSeries();
        if ($series) {
            return $series->getId();
        } else {
            // Remove engine prefix
            return substr($this->getId(), strpos($this->getId(), ':') + 1);
        }
    }

    public function getName(): string
    {
        $series = $this->getGame()->getSeries();
        if ($series) {
            return "{$series->getName()} (Series)";
        } else {
            return $this->getGame()->getName();
        }
    }

    public function getCaption(): string
    {
        $name = $this->getGame()->getName();
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
            // Escape quotes and such, such as for `Spy Fox in "Dry Cereal"`
            return htmlspecialchars("$name ($extra)");
        }

        return htmlspecialchars($name);
    }

    public function getFileMask(): string
    {
        // Remove engine prefix
        $game_short_id = substr($this->getGame()->getId(), strpos($this->getGame()->getId(), ':') + 1);
        $mask = $game_short_id . "_";
        if ($this->getPlatform()) {
            $mask .= $this->getPlatform()->getId() . "_";
        }
        if ($this->getLanguage()) {
            $mask .= $this->getLanguage() . "_";
        }
        $mask .= $this->getVariantId() . "_";
        $mask .= "*_full.*";
        return $mask;
    }

    public function __toString(): string
    {
        return $this->getCaption();
    }
}
