<?php
namespace ScummVM\Models;

use ScummVM\OrmObjects\ScreenshotQuery;

/**
 * The ScreenshotsModel will generate Screenshot objects.
 */
class ScreenshotsModel extends BasicModel
{
    const INVALID_TARGET = 'Invalid target specified.';
    const INVALID_CATEGORY = 'Invalid category specified.';

    /* Get all screenshots. */
    public function getAllScreenshots()
    {
        $screenshots = ScreenshotQuery::create()->find();
        $data = [];
        foreach ($screenshots as $screenshot) {
            $category = $screenshot->getCategory();
            if (isset($data[$category])) {
                $data[$screenshot->getCategory()]->addFiles($screenshot->getFiles());
            } else {
                $data[$screenshot->getCategory()] = $screenshot;
            }
        }
        return $data;
    }

    public function getGroupedScreenshots()
    {
        $screenshots = $this->getAllScreenshots();
        $entries = [];

        // create top level company categories
        foreach ($screenshots as $screenshot) {
            $game = $screenshot->getGame();
            $company = $game->getCompany();
            $companyId = $company ? $company->getId() : 'other';
            $companyName = $company ? $company->getName() : 'Other';

            if (!isset($entries[$companyId])) {
                $entries[$companyId] = [
                    'title' => $companyName . " Games",
                    'category' => $companyId,
                    'games' => [],
                ];
            }
            $entries[$companyId]['games'][] = $screenshot;
        }

        // Create Other top level category and sort everything
        if (!isset($entries['other'])) {
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
        $screenshots = $this->getGroupedScreenshots();
        foreach ($screenshots as $screenshot) {
            if ($screenshot['category'] == $category) {
                return $screenshot;
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
