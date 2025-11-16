<?php

namespace ScummVM\OrmObjects;

use ScummVM\OrmObjects\Base\ScreenshotQuery as BaseScreenshotQuery;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Propel;
use ScummVM\OrmObjects\Screenshot as ChildScreenshot;
use ScummVM\OrmObjects\Map\GameTableMap;
use ScummVM\OrmObjects\Map\ScreenshotTableMap;

/**
 * Skeleton subclass for performing query and update operations on the 'screenshot' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 */
class ScreenshotQuery extends BaseScreenshotQuery
{
    public function findRandom(?ConnectionInterface $con = null): ChildScreenshot
    {
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ScreenshotTableMap::DATABASE_NAME);
        }

        $sql = "SELECT id, variant, platform_id, language, variant_id, auto_id
                FROM screenshot ORDER BY RANDOM() LIMIT 1";
        try {
            $stmt = $con->prepare($sql);
            \assert($stmt !== false);
            $stmt->execute();
        } catch (\Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = new ChildScreenshot();
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildScreenshot $obj */
            $obj->hydrate($row);
            ScreenshotTableMap::addInstanceToPool($obj, null);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * @return array<array{'category_key': string, 'category_name': string, 'subcategory_key': string,
     *          'subcategory_name': string}>
     */
    public function findCategories(?ConnectionInterface $con = null): array
    {
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ScreenshotTableMap::DATABASE_NAME);
        }

        $sql = "SELECT (CASE
                        WHEN c.cnt > 1 THEN game.company_id
                        ELSE 'other'
                    END) AS category_key,
                (CASE
                        WHEN c.cnt > 1 THEN company.name
                        ELSE 'Other'
                    END) AS category_name,
                (CASE
                        WHEN game.series_id IS NULL THEN screenshot.id
                        ELSE game.series_id
                    END) AS subcategory_key,
                (CASE
                        WHEN game.series_id IS NULL THEN game.name
                        ELSE series.name || ' (Series)'
                    END) AS subcategory_name
                FROM screenshot
                JOIN game ON game.id = screenshot.id
                JOIN company ON game.company_id = company.id
                LEFT JOIN series ON game.series_id = series.id
                JOIN
                (SELECT game.company_id,
                    Count(DISTINCT((CASE
                                        WHEN game.series_id IS NULL THEN screenshot.id
                                        ELSE game.series_id
                                    END))) AS cnt
                FROM screenshot
                JOIN game ON game.id = screenshot.id
                GROUP BY game.company_id) AS c ON c.company_id = game.company_id
                GROUP BY subcategory_key
                ORDER BY category_name,
                         subcategory_name";
        try {
            $stmt = $con->prepare($sql);
            \assert($stmt !== false);
            $stmt->execute();
        } catch (\Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        return $obj;
    }

    public function filterByCompanyId(string $companyId, ?ConnectionInterface $con = null): self
    {
        if ($companyId !== 'other') {
            /** @phpstan-ignore return.type */
            return $this->useGameQuery()
                ->filterByCompanyId($companyId)
                ->endUse();
        }

        // other company id means all companies with at most 1 game
        $subquery = ScreenshotQuery::create()->useGameQuery()
            ->groupByCompanyId()
            ->endUse()
            ->withColumn('COUNT(DISTINCT((CASE
                WHEN ' . GameTableMap::COL_SERIES_ID . ' IS NULL
                THEN ' . ScreenshotTableMap::COL_ID . '
                ELSE ' . GameTableMap::COL_SERIES_ID . '
                END)))', 'cnt')
            ->having('cnt <= 1')
            ->withColumn(GameTableMap::COL_COMPANY_ID, 'company_id')
            ->removeSelfSelectColumns();

        return $this->joinGame()
            ->addSelectQuery($subquery, 'c', false)
            ->where(GameTableMap::COL_COMPANY_ID . ' = c.company_id');
    }
}
