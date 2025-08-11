<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\LinksModel;

class LinksPage extends Controller
{

    private $linksModel;

    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->template = 'pages/links.tpl';
        $this->linksModel = new LinksModel();
    }

    /* Display the index page. */
    public function index()
    {
        $links = $this->linksModel->getAllGroupsAndLinks();
        $this->renderPage(
            array(
                'title' => $this->getConfigVars('linksTitle'),
                // TODO: add a description
                'content_title' => $this->getConfigVars('linksContentTitle'),
                'links' => $links,
            )
        );
    }
}
