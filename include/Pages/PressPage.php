<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\SimpleModel;

class PressPage extends Controller
{
    private $articleModel;

    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->template = 'pages/press.tpl';
        $this->articleModel = new SimpleModel("Article", "press_articles.yaml");
    }

    /* Display the index page. */
    public function index()
    {
        $articles = $this->articleModel->getAllData(false);
        return $this->renderPage(
            array(
                'title' => $this->getConfigVars('pressTitle'),
                'content_title' => $this->getConfigVars('pressContentTitle'),
                'articles' => $articles,
            )
        );
    }
}
