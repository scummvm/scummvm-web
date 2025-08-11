<?php
namespace ScummVM\Objects;

use ScummVM\SiteUtils;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Erusev\Parsedown;

/**
 * The news class represents a news item on the website.
 */
class News
{
    private string $title;
    private string $date;
    private string $author;
    private string $content;
    private string $filename;

    /**
     * News object constructor that extracts the data from the YAML frontmatter.
     */
    public function __construct(string $data, string $filename, bool $processContent = false)
    {
        $object = YamlFrontMatter::parse($data);
        $Parsedown = new \Parsedown();

        $this->title = $processContent ? $this->processText($Parsedown->line($object->title)) :
            $Parsedown->line($object->title);
        $this->date = $object->date;
        $this->author = $object->author;
        $body = $this->localizeLinks($object->body());
        $this->content = $processContent ? $this->processText($Parsedown->text($body)) : $Parsedown->text($body);
        $this->filename = basename($filename);
    }

    /**
     * Search and replace specific text from the title and content of a news item.
     * Used to filter out entities from the RSS/atom feeds that are not in the XML
     * standard.
     *
     * Check:
     * http://en.wikipedia.org/wiki/List_of_XML_and_HTML_character_entity_references
     * for a list of valid entities for both XML and HTML
     */
    public function processText(string $text): string
    {
        return html_entity_decode($text, ENT_COMPAT, 'UTF-8');
    }

    private function localizeLinks(string $body): string
    {
        global $lang;
        if ($lang == DEFAULT_LOCALE || !$lang) {
            return $body;
        }
        // This regex comes from Parsedown
        $regex = '/\[(?:[^][]++|(?R))*+\][(]\s*+((?:[^ ()]++|[(][^ )]+[)])++)(?:[ ]+("[^"]*+"|\'[^\']*+\'))?\s*+[)]/';
        $body = \preg_replace_callback($regex, function ($matches) {
            $full = $matches[0][0];
            $url = $matches[1][0];
            // Conversion to int is for PHPStan
            $urlOffset = (int)$matches[1][1] - (int)$matches[0][1];

            $lurl = SiteUtils::localizePath($url, true);

            return substr_replace($full, $lurl, $urlOffset, strlen($url));
        }, $body, flags: PREG_OFFSET_CAPTURE);

        return $body;
    }

    /* Get the title. */
    public function getTitle(): string
    {
        return $this->title;
    }

    /* Get the date. */
    public function getDate(): string
    {
        return $this->date;
    }

    /* Get the author. */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /* Get the content. */
    public function getContent(): string
    {
        return $this->content;
    }

    /* Get the filename. */
    public function getFilename(): string
    {
        return $this->filename;
    }

    /* Get the News link. */
    public function getLink(): string
    {
        return URL_BASE . 'news/' . substr($this->filename, 0, -9);
    }
}
