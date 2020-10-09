<?php
namespace ScummVM\Models;

use ScummVM\Objects\Game;
use ScummVM\Models\SimpleModel;

/**
 * The GamesModel is used to cross reference Games across the website
 */
class GameModel extends BasicModel
{
    private $companiesModel;
    private $enginesModel;
    private $seriesModel;

    public function __construct()
    {
        $this->companiesModel = new SimpleModel("Company", "companies.yaml");
        $this->enginesModel = new SimpleModel("Engine", "engines.yaml");
        $this->seriesModel = new SimpleModel("Series", "series.yaml");
    }

    /* Get all Games from YAML */
    public function getAllGames()
    {
        $data = $this->getFromCache();
        if (is_null($data)) {
            $companies = $this->companiesModel->getAllData();
            $engines = $this->enginesModel->getAllData();
            $series = $this->seriesModel->getAllData();
            $fname = $this->getLocalizedFile('games.yaml');
            $games = \yaml_parse_file($fname);
            $data = [];
            foreach ($games as $game) {
                $obj = new Game($game, $engines, $companies, $series);
                $data[$obj->getId()] = $obj;
            }
            $this->saveToCache($data);
        }
        return $data;
    }
}
