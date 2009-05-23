<?php
require_once('Controller.php');
require_once('Models/SubprojectsModel.php');

class SubprojectsPage extends Controller {
	private $_template;

	/* Constructor. */
	public function __construct() {
		parent::__construct();
		$this->_template = 'subprojects.tpl';
	}

	/* Display the index page. */
	public function index() {
		$subprojects = SubprojectsModel::getAllSubprojects();
		return $this->renderPage(
			array(
				'title' => 'Subprojects',
				'content_title' => 'Subprojects',
				'subprojects' => $subprojects,
			),
			$this->_template
		);
	}
}
?>
