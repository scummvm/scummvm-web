<?php
namespace ScummVM\Objects;

/**
 * The DSubSection object represents a subsection on the downloads page.
 */
class DSubSection extends BasicObject
{
    private $title;
    private $anchor;
    private $notes;
    private $footer;
    private $files;
    private $links;
    private $items;

    /* DSubSection constructor. */
    public function __construct($data, $baseurl, $baseturl)
    {
        $this->title = $data['title'];
        $this->anchor = $data['anchor'];
        $this->notes = $data['notes'];
        $this->footer = $data['footer'];
        $this->files = array();
        $this->links = array();
        $this->items = array();

        foreach ($data['entries'] as $type => $item) {
            parent::toArray($item);
            if ($type == 'file') {
                foreach ($item as $file) {
                    $this->items[] = new File($file, $baseurl, $baseturl);
                }
            } elseif ($type == 'link') {
                foreach ($item as $link) {
                    $this->items[] = new WebLink($link);
                }
            }
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

    /* Get the optional notes. */
    public function getNotes()
    {
        return $this->notes;
    }

    /* Get the optional footer. */
    public function getFooter()
    {
        return $this->footer;
    }

    /* Get the list of files. */
    public function getFiles()
    {
        return $this->files;
    }

    /* Get the list of links. */
    public function getLinks()
    {
        return $this->links;
    }

    /* Get the list of items. */
    public function getItems()
    {
        return $this->items;
    }
}
