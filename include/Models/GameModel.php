<?php
namespace ScummVM\Models;

use ScummVM\Objects\Game;
use ScummVM\Models\CompaniesModel;
use ScummVM\Models\EnginesModel;
use ScummVM\Models\SeriesModel;

/**
 * The GamesModel is used to cross reference Games across the website
 */
class GameModel extends BasicModel
{
    private $companiesModel;
    private $enginesModel;
    private $seriesModel;

    public function __construct() {
        $this->companiesModel = new CompaniesModel();
        $this->enginesModel = new EnginesModel();
        $this->seriesModel = new SeriesModel();
    }

    /* Get all Games from YAML */
    public function getAllGames()
    {
        $companies = $this->companiesModel->getAllCompanies();
        $engines = $this->enginesModel->getAllEngines();
        $series = $this->seriesModel->getAllSeries();
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
