<?php
namespace ScummVM\Objects;

/**
 * The WebLink class represents a link item on the website.
 */
class WebLink extends BasicObject
{
    private $notes;
    private $url;

    /* WebLink object constructor. */
    public function __construct($data)
    {
        parent::__construct($data);
        $this->notes = $data['notes'];
        $this->url = $data['url'];
    }

    public function getNotes()
    {
        return $this->notes;
    }

    /* Get the URL of the link. */
    public function getURL()
    {
        return $this->url;
    }

    /* Get the user-agent. */
    public function getUserAgent()
    {
        return "";
    }
}
