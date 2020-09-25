<?php
namespace ScummVM\Models;

use ScummVM\Objects\Screenshot;
use ScummVM\Objects\BasicObject;
use ScummVM\Models\GameModel;
use ScummVM\Models\SimpleModel;

/**
 * The ScreenshotsModel will generate Screenshot objects.
 */
class ScreenshotsModel extends BasicModel
{
    const INVALID_TARGET = 'Invalid target specified.';
    const INVALID_CATEGORY = 'Invalid category specified.';

    private $platformsModel;
    private $gameModel;

    public function __construct()
    {
        $this->platformsModel = new SimpleModel("Platform", "platforms.yaml");
        $this->gameModel = new GameModel();
    }

    /* Get all screenshots. */
    public function getAllScreenshots()
    {
        $fname = DIR_DATA . '/screenshots.yaml';
        $screenshots = \yaml_parse_file($fname);
        $platforms = $this->platformsModel->getAllData();
        $games = $this->gameModel->getAllGames();
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

    public function getGroupedScreenshots()
    {
        $screenshots = $this->getAllScreenshots();
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
    public function getCategoryScreenshots($category)
    {
        $sshots = $this->getGroupedScreenshots();
        foreach ($sshots as $shots) {
            if ($shots['category'] == $category) {
                return $shots;
            }
        }
        throw new \ErrorException(self::INVALID_CATEGORY);
    }

    /* Get screenshots for a specific target. */
    public function getTargetScreenshots($target)
    {
        $sshots = $this->getGroupedScreenshots();
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
    public function getRandomScreenshot()
    {
        $sshots = $this->getAllScreenshots();
        $item = $sshots[array_rand($sshots)];

        $screenshot = [
            'category' => $item->getCategory(),
            'screenshot' => $item
        ];
        unset($sshots);
        return $screenshot;
    }
}
