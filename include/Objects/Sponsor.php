<?php
namespace ScummVM\Objects;

/**
 * The article class represents a link on the website to an article covering
 * ScummVM in some way.
 */
class Sponsor extends BasicObject
{
    private $link;
    private $image;

    /* Article object constructor. */
    public function __construct($data)
    {
        parent::__construct($data);
        $this->link = $data['link'];
        $this->image = $data['image'];
    }

    /* Get the sponsor link. */
    public function getLink()
    {
        return $this->link;
    }

    /* Get the sponsor image */
    public function getImage()
    {
        return $this->image;
    }
}
