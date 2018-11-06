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
		if (!($jsonString = file_get_contents(DIR_NEWS . '/news.en.json'))) {
			throw new ErrorException(self::NO_FILES);
		}
		$dates = array();
		$json = json_decode($jsonString);
		foreach ($json as $key => $value) {
			$dates[] = substr($key, 0, -4);
		}
		sort($dates, SORT_STRING);
		return $dates;
	}

	/* Get all news items ordered by date, descending. */
	static public function getAllNews($processContent = false, $returnAsJsonObject = false) {
		if (!($jsonString = file_get_contents(DIR_NEWS . '/news.en.json'))) {
			throw new ErrorException(self::NO_FILES);
		}
		global $lang;
		$news = array();
		$json = json_decode($jsonString);

		if ($lang != "en") {
			$langJson = json_decode(file_get_contents( DIR_NEWS . "/news.$lang.json"));
		}

		foreach ($json as $key => $value) {			
			if ($langJson->$key) {
				$value = $langJson->$key;
			}

			$news[] = new News($value, $key, $processContent);
		}

		if ($returnAsJsonObject)
			return $json;

		return $news;
	}

	/* Get the latest number of news items, or if no number is specified get all news items. */
	static public function getLatestNews($num=-1, $processContent = false) {
		if ($num == -1) {
			return NewsModel::getAllNews($processContent);
		} else {
			if (!($newslist = NewsModel::getAllNews())) {
				throw new ErrorException(self::NO_FILES);
			}
			return array_slice($newslist, 0, $num);
		}
	}

	/* Get the news item that was posted on a specific date. */
	static public function getOneByDate($date, $processContent = false) {
		$key = "{$date}.xml";
		$news = NewsModel::getAllNews($processContent, true);
		return new News($news->$key, $key, $processContent);
	}

	/* Get the news item that was posted on a specific date. */
	static public function getAllByDate($date, $processContent = false) {
		$key = "{$date}.xml";
		$news = NewsModel::getAllNews($processContent, true);

		$newsForDate = array();
		$newsForDate[] = new News($news->$key, $key, $processContent);

		$char = 'a';

		$newKey = substr_replace($key, $char, strlen($key-4), 0);
		while ($news->$newKey) {
			$newsForDate[] = new News($news->$newKey, $newKey, $processContent);
			$newKey = substr_replace($key, ++$char, strlen($key-4), 0);
		}

		return array_reverse($newsForDate);
	}
}
?>
