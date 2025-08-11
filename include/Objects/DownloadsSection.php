<?php
namespace ScummVM\Objects;

use ScummVM\OrmObjects\Download;
use ScummVM\OrmObjects\GameDownload;

use Propel\Runtime\Map\TableMap;

/**
 * The DownloadsSection object represents a section on the downloads page.
 */
class DownloadsSection extends BasicSection
{
    private string $notes;
    /** @var array<WebLink|File> */
    private array $items;

    /**
     * @param array{'title': string, 'anchor': string, 'subsection'?: array<mixed>, 'notes': string} $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->notes = $data['notes'];
        $this->items = [];
    }

    /**
     * @param Download|GameDownload $item
     */
    public function addItem(object $item): void
    {
        if ($item->getCategoryIcon()) {
            $this->items[] = new File($item->toArray(TableMap::TYPE_FIELDNAME));
            // If this item is for an old version, sort all items by version, descending, then by autoId
            if ($this->hasOldVersion($item)) {
                usort($this->items, function ($a, $b) {
                    // Return 0 if equal, -1 if $a->getVersion() is larger, 1 if $b->getVersion() is larger
                    $versionSortResult = -version_compare($a->getVersion(), $b->getVersion());
                    if ($versionSortResult == 0) {
                        // Return 0 if equal, -1 if $a->getAutoId() is smaller, 1 if $b->getAutoId() is smaller
                        return $a->getAutoId() <=> $b->getAutoId();
                    } else {
                        return $versionSortResult;
                    }
                });
            }
        } else {
            $this->items[] = new WebLink($item->toArray(TableMap::TYPE_FIELDNAME));
        }
    }

    /**
     * Get the optional notes.
     */
    public function getNotes(): ?string
    {
        return $this->notes;
    }

    /**
     * Get the list of items.
     *
     * @return array<WebLink|File>
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param static $section
     */
    public function addSubsection(DownloadsSection $section): void
    {
        $this->subsections[$section->getAnchor()] = $section;
    }

    /**
     * @param Download|GameDownload $item
     */
    private function hasOldVersion(object $item): bool
    {
        return method_exists($item, 'getVersion') && $item->getVersion() !== RELEASE && $item->getVersion() !== 'Daily';
    }
}
