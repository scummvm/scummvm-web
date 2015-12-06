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
		$num = $_GET['num'];
		$json = $_POST['json'];

		if (!empty($json)) {
			return $this->getAllJSON();
		} else if (!empty($category)) {
			if (!empty($game) && !empty($num)) {
				return $this->getGame($category, $game, $num);
			}
			return $this->getCategory($category, $game);
		}

		$this->addCSSFiles(array(
			'screenshots.css',
			'../javascripts/slimbox/css/slimbox2.css',
		));
		$this->addJSFiles(array(
			'jquery-1.3.2.min.js',
			'slimbox/js/slimbox2.js',
			'screenshots.js',
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
		$this->addCSSFiles(array(
			'screenshots.css',
			'../javascripts/slimbox/css/slimbox2.css',
		));
		$this->addJSFiles(array(
			'jquery-1.3.2.min.js',
			'slimbox/js/slimbox2.js',
			'screenshots.js',
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

	/* Display the screenshot viewer. */
	public function getGame($category, $game, $num = 1) {
		$this->addCSSFiles('screenshots.css');

		$screenshot = ScreenshotsModel::getTargetScreenshots($game);

		global $Smarty;

		return $this->renderPage(
			array(
				'title' => $Smarty->_config[0]['vars']['screenshotsTitle'],
				'content_title' => $Smarty->_config[0]['vars']['screenshotsContentTitle'],
				'screenshot' => $screenshot,
				'category' => $category,
				'game' => $game,
				'num' => $num - 1,
			),
			$this->_template_viewer
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
