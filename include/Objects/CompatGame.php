<?php
require_once('Objects/BasicObject.php');
/**
 * The CompatGame class represents a game on the compatibility charts on the
 * website.
 */
class CompatGame extends BasicObject {
	private $_name;
	private $_target;
	private $_percent;
	private $_notes;

	/* Project object constructor. */
	public function __construct($data) {
		$this->_name = $data['name'];
		$this->_target = $data['target'];
		$this->_percent = $data['percent'];
		$this->_notes = $data['notes'];
	}

	/* Get the name. */
	public function getName() {
		return $this->_name;
	}

	/* Get the target name. */
	public function getTarget() {
		return $this->_target;
	}

	/* Get the complete percentage. */
	public function getPercent() {
		return $this->_percent;
	}

	/* Get the notes. */
	public function getNotes() {
		return $this->_notes;
	}
}
?>
