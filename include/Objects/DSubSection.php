<?php
require_once('Objects/BasicObject.php');
require_once('Objects/File.php');
require_once('Objects/WebLink.php');
/**
 * The DSubSection object represents a subsection on the downloads page.
 */
class DSubSection extends BasicObject {
	private $_title;
	private $_anchor;
	private $_notes;
	private $_footer;
	private $_files;
	private $_links;

	/* DSubSection constructor. */
	public function __construct($data, $baseurl) {
		$this->_title = $data['title'];
		$this->_anchor = $data['anchor'];
		$this->_notes = $data['notes'];
		$this->_footer = $data['footer'];
		$this->_files = array();
		$this->_links = array();
		$this->_items = array();

		foreach ($data['entries'] as $type => $item) {
			parent::toArray($item);
			if ($type == 'file') {
				foreach ($item as $file) {
					$this->_items[] = new File($file, $baseurl);
				}
			} elseif ($type == 'link') {
				foreach ($item as $link) {
					$this->_items[] = new WebLink($link);
				}
			}
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

	/* Get the optional notes. */
	public function getNotes() {
		return $this->_notes;
	}

	/* Get the optional footer. */
	public function getFooter() {
		return $this->_footer;
	}
	
	/* Get the list of files. */
	public function getFiles() {
		return $this->_files;
	}

	/* Get the list of links. */
	public function getLinks() {
		return $this->_links;
	}
	
	/* Get the list of items. */
	public function getItems() {
		return $this->_items;
	}
}
?>
