<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\ArticleModel;

class PressSnowberryPage extends Controller
{


    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->template = 'pages/press_snowberry.tpl';
    }

    /* Display the index page. */
    public function index()
    {
        $articles = ArticleModel::getAllArticles();
        global $Smarty;

        return $this->renderPage(
            array(
                'title' => $Smarty->getConfigVars('pressSnowberryTitle'),
                'content_title' => $Smarty->getConfigVars('pressSnowberryContentTitle'),
                'articles' => $articles,
            ),
            $this->template
        );
    }
}
