<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\FAQModel;

class FAQPage extends Controller
{


    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->template = 'pages/faq.tpl';
    }

    /* Display the index page. */
    public function index()
    {
        $contents = FAQModel::getFAQ();
        $modified = FAQModel::getLastUpdated();
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
