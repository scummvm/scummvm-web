<?php
require_once('Controller.php');
require_once('Models/ArticleModel.php');

class PressSnowberryPage extends Controller {
	private $_template;

	/* Constructor. */
	public function __construct() {
		parent::__construct();
		$this->_template = 'press_snowberry.tpl';
	}

	/* Display the index page. */
	public function index() {
		$articles = ArticleModel::getAllArticles();
		global $Smarty;

		return $this->renderPage(
			array(
				'title' => $Smarty->_config[0]['vars']['pressSnowberryTitle'],
				'content_title' => $Smarty->_config[0]['vars']['pressSnowberryContentTitle'],
				'articles' => $articles,
			),
			$this->_template
		);
	}
}
?>
