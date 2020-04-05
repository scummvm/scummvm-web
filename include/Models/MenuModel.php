<?php
namespace ScummVM\Models;

use ScummVM\Objects\MenuItem;

/**
 * The MenuModel class will generates MenuItme objects.
 */
abstract class MenuModel extends BasicModel
{
    /* Get all menu entries. */
    public static function getAllMenus()
    {
        $fname = DIR_DATA . '/menus.yaml';
        $parsedData = \yaml_parse_file($fname);
        $entries = array();
        foreach (array_values($parsedData['groups']) as $value) {
            $entries[] = new MenuItem(
                array(
                'name' => $value['name'],
                'class' => $value['class'],
                'links' => $value['links'],
                )
            );
        }
        return $entries;
    }
}
