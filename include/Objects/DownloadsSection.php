<?php
namespace ScummVM\Objects;

use Propel\Runtime\Map\TableMap;

/**
 * The DownloadsSection object represents a section on the downloads page.
 */
class DownloadsSection extends BasicSection
{
    private $notes;
    private $items;
    private $id;

    /**
     * __construct
     *
     * @param  mixed $data [id, notes, anchor, title]
     * @return void
     */
    public function __construct($data)
    {
        parent::__construct($data);
        $this->notes = $data['notes'];
        $this->items = [];
    }

    public function addItem($item)
    {
        if ($item->getCategoryIcon()) {
            $this->items[] = new File($item->toArray(TableMap::TYPE_FIELDNAME), '');
            // Sort items by version, descending
            usort($this->items, function ($a, $b) {
                return -version_compare($a->version, $b->version);
            });
        } else {
            $this->items[] = new WebLink($item->toArray(TableMap::TYPE_FIELDNAME));
        }
    }

    /* Get the optional notes. */
    public function getNotes()
    {
        return $this->notes;
    }

    /* Get the list of items. */
    public function getItems()
    {
        return $this->items;
    }

    public function getId()
    {
        return $this->id;
    }

    public function addSubsection($section)
    {
        $this->subsections[$section->getAnchor()] = $section;
    }
}
