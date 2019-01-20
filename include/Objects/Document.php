<?php
namespace ScummVM\Objects;

/**
 * The Document class represents a Document on the website.
 */
class Document extends BasicObject
{
    private $url;
    private $description;

    /* Document object constructor. */
    public function __construct($data)
    {
        $this->name = $data['name'];
        $this->url = $data['url'];
        $this->description = $data['description'];
    }

    /* Get the name. */
    public function getName()
    {
        return $this->name;
    }

    /* Get the URL. */
    public function getURL()
    {
        return $this->url;
    }

    /* Get the description. */
    public function getDescription()
    {
        return $this->description;
    }
}
