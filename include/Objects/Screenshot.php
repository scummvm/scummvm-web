<?php
namespace ScummVM\Objects;

/**
 * The Screenshot object represents all screenshots for one game.
 */
class Screenshot extends DataObject
{
    private $platform;
    private $language;
    private $variant;
    private $filename;
    private $game;
    private $files;

    /* The Screenshot object constructor. */
    public function __construct($data, $games, $platforms)
    {
        parent::__construct($data);
        $this->platform = $this->assignFromArray($data['platform_id'], $platforms);
        $this->language = $this->assignFromArray('language', $data);
        $this->variant = $this->assignFromArray('variant', $data);
        $this->filename = $this->assignFromArray('filemask', $data, true);
        $this->game = $this->assignFromArray($data['id'], $games);
        $this->files = [];
        foreach (glob("./" . DIR_SCREENSHOTS . "/" . $this->filename) as $file) {
            if (\strpos($file, "_full.") > 0) {
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

    public function getFiles()
    {
        return $this->files;
    }

    public function addFiles($files)
    {
        $this->files = array_merge($this->files, $files);
    }

    public function getCategory()
    {
        if ($this->game->getSeries()) {
            return $this->game->getSeries()->getId();
        } else {
            return $this->getId();
        }
    }

    public function getName()
    {
        if ($this->game->getSeries()) {
            return $this->game->getSeries()->getName() . " (Series)";
        } else {
            return $this->game->getName();
        }
    }

    public function getPlatform()
    {
        return $this->platform;
    }

    public function getFilename()
    {
        return $this->filename;
    }

    public function getGame()
    {
        return $this->game;
    }

    public function getCaption()
    {
        $name =  $this->game->getName();
        $extras = [];
        if ($this->variant) {
            $extras[] = $this->variant;
        }
        if ($this->platform) {
            $extras[] = $this->platform->getName();
        }
        if ($this->language) {
            $extras[] = \locale_get_display_language($this->language, "en");
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
