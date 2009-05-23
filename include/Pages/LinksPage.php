<?php
require_once('Controller.php');
require_once('Models/LinksModel.php');

class LinksPage extends Controller {
	private $_template;

	/* Constructor. */
	public function __construct() {
		parent::__construct();
		$this->_template = 'links.tpl';
	}

	/* Display the index page. */
	public function index() {
		$links = LinksModel::getAllGroupsAndLinks();

		$this->addCSSFiles('links.css');
		return $this->renderPage(
			array(
				'title' => 'Links',
				'content_title' => 'Links',
				'links' => $links,
			),
			$this->_template
		);
	}
}
?>
