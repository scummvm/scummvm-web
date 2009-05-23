<?php
require_once('Objects/BasicObject.php');
/**
 * The WebLink class represents a link item on the website.
 */
class WebLink extends BasicObject {
	private $_name;
	private $_url;
	private $_description;

	/* WebLink object constructor. */
	public function __construct($data) {
		$this->_name = $data['name'];
		$this->_url = $data['url'];
		$this->_description = $data['description'];
	}

	/* Get the name of the link. */
	public function getName() {
		return $this->_name;
	}

	/* Get the URL of the link. */
	public function getURL() {
		return $this->_url;
	}

	/* Get the description of the link. */
	public function getDescription() {
		return $this->_description;
	}
}
?>
