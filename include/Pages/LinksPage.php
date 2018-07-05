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
		global $Smarty;
		
		return $this->renderPage(
			array(
				'title' => $Smarty->_config[0]['vars']['linksTitle'],
				'content_title' => $Smarty->_config[0]['vars']['linksContentTitle'],
				'links' => $links,
			),
			$this->_template
		);
	}
}
?>
