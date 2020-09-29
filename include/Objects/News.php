<?php
namespace ScummVM\Objects;

use Spatie\YamlFrontMatter\YamlFrontMatter;
use Erusev\Parsedown;

/**
 * The news class represents a news item on the website.
 */
class News
{
    private $title;
    private $date;
    private $author;
    private $content;
    private $filename;

    /**
     * News object constructor that extracts the data from the YAML frontmatter.
     */
    public function __construct($data, $filename, $processContent = false)
    {
        $object = YamlFrontMatter::parse($data);
        $Parsedown = new \Parsedown();

        $this->title = $processContent ? $this->processText($Parsedown->line($object->title)) : $Parsedown->line($object->title);
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
    public function processText($text)
    {
        return html_entity_decode($text, ENT_COMPAT, 'UTF-8');
    }

    private function localizeLinks($body)
    {
        global $lang;
        if ($lang == DEFAULT_LOCALE || !$lang) {
            return $body;
        }
        $regex = "/\[.+\]\((.+)\)/i";
        $matches = [];
        if (\preg_match_all($regex, $body, $matches)) {
            foreach ($matches[1] as $url) {
                // Don't replace FRS links or static files
                if (\strpos($url, "/frs") || file_exists("./$url")) {
                    continue;
                } elseif (\preg_match("/^\//", $url)) { // Relative path (/screenshots/)
                    $body = str_replace($url, "/$lang" . $url, $body);
                } elseif (\strpos($url, "www.scummvm.org")) { // Absolute url (www.scummvm.org/*)
                    $newUrl = preg_replace("/\.org(\/|$)?/i", ".org/$lang/", $url);
                    $body = str_replace($url, $newUrl, $body);
                }
            }
        }

        return $body;
    }

    /* Get the title. */
    public function getTitle()
    {
        return $this->title;
    }

    /* Get the date. */
    public function getDate()
    {
        return $this->date;
    }

    /* Get the author. */
    public function getAuthor()
    {
        return $this->author;
    }

    /* Get the content. */
    public function getContent()
    {
        return $this->content;
    }

    /* Get the filename. */
    public function getFilename()
    {
        return $this->filename;
    }

    /* Get the News link. */
    public function getLink()
    {
        return URL_BASE . 'news/' . substr($this->filename, 0, -9);
    }
}
