<?php
require_once('Controller.php');
require_once('Models/ArticleModel.php');

class PressPage extends Controller {
	private $_template;

	/* Constructor. */
	public function __construct() {
		parent::__construct();
		$this->_template = 'press.tpl';
	}

	/* Display the index page. */
	public function index() {
		$articles = ArticleModel::getAllArticles();
		return $this->renderPage(
			array(
				'title' => 'Press Coverage',
				'content_title' => 'Press Coverage',
				'articles' => $articles,
			),
			$this->_template
		);
	}
}
?>
