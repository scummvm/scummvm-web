<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\ArticleModel;

class PressPage extends Controller
{
    private $_template;

    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->_template = 'pages/press.tpl';
    }

    /* Display the index page. */
    public function index()
    {
        $articles = ArticleModel::getAllArticles();
        global $Smarty;

        return $this->renderPage(
            array(
                'title' => $Smarty->getConfigVars('pressTitle'),
                'content_title' => $Smarty->getConfigVars('pressContentTitle'),
                'articles' => $articles,
            ),
            $this->_template
        );
    }
}
