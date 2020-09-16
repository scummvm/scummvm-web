<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\ArticleModel;

class PressPage extends Controller
{

    private $articleModel;

    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->template = 'pages/press.tpl';
        $this->articleModel = new ArticleModel();
    }

    /* Display the index page. */
    public function index()
    {
        $articles = $this->articleModel->getAllArticles();
        return $this->renderPage(
            array(
                'title' => $this->getConfigVars('pressTitle'),
                'content_title' => $this->getConfigVars('pressContentTitle'),
                'articles' => $articles,
            )
        );
    }
}
