<?php
namespace ScummVM\Objects;

/**
 * The DownloadsSection object represents a section on the downloads page.
 */
class DownloadsSection extends BasicSection
{
    private $notes;
    private $footer;
    private $files;
    private $links;
    private $items;

    public function __construct($data)
    {
        parent::__construct($data);
        $this->notes = $data['notes'];
        $this->footer = $data['footer'];
        $this->files = array();
        $this->links = array();
        $this->items = array();

        if (isset($data['entries'])) {
            foreach ($data['entries'] as $type => $item) {
                parent::toArray($item);
                if ($type == 'file') {
                    foreach ($item as $file) {
                        $this->items[] = new File($file);
                    }
                } elseif ($type == 'link') {
                    foreach ($item as $link) {
                        $this->items[] = new WebLink($link);
                    }
                }
            }
        }
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
