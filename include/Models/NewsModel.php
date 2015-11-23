<?php
require_once('Models/BasicModel.php');
require_once('Objects/News.php');
/**
 * The NewsModel class will generate News objects
 */
abstract class NewsModel extends BasicModel {
	const NO_FILES = 'No news files found.';
	const INVALID_DATE = 'Invalid date, use YYYYMMDD.';
	const FILE_NOT_FOUND = 'The requested news file doesn\'t exist.';

	/* Get a list of all the available news dates. */
	static public function getListOfNewsDates() {
		if (!($files = scandir(DIR_NEWS))) {
			throw new ErrorException(self::NO_FILES);
		}
		$dates = array();
		foreach ($files as $file) {
			if (substr($file, -4) != '.xml') {
				continue;
			}
			$dates[] = substr($file, 0, -4);
		}
		sort($dates, SORT_NUMERIC);
		return $dates;
	}

	/* Get all news items ordered by date, descending. */
	static public function getAllNews($processContent = false) {
		if (!($files = scandir(DIR_NEWS))) {
			throw new ErrorException(self::NO_FILES);
		}
		global $lang;
		$news = array();
		foreach ($files as $filename) {
			if (substr($filename, -4) != '.xml') {
				continue;
			}
			if (!is_file(($fname = DIR_NEWS . "/$lang/" . basename($filename)))
				|| !is_readable($fname) || !($data = @file_get_contents($fname))) {
				if (!($data = @file_get_contents(DIR_NEWS . "/{$filename}"))) {
					continue;
				}
			}
			$news[] = new News($data, $filename, $processContent);
		}
		return array_reverse($news);
	}

	/* Get the latest number of news items, or if no number is specified get all news items. */
	static public function getLatestNews($num=-1, $processContent = false) {
		if ($num == -1) {
			return NewsModel::getAllNews($processContent);
		} else {
			if (!($newslist = NewsModel::getListOfNewsDates())) {
				throw new ErrorException(self::NO_FILES);
			}
			rsort($newslist, SORT_NUMERIC);
			$newslist = array_slice($newslist, 0, $num);
			$news = array();
			foreach ($newslist as $date) {
				$news[] = NewsModel::getOneByDate($date, $processContent);
			}
			return $news;
		}
	}

	/* Get the news item that was posted on a specific date. */
	static public function getOneByDate($date, $processContent = false) {
		if (is_null($date) || !preg_match('/^\d{8}[a-z]?$/', $date)) {
			throw new ErrorException(self::INVALID_DATE);
		}
		global $lang;
		if (!is_file(($fname = DIR_NEWS . "/$lang/{$date}.xml"))
			|| !is_readable($fname) || !($data = @file_get_contents($fname))) {
			if (!is_file(($fname = DIR_NEWS . "/{$date}.xml"))
				|| !is_readable($fname) || !($data = @file_get_contents($fname))) {
				throw new ErrorException(self::FILE_NOT_FOUND);
			}
		}
		return new News($data, $fname, $processContent);
	}

	/* Get the news item that was posted on a specific date. */
	static public function getAllByDate($date, $processContent = false) {
		if ($date == null || !is_numeric($date) || strlen($date) != 8) {
			throw new ErrorException(self::INVALID_DATE);
		}
		$files = glob(DIR_NEWS . "/{$date}*.xml");
		if (!is_array($files) || count($files) == 0) {
			throw new ErrorException(self::FILE_NOT_FOUND);
		}
		natsort($files);
		global $lang;
		$files = array_reverse($files);
		$news = array();
		foreach ($files as $filename) {
			if (!is_file(($fname = DIR_NEWS . "/$lang/" . basename($filename)))
				|| !is_readable($fname) || !($data = @file_get_contents($fname))) {
				if (($data = @file_get_contents($filename))) {
					$news[] = new News($data, $filename, $processContent);
				}
			} else {
				$news[] = new News($data, $fname, $processContent);
			}
		}
		return $news;
	}
}
?>
