<?php
namespace ScummVM\Objects;

/**
 * The article class represents a link on the website to an article covering
 * ScummVM in some way.
 */
class Article extends BasicObject
{
    private $url;
    private $language;
    private $posted;

    /* Article object constructor. */
    public function __construct($data)
    {
        $this->name = $data['name'];
        $this->url = $data['url'];
        $this->language = $data['language'];
        $this->posted = $data['posted'];
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

    /* Get the language. */
    public function getLanguage()
    {
        return $this->language;
    }

    /* Get the date it was posted. */
    public function getPosted()
    {
        return $this->posted;
    }
}
