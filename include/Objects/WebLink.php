<?php
namespace ScummVM\Objects;

/**
 * The WebLink class represents a link item on the website.
 */
class WebLink extends BasicObject
{

    private $url;
    private $description;

    /* WebLink object constructor. */
    public function __construct($data)
    {
        $this->name = $data['name'];
        $this->url = $data['url'];
        $this->description = $data['description'];
    }

    /* Get the name of the link. */
    public function getName()
    {
        return $this->name;
    }

    /* Get the URL of the link. */
    public function getURL()
    {
        return $this->url;
    }

    /* Get the description of the link. */
    public function getDescription()
    {
        return $this->description;
    }

    /* Get the user-agent. */
    public function getUserAgent()
    {
        return "";
    }
}
