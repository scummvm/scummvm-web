<?php
require_once('Models/BasicModel.php');
require_once('Objects/GameDemo.php');
require_once('XMLParser.php');
/**
 * The GameDemosModel class will generate GameDemo objects.
 */
abstract class GameDemosModel extends BasicModel {
	/* Get all the groups and their respective demos. */
	static public function getAllGroupsAndDemos() {
		$fname = DIR_DATA . '/game_demos.xml';
		$parser = new XMLParser();
		$a = $parser->parseByFilename($fname);
		$entries = array();
		foreach ($a['game_demos']['group'] as $key => $value) {
			$demos = array();
			foreach ($value['demos']['demo'] as $data) {
				$demos[] = new GameDemo($data);
			}
			$entries[] = array(
				'name' => $value['name'],
				'href' => $value['href'],
				'demos' => $demos,
			);
		}
		return $entries;
	}
}
?>
