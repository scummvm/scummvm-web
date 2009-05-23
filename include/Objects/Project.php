<?php
require_once('Objects/BasicObject.php');
/**
 * The Project class represents a subproject on the website.
 */
class Project extends BasicObject {
	private $_name;
	private $_info;
	private $_downloads;

	/* Project object constructor. */
	public function __construct($data) {
		$this->_name = $data['name'];
		$this->_info = $data['info'];
		$this->_downloads = $data['downloads'];
		/*$this->_downloads = array();
		parent::toArray($data['download']);
		foreach ($data['download'] as $ddata) {
			 $download = array(
				'name' => $ddata['name'],
				'filename' => $ddata['filename'],
				'type' => $ddata['type'],
			);
			# Add detailed information about SVN daily builds.
			if ($ddata['type'] == 'SVN_DAILY') {
				$url = DIR_DOWNLOADS . "/{$ddata['filename']}";
				$download['info'] = array(
					'url' => $url,
					'filesize' => intval(@filesize($url) / 1024),
					'modified' => date('F j, Y, g:i a', @filemtime($url)),
				);
			}
			$this->_downloads[] = $download;
		}*/
	}

	/* Get the name of the project. */
	public function getName() {
		return $this->_name;
	}

	/* Get the information text for this project. */
	public function getInfo() {
		return $this->_info;
	}

	/* Get the list of downloads available for this project. */
	public function getDownloads() {
		return $this->_downloads;
	}
}
?>
