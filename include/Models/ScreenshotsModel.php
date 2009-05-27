<?php
require_once('Models/BasicModel.php');
require_once('Objects/Screenshot.php');
require_once('XMLParser.php');
/**
 * The ScreenshotsModel will generate Screenshot objects.
 */
abstract class ScreenshotsModel extends BasicModel {
	const INVALID_TARGET = 'Invalid target specified.';
	const INVALID_CATEGORY = 'Invalid category specified.';

	/* Get all screenshots. */
	static public function getAllScreenshots() {
		$fname = DIR_DATA . '/screenshots.xml';
		$parser = new XMLParser();
		$a = $parser->parseByFilename($fname);
		$entries = array();
		BasicObject::toArray($a['screenshots']['group']);
		foreach ($a['screenshots']['group'] as $value) {
			BasicObject::toArray($value['game']);
			$games = array();
			foreach ($value['game'] as $data) {
				$games[] = new Screenshot($data);
			}

			$entries[] = array(
				'title' => $value['title'],
				'category' => $value['category'],
				'games' => $games,
			);
		}
		return $entries;
	}

	/* Get all screenshots in one category. */
	static public function getCategoryScreenshots($category) {
		$sshots = self::getAllScreenshots();
		foreach ($sshots as $shots) {
			if ($shots['category'] == $category) {
				return $shots;
			}
		}
		throw new ErrorException(self::INVALID_CATEGORY);
	}

	/* Get screenshots for a specific target. */
	static public function getTargetScreenshots($target) {
		$sshots = self::getAllScreenshots();
		foreach ($sshots as $shots) {
			foreach ($shots['games'] as $starget) {
				if ($starget->getCategory() == $target) {
					return $starget;
				}
			}
		}
		throw new ErrorException(self::INVALID_TARGET);
	}

	/* Get a random screenshot (an object and not a filename) .*/
	static public function getRandomScreenshot() {
		$sshots = self::getAllScreenshots();
		$catpos = rand(0, count($sshots) - 1);
		$scrpos = rand(0, count($sshots[$catpos]['games']) - 1);
		$screenshot = array(
			'category' => $sshots[$catpos]['category'],
			'screenshot' => $sshots[$catpos]['games'][$scrpos],
		);
		unset ($sshots);
		return $screenshot;
	}
}
?>
