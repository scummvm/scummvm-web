<?php
require_once('Objects/BasicObject.php');
/**
 * The article class represents a link on the website to an article covering
 * ScummVM in some way.
 */
class Article extends BasicObject {
	private $_name;
	private $_url;
	private $_language;
	private $_posted;

	/* Article object constructor. */
	public function __construct($data) {
		$this->_name = $data['name'];
		$this->_url = $data['url'];
		$this->_language = $data['language'];
		$this->_posted = $data['posted'];
	}

	/* Get the name. */
	public function getName() {
		return $this->_name;
	}

	/* Get the URL. */
	public function getURL() {
		return $this->_url;
	}

	/* Get the language. */
	public function getLanguage() {
		return $this->_language;
	}

	/* Get the date it was posted. */
	public function getPosted() {
		return $this->_posted;
	}
}
?>
