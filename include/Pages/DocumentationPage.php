<?php
require_once('Controller.php');
require_once('Models/DocumentationModel.php');

class DocumentationPage extends Controller {
	private $_template;
	private $_template_md5;

	/* Constructor. */
	public function __construct() {
		parent::__construct();
		$this->_template = 'documentation.tpl';
		$this->_template_md5 = 'documentation_md5sums.tpl';
	}

	/* Display the index page. */
	public function index() {
		$document = $_GET['d'];

		if ($document == 'md5sums') {
			return $this->getMD5Sums();
		}

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

	/* The MD5 sums document. */
	public function getMD5Sums() {
		$games = DocumentationModel::getAllMD5Sums();
		$last_modified = DocumentationModel::getMD5SumsDate();

		$this->addCSSFiles('md5.css');
		return $this->renderPage(
			array(
				'title' => 'ScummVM Documentation',
				'content_title' => 'ScummVM Documentation',
				'games' => $games,
				'last_modified' => $last_modified,
			),
			$this->_template_md5
		);
	}
}
?>
