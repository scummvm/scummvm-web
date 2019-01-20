<?php
namespace ScummVM\Models;

use ScummVM\Objects\Article;
use ScummVM\XMLParser;

/**
 * The ArticleModel class will generate Article objects.
 */
abstract class ArticleModel extends BasicModel
{
    /* Get all articles. */
    public static function getAllArticles()
    {
        $fname = DIR_DATA . '/press_articles.xml';
        $parser = new XMLParser();
        $a = $parser->parseByFilename($fname);
        $entries = array();
        foreach ($a['articles']['article'] as $key => $value) {
            $entries[] = new Article(array(
                'name' => $value['name'],
                'url' => $value['url'],
                'language' => $value['language'],
                'posted' => $value['posted'],
            ));
        }
        return $entries;
    }
}
