<?php
require_once('Objects/BasicObject.php');
/**
 * The CompatGame class represents a game on the compatibility charts on the
 * website.
 */
class CompatGame extends BasicObject {
	private $_name;
	private $_target;
	private $_supportLevel;
	private $_notes;

	/* Project object constructor. */
	public function __construct($data) {
		$this->_name = $data['name'];
		$this->_target = $data['target'];
		// In old compat pages we used 'percent' instead of 'support_level'.
		// we still want to support those thus we check whether the old tag
		// is present here.
		if (array_key_exists('percent', $data)) {
			$this->_supportLevel = $data['percent'];
		} else {
			$this->_supportLevel = $data['support_level'];
		}
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

	/* Get the support level. */
	public function getSupportLevel() {
		return $this->_supportLevel;
	}

	/* Get the notes. */
	public function getNotes() {
		return $this->_notes;
	}
}
?>
