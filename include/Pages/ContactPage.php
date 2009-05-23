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
		return $this->renderPage(
			array(
				'title' => 'Contact',
				'content_title' => 'Contact',
			),
			$this->_template
		);
	}
}
?>
