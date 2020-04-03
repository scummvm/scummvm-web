<?php
namespace ScummVM\Models;

use ScummVM\Objects\Article;

/**
 * The ArticleModel class will generate Article objects.
 */
abstract class ArticleModel extends BasicModel
{
    /* Get all articles. */
    public static function getAllArticles()
    {
        $fname = DIR_DATA . '/press_articles.yaml';
        $parsedData = \yaml_parse_file($fname);
        $entries = array();
        foreach (array_values($parsedData['articles']) as $value) {
            $entries[] = new Article(
                array(
                'name' => $value['name'],
                'url' => $value['url'],
                'language' => $value['language'],
                'source' => $value['source'],
                'date' => $value['date'],
                )
            );
        }
        return $entries;
    }
}
