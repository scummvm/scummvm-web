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
            // If this item is for an old version, sort all items by version, descending, then by priority
            if ($this->hasOldVersion($item)) {
                usort($this->items, function ($a, $b) {
                    // Return 0 if equal, -1 if $a->version is larger, 1 if $b->version is larger
                    $versionSortResult = -version_compare($a->version, $b->version);
                    if ($versionSortResult == 0) {
                        // Return 0 if equal, -1 if $a->priority is smaller, 1 if $b->priority is smaller
                        return $a->priority <=> $b->priority;
                    } else {
                        return $versionSortResult;
                    }
                });
            }
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

    private function hasOldVersion($item)
    {
        return method_exists($item, 'getVersion') && $item->getVersion() !== RELEASE && $item->getVersion() !== 'Daily';
    }
}
