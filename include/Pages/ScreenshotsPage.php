<?php
require_once('Controller.php');
require_once('Models/ScreenshotsModel.php');

class ScreenshotsPage extends Controller {
	private $_template;
	private $_template_category;

	/* Constructor. */
	public function __construct() {
		parent::__construct();
		$this->_template = 'screenshots.tpl';
		$this->_template_category = 'screenshots_category.tpl';
		$this->_template_viewer = 'screenshots_viewer.tpl';
	}

	/* Display the index page. */
	public function index() {
		$category = $_GET['cat'];
		$game = $_GET['game'];
		$json = $_POST['json'];

		if (!empty($json)) {
			return $this->getAllJSON();
		} else if (!empty($category)) {
			return $this->getCategory($category, $game);
		}

		$this->addJSFiles(array(
			'baguetteBox.min.js'
		));

		$screenshot = ScreenshotsModel::getAllScreenshots();
		$random_shot = ScreenshotsModel::getRandomScreenshot();

		global $Smarty;

		return $this->renderPage(
			array(
				'title' => $Smarty->_config[0]['vars']['screenshotsTitle'],
				'content_title' => $Smarty->_config[0]['vars']['screenshotsContentTitle'],
				'screenshots' => $screenshot,
				'random_shot' => $random_shot,
			),
			$this->_template
		);
	}

	/* Display the selected category. */
	public function getCategory($category, $game) {
		$this->addJSFiles(array(
			'baguetteBox.min.js'
		));

		if (empty($game)) {
			$screenshots = ScreenshotsModel::getCategoryScreenshots($category);
		} else {
			$screenshots = array(
				'category' => $category,
				'games' => array(ScreenshotsModel::getTargetScreenshots($game))
			);
		}

		global $Smarty;

		return $this->renderPage(
			array(
				'title' => $Smarty->_config[0]['vars']['screenshotsTitle'],
				'content_title' => $Smarty->_config[0]['vars']['screenshotsContentTitle'],
				'screenshots' => $screenshots,
				'category' => $category,
				'game' => $game,
			),
			$this->_template_category
		);
	}

	/* Get a list with all screenshot filenames/captions as a JSON list. */
	public function getAllJSON() {
		$sshots = array();
		foreach (ScreenshotsModel::getAllScreenshots() as $category) {
			foreach ($category['games'] as $screenshot) {
				foreach ($screenshot->getFiles() as $files) {
					$files['filename'] = DIR_SCREENSHOTS . "/{$files['filename']}-full.png";
					$sshots[] = array_values($files);
				}
			}
		}
		print json_encode($sshots);
		return True;
	}
}
?>
