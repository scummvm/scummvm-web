<?php
namespace ScummVM\Models;

use ScummVM\Objects\Compatibility;
use ScummVM\Objects\LegacyCompatGame;
use ScummVM\Models\GameModel;
use ScummVM\Models\PlatformsModel;
use Composer\Semver\Comparator;

/**
 * The CompatibilityModel class will generate CompatGame objects.
 */
abstract class CompatibilityModel extends BasicModel
{
    const NO_VERSION = 'No version specified.';
    const NO_VERSION_TARGET = 'No version and/or target specified.';
    const NOT_FOUND = 'Did not find any games for the specified version.';
    const NO_FILES = 'No compatibility files found.';

    /* Get all the groups and the respectively demos for the specified ScummVM version. */
    public static function getAllData($version)
    {
        $fname = DIR_DATA . "/compatibility.yaml";
        $compatibilityEntries = \yaml_parse_file($fname);
        $games = GameModel::getAllGames();
        $platforms = PlatformsModel::getAllPlatforms();
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
    public static function getGameData($version, $target)
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
}
