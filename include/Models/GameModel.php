<?php
namespace ScummVM\Models;

use ScummVM\OrmObjects\Game;
use ScummVM\OrmObjects\GameQuery;

/**
 * The GamesModel is used to cross reference Games across the website
 */
class GameModel extends BasicModel
{
    /**
     * Get all Games from YAML
     *
     * @return Game[]
     */
    public function getAllGames(): array
    {
        $data = $this->getFromCache();
        if (is_null($data)) {
            $data = GameQuery::create()->find();
        }
        return $data;
    }
}
