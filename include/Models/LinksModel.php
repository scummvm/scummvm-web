<?php
require_once('Models/BasicModel.php');
require_once('Objects/WebLink.php');
require_once('XMLParser.php');
/**
 * The LinksModel class will generate WebLink objects.
 * LinkGroup-objects representing a group of external links on the website.
 */
abstract class LinksModel extends BasicModel {
	/* Get all the groups and the respectively demos. */
	static public function getAllGroupsAndLinks() {
		$fname = DIR_DATA . '/links.xml';
		$parser = new XMLParser();
		$a = $parser->parseByFilename($fname);
		$entries = array();
		foreach ($a['external_links']['group'] as $key => $value) {
			/* Get all links. */
			$links = array();
			foreach ($value['link'] as $data) {
				$links[] = new WebLink($data);
			}
			$entries[] = array(
				'name' => $value['name'],
				'description' => $value['description'],
				'links' => $links,
			);
		}
		return $entries;
	}
}
?>
