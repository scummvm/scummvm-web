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
		global $Smarty;

		return $this->renderPage(
			array(
				'title' => $Smarty->_config[0]['vars']['subprojectsTitle'],
				'content_title' => $Smarty->_config[0]['vars']['subprojectsContentTitle'],
				'subprojects' => $subprojects,
			),
			$this->_template
		);
	}
}
?>
