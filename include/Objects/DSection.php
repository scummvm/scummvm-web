<?php
require_once('Objects/BasicObject.php');
require_once('Objects/DSubSection.php');
/**
 * The DSection object represents a section on the downloads page.
 */
class DSection extends BasicObject{
	private $_title;
	private $_anchor;
	private $_baseurl;
	private $_subsections;

	/* DSection object constructor. */
	public function __construct($data) {
		$this->_title = $data['title'];
		$this->_anchor = $data['anchor'];
		$this->_baseurl = $data['baseurl'];
		$this->_subsections = array();

		parent::toArray($data['subsection']);
		foreach ($data['subsection'] as $key => $value) {
			$this->_subsections[] = new DSubSection($value, $this->_baseurl);
		}
	}

	/* Get the title. */
	public function getTitle() {
		return $this->_title;
	}

	/* Get the anchor name. */
	public function getAnchor() {
		return $this->_anchor;
	}

	/* Get the base URL. */
	public function getBaseURL() {
		return $this->_baseurl;
	}

	/* Get the list of optional subsections. */
	public function getSubSections() {
		return $this->_subsections;
	}
}
?>
