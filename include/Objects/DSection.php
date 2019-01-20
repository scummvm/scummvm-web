<?php
namespace ScummVM\Objects;

/**
 * The DSection object represents a section on the downloads page.
 */
class DSection extends BasicObject
{
    private $title;
    private $anchor;
    private $baseurl;
    private $baseturl;
    private $subsections;

    /* DSection object constructor. */
    public function __construct($data)
    {
        $this->title = $data['title'];
        $this->anchor = $data['anchor'];
        $this->baseurl = $data['baseurl'];
        $this->baseturl = $data['baseturl'];
        $this->subsections = array();

        parent::toArray($data['subsection']);
        foreach ($data['subsection'] as $key => $value) {
            $this->subsections[] = new DSubSection($value, $this->baseurl, $this->baseturl);
        }
    }

    /* Get the title. */
    public function getTitle()
    {
        return $this->title;
    }

    /* Get the anchor name. */
    public function getAnchor()
    {
        return $this->anchor;
    }

    /* Get the base URL. */
    public function getBaseURL()
    {
        return $this->baseurl;
    }

    /* Get the list of optional subsections. */
    public function getSubSections()
    {
        return $this->subsections;
    }
}
