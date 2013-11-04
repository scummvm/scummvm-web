<?php
require_once('Controller.php');
require_once('Models/GamesModel.php');

class GamesPage extends Controller {
	private $_template;

	/* Constructor. */
	public function __construct() {
		parent::__construct();
		$this->_template = 'games.tpl';
	}

	/* Display the index page. */
	public function index() {
		$downloads = GamesModel::getAllDownloads();
		$sections = GamesModel::getAllSections();

		$this->addCSSFiles('games.css');
		return $this->renderPage(
			array(
				'title' => 'Games',
				'content_title' => 'Download freeware games',
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
