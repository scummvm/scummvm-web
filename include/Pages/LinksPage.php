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
        global $Smarty;

        return $this->renderPage(
            array(
                'title' => $Smarty->getConfigVars('linksTitle'),
                'content_title' => $Smarty->getConfigVars('linksContentTitle'),
                'links' => $links,
            ),
            $this->template
        );
    }
}
