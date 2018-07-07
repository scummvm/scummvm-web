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
				'title' => $Smarty->getConfigVars('contactTitle'),
				'content_title' => $Smarty->getConfigVars('contactContentTitle'),
			),
			$this->_template
		);
	}
}
?>
