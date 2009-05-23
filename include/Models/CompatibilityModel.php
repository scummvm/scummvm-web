<?php
require_once('Models/BasicModel.php');
require_once('Objects/CompatGame.php');
require_once('XMLParser.php');
/**
 * The CompatibilityModel class will generate CompatGame objects.
 */
abstract class CompatibilityModel extends BasicModel {
	const NO_VERSION = 'No version specified.';
	const NO_VERSION_TARGET = 'No version and/or target specified.';
	const NOT_FOUND = 'Did not find any games for the specified version.';
	const NO_FILES = 'No compatibility files found.';

	/* Get all the groups and the respectively demos for the specified ScummVM version. */
	static public function getAllData($version) {
		if (!is_string($version)) {
			throw new ErrorException(self::NO_VERSION);
		}
		$fname = DIR_COMPAT . "/compat-{$version}.xml";
		$parser = new XMLParser();
		$a = $parser->parseByFilename($fname);
		$entries = array();
		foreach ($a['compatibility']['company'] as $key => $value) {
			$games = array();
			foreach ($value['games']['game'] as $data) {
				$games[] = new CompatGame($data);
			}
			$entries[$value['name']] = $games;
		}
		return $entries;
	}

	/* Get version numbers for all available compatibility charts, excluding the SVN charts. */
	static public function getAllVersions() {
		if (!($files = scandir(DIR_COMPAT))) {
			throw new ErrorException(self::NO_FILES);
		}
		$dates = array();
		foreach ($files as $file) {
			if (substr($file, -4) != '.xml') {
				continue;
			}
			/* Always exclude the SVN-chart. */
			if (strpos($file, 'SVN') === false) {
				$dates[] = substr($file, (strpos($file, '-') + 1), -4);
			}
		}
		natsort($dates);
		$dates = array_reverse($dates);
		return $dates;
	}

	/* Get a specific CompatGame-object for the requested version. */
	static public function getGameData($version, $target) {
		if (!is_string($version) || !is_string($target)) {
			throw new ErrorException(self::NO_VERSION_TARGET);
		}
		if (!($all_games = self::getAllData($version))) {
			throw new ErrorException(self::NOT_FOUND);
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
			throw new ErrorException(self::NOT_FOUND);
		}

		return $g;
	}
}
?>
