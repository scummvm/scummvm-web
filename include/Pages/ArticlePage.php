<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Erusev\Parsedown;

class ArticlePage extends Controller
{
    private $purifier;

    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->template = 'pages/article.tpl';
        $config = \HTMLPurifier_Config::createDefault();
        $this->purifier = new \HTMLPurifier($config);
    }

    /* Display the index page. */
    public function index($params)
    {
        $articleFile = DIR_ARTICLE . "/" . $params['article'] . ".markdown";
        if (!is_file($articleFile) || !is_readable($articleFile)) {
            $page = new \ScummVM\Pages\NewsPage();
            return $page->index(array());
        }

        $article = YamlFrontMatter::parse(file_get_contents($articleFile));
        $Parsedown = new \Parsedown();
        $Parsedown->setBreaksEnabled(true);

        $date = $this->purifier->purify($article->date);
        $title = $this->purifier->purify($article->title);
        $author = $this->purifier->purify($article->author);
        $content = $this->purifier->purify($Parsedown->text($article->body()));

        return $this->renderPage(
            array(
                'content_title' => $title,
                'date' => $date,
                'author' => $author,
                'content' => $content,
            )
        );
    }
}
