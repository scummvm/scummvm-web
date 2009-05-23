<?php
require_once('Controller.php');

class ExceptionsPage extends Controller {
	private $_template;

	/* Constructor. */
	public function __construct() {
		parent::__construct();
		$this->_template = 'exceptions.tpl';
	}

	/* Display the index page. */
	public function index($exception) {
		$this->addCSSFiles(array(
		));
		return $this->renderPage(
			array(
				'title' => 'Exception',
				'content_title' => 'Error processing request',
				'exception' => $exception,
			),
			'exception.tpl'
		);
	}
}
?>
