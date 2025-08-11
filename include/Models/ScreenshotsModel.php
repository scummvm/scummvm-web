<?php
namespace ScummVM\Models;

use ScummVM\OrmObjects\GameQuery;
use ScummVM\OrmObjects\Screenshot;
use ScummVM\OrmObjects\ScreenshotQuery;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;

/**
 * The ScreenshotsModel will generate Screenshot objects.
 */
class ScreenshotsModel extends BasicModel
{
    const INVALID_TARGET = 'Invalid target specified.';
    const INVALID_CATEGORY = 'Invalid category specified.';
    const SUBCATEGORY_COLUMN = '(case when game.series_id is null then screenshot.id else game.series_id end)';

    public function getAllCategories()
    {
        $categories = ScreenshotQuery::create()->findCategories();
        $data = [];
        foreach ($categories as $category) {
            $category_key = $category['category_key'];
            $category_name = $category['category_name'];
            $subcategory_key = $category['subcategory_key'];
            $subcategory_name = $category['subcategory_name'];
            if (!isset($data[$category_key])) {
                $data[$category_key] = [
                    'title' =>  "$category_name Games",
                    'category' => $category_key,
                    'games' => [],
                ];
            }
            $data[$category_key]['games'][$subcategory_key] = [
                'name' => $subcategory_name,
                'count' => $this->getScreenshotCount($subcategory_key)
            ];
        }
        return $data;
    }

    /* Get all screenshots in one category. */
    public function getScreenshotsByCompanyId($companyId)
    {
        $cache_key = "c_{$companyId}";
        $data = $this->getFromCache($cache_key);
        if (!$data) {
            $screenshots = ScreenshotQuery::create()
                ->filterByCompanyId($companyId)
                ->withColumn(self::SUBCATEGORY_COLUMN, 'subcategory')
                ->find();

            if ($screenshots->count() === 0) {
                throw new \ErrorException(self::INVALID_CATEGORY);
            }

            $data = [
                'title' => $screenshots[0]->getGame()->getCompany()->getName() . ' Games',
                'category' => $companyId,
                'games' => $this->combineSubcategories($screenshots)
            ];
            $this->saveToCache($data, $cache_key);
        }
        return $data;
    }

    /* Get screenshots for a specific target. */
    public function getScreenshotsBySubcategory($target)
    {
        $cache_key = "s_{$target}";
        $data = $this->getFromCache($cache_key);
        if (!$data) {
            $screenshots = ScreenshotQuery::create()
                ->joinGame()
                ->withColumn(self::SUBCATEGORY_COLUMN, 'subcategory')
                ->where('subcategory = ?', $target, \PDO::PARAM_STR)
                ->find();

            $combinedScreenshot = $this->combineScreenshots($screenshots);
            if (is_null($combinedScreenshot)) {
                throw new \ErrorException(self::INVALID_TARGET);
            }

            $data = [$combinedScreenshot];
            $this->saveToCache($data, $cache_key);
        }
        return $data;
    }

    /**
     * Combines multiple screenshots into a single screenshot
     *
     * @param  Collection $screenshots
     * @return ?Screenshot
     */
    private function combineScreenshots(iterable $screenshots)
    {
        $count = $screenshots->count();
        if ($count === 0) {
            return null;
        } elseif ($count === 1) {
            $screenshots[0]->getFiles();
            return $screenshots[0];
        } else {
            $shot = $screenshots[0];
            $shot->getFiles();
            for ($i=1; $i < $count; $i++) {
                $shot->addFiles($screenshots[$i]->getFiles());
            }
            return $shot;
        }
    }

    /**
     * combineSubcategories
     *
     * @param  Collection $screenshots
     * @return Screenshot[]
     */
    private function combineSubcategories(iterable $screenshots)
    {
        $combined = [];

        foreach ($screenshots as $screenshot) {
            $subcategory = $screenshot->getSubcategory();
            if (isset($combined[$subcategory])) {
                $combined[$subcategory]->addFiles($screenshot->getFiles());
            } else {
                $screenshot->getFiles();
                $combined[$subcategory] = $screenshot;
            }
        }
        \ksort($combined, SORT_STRING);
        return $combined;
    }

    /**
    * Returns the number of screenshot files associated with a given game or series of games
    * @param $gameOrSeriesId the id of a game or a game series
    * @return int the number of screenshot files
    */
    private function getScreenshotCount(string $gameOrSeriesId)
    {
        // Check if the id is a series.
        $games = GameQuery::create()->findBySeriesId($gameOrSeriesId);
        if (count($games) == 0) {
            // If not, then the id must be for a single game
            // We have to check this second because of name collisions with series, e.g. myst
            $games = GameQuery::create()->findById($gameOrSeriesId);
        }
        $count = 0;
        // Iterate over each game and count the number of screenshot files
        foreach ($games as $game) {
            $count += count(glob(DIR_STATIC . DIR_SCREENSHOTS . '/' .
                str_replace(':', '/', $game->getId()) . '/*_full.png'));
        }
        return $count;
    }

    /* Get a random screenshot (an object and not a filename) .*/
    public function getRandomScreenshot()
    {
        return ScreenshotQuery::create()->findRandom();
    }
}
