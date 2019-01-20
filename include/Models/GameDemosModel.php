<?php
namespace ScummVM\Models;

use ScummVM\Objects\GameDemo;
use ScummVM\XMLParser;

/**
 * The GameDemosModel class will generate GameDemo objects.
 */
abstract class GameDemosModel extends BasicModel
{
    /* Get all the groups and their respective demos. */
    public static function getAllGroupsAndDemos()
    {
        $fname = DIR_DATA . '/game_demos.xml';
        $parser = new XMLParser();
        $a = $parser->parseByFilename($fname);
        $entries = array();
        foreach ($a['game_demos']['group'] as $key => $value) {
            $demos = array();
            foreach ($value['demos']['demo'] as $data) {
                $demos[] = new GameDemo($data);
            }
            $entries[] = array(
                'name' => $value['name'],
                'href' => $value['href'],
                'demos' => $demos,
            );
        }
        return $entries;
    }
}
