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
		global $Smarty;

		return $this->renderPage(
			array(
				'title' => $Smarty->_config[0]['vars']['exceptionsTitle'],
				'content_title' => $Smarty->_config[0]['vars']['exceptionsContentTitle'],
				'exception' => $exception,
			),
			'exception.tpl'
		);
	}
}
?>
