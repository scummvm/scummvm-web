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
		global $Smarty;

		$documents = DocumentationModel::getAllDocuments();
		return $this->renderPage(
			array(
				'title' => $Smarty->_config[0]['vars']['documentationTitle'],
				'content_title' => $Smarty->_config[0]['vars']['documentationContentTitle'],
				'documents' => $documents,
			),
			$this->_template
		);
	}
}
?>
