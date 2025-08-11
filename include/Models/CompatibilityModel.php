<?php
namespace ScummVM\Models;

use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\Collection\Collection;

use ScummVM\OrmObjects\Compatibility;
use ScummVM\OrmObjects\CompatibilityQuery;
use ScummVM\OrmObjects\VersionQuery;

/**
 * The CompatibilityModel class will generate CompatGame objects.
 */
class CompatibilityModel extends BasicModel
{
    const NO_VERSION = 'No version specified.';
    const NO_VERSION_TARGET = 'No version and/or target specified.';
    const NOT_FOUND = 'Did not find any games for the specified version.';

    public function getLastUpdated(): int|false
    {
        return filemtime($this->getLocalizedFile("compatibility.yaml"));
    }

    /* Get all the groups and the respectively demos for the specified ScummVM version. */
    public function getAllData(string $version): Collection
    {
        $data = $this->getFromCache($version);
        if (\is_null($data)) {
            $releaseDate = VersionQuery::create()
                ->findPk($version)->getReleaseDate();
            if ($version === 'DEV') {
                $version = "99.99.99";
            }
            $cachekey = $version;
            $version = \explode('.', $version);
            $data = CompatibilityQuery::create()
                ->withColumn("max(release_date)")
                ->groupById()
                ->useGameQuery()
                    ->orderByName()
                    ->joinCompany()
                    ->useEngineQuery()
                        ->filterByEnabled(true)
                    ->endUse()
                ->endUse()
                ->useVersionQuery()
                    ->filterByReleaseDate($releaseDate, Criteria::LESS_EQUAL)
                ->endUse()
                ->find();
            $this->saveToCache($data, $cachekey);
        }
        return $data;
    }

    /* Get a specific CompatGame-object for the requested version. */
    public function getGameData(?string $version, ?string $target): Compatibility
    {
        if (!is_string($version) || !is_string($target)) {
            throw new \ErrorException(self::NO_VERSION_TARGET);
        }
        $releaseDate = VersionQuery::create()
                ->findPk($version)->getReleaseDate();
        if ($version === 'DEV') {
            $version = "99.99.99";
        }
        $version = explode('.', $version);
        $gameData = CompatibilityQuery::create()
                ->joinVersion()
                ->withColumn("max(release_date)")
                ->filterById($target)
                ->useVersionQuery()
                    ->filterByReleaseDate($releaseDate, Criteria::LESS_EQUAL)
                ->endUse()
            ->findOne();

        if (!$gameData) {
            throw new \ErrorException(self::NOT_FOUND);
        }

        return $gameData;
    }

    /**
     * @return array<string, array<Compatibility>>
     */
    public function getAllDataGroups(string $version): array
    {
        $data = $this->getAllData($version);
        $compat_data = [];
        foreach ($data as $compat) {
            $company = $compat->getGame()->getCompany();

            if (!$company) {
                $companyName = "Unknown";
            } else {
                $companyName = $company->getName();
            }
            if (!isset($compat_data[$companyName])) {
                $compat_data[$companyName] = [];
            }
            $compat_data[$companyName][] = $compat;
        }
        $compat_data['Other'] = [];
        foreach ($compat_data as $key => $company) {
            if (count($compat_data[$key]) < 3) {
                $compat_data['Other'] = \array_merge($compat_data['Other'], $company);
                unset($compat_data[$key]);
            }
        }

        return $compat_data;
    }
}
