<?php
namespace ScummVM\Objects;

/**
 * The GameDemo class represents a game demo item on the website.
 */
class GameDemo extends BasicObject
{

    private $url;
    private $target;
    private $category;

    /* GameDemo object constructor. */
    public function __construct($data)
    {
        parent::__construct($data);
        $this->url = $data['url'];
        $this->target = $data['target'];
        $this->category = isset($data['category']) ? $data['category'] : $data['target'];
    }

    /* Get the download URL for the demo. */
    public function getURL()
    {
        return $this->url;
    }

    /* Get the target name for the demo. */
    public function getTarget()
    {
        return $this->target;
    }

    /* Get the category for the demo. */
    public function getCategory()
    {
        return $this->category;
    }
}
