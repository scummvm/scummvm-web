<?php
namespace ScummVM\Models;

use ScummVM\Objects\LegacyCompatGame;
use ScummVM\XMLParser;

/**
 * The CompatibilityModel class will generate LegacyCompatGame objects.
 */
abstract class LegacyCompatibilityModel extends BasicModel
{
    const NO_VERSION = 'No version specified.';
    const NO_VERSION_TARGET = 'No version and/or target specified.';
    const NOT_FOUND = 'Did not find any games for the specified version.';
    const NO_FILES = 'No compatibility files found.';

    /* Get all the groups and the respectively demos for the specified ScummVM version. */
    public static function getAllData($version)
    {
        if (!is_string($version)) {
            throw new \ErrorException(self::NO_VERSION);
        }

        $fname = DIR_COMPAT . "/compat-{$version}.xml";

        if (!file_exists($fname)) {
            throw new \ErrorException(self::NO_FILES);
        }
        $parser = new XMLParser();
        $parsedData = $parser->parseByFilename($fname);
        $entries = array();
        foreach (array_values($parsedData['compatibility']['company']) as $value) {
            $games = array();
            if (is_array($value['games'])) {
                foreach ($value['games']['game'] as $data) {
                    $games[] = new LegacyCompatGame($data);
                }
                $entries[$value['name']] = $games;
            }
        }
        return $entries;
    }


    /* Get version numbers for all available compatibility charts, excluding the DEV charts. */
    public static function getAllVersions()
    {
        if (!($files = scandir(DIR_COMPAT))) {
            throw new \ErrorException(self::NO_FILES);
        }
        $retVal = [];
        foreach ($files as $file) {
            if (substr($file, -4) !== '.xml') {
                continue;
            }
            $ver = \substr(str_replace(".xml", "", $file), 7);
            $retVal[$ver] = true;
        }

        return $retVal;
    }

    /* Get a specific LegacyCompatGame-object for the requested version. */
    public static function getGameData($version, $target)
    {
        if (!is_string($version) || !is_string($target)) {
            throw new \ErrorException(self::NO_VERSION_TARGET);
        }
        if (!($all_games = self::getAllData($version))) {
            throw new \ErrorException(self::NOT_FOUND);
        }
        $g = null;
        foreach ($all_games as $company => $games) {
            foreach ($games as $game) {
                if ($game->getTarget() == $target) {
                    $g = $game;
                    break;
                }
            }
            if ($g != null) {
                break;
            }
        }
        if (is_null($g)) {
            throw new \ErrorException(self::NOT_FOUND);
        }

        return $g;
    }
}
