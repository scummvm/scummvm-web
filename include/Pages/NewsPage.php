<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\NewsModel;
use ScummVM\Models\ScreenshotsModel;

class NewsPage extends Controller
{
    private $newsModel;
    private $screenshotModels;

    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->template = 'pages/news.tpl';
        $this->newsModel = new NewsModel();
        $this->screenshotModels = new ScreenshotsModel();
    }

    /* Display the index page. */
    public function index($args)
    {
        $filename = $args['date'] ?? null;

        if ($filename != null) {
            if (strtolower($filename) == 'archive' || $filename == '') {
                $filename = null;
            }
            return $this->getNews($filename);
        }
        return $this->getNewsIntro();
    }

    /* Display a specific news item, or all news items. */
    public function getNews($filename = null)
    {
        if ($filename == null) {
            $news_items = $this->newsModel->getAllNews();
            $subtitle = null;
            $description = $this->getConfigVars('introHeaderContentP1');
        } else {
            $news_items = array($this->newsModel->getOneByFilename($filename));
            $subtitle = $news_items[0]->getTitle();
            $description = htmlentities($this->getHeadline($news_items[0]->getContent()));
        }

        return $this->renderPage(
            array(
                'title' => $this->getConfigVars('newsTitle'),
                'subtitle' => $subtitle,
                'description' => $description,
                'content_title' => $this->getConfigVars('newsContentTitle'),
                'show_intro' => false,
                'news_items' => $news_items,
                'news_archive_link' => false,
            )
        );
    }

    /* Display the main page with limited news items and intro text. */
    public function getNewsIntro()
    {
        $news_items = $this->newsModel->getLatestNews(NEWS_ITEMS);
        $random_shot = $this->screenshotModels->getRandomScreenshot();

        $this->addJSFiles(
            array(
            'baguetteBox.min.js'
            )
        );

        return $this->renderPage(
            array(
                'title' => $this->getConfigVars('homeTitle'),
                'description' => $this->getConfigVars('introHeaderContentP1'),
                'content_title' => $this->getConfigVars('newsContentTitle'),
                'show_intro' => true,
                'news_items' => $news_items,
                'news_archive_link' => true,
                'random_shot' => $random_shot,
            )
        );
    }
}
