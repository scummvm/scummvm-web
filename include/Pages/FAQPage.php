<?php
require_once('Controller.php');
require_once('Models/FAQModel.php');

class FAQPage extends Controller {
	private $_template;

	/* Constructor. */
	public function __construct() {
		parent::__construct();
		$this->_template = 'faq.tpl';
	}

	/* Display the index page. */
	public function index() {
		$contents = FAQModel::getFAQ();
		$modified = FAQModel::getLastUpdated();
		global $Smarty;

		$this->addCSSFiles('faq.css');
		return $this->renderPage(
			array(
				'title' => $Smarty->_config[0]['vars']['faqTitle'],
				'content_title' => $Smarty->_config[0]['vars']['faqContentTitle'],
				'contents' => $contents,
				'modified' => $modified,
			),
			$this->_template
		);
	}
}
?>
