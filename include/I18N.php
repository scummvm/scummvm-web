<?php
namespace ScummVM;

require_once __DIR__ . '/../vendor/autoload.php';

use ScummVM\Objects\News;
use ScummVM\Models\NewsModel;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Erusev\Parsedown;

define('DIR_NEWS', 'data/news');

class I18N
{
    private $purifier;

    const NO_FILES = 'No I18N Files Found';

    public function __construct()
    {
        $config = \HTMLPurifier_Config::createDefault();
        $this->purifier = new \HTMLPurifier($config);

        $langs = ['en', 'it', 'fr', 'ru', 'de', 'el'];
        foreach ($langs as $key => $value) {
            $this->convertLanguageJsonToSmartyIni('lang.' . $value);
            $this->updateNewsI18n($value);
        }
    }

    private function convertLanguageJsonToSmartyIni($lang)
    {
        $Parsedown = new \Parsedown();
        $Parsedown->setBreaksEnabled(true);
        $filename = "lang/i18n/{$lang}.json";
        echo("Converting {$filename} from JSON to INI\n");
        $jsonString = file_get_contents($filename);
        $json = json_decode($jsonString);

        $output = "";
        foreach ($json as $key => $value) {
          if ($value)
            $output .= $key . ' = """' . $this->purifier->purify($Parsedown->line($value)) . '"""' . "\n";
        }

        file_put_contents("lang/{$lang}.ini", $output);
    }

    private function updateNewsI18n($lang)
    {

        // For non-english, create/overwrite JSON files from our i18n file
        if ($lang != 'en') {
            if (!file_exists(DIR_NEWS . "/i18n/news.{$lang}.json")) return;
            echo("Converting " . DIR_NEWS . "/i18n/news.{$lang}.json to individual JSON files\n");
            $i18n = json_decode(file_get_contents(DIR_NEWS . "/i18n/news.{$lang}.json"));

            foreach ($i18n as $key => $value) {
                $object = YamlFrontMatter::parse(file_get_contents(DIR_NEWS . "/{$key}.markdown"));

                $date = $this->purifier->purify($object->date);
                $author = $this->purifier->purify($object->author);
                if (array_key_exists('content', $value)) {
                  $title = $this->purifier->purify(str_replace('"', '\"', $value->title));
                } else {
                  $title = $this->purifier->purify(str_replace('"', '\"', $object->title));
                }
                if (array_key_exists('content', $value)) {
                  $content = $this->purifier->purify(trim($value->content));
                } else {
                  $content = $this->purifier->purify(trim($object->content));
                }


                $yaml = "---\ntitle: \"$title\"\ndate: $date\nauthor: $author\n---\n\n$content\n";

                file_put_contents(
                    DIR_NEWS . "/{$lang}/{$key}.markdown",
                    $yaml
                );
            }
        } else {
            // Update the base english i18n file
            echo("Converting individual JSON files to I18N base file\n");
            $newsJson = array();
            $news = $this->getAllNews($lang);

            file_put_contents(
                DIR_NEWS . "/i18n/news.{$lang}.json",
                json_encode($news, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES |  JSON_UNESCAPED_UNICODE) . "\n"
            );
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
        $news = array();
        foreach ($files as $filename) {
            if (substr($filename, -9) != '.markdown') {
                continue;
            }
            if (!($data = @file_get_contents($dir . "/{$filename}"))) {
                continue;
            }
            $key = rtrim($filename, ".markdown");
            $object = YamlFrontMatter::parse($data);
            $news[$key] = array('title' => $object->title, 'content' => trim($object->body()));
        }
        return $news;
    }
}

new I18N();
