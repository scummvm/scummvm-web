<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use Spatie\YamlFrontMatter\Document;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Erusev\Parsedown;

class ArticlePage extends Controller
{
    const FILE_NOT_FOUND = 'The filename %s could not be found';
    const ARTICLE_NAME_MISSING = 'An article name is missing';

    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->template = 'pages/article.tpl';
    }

    private function getArticle(string $filename): Document
    {
        global $lang;
        if (!$lang) {
            $lang = DEFAULT_LOCALE;
        }
        $localizedFilename = join('/', [DIR_DATA, $lang, 'articles', $filename]);
        $defaultFilename = join('/', [DIR_DATA, DEFAULT_LOCALE, 'articles', $filename]);
        if (is_file($localizedFilename) && is_readable($localizedFilename)) {
            $fname = $localizedFilename;
        } elseif (is_file($defaultFilename) && is_readable($defaultFilename)) {
            $fname = $defaultFilename;
        } else {
            throw new \ErrorException(\sprintf(self::FILE_NOT_FOUND, $filename));
        }

        return YamlFrontMatter::parse(file_get_contents($fname));
    }

    /**
     *  Display the index page.
     *
     *  @param array{'article'?: string} $params
     */
    public function index(array $params): void
    {
        if (empty($params['article'])) {
            throw new \ErrorException(self::ARTICLE_NAME_MISSING);
        }
        $filename = $params['article'] . '.markdown';

        $article = $this->getArticle($filename);

        $purifier = new \HTMLPurifier(\HTMLPurifier_Config::createDefault());
        $Parsedown = new \Parsedown();
        $Parsedown->setBreaksEnabled(true);

        $date = $purifier->purify($article->date);
        $title = $purifier->purify($article->title);
        $author = $purifier->purify($article->author);
        $content = $purifier->purify($Parsedown->text($article->body()));

        $this->renderPage([
                'title' => $title,
                'description' => htmlentities($this->getHeadline($content)),
                'content_title' => $title,
                'date' => $date,
                'author' => $author,
                'content' => $content,
            ]);
    }
}
