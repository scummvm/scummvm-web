<?php
require_once('Models/BasicModel.php');
require_once('Objects/File.php');
require_once('Objects/Project.php');
/**
 * The SubprojectsModel will generate Project objects.
 */
abstract class SubprojectsModel extends BasicModel {
	/* Get all the groups and the respectively demos. */
	static public function getAllSubprojects() {
		$fname = DIR_DATA . '/subprojects.xml';
		$parser = new XMLParser();
		$a = $parser->parseByFilename($fname);
		$entries = array();
		BasicObject::toArray($a['subprojects']['project']);
		foreach ($a['subprojects']['project'] as $key => $value) {
			$downloads = array();
			foreach ($value['entries'] as $type => $data) {
				if ($type == 'file') {
					BasicObject::toArray($data);
					foreach ($data as $file) {
						$downloads[] = new File($file);
					}
				}
			}
			$entries[] = new Project(array(
				'name' => $value['name'],
				'info' => $value['info'],
				'downloads' => $downloads,
			));
		}
		return $entries;
	}
}
?>
