<?php
namespace ScummVM\Models;

use ScummVM\Objects\Article;

/**
 * The ArticleModel class will generate Article objects.
 */
class ArticleModel extends BasicModel
{
    /* Get all articles. */
    public function getAllArticles()
    {
        $data = $this->getFromCache();
        if (is_null($data)) {
            $fname = DIR_DATA . '/press_articles.yaml';
            $articles = \yaml_parse_file($fname);
            $data = [];
            foreach (array_values($articles['articles']) as $value) {
                $data[] = new Article($value);
            }
            $this->saveToCache($data);
        }

        return $data;
    }
}
