<?php
namespace ScummVM\Objects;

use Erusev\Parsedown;
use ScummVM\Objects\LegacyCompatGame;

/**
 * The Compatibilith object represents a game on the compatibility charts on the
 * website.
 */
class Compatibility extends DataObject
{
    private $game;
    private $supportLevel;
    private $notes;
    private $version;
    private $stablePlatforms;
    private $unstablePlatforms;

    /* Project object constructor. */
    public function __construct($data, $games, $platforms)
    {
        parent::__construct($data);
        $this->supportLevel = $data['support'];
        $this->notes = $data['notes'];
        $this->version = $data['version'];
        $this->stablePlatforms =
            $this->processPlatforms($data['stable_platforms'], $platforms);
        $this->unstablePlatforms =
        $this->processPlatforms($data['unstable_platforms'], $platforms);
        $this->game = $this->assignFromArray($data['game_id'], $games);
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

    /* Get the target name. */
    public function getTarget()
    {
        return $this->target;
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

        $parsedown = new \Parsedown();
        return $parsedown->text($notes);
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
        if ($this->version === 'DEV') {
            return '9.9.9';
        }
        return $this->version;
    }

    public function toLegacyCompatGame()
    {
        return new LegacyCompatGame(
            [
            'target' => $this->game->getId(),
            'datafiles' => $this->game->getDatafiles(),
            'support_level' => $this->getSupportLevel(),
            'notes' => $this->getNotes(),
            'name' => $this->game->getName(),
            'description' => ''
            ]
        );
    }
}
