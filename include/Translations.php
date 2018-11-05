<?php

class Translations {

	public function json2ini($lang) {
		$jsonString = file_get_contents($lang . '.json');
		$json = json_decode($jsonString);
		
		$output = "";
		foreach ($json as $key => $value) {
			$output .= $key . " = " . $value . "\n";
		}

		file_put_contents('../' . $lang . '.ini', $output);
	}
}

$translations = new Translations();
$jsonDir = 'lang/json/';
$langs = ['it', 'fr', 'ru', 'de'];
$translations->json2ini('lang');
foreach ($langs as $key => $value) {
	$translations->json2ini('lang.' . $value);
}

?>
