<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\NewsModel;

class FeedsPage extends Controller
{
    private $template_rss;
    private $template_atom;
    private $newsModel;

    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->template_rss = 'pages/feed_rss.tpl';
        $this->template_atom = 'pages/feed_atom.tpl';
        $this->newsModel = new NewsModel();
    }

    /* Display the index page. */
    public function index($args)
    {
        $feed = $args['type'];
        if ($feed == 'atom') {
            $template = $this->template_atom;
        } else {
            $template = $this->template_rss;
        }

        $news_items = $this->newsModel->getLatestNews(NEWS_ITEMS, true);

        header('Content-Type: text/xml; charset=UTF-8');
        print $this->fetch(
            $template,
            array(
                'news' => $news_items,
            )
        );
        return true;
    }
}
