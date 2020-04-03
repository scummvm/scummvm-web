<?php
namespace ScummVM\Models;

use ScummVM\XMLParser;
use ScummVM\Objects\MenuItem;

/**
 * The MenuModel class will generates MenuItme objects.
 */
abstract class MenuModel extends BasicModel
{
    /* Get all menu entries. */
    public static function getAllMenus()
    {
        $fname = DIR_DATA . '/menus.xml';
        $parser = new XMLParser();
        $parsedData = $parser->parseByFilename($fname);
        $entries = array();
        foreach (array_values($parsedData['menus']['group']) as $value) {
            $entries[] = new MenuItem(
                array(
                'name' => $value['name'],
                'class' => $value['class'],
                'link' => $value['link'],
                )
            );
        }
        return $entries;
    }
}
