<?php
namespace ScummVM\Objects;

use Erusev\Parsedown;
use ScummVM\Objects\LegacyCompatGame;

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

    private static $purifier;
    private static $parsedown;

    /* Project object constructor. */
    public function __construct($data, $games, $platforms)
    {
        parent::__construct($data);
        $config = \HTMLPurifier_Config::createDefault();
        if (!self::$purifier) {
            self::$purifier = new \HTMLPurifier($config);
        }
        if (!self::$parsedown) {
            self::$parsedown = new \Parsedown();
        }
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
    public function getNotes($sanitize = true)
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

        $notes = self::$parsedown->text($notes);
        if ($sanitize) {
            $notes = self::$purifier->purify($notes);
        }
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

    public function toLegacyCompatGame($sanitize = true)
    {
        return new LegacyCompatGame(
            [
            'target' => $this->game->getId(),
            'datafiles' => $this->game->getDatafiles(),
            'support_level' => $this->getSupportLevel(),
            'notes' => $this->getNotes($sanitize),
            'name' => $this->game->getName(),
            'description' => ''
            ]
        );
    }
}
