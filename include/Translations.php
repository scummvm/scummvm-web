<?php

require_once('vendor/ezyang/htmlpurifier/library/HTMLPurifier.auto.php');

set_include_path('include');
require_once('Objects/News.php');
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
  
  public function xml2json($lang) {    
    $news = $this->getAllNews($lang);
    $newsJson = new stdClass();
    foreach ($news as $key => $value) {
      $objKey = $value->getFilename();
      
      if ($lang == 'en') {
        $newsJson->$objKey = array(
          "name" => $value->getTitle(),
          "date" => $value->getDate(),
          "author" => $value->getAuthor(),
          "content" => preg_replace('/( {2,})/', ' ', preg_replace('/(\\r)|(\\n)|(\\t)/', ' ', trim($value->getContent())))        
        );
      } else {
        $newsJson->$objKey = array(
          "name" => $value->getTitle(),          
          "content" => preg_replace('/( {2,})/', ' ', preg_replace('/(\\r)|(\\n)|(\\t)/', ' ', trim($value->getContent())))        
        );
      }                  
    }

    file_put_contents('data/news/json/news.'  . $lang . '.json', json_encode($newsJson, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES |  JSON_UNESCAPED_UNICODE));
  }

  private function getAllNews($lang) {
    $dir = DIR_NEWS . "/{$lang}";
		if (!($files = scandir($dir))) {
			throw new ErrorException(self::NO_FILES);
		}		
		$news = array();
		foreach ($files as $filename) {
			if (substr($filename, -4) != '.xml') {
				continue;
			}		
      if (!($data = @file_get_contents($dir . "/{$filename}"))) {
        continue;
      }			
			$news[] = new News($data, $filename, false);
		}
		return array_reverse($news);
	}
}

$translations = new Translations();
$jsonDir = 'lang/json/';
$langs = ['en', 'it', 'fr', 'ru', 'de'];
foreach ($langs as $key => $value) {
  $translations->json2ini('lang.' . $value);
  //$translations->xml2json($value);
}  
?>
