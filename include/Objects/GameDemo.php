<?php
namespace ScummVM\Objects;

/**
 * The GameDemo class represents a game demo item on the website.
 */
class GameDemo extends DataObject
{

    private $url;
    private $category;
    private $platform;
    private $game;

    /* GameDemo object constructor. */
    public function __construct($data, $games, $platforms)
    {
        parent::__construct($data);
        $this->url = $this->assignFromArray('url', $data, true);
        $this->platform = $this->assignFromArray($data['platform'], $platforms, true);
        $this->game = $this->assignFromArray($data['id'], $games, true);
        $this->category = $this->assignFromArray('category', $data);
    }

    public function __toString()
    {
        return $this->getName();
    }

    /* Get the download URL for the demo. */
    public function getURL()
    {
        return $this->url;
    }

    /* Get the platform for the demo. */
    public function getPlatform()
    {
        return $this->platform;
    }

    /* Get the game for the demo. */
    public function getGame()
    {
        return $this->game;
    }

    /* Get the category for the demo. */
    public function getCategory()
    {
        return $this->category;
    }

    /* Get the category for the demo. */
    public function getName()
    {
        $gameName = $this->game->getName();
        $platformName = $this->platform->getName();
        $category = $this->getCategory();
        return "$gameName ($platformName $category Demo)";
    }
}
//
