<?php
namespace ScummVM\Models;

use ScummVM\Objects\WebLink;

/**
 * The LinksModel class will generate WebLink objects.
 * LinkGroup-objects representing a group of external links on the website.
 */
abstract class LinksModel extends BasicModel
{
    /* Get all the groups and the respectively demos. */
    public static function getAllGroupsAndLinks()
    {
        $fname = DIR_DATA . '/links.yaml';
        $parsedData = \yaml_parse_file($fname);
        $entries = array();
        foreach (array_values($parsedData['groups']) as $value) {
            /* Get all links. */
            $links = array();
            foreach ($value['links'] as $data) {
                $links[] = new WebLink($data);
            }
            $entries[] = array(
                'name' => $value['name'],
                'description' => $value['description'],
                'links' => $links,
            );
        }
        return $entries;
    }
}
