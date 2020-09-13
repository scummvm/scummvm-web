<?php
namespace ScummVM\Models;

use ScummVM\Objects\GameDemo;
use ScummVM\Models\GameModel;
use ScummVM\Models\PlatformsModel;

/**
 * The GameDemosModel class will generate GameDemo objects.
 */
abstract class GameDemosModel extends BasicModel
{
    /* Get all the groups and their respective demos. */
    public static function getAllGroupsAndDemos()
    {
        $fname = DIR_DATA . '/game_demos.yaml';
        $demos = \yaml_parse_file($fname);
        $games = GameModel::getAllGames();
        $platforms = PlatformsModel::getAllPlatforms();
        $data = [];
        foreach ($demos as $demo) {
            $obj = new GameDemo($demo, $games, $platforms);
            $data[] = $obj;
        }
        return GameDemosModel::createGroups($data);
    }

    private static function createGroups($demos)
    {
        $groups = [];
        foreach ($demos as $demo) {
            if (is_string($demo->getGame())) {
                var_dump($demo);
            }
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
            \usort($groups[$key]['demos'], "\ScummVM\Models\GameDemosModel::demoSorter");
            if (count($groups[$key]['demos']) <= 15) {
                $groups['other']['demos'] = \array_merge($groups['other']['demos'], $groups[$key]['demos']);
                unset($groups[$key]);
            }
        }
        // \usort($groups['other']['demos'], "\ScummVM\Models\GameDemosModel::demoSorter");
        return $groups;
    }

    private static function demoSorter($demo1, $demo2)
    {
        return strnatcmp($demo1->getName(), $demo2->getName());
    }
}
