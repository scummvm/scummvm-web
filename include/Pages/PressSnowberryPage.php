<?php
require_once('Controller.php');
require_once('Models/ArticleModel.php');

class PressSnowberryPage extends Controller {
	private $_template;

	/* Constructor. */
	public function __construct() {
		parent::__construct();
		$this->_template = 'pages/press_snowberry.tpl';
	}

	/* Display the index page. */
	public function index() {
		$articles = ArticleModel::getAllArticles();
		global $Smarty;

		return $this->renderPage(
			array(
				'title' => $Smarty->getConfigVars('pressSnowberryTitle'),
				'content_title' => $Smarty->getConfigVars('pressSnowberryContentTitle'),
				'articles' => $articles,
			),
			$this->_template
		);
	}
}
?>
