<?php
namespace ScummVM\Models;

use ScummVM\Objects\Game;

/**
 * The GamesModel is used to cross reference Games across the website
 */
abstract class GamesModel extends BasicModel
{
    /* Get all Games from YAML */
    public static function getAllGames()
    {
        $fname = DIR_DATA . '/games.yaml';
        $games = \yaml_parse_file($fname);
        $data = [];
        foreach ($games as $game) {
            $obj = new Game($game);
            $data[$obj->getId()] = $obj;
        }
        return $data;
    }
}
