<?php
require_once('Objects/BasicObject.php');
/**
 * The GameDemo class represents a game demo item on the website.
 */
class GameDemo extends BasicObject {
	private $_name;
	private $_url;
	private $_target;
	private $_category;
	
	/* GameDemo object constructor. */
	public function __construct($data) {
		$this->_name = $data['name'];
		$this->_url = $data['url'];
		$this->_target = $data['target'];
		$this->_category = isset($data['category']) ? $data['category'] : $data['target'];
	}

	/* Get the name of the demo. */
	public function getName() {
		return $this->_name;
	}

	/* Get the download URL for the demo. */
	public function getURL() {
		return $this->_url;
	}

	/* Get the target name for the demo. */
	public function getTarget() {
		return $this->_target;
	}
	
	/* Get the category for the demo. */
	public function getCategory() {
		return $this->_category;
	}
}
?>
