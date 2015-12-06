<?php
require_once('Controller.php');

class ContactPage extends Controller {
	private $_template;

	/* Constructor. */
	public function __construct() {
		parent::__construct();
		$this->_template = 'contact.tpl';
	}

	/* Display the index page. */
	public function index() {
		global $Smarty;

		return $this->renderPage(
			array(
				'title' => $Smarty->_config[0]['vars']['contactTitle'],
				'content_title' => $Smarty->_config[0]['vars']['contactContentTitle'],
			),
			$this->_template
		);
	}
}
?>
