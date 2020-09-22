<?php
namespace ScummVM\Models;

use ScummVM\Objects\Screenshot;
use ScummVM\Objects\BasicObject;
use ScummVM\Models\GameModel;
use ScummVM\Models\PlatformsModel;

/**
 * The ScreenshotsModel will generate Screenshot objects.
 */
abstract class ScreenshotsModel extends BasicModel
{
    const INVALID_TARGET = 'Invalid target specified.';
    const INVALID_CATEGORY = 'Invalid category specified.';

    /* Get all screenshots. */
    public static function getAllScreenshots()
    {
        $fname = DIR_DATA . '/screenshots.yaml';
        $screenshots = \yaml_parse_file($fname);
        $platforms = PlatformsModel::getAllPlatforms();
        $games = GameModel::getAllGames();
        $data = [];
        foreach ($screenshots as $screenshot) {
            $obj = new Screenshot($screenshot, $games, $platforms);
            if (array_key_exists($obj->getCategory(), $data)) {
                $data[$obj->getCategory()]->addFiles($obj->getFiles());
            } else {
                $data[$obj->getCategory()] = $obj;
            }

        }

        return $data;
    }

    public static function getGroupedScreenshots()
    {
        $screenshots = self::getAllScreenshots();
        $entries = [];

        // create top level company categories
        foreach ($screenshots as $value) {
            $game = $value->getGame();
            $company = $game->getCompany();
            $companyId = $company ? $company->getId() : 'other';
            $companyName = $company ? $company->getName() : 'Other';

            if (!array_key_exists($companyId, $entries)) {
                $entries[$companyId] = [
                    'title' => $companyName . " Games",
                    'category' => $companyId,
                    'games' => [],
                ];
            }
            $entries[$companyId]['games'][] = $value;
        }

        // Create Other top level category and sort everything
        if (!array_key_exists('other', $entries)) {
            $entries['other'] = [
                'title' => 'Other Games',
                'category' => 'other',
                'games' => []
            ];
        }

        foreach ($entries as $key => $category) {
            if (count($entries[$key]['games']) < 2) {
                $entries['other']['games'] = \array_merge($entries['other']['games'], $entries[$key]['games']);
                unset($entries[$key]);
            } else {
                \sort($entries[$key]['games'], SORT_STRING);
            }
        }

        if ($entries['other']['games']) {
            \sort($entries['other']['games'], SORT_STRING);
        } else {
            unset($entries['other']);
        }

        \ksort($entries);

        return $entries;
    }

    /* Get all screenshots in one category. */
    public static function getCategoryScreenshots($category)
    {
        $sshots = self::getGroupedScreenshots();
        foreach ($sshots as $shots) {
            if ($shots['category'] == $category) {
                return $shots;
            }
        }
        throw new \ErrorException(self::INVALID_CATEGORY);
    }

    /* Get screenshots for a specific target. */
    public static function getTargetScreenshots($target)
    {
        $sshots = self::getGroupedScreenshots();
        foreach ($sshots as $shots) {
            foreach ($shots['games'] as $starget) {
                if ($starget->getCategory() == $target) {
                    return $starget;
                }
            }
        }
        throw new \ErrorException(self::INVALID_TARGET);
    }

    /* Get a random screenshot (an object and not a filename) .*/
    public static function getRandomScreenshot()
    {
        $sshots = ScreenshotsModel::getAllScreenshots();
        $item = $sshots[array_rand($sshots)];

        $screenshot = [
            'category' => $item->getCategory(),
            'screenshot' => $item
        ];
        unset($sshots);
        return $screenshot;
    }
}
