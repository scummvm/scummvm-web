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

		$this->addCSSFiles('chart.css');
		return $this->renderPage(
			array(
				'title' => 'Game Demos',
				'content_title' => 'Game Demos',
				'demos' => $demos,
			),
			$this->_template
		);
	}
}
?>
