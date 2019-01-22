<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\LinksModel;

class LinksPage extends Controller
{


    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->template = 'pages/links.tpl';
    }

    /* Display the index page. */
    public function index()
    {
        $links = LinksModel::getAllGroupsAndLinks();
        return $this->renderPage(
            array(
                'title' => $this->getConfigVars('linksTitle'),
                'content_title' => $this->getConfigVars('linksContentTitle'),
                'links' => $links,
            )
        );
    }
}
