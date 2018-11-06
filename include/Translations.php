<?php

require_once('vendor/ezyang/htmlpurifier/library/HTMLPurifier.auto.php');

set_include_path('include');
require_once('Objects/News.php');
require_once('Models/NewsModel.php');

define('DIR_NEWS', 'data/news');

class Translations {

	public function __construct() {
		$this->_purifier = new HTMLPurifier();
	}

	public function json2ini($lang) {

		$jsonString = file_get_contents('lang/json/' . $lang . '.json');
		$json = json_decode($jsonString);

		$output = "";
		foreach ($json as $key => $value) {
			$output .= $key . " = " . $this->_purifier->purify( $value ). "\n";
		}

		file_put_contents('lang/' . $lang . '.ini', $output);
  }

  public function updateNewsI18n($lang) {

		// For non-english, create/overwrite JSON files from our i18n file
		if ($lang != 'en') {
			$i18n = json_decode(file_get_contents(DIR_NEWS . "/i18n/news.{$lang}.json"));

			foreach ($i18n as $key => $value) {
				$originalJson = json_decode(file_get_contents(DIR_NEWS . "/{$key}"));
				$value->date = $originalJson->date;
				$value->author = $originalJson->author;

				file_put_contents(DIR_NEWS . "/{$lang}/{$key}", json_encode($value, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES |  JSON_UNESCAPED_UNICODE));
			}
		} else {
			// Update the base english i18n file
      $newsJson = new stdClass();
			$news = $this->getAllNews($lang);
			foreach ($news as $key => $value) {
				$newsJson->$key = array(
					"title" => $value->title,
					"content" => $value->content
				);
			}

			file_put_contents(DIR_NEWS . "/i18n/news.{$lang}.json", json_encode($newsJson, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES |  JSON_UNESCAPED_UNICODE));
		}
  }

  private function getAllNews($lang) {
		if ($lang != 'en')
			$dir = DIR_NEWS . "/{$lang}";
		else
			$dir = DIR_NEWS;

		if (!($files = scandir($dir))) {
			throw new ErrorException(self::NO_FILES);
		}
		$news = new stdClass();
		foreach ($files as $filename) {
			if (substr($filename, -5) != '.json') {
				continue;
			}
      if (!($data = @file_get_contents($dir . "/{$filename}"))) {
        continue;
      }
			$news->$filename = json_decode($data);
		}
		return $news;
	}
}

$translations = new Translations();
$jsonDir = 'lang/json/';
$langs = ['en', 'it', 'fr', 'ru', 'de'];
foreach ($langs as $key => $value) {
  $translations->json2ini('lang.' . $value);
  $translations->updateNewsI18n($value);
}
?>
