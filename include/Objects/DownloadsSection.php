<?php
namespace ScummVM\Objects;

/**
 * The DownloadsSection object represents a section on the downloads page.
 */
class DownloadsSection extends BasicSection
{

    /* DownloadsSection object constructor. */
    public function __construct($data)
    {
        parent::__construct($data);
        $this->subsections = array();

        parent::toArray($data['subsection']);
        foreach ($data['subsection'] as $key => $value) {
            $this->subsections[] = new DSubSection($value);
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
