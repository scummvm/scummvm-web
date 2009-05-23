<?php
require_once('Objects/BasicObject.php');
/**
 * The menu class represents a sidebar menu group on the website.
 */
class MenuItem extends BasicObject {
	private $_name;
	private $_class;
	private $_entries;

	/* Menu object constructor. */
	public function __construct($data) {
		$this->_name = $data['name'];
		$this->_class = $data['class'];
		$this->_entries = array();
		foreach ($data['link'] as $key => $value) {
			$this->_entries[$value['name']] = $value['href'];
		}
	}

	/* Get the name. */
	public function getName() {
		return $this->_name;
	}

	/* Get the CSS class. */
	public function getClass() {
		return $this->_class;
	}

	/* Get the list of links, with the name as key and URL as value. */
	public function getEntries() {
		return $this->_entries;
	}
}
?>
