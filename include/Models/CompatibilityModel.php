<?php
namespace ScummVM\Models;

use Propel\Runtime\ActiveQuery\Criteria;
use ScummVM\OrmObjects\Base\CompatibilityQuery;

/**
 * The CompatibilityModel class will generate CompatGame objects.
 */
class CompatibilityModel extends BasicModel
{
    const NO_VERSION = 'No version specified.';
    const NO_VERSION_TARGET = 'No version and/or target specified.';
    const NOT_FOUND = 'Did not find any games for the specified version.';

    public function getLastUpdated()
    {
        return filemtime($this->getLocalizedFile("compatibility.yaml"));
    }

    /* Get all the groups and the respectively demos for the specified ScummVM version. */
    public function getAllData($version)
    {
        $data = $this->getFromCache($version);
        if (\is_null($data)) {
            if ($version === 'DEV') {
                $version = "99.99.99";
            }
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
                    ->filterByMajor($version[0], Criteria::LESS_EQUAL)
                    ->filterByMinor($version[1], Criteria::LESS_EQUAL)
                    ->filterByPatch($version[2], Criteria::LESS_EQUAL)
                ->endUse()
                ->find();
            $this->saveToCache($data, $version);
        }
        return $data;
    }

    /* Get a specific CompatGame-object for the requested version. */
    public function getGameData($version, $target)
    {
        if (!is_string($version) || !is_string($target)) {
            throw new \ErrorException(self::NO_VERSION_TARGET);
        }
        if ($version === 'DEV') {
            $version = "99.99.99";
        }
        $version = explode('.', $version);
        $gameData = CompatibilityQuery::create()
                ->joinVersion()
                ->withColumn("max(release_date)")
                ->filterById($target)
                ->useVersionQuery()
                    ->filterByMajor($version[0], Criteria::LESS_EQUAL)
                    ->filterByMinor($version[1], Criteria::LESS_EQUAL)
                    ->filterByPatch($version[2], Criteria::LESS_EQUAL)
                ->endUse()
            ->findOne();

        if (!$gameData) {
            throw new \ErrorException(self::NOT_FOUND);
        }

        return $gameData;
    }

    public function getAllDataGroups($version)
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
