<?php
namespace ScummVM\Models;

use ScummVM\OrmObjects\GameQuery;

/**
 * The GamesModel is used to cross reference Games across the website
 */
class GameModel extends BasicModel
{
    /* Get all Games from YAML */
    public function getAllGames()
    {
        $data = $this->getFromCache();
        if (is_null($data)) {
            $data = GameQuery::create()->find();
        }
        return $data;
    }
}
