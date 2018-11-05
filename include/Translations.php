<?php

require_once('vendor/ezyang/htmlpurifier/library/HTMLPurifier.auto.php');

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
}

$translations = new Translations();
$jsonDir = 'lang/json/';
$langs = ['en', 'it', 'fr', 'ru', 'de'];
foreach ($langs as $key => $value) {
	$translations->json2ini('lang.' . $value);
}

?>
