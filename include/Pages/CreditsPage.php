<?php
require_once('Controller.php');
require_once('Models/CreditsModel.php');

class CreditsPage extends Controller {
	private $template;

	/* Constructor. */
	public function __construct() {
		parent::__construct();
		$this->_template = 'credits.tpl';
	}

	/* Display the index page. */
	public function index() {
		$credits = CreditsModel::getAllCredits();

		$this->addCSSFiles('credits.css');
		return $this->renderPage(
			array(
				'title' => 'Credits',
				'content_title' => 'Credits',
				'credits' => $credits,
			),
			$this->_template
		);
	}
}
?>
