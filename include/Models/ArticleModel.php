<?php
require_once('Models/BasicModel.php');
require_once('Objects/Article.php');
/**
 * The ArticleModel class will generate Article objects.
 */
abstract class ArticleModel extends BasicModel {
	/* Get all articles. */
	static public function getAllArticles() {
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
?>
