<?php
namespace ScummVM\Models;

use ScummVM\Objects\MenuItem;

/**
 * The MenuModel class will generates MenuItme objects.
 */
class MenuModel extends BasicModel
{
    /* Get all menu entries. */
    public function getAllMenus()
    {
        $entries = $this->getFromCache();
        if (is_null($entries)) {
            $fname = DIR_DATA . '/menus.yaml';
            $parsedData = \yaml_parse_file($fname);
            $entries = [];
            foreach ($parsedData as $value) {
                $entries[] = new MenuItem($value);
            }
            $this->saveToCache($entries);
        }
        return $entries;
    }
}
