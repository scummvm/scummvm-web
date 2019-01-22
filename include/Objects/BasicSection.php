<?php
namespace ScummVM\Objects;

/**
 * The BasicSection class is inherited by all other Sections and houses all common
 * functions.
 */
abstract class BasicSection extends BasicObject
{
    protected $title;
    protected $anchor;
    protected $subsections;

    public function __construct($data)
    {
        $this->title = $data['title'];
        $this->anchor = $data['anchor'];
    }

    /* Get the title. */
    public function getTitle()
    {
        return $this->title;
    }

    /* Get the anchor. */
    public function getAnchor()
    {
        return $this->anchor;
    }

   /* Get the optional list of subsections. */
    public function getSubSections()
    {
        return $this->subsections;
    }
}
