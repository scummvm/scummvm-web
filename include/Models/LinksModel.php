<?php
namespace ScummVM\Models;

use ScummVM\Objects\WebLink;
use Symfony\Component\Yaml\Yaml;

/**
 * The LinksModel class will generate WebLink objects.
 * LinkGroup-objects representing a group of external links on the website.
 */
class LinksModel extends BasicModel
{
    /**
     * Get all the groups and the respectively demos.
     *
     * @return array<array{'name': string, 'notes': string, 'links': array<WebLink>}>
     */
    public function getAllGroupsAndLinks(): array
    {
        $entries = $this->getFromCache();
        if (is_null($entries)) {
            $fname = $this->getLocalizedFile('links.yaml');
            $parsedData = Yaml::parseFile($fname);
            $entries = [];
            foreach ($parsedData as $value) {
                /* Get all links. */
                $links = [];
                foreach ($value['links'] as $data) {
                    $links[] = new WebLink($data);
                }
                $entries[] = [
                    'name' => $value['name'],
                    'notes' => $value['notes'],
                    'links' => $links,
                ];
            }
            $this->saveToCache($entries);
        }
        return $entries;
    }
}
