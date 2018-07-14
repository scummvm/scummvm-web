<?php
require_once('Controller.php');
require_once('Models/GameDemosModel.php');

class DemosPage extends Controller {
	private $_template;

	/* Constructor. */
	public function __construct() {
		parent::__construct();
		$this->_template = 'game_demos.tpl';
	}

	/* Display the index page. */
	public function index() {
		$demos = GameDemosModel::getAllGroupsAndDemos();
		global $Smarty;

		return $this->renderPage(
			array(
				'title' => $Smarty->_config[0]['vars']['demosTitle'],
				'content_title' => $Smarty->_config[0]['vars']['demosContentTitle'],
				'demos' => $demos,
			),
			$this->_template
		);
	}
}
?>
