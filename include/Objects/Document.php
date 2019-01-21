<?php
namespace ScummVM\Objects;

/**
 * The Document class represents a Document on the website.
 */
class Document extends BasicObject
{
    private $url;

    /* Document object constructor. */
    public function __construct($data)
    {
        parent::__construct($data);
        $this->url = $data['url'];
    }

    /* Get the URL. */
    public function getURL()
    {
        return $this->url;
    }
}
