<?php // phpcs:ignore PSR1.Files.SideEffects.FoundWithSymbols -- Script directly executed
namespace ScummVM;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../include/Constants.php';

use Spatie\YamlFrontMatter\YamlFrontMatter;
use Erusev\Parsedown;

class LocalizationUtils
{
    private static \HTMLPurifier $purifier;

    const NO_FILES = 'No Localization Files Found';

    public static function localize(): void
    {
        $config = \HTMLPurifier_Config::createDefault();
        self::$purifier = new \HTMLPurifier($config);

        $langs = array_slice(scandir(DIR_DATA), 2);
        foreach ($langs as $value) {
            if (\is_dir(DIR_DATA . "/$value")) {
                self::convertLanguageJsonToSmartyIni($value);
                self::updateNewsL10n($value);
            }
        }
    }

    private static function convertLanguageJsonToSmartyIni(string $lang): void
    {
        $Parsedown = new \Parsedown();
        $Parsedown->setBreaksEnabled(true);
        $filename = JOIN(DIRECTORY_SEPARATOR, [DIR_DATA, $lang, "strings.json"]);
        echo("Converting {$filename} from JSON to INI\n");
        $jsonString = file_get_contents($filename);
        if ($jsonString === false) {
            throw new \Exception("Can't read file $filename");
        }
        $json = json_decode($jsonString);

        $output = "";
        foreach ($json as $key => $value) {
            if ($value) {
                $output .= $key . ' = """' . self::$purifier->purify($Parsedown->line($value)) . '"""' . "\n";
            }
        }

        file_put_contents(join(DIRECTORY_SEPARATOR, [DIR_DATA, $lang, "strings.ini"]), $output);
    }

    private static function updateNewsL10n(string $lang): void
    {
        $newsFile = join(DIRECTORY_SEPARATOR, [DIR_DATA, $lang, "news.json"]);
        // For non-english, create/overwrite JSON files from our l10n file
        if ($lang !== DEFAULT_LOCALE) {
            if (!file_exists($newsFile)) {
                return;
            }
            echo("Converting " . $newsFile . " to individual Markdown files\n");
            $jsonString = file_get_contents($newsFile);
            if ($jsonString === false) {
                throw new \Exception("Can't read news JSON $newsFile");
            }
            $l10n = json_decode($jsonString);

            foreach ($l10n as $key => $translatedArticle) {
                $newsFile = join(DIRECTORY_SEPARATOR, [DIR_DATA, DEFAULT_LOCALE, 'news', "{$key}.markdown"]);
                $englishContents = file_get_contents($newsFile);
                if ($englishContents === false) {
                    throw new \Exception("Can't read news file $newsFile");
                }
                $englishArticle = YamlFrontMatter::parse($englishContents);

                $date = self::$purifier->purify($englishArticle->date);
                $author = self::$purifier->purify($englishArticle->author);
                if (property_exists($translatedArticle, 'title') && $translatedArticle->title) {
                    $title = self::$purifier->purify(str_replace('"', '\"', $translatedArticle->title));
                } else {
                    $title = self::$purifier->purify(str_replace('"', '\"', $englishArticle->title));
                }
                if (property_exists($translatedArticle, 'content') && $translatedArticle->content) {
                    $content = self::$purifier->purify(trim($translatedArticle->content));
                } else {
                    $content = self::$purifier->purify(trim($englishArticle->body()));
                }

                // Special handling of french colon character
                if ($lang === 'fr') {
                    $content = preg_replace_callback(
                        "/(?<=\(http)(.*?)(?=\))/u",
                        function (array $matches): string {
                            return preg_replace("/\x{202f}/u", "", $matches[1]);
                        },
                        $content
                    );
                }

                $yaml = "---\ntitle: \"$title\"\ndate: $date\nauthor: $author\n---\n\n$content\n";

                $newsDir = DIR_DATA . "/{$lang}/news";
                if (!file_exists($newsDir)) {
                    mkdir($newsDir);
                }

                file_put_contents(
                    "$newsDir/{$key}.markdown",
                    $yaml
                );
            }
        } else {
            // Update the base english l10n file
            echo("Converting English Markdown files to the l10n base file\n");
            $news = self::getAllNews($lang);

            file_put_contents(
                $newsFile,
                \str_replace(
                    '\r\n',
                    '\n',
                    json_encode($news, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES |  JSON_UNESCAPED_UNICODE) . "\n"
                )
            );
        }
    }

    /**
     * @return array<string, array{'title': string, 'content': string}>
     */
    private static function getAllNews(string $lang): array
    {
        $dir = join(DIRECTORY_SEPARATOR, [DIR_DATA, $lang, 'news']);

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
            $key = \basename($filename, ".markdown");
            $article = YamlFrontMatter::parse($data);
            $news[$key] = array('title' => $article->title, 'content' => trim($article->body()));
        }
        return $news;
    }
}

LocalizationUtils::localize();
