<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\ArticleModel;

class PressPage extends Controller
{


    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->template = 'pages/press.tpl';
    }

    /* Display the index page. */
    public function index()
    {
        $articles = ArticleModel::getAllArticles();
        return $this->renderPage(
            array(
                'title' => $this->getConfigVars('pressTitle'),
                'content_title' => $this->getConfigVars('pressContentTitle'),
                'articles' => $articles,
            )
        );
    }
}
