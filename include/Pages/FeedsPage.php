<?php
require_once('Controller.php');
require_once('Models/NewsModel.php');

class FeedsPage extends Controller {
	private $_template_rss;
	private $_template_atom;

	/* Constructor. */
	public function __construct() {
		parent::__construct();
		$this->_template_rss = 'feed_rss.tpl';
		$this->_template_atom = 'feed_atom.tpl';
	}

	/* Display the index page. */
	public function index() {
		$feed = $_GET['f'];
		if ($feed == 'atom') {
			$template = $this->_template_atom;
		} else {
			$template = $this->_template_rss;
		}

		$news_items = NewsModel::getLatestNews(NEWS_ITEMS);

		header('Content-Type: text/xml; charset=UTF-8');
		print $this->fetch(
			$template,
			array(
				'news' => $news_items,
			)
		);
		return True;
	}
}
?>
