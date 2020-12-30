<?php
namespace ScummVM\Models;

use ScummVM\OrmObjects\ScreenshotQuery;
use Propel\Runtime\Collection\ObjectCollection;

/**
 * The ScreenshotsModel will generate Screenshot objects.
 */
class ScreenshotsModel extends BasicModel
{
    const INVALID_TARGET = 'Invalid target specified.';
    const INVALID_CATEGORY = 'Invalid category specified.';
    const SUBCATEGORY_COLUMN = '(case when game.series_id is null then screenshot.id else game.series_id end)';
    const CATEGORY_COLUMN = '(case when count > 1 then game.company_id else \'other\' end)';

    public function getAllCategories()
    {
        $categories = ScreenshotQuery::create()->findCategories();
        $data = [];
        foreach ($categories as $category) {
            extract($category);
            if (!isset($data[$category_key])) {
                $data[$category_key] = [
                    'title' =>  "$category_name Games",
                    'category' => $category_key,
                    'games' => [],
                ];
            }
            $data[$category_key]['games'][$subcategory_key] = [
                'name' => $subcategory_name,
                'count' => $count
            ];
        }
        return $data;
    }

    /* Get all screenshots in one category. */
    public function getScreenshotsByCompanyId($companyId)
    {
        $data = $this->getFromCache($companyId);
        if (!$data) {
            $screenshots = ScreenshotQuery::create()
            ->useGameQuery()
                ->filterByCompanyId($companyId)
            ->endUse()
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
        }
        return $data;
    }

    /* Get screenshots for a specific target. */
    public function getScreenshotsBySubcategory($target)
    {
        $data = $this->getFromCache($target);
        if (!$data) {
            $screenshots = ScreenshotQuery::create()
                ->joinGame()
                ->withColumn(self::SUBCATEGORY_COLUMN, 'subcategory')
                ->where('subcategory = ?', $target, \PDO::PARAM_STR)
                ->find();

            $combinedScreenshot = $this->combineScreenshots($screenshots);
            if (!$combinedScreenshot) {
                throw new \ErrorException(self::INVALID_TARGET);
            }

            $data = [$combinedScreenshot];
        }
        return $data;
    }

    /**
     * Combines multiple screenshots into a single screenshot
     *
     * @param  ObjectCollection $screenshots
     * @return Screenshot|bool
     */
    private function combineScreenshots(iterable $screenshots)
    {
        $count = $screenshots->count();
        if ($count === 0) {
            return false;
        } elseif ($count === 1) {
            $screenshots[0]->getFiles();
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
     * @param  ObjectCollection $screenshots
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
        \sort($combined, SORT_STRING);
        return $combined;
    }

    /* Get a random screenshot (an object and not a filename) .*/
    public function getRandomScreenshot()
    {
        return ScreenshotQuery::create()->findRandom();
    }
}
