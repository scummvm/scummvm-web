<?php
require_once('Controller.php');
require_once('Models/NewsModel.php');
require_once('Models/ScreenshotsModel.php');

class NewsPage extends Controller {
	private $_template;

	/* Constructor. */
	public function __construct() {
		parent::__construct();
		$this->_template = 'news.tpl';
	}

	/* Display the index page. */
	public function index() {
		$date = isset($_GET['d']) ? $_GET['d'] : null;

		if ($date != null) {
			if (strtolower($date) == 'archive' || $date == '') {
				$date = null;
			}
			return $this->getNews($date);
		}
		return $this->getNewsIntro();
	}

	/* Display a specific news item, or all news items. */
	public function getNews($date = null) {
		global $Smarty;

		if ($date == null) {
			$news_items = NewsModel::getAllNews();
			$date = 'archive';
		} else {
			if (strlen($date) == 8) {
				$news_items = NewsModel::getAllByDate($date);
			} else {
				$news_items = array(NewsModel::getOneByDate($date));
			}
		}

		return $this->renderPage(
			array(
				'title' => $Smarty->_config[0]['vars']['newsTitle'],
				'content_title' => $Smarty->_config[0]['vars']['newsContentTitle'],
				'show_intro' => false,
				'news_items' => $news_items,
				'news_archive_link' => false,
				'date' => $date,
			),
			$this->_template
		);
	}

	/* Display the main page with limited news items and intro text. */
	public function getNewsIntro() {
		global $Smarty;

		$news_items = NewsModel::getLatestNews(NEWS_ITEMS);
		$random_shot = ScreenshotsModel::getRandomScreenshot();

		$this->addCSSFiles(array(
			'baguetteBox.min.css'
		));
		$this->addJSFiles(array(
			'baguetteBox.min.js'
		));

		return $this->renderPage(
			array(
				'title' => $Smarty->_config[0]['vars']['newsTitle'],
				'content_title' => $Smarty->_config[0]['vars']['newsContentTitle'],
				'show_intro' => true,
				'news_items' => $news_items,
				'news_archive_link' => true,
				'random_shot' => $random_shot,
			),
			$this->_template
		);
	}
}
?>
