<?php
namespace ScummVM\Models;

use ScummVM\Objects\GameDemo;

/**
 * The GameDemosModel class will generate GameDemo objects.
 */
abstract class GameDemosModel extends BasicModel
{
    /* Get all the groups and their respective demos. */
    public static function getAllGroupsAndDemos()
    {
        $fname = DIR_DATA . '/game_demos.yaml';
        $a = \yaml_parse_file($fname);
        $entries = array();
        $entries = array();
        foreach ($a['game_demos']['group'] as $key => $value) {
            $demos = array();
            foreach ($value['demos'] as $data) {
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
