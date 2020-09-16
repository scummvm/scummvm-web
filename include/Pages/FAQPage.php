<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\FAQModel;

class FAQPage extends Controller
{
    private $faqModel;
    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->template = 'pages/faq.tpl';
        $this->faqModel = new FAQModel();
    }

    /* Display the index page. */
    public function index()
    {
        $contents = $this->faqModel->getFAQ();
        $modified = $this->faqModel->getLastUpdated();
        return $this->renderPage(
            array(
                'title' => $this->getConfigVars('faqTitle'),
                'content_title' => $this->getConfigVars('faqContentTitle'),
                'contents' => $contents,
                'modified' => $modified,
            )
        );
    }
}
