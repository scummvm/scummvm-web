<?php
namespace ScummVM\Objects;

/**
 * The sponsor class represents a link on the website to a sponsor and its logo and supporting
 * ScummVM in some way.
 */
class Sponsor extends BasicObject
{
    private string $link;
    private string $image;

    /**
     * Sponsor object constructor.
     * @param array{'description'?: string, 'name'?: string, 'link': string, 'image': string} $data
     */
    public function __construct($data)
    {
        parent::__construct($data);
        $this->link = $data['link'];
        $this->image = $data['image'];
    }

    /* Get the sponsor link. */
    public function getLink(): string
    {
        return $this->link;
    }

    /* Get the sponsor image */
    public function getImage(): string
    {
        return $this->image;
    }
}
