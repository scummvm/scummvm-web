<?php
namespace ScummVM\Pages;

require_once('Controller.php');
require_once('Models/FAQModel.php');

class FAQPage extends Controller
{
    private $_template;

    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->_template = 'pages/faq.tpl';
    }

    /* Display the index page. */
    public function index()
    {
        $contents = FAQModel::getFAQ();
        $modified = FAQModel::getLastUpdated();
        global $Smarty;

        return $this->renderPage(
            array(
                'title' => $Smarty->getConfigVars('faqTitle'),
                'content_title' => $Smarty->getConfigVars('faqContentTitle'),
                'contents' => $contents,
                'modified' => $modified,
            ),
            $this->_template
        );
    }
}
