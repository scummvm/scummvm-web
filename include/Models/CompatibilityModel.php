<?php
namespace ScummVM\Models;

use ScummVM\Objects\Compatibility;
use ScummVM\Models\GameModel;
use ScummVM\Models\PlatformsModel;
use Composer\Semver\Comparator;

/**
 * The CompatibilityModel class will generate CompatGame objects.
 */
class CompatibilityModel extends BasicModel
{
    const NO_VERSION = 'No version specified.';
    const NO_VERSION_TARGET = 'No version and/or target specified.';
    const NOT_FOUND = 'Did not find any games for the specified version.';
    const NO_FILES = 'No compatibility files found.';
    private $gameModel;
    private $platformsModel;

    public function __construct() {
        $this->gameModel = new GameModel();
        $this->platformsModel = new PlatformsModel();
    }

    /* Get all the groups and the respectively demos for the specified ScummVM version. */
    public function getAllData($version)
    {
        $fname = DIR_DATA . "/compatibility.yaml";
        $compatibilityEntries = \yaml_parse_file($fname);
        $games = $this->gameModel->getAllGames();
        $platforms = $this->platformsModel->getAllPlatforms();
        $compareVersion = $version === 'DEV' ? '9.9.9' : $version;
        $data = [];
        foreach ($compatibilityEntries as $compat) {
            $obj = new Compatibility($compat, $games, $platforms);
            $objVersion = $obj->getVersion();
            if (Comparator::lessThanOrEqualTo($objVersion, $compareVersion)) {
                if (array_key_exists($obj->getId(), $data)) {
                    $existingVersion = $data[$obj->getId()]->getVersion();
                    if (Comparator::greaterThan($objVersion, $existingVersion)) {
                        $data[$obj->getId()] = $obj;
                    }
                } else {
                    $data[$obj->getId()] = $obj;
                }
            }

        }
        return $data;
    }

    /* Get a specific CompatGame-object for the requested version. */
    public function getGameData($version, $target)
    {
        if (!is_string($version) || !is_string($target)) {
            throw new \ErrorException(self::NO_VERSION_TARGET);
        }
        if (!($all_games = self::getAllData($version))) {
            throw new \ErrorException(self::NOT_FOUND);
        }

        if (!array_key_exists($target, $all_games)) {
            throw new \ErrorException(self::NOT_FOUND);
        }

        return $all_games[$target];
    }

    public function getAllDataGroups($version)
    {
        $data = self::getAllData($version);
        $compat_data = [];
        foreach ($data as $compat) {
            $engine = $compat->getGame()->getEngine();
            $company = $compat->getGame()->getCompany();

            if ($engine->getEnabled()) {
                $engineName = $engine->getName();
                if (is_string($company)) {
                    $companyName = "Unknown";
                } else {
                    $companyName = $company->getName();
                }
                if (!array_key_exists($companyName, $compat_data)) {
                    $compat_data[$companyName] = [];
                }
                $compat_data[$companyName][] = $compat;
            }
        }
        $compat_data['Other'] = [];
        foreach ($compat_data as $key => $company) {
            \sort($compat_data[$key], SORT_STRING);
            if (count($compat_data[$key]) < 3) {
                $compat_data['Other'] = \array_merge($compat_data['Other'], $company);
                unset($compat_data[$key]);
            }
        }
        if ($compat_data['Other']) {
            \sort($compat_data['Other'], SORT_STRING);
        } else {
            unset($compat_data['Other']);
        }

        return $compat_data;
    }

    private function compatibilitySorter($compat1, $compat2)
    {
        return strnatcmp($compat1->getName(), $compat2->getName());
    }
}
