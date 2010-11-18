<?php
require_once('Controller.php');
require_once('Models/DocumentationModel.php');

class DocumentationPage extends Controller {
	private $_template;

	/* Constructor. */
	public function __construct() {
		parent::__construct();
		$this->_template = 'documentation.tpl';
	}

	/* Display the index page. */
	public function index() {
		$document = $_GET['d'];

		$documents = DocumentationModel::getAllDocuments();
		return $this->renderPage(
			array(
				'title' => 'Documentation',
				'content_title' => 'ScummVM Documentation',
				'documents' => $documents,
			),
			$this->_template
		);
	}
}
?>
