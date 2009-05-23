<?php
require_once('Objects/BasicObject.php');
/**
 * The Document class represents a Document on the website.
 */
class Document extends BasicObject {
	private $_name;
	private $_url;
	private $_description;

	/* Document object constructor. */
	public function __construct($data) {
		$this->_name = $data['name'];
		$this->_url = $data['url'];
		$this->_description = $data['description'];
	}

	/* Get the name. */
	public function getName() {
		return $this->_name;
	}

	/* Get the URL. */
	public function getURL() {
		return $this->_url;
	}

	/* Get the description. */
	public function getDescription() {
		return $this->_description;
	}
}
?>
