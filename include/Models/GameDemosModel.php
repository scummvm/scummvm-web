<?php
namespace ScummVM\Models;

use ScummVM\Objects\GameDemo;
use ScummVM\Models\GameModel;
use ScummVM\Models\PlatformsModel;

/**
 * The GameDemosModel class will generate GameDemo objects.
 */
class GameDemosModel extends BasicModel
{
    private $gameModel;
    private $platformsModel;

    public function __construct()
    {
        $this->gameModel = new GameModel();
        $this->platformsModel = new SimpleModel("Platform", "platforms.yaml");
    }
    /* Get all the groups and their respective demos. */
    public function getAllGroupsAndDemos()
    {
        $groupedData = $this->getFromCache();
        if (is_null($groupedData)) {
            $fname = $this->getLocalizedFile('game_demos.yaml');
            $demos = \yaml_parse_file($fname);
            $games = $this->gameModel->getAllGames();
            $platforms = $this->platformsModel->getAllData();
            $data = [];
            foreach ($demos as $demo) {
                $obj = new GameDemo($demo, $games, $platforms);
                $data[] = $obj;
            }
            $groupedData =  $this->createGroups($data);
            $this->saveToCache($groupedData);
        }
        return $groupedData;
    }

    private function createGroups($demos)
    {
        $groups = [];
        foreach ($demos as $demo) {
            $company = $demo->getGame()->getCompany();
            if (is_string($company)) {
                $companyName = "Unknown";
            } else {
                $companyName = $company->getName();
            }
            $companyId = $company->getId();
            if (!array_key_exists($companyId, $groups)) {
                $groups[$companyId] = [
                    'name' => "$companyName Demos",
                    'href' => $companyId,
                    'demos' => []
                ];
            }

            $groups[$companyId]['demos'][] = $demo;
        }
        \sort($groups);

        $groups['other'] = [
            'name' => "Miscellaneous Demos",
            'href' => 'other',
            'demos' => []
        ];
        foreach ($groups as $key => $group) {
            \sort($groups[$key]['demos'], SORT_STRING);
            if (count($groups[$key]['demos']) <= 15) {
                $groups['other']['demos'] = \array_merge($groups['other']['demos'], $groups[$key]['demos']);
                unset($groups[$key]);
            }
        }
        \sort($groups['other']['demos'], SORT_STRING);
        return $groups;
    }
}
