<?php
require_once('Models/BasicModel.php');
require_once('Objects/Document.php');
/**
 * The DocumentationModel class will generate Document objects.
 */
abstract class DocumentationModel extends BasicModel {
	/* Get all the documents. */
	static public function getAllDocuments() {
		$fname = DIR_DATA . '/documentation.xml';
		$parser = new XMLParser();
		$a = $parser->parseByFilename($fname);
		$entries = array();
		foreach ($a['documentation']['document'] as $key => $value) {
			$entries[] = new Document($value);
		}
		return $entries;
	}
}
?>
