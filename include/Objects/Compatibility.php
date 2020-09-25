<?php
namespace ScummVM\Objects;

use Erusev\Parsedown;

/**
 * The Compatibility object represents a game on the compatibility charts on the
 * website.
 */
class Compatibility extends DataObject
{
    private $game;
    private $supportLevel;
    private $notes;
    private $sinceVersion;
    private $stablePlatforms;
    private $unstablePlatforms;

    /* Project object constructor. */
    public function __construct($data, $games, $platforms)
    {
        parent::__construct($data);
        $this->supportLevel = $this->assignFromArray('support', $data, true);
        $this->notes = $this->assignFromArray('notes', $data);
        $this->sinceVersion = $this->assignFromArray('since_version', $data, true);
        $this->stablePlatforms =
            $this->processPlatforms($this->assignFromArray('stable_platforms', $data, true), $platforms);
        $this->unstablePlatforms =
        $this->processPlatforms($this->assignFromArray('unstable_platforms', $data), $platforms);
        $this->game = $this->assignFromArray($data['id'], $games, true);
    }

    private function processPlatforms($values, $platforms)
    {
        $retVal = "";
        foreach (\explode(",", $values) as $platform) {
            if (array_key_exists($platform, $platforms)) {
                $retVal .= "- " . $platforms[$platform]->getName() . "\n";
            }
        }
        return $retVal;
    }

    /* Get the support level. */
    public function getSupportLevel()
    {
        return $this->supportLevel;
    }

    /* Get the notes. */
    public function getNotes()
    {
        $notes = "**Support Level:**\n\n";
        $notes .= "%$this->supportLevel%\n\n";

        if ($this->stablePlatforms) {
            $notes .= "**Supported Platforms:**\n";
            $notes .= "$this->stablePlatforms\n";
        }

        if ($this->unstablePlatforms) {
            $notes .= "**Unsupported Platforms:**\n";
            $notes .= "$this->unstablePlatforms\n";
        }

        if ($this->notes) {
            $notes .= "**Additional Notes:**\n";
            $notes .= str_replace("- ", "\n- ", $this->notes) . "\n";
        }

        $config = \HTMLPurifier_Config::createDefault();
        $purifier = new \HTMLPurifier($config);
        $parsedown = new \Parsedown();
        $notes = $parsedown->text($notes);
        $notes = $purifier->purify($notes);
        return $notes;
    }

    /* Get the datafiles uri. */
    public function getDatafiles()
    {
        return $this->game->getDatafiles();
    }

    public function getGame()
    {
        return $this->game;
    }

    public function getVersion()
    {
        if ($this->sinceVersion === 'DEV') {
            return '9.9.9';
        }
        return $this->sinceVersion;
    }
}
