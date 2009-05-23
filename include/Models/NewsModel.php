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
	static public function getAllNews() {
		if (!($files = scandir(DIR_NEWS))) {
			throw new ErrorException(self::NO_FILES);
		}
		$news = array();
		foreach ($files as $file) {
			if (substr($file, -4) != '.xml') {
				continue;
			}
			if (!($data = @file_get_contents(DIR_NEWS . "/{$file}"))) {
				continue;
			}
			$news[] = new News($data);
		}
		return array_reverse($news);
	}

	/* Get the latest number of news items, or if no number is specified get all news items. */
	static public function getLatestNews($num=-1) {
		if ($num == -1) {
			return NewsModel::getAllNews();
		} else {
			if (!($newslist = NewsModel::getListOfNewsDates())) {
				throw new ErrorException(self::NO_FILES);
			}
			rsort($newslist, SORT_NUMERIC);
			$newslist = array_slice($newslist, 0, $num);
			$news = array();
			foreach ($newslist as $date) {
				$news[] = NewsModel::getByDate($date);
			}
			return $news;
		}
	}

	/* Get the news item that was posted on a specific date. */
	static public function getByDate($date) {
		if ($date == null || !is_numeric($date) || strlen($date) != 8) {
			throw new ErrorException(self::INVALID_DATE);
		}
		if (!is_file(($fname = DIR_NEWS . "/{$date}.xml"))
			|| !is_readable($fname) || !($data = @file_get_contents($fname))) {
			throw new ErrorException(self::FILE_NOT_FOUND);
		}
		return new News($data);
	}
}
?>
