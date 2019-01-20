<?php
namespace ScummVM;

use HTMLPurifier;
use ScummVM\Objects\News;
use ScummVM\Models\NewsModel;

define('DIR_NEWS', 'data/news');

class I18N
{

    public function __construct()
    {
        $config = HTMLPurifier_Config::createDefault();
        $this->_purifier = new HTMLPurifier($config);

        $langs = ['en', 'it', 'fr', 'ru', 'de'];
        foreach ($langs as $key => $value) {
            $this->convertLanguageJsonToSmartyIni('lang.' . $value);
            $this->updateNewsI18n($value);
        }
    }

    private function convertLanguageJsonToSmartyIni($lang)
    {
        $filename = "lang/i18n/{$lang}.json";
        echo("Converting {$filename} from JSON to INI\n");
        $jsonString = file_get_contents($filename);
        $json = json_decode($jsonString);

        $output = "";
        foreach ($json as $key => $value) {
            $output .= $key . " = " . $this->_purifier->purify($value). "\n";
        }

        file_put_contents("lang/{$lang}.ini", $output);
    }

    private function updateNewsI18n($lang)
    {

        // For non-english, create/overwrite JSON files from our i18n file
        if ($lang != 'en') {
            echo("Converting " . DIR_NEWS . "/i18n/news.{$lang}.json to individual JSON files\n");
            $i18n = json_decode(file_get_contents(DIR_NEWS . "/i18n/news.{$lang}.json"));

            foreach ($i18n as $key => $value) {
                $originalJson = json_decode(file_get_contents(DIR_NEWS . "/{$key}.json"));
                $value->date = $this->_purifier->purify($originalJson->date);
                $value->author = $this->_purifier->purify($originalJson->author);
                $value->title = $this->_purifier->purify($value->title);
                $value->content = $this->_purifier->purify($value->content);

                file_put_contents(DIR_NEWS . "/{$lang}/{$key}.json", json_encode($value, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES |  JSON_UNESCAPED_UNICODE));
            }
        } else {
          // Update the base english i18n file
            echo("Converting individual JSON files to I18N base file\n");
            $newsJson = new stdClass();
            $news = $this->getAllNews($lang);
            foreach ($news as $key => $value) {
                $newsJson->$key = array(
                    "title" => $this->_purifier->purify($value->title),
                    "content" => $this->_purifier->purify($value->content)
                );
            }

            file_put_contents(DIR_NEWS . "/i18n/news.{$lang}.json", json_encode($newsJson, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES |  JSON_UNESCAPED_UNICODE) . "\n");
        }
    }

    private function getAllNews($lang)
    {
        if ($lang != 'en') {
            $dir = DIR_NEWS . "/{$lang}";
        } else {
            $dir = DIR_NEWS;
        }

        if (!($files = scandir($dir))) {
            throw new \ErrorException(self::NO_FILES);
        }
        $news = new stdClass();
        foreach ($files as $filename) {
            if (substr($filename, -5) != '.json') {
                continue;
            }
            if (!($data = @file_get_contents($dir . "/{$filename}"))) {
                continue;
            }
            $key = rtrim($filename, ".json");
            $news->$key = json_decode($data);
        }
        return $news;
    }
}

new I18N();
