<?php
namespace ScummVM;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../include/Constants.php';

use ScummVM\Objects\News;
use ScummVM\Models\NewsModel;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Erusev\Parsedown;

class LocalizationUtils
{
    private $purifier;

    const NO_FILES = 'No Localization Files Found';

    public function __construct()
    {
        $config = \HTMLPurifier_Config::createDefault();
        $this->purifier = new \HTMLPurifier($config);

        $langs = array_slice(scandir(DIR_DATA), 2);
        foreach ($langs as $key => $value) {
            $this->convertLanguageJsonToSmartyIni($value);
            $this->updateNewsL10n($value);
        }
    }

    private function convertLanguageJsonToSmartyIni($lang)
    {
        $Parsedown = new \Parsedown();
        $Parsedown->setBreaksEnabled(true);
        $filename = JOIN(DIRECTORY_SEPARATOR, [DIR_DATA, $lang, "strings.json"]);
        echo("Converting {$filename} from JSON to INI\n");
        $jsonString = file_get_contents($filename);
        $json = json_decode($jsonString);

        $output = "";
        foreach ($json as $key => $value) {
            if ($value) {
                $output .= $key . ' = """' . $this->purifier->purify($Parsedown->line($value)) . '"""' . "\n";
            }
        }

        file_put_contents(join(DIRECTORY_SEPARATOR, [DIR_DATA, $lang, "strings.ini"]), $output);
    }

    private function updateNewsL10n($lang)
    {
        $newsFile = join(DIRECTORY_SEPARATOR, [DIR_DATA, $lang, "news.json"]);
        // For non-english, create/overwrite JSON files from our l10n file
        if ($lang !== DEFAULT_LOCALE) {
            if (!file_exists($newsFile)) {
                return;
            }
            echo("Converting " . $newsFile . " to individual Markdown files\n");
            $l10n = json_decode(file_get_contents($newsFile));

            foreach ($l10n as $key => $translatedArticle) {
                $englishArticle = YamlFrontMatter::parse(file_get_contents(join(DIRECTORY_SEPARATOR, [DIR_NEWS, DEFAULT_LOCALE,"/{$key}.markdown"])));

                $date = $this->purifier->purify($englishArticle->date);
                $author = $this->purifier->purify($englishArticle->author);
                if (property_exists($translatedArticle, 'title') && $translatedArticle->title) {
                    $title = $this->purifier->purify(str_replace('"', '\"', $translatedArticle->title));
                } else {
                    $title = $this->purifier->purify(str_replace('"', '\"', $englishArticle->title));
                }
                if (property_exists($translatedArticle, 'content') && $translatedArticle->content) {
                    $content = $this->purifier->purify(trim($translatedArticle->content));
                } else {
                    $content = $this->purifier->purify(trim($englishArticle->body()));
                }

                // Special handling of french colon character
                if ($lang === 'fr') {
                    $content = preg_replace_callback(
                        "/(?<=\(http)(.*?)(?=\))/u",
                        function ($matches) {
                            return preg_replace("/\x{202f}/u", "", $matches[1]);
                        },
                        $content
                    );
                }

                $yaml = "---\ntitle: \"$title\"\ndate: $date\nauthor: $author\n---\n\n$content\n";

                file_put_contents(
                    DIR_NEWS . "/{$lang}/{$key}.markdown",
                    $yaml
                );
            }
        } else {
            // Update the base english l10n file
            echo("Converting English Markdown files to the l10n base file\n");
            $newsJson = array();
            $news = $this->getAllNews($lang);

            file_put_contents(
                $newsFile,
                \str_replace('\r\n', '\n', json_encode($news, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES |  JSON_UNESCAPED_UNICODE) . "\n")
            );
        }
    }

    private function getAllNews($lang)
    {
        $dir = join(DIRECTORY_SEPARATOR, [DIR_NEWS, $lang]);

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
            $article = YamlFrontMatter::parse($data);
            $news[$key] = array('title' => $article->title, 'content' => trim($article->body()));
        }
        return $news;
    }
}

new LocalizationUtils();
