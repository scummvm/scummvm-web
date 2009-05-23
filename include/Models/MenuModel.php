<?php
require_once('XMLParser.php');
require_once('Models/BasicModel.php');
require_once('Objects/MenuItem.php');
/**
 * The MenuModel class will generates MenuItme objects.
 */
abstract class MenuModel extends BasicModel {
	/* Get all menu entries. */
	static public function getAllMenus() {
		$fname = DIR_DATA . '/menus.xml';
		$parser = new XMLParser();
		$a = $parser->parseByFilename($fname);
		$entries = array();
		foreach ($a['menus']['group'] as $key => $value) {
			$entries[] = new MenuItem(array(
				'name' => $value['name'],
				'class' => $value['class'],
				'link' => $value['link'],
			));
		}
		return $entries;
	}
}
?>
