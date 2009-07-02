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
		return $this->renderPage(
			array(
				'title' => 'GOBLIIINS + ScummVM = PERFECT COUPLE',
				'content_title' => 'GOBLIIINS + ScummVM = PERFECT COUPLE',
				'articles' => $articles,
			),
			$this->_template
		);
	}
}
?>
