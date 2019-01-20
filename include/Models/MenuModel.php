<?php
namespace ScummVM\Models;

use ScummVM\XMLParser;
use ScummVM\Models\BasicModel;
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
        $a = $parser->parseByFilename($fname);
        $entries = array();
        foreach ($a['menus']['group'] as $key => $value) {
            $entries[] = new MenuItem(array(
                'name' => $value['name'],
                'class' => $value['class'],
                'link' => $value['link'],
            ));
        }
        return $entries;
    }
}
