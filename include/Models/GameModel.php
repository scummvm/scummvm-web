<?php
namespace ScummVM\Models;

use ScummVM\Objects\Game;
use ScummVM\Models\CompaniesModel;
use ScummVM\Models\EnginesModel;
use ScummVM\Models\SeriesModel;

/**
 * The GamesModel is used to cross reference Games across the website
 */
abstract class GameModel extends BasicModel
{
    /* Get all Games from YAML */
    public static function getAllGames()
    {
        $companies = CompaniesModel::getAllCompanies();
        $engines = EnginesModel::getAllEngines();
        $series = SeriesModel::getAllSeries();
        $fname = DIR_DATA . '/games.yaml';
        $games = \yaml_parse_file($fname);
        $data = [];
        foreach ($games as $game) {
            $obj = new Game($game, $engines, $companies, $series);
            $data[$obj->getId()] = $obj;
        }
        return $data;
    }
}
