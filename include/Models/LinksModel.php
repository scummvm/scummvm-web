<?php
namespace ScummVM\Models;

use ScummVM\Objects\WebLink;

/**
 * The LinksModel class will generate WebLink objects.
 * LinkGroup-objects representing a group of external links on the website.
 */
class LinksModel extends BasicModel
{
    /* Get all the groups and the respectively demos. */
    public function getAllGroupsAndLinks()
    {
        $entries = $this->getFromCache();
        if (is_null($entries)) {
            $fname = DIR_DATA . '/links.yaml';
            $parsedData = \yaml_parse_file($fname);
            $entries = [];
            foreach ($parsedData as $value) {
                /* Get all links. */
                $links = [];
                foreach ($value['links'] as $data) {
                    $links[] = new WebLink($data);
                }
                $entries[] = [
                    'name' => $value['name'],
                    'description' => $value['description'],
                    'links' => $links,
                ];
            }
            $this->saveToCache($entries);
        }
        return $entries;
    }
}
