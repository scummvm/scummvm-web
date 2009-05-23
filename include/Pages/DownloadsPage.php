<?php
require_once('Controller.php');
require_once('Models/DownloadsModel.php');

class DownloadsPage extends Controller {
	private $_template;

	/* Constructor. */
	public function __construct() {
		parent::__construct();
		$this->_template = 'downloads.tpl';
	}

	/* Display the index page. */
	public function index() {
		$downloads = DownloadsModel::getAllDownloads();
		$sections = DownloadsModel::getAllSections();

		$this->addCSSFiles('downloads.css');
		return $this->renderPage(
			array(
				'title' => 'Downloads',
				'content_title' => 'Download ScummVM',
				'downloads' => $downloads,
				'sections' => $sections,
				'release_tools' => RELEASE_TOOLS,
				'release_debian' => RELEASE_DEBIAN,
			),
			$this->_template
		);
	}
}
?>
