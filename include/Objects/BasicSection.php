<?php
namespace ScummVM\Objects;

/**
 * The BasicSection class is inherited by all other Sections and houses all common
 * functions.
 *
 * @phpstan-consistent-constructor
 */
abstract class BasicSection extends BasicObject
{
    protected $title;
    protected $anchor;
    protected $subsections;

    public function __construct($data)
    {
        parent::__construct($data);
        $this->title = $data['title'];
        $this->anchor = $data['anchor'];
        $this->subsections = array();
        if (isset($data['subsection'])) {
            parent::toArray($data['subsection']);
            foreach ($data['subsection'] as $value) {
                $this->subsections[] = new static($value);
            }
        }
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
