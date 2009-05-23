<?php
require_once('Models/BasicModel.php');
require_once('Objects/CSection.php');
require_once('XMLParser.php');
/**
 * The CreditsModel will generate CSection objects.
 */
abstract class CreditsModel extends BasicModel {
	/* Get all credit sections and their contents. */
	static public function getAllCredits() {
		$fname = DIR_DATA . '/credits.xml';
		$parser = new XMLParser();
		$a = $parser->parseByFilename($fname);
		$sections = array();
		foreach ($a['credits']['section'] as $key => $value) {
			$sections[] = new CSection($value);
		}
		return $sections;
	}
}
?>
