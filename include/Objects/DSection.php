<?php
namespace ScummVM\Objects;

/**
 * The DSection object represents a section on the downloads page.
 */
class DSection extends Section
{
    private $baseurl;
    private $baseturl;

    /* DSection object constructor. */
    public function __construct($data)
    {
        parent::__construct($data);
        $this->baseurl = $data['baseurl'];
        $this->baseturl = $data['baseturl'];
        $this->subsections = array();

        parent::toArray($data['subsection']);
        foreach ($data['subsection'] as $key => $value) {
            $this->subsections[] = new DSubSection($value, $this->baseurl, $this->baseturl);
        }
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
