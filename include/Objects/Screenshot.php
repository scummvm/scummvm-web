<?php
require_once('Objects/BasicObject.php');
/**
 * The Screenshot object represents all screenshots for one game.
 */
class Screenshot extends BasicObject {
	private $_name;
	private $_category;
	private $_files;

	/* The Screenshot object constructor. */
	public function __construct($data) {
		$this->_name = $data['name'];
		$this->_category = $data['category'];
		$this->_files = array();
		if (isset($data['image'])) {
			#parent::toArray($data['image']);
			foreach ($data['image'] as $value) {
				$this->_files[] = array(
					'filename' => $value['file'],
					'caption' => $value['caption'],
				);
			}
		}
	}

	/* Get the name. */
	public function getName() {
		return $this->_name;
	}

	/* Get the category this screenshot belongs too. */
	public function getCategory() {
		return $this->_category;
	}

	/* Get the list of files, with the base filename as key and the caption as value. */
	public function getFiles() {
		return $this->_files;
	}
}
?>
