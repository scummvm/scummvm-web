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
    private $source;
    private $date;

    /* Article object constructor. */
    public function __construct($data)
    {
        parent::__construct($data);
        $this->url = $data['url'];
        $this->language = $data['language'];
        $this->source = $data['source'];
        $this->date = $data['date'];
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

    /* Get the source that published it. */
    public function getSource()
    {
        return $this->source;
    }

    /* Get the date it was posted. */
    public function getDate()
    {
        return $this->date;
    }
}
