<?php
namespace ScummVM\Models;

use ScummVM\Objects\Document;
use ScummVM\XMLParser;

/**
 * The DocumentationModel class will generate Document objects.
 */
abstract class DocumentationModel extends BasicModel
{
    /* Get all the documents. */
    public static function getAllDocuments()
    {
        $fname = DIR_DATA . '/documentation.xml';
        $parser = new XMLParser();
        $parsedData = $parser->parseByFilename($fname);
        $entries = array();
        foreach (array_values($parsedData['documentation']['document']) as $value) {
            $entries[] = new Document($value);
        }
        return $entries;
    }
}
