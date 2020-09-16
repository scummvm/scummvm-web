<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\ArticleModel;

class PressSnowberryPage extends Controller
{
    private $articleModel;

    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->template = 'pages/press_snowberry.tpl';
        $this->articleModel = new ArticleModel();
    }

    /* Display the index page. */
    public function index()
    {
        $articles = $this->articleModel->getAllArticles();
        return $this->renderPage(
            array(
                'title' => $this->getConfigVars('pressSnowberryTitle'),
                'content_title' => $this->getConfigVars('pressSnowberryContentTitle'),
                'articles' => $articles,
            )
        );
    }
}
