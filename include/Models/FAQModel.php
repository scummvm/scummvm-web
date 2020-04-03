<?php
namespace ScummVM\Models;

use ScummVM\Objects\Article;
use ScummVM\Objects\FaqEntry;
use ScummVM\Objects\FaqSection;
use ScummVM\XMLParser;

/**
 * The FAQModel class reads the docbook formated XML-file 'faq.xml' and does
 * some changes to make it easier to parse. Returns an array with
 * FaqSection-objects representing the different sections on the F.A.Q.-page on
 * the website.
 */
abstract class FAQModel extends BasicModel
{
    const ERROR_READING_FILE = 'Could not load the frequently asked questions.';
    const FILE_NOT_FOUND = 'The requested FAQ file doesn\'t exist.';

    /* Get the full path and filename for the F.A.Q. XML-file. */
    public static function getFilename()
    {
        global $lang;

        if ($lang != 'en') {
            $localized = DIR_DATA . "/faq-xml." . $lang . ".xml";

            if (is_file($localized)) {
                if (!is_readable($localized)) {
                    $file = "\n\nFilename: " . basename($localized) . "\n";
                    throw new \ErrorException(self::FILE_NOT_FOUND . $file);
                } else {
                    return $localized;
                }
            }
        }

        return DIR_DATA . '/faq-xml.xml';
    }

    /* Get last modification time. */
    public static function getLastUpdated()
    {
        return date('F d, Y', @filemtime(self::getFilename()));
    }

    /* Get all question and answers. */
    public static function getFAQ()
    {
        if (!($data = @file_get_contents(self::getFilename()))) {
            throw new \ErrorException(self::ERROR_READING_FILE);
        }
        /**
         * Let's replace some of the docbook tags and wrap some HTML-entities
         * inside CDATA containers.
         */
        $pattern = array(
            '/<ulink\s+url="(.+)">(.+)<\/ulink>/isU',
            '/<itemizedlist>(.+)<\/itemizedlist>/isU',
            '/<listitem><simpara>(.+)<\/simpara><\/listitem>/isU',
            '/<simpara>(.+)<\/simpara>/isU',
            '/<emphasis>(.+)<\/emphasis>/isU',
            '/<envar>(.+)<\/envar>/isU',
            '/<command(?:\s+[^>]+)?>(.+)<\/command>/isU',
            '/<blockquote>(.+)<\/blockquote>/isU',
            '/<programlisting(?:\s+[^>]+)?>(.+)<\/programlisting>/isU',
            '/<quote>(.+)<\/quote>/isU',
            '/<xref linkend="(.+)"\s+endterm=".+"\/>/isU',
            '/(&(?:lt|gt|quot);)/is',
        );
        $replace = array(
            '<h:a href="\\1">\\2</h:a>',
            '<h:ul>\\1</h:ul>',
            '<h:li>\\1</h:li>',
            '<h:p>\\1</h:p>',
            '<h:span class="italic">\\1</h:span>', // emphasis
            '<h:span class="envar">\\1</h:span>',
            '<h:span class="bold">\\1</h:span>', // command
            '<h:blockquote>\\1</h:blockquote>',
            '<h:pre>\\1</h:pre>', // programlisting
            '&#8220;<h:span class="quote">\\1</h:span>&#8221;',
            '<h:a xref="\\1"/>',
            '<![CDATA[\\1]]>',
        );
        $data = preg_replace($pattern, $replace, $data);
        /* Remove this weird character as it displays as À in Firefox. */
        $data = str_replace(chr(194), '', $data);

        /* Now parse the data. */
        $parser = new XMLParser();
        $parsedData = $parser->parseByData($data);
        $sections = array();
        /**
         * Build a map of the defined hrefs so we can give the xrefs the correct
         * text.
         */
        $xref = array();
        $count = 1;
        foreach (array_values($parsedData['faq']['section']) as $data) {
            $sections[] = new FaqSection($data, $count++, $xref);
        }
        return $sections;
    }
}
