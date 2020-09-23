<?php
namespace ScummVM\Models;

use ScummVM\Objects\Document;
use ScummVM\XMLParser;

/**
 * The DocumentationModel class will generate Document objects.
 */
class DocumentationModel extends BasicModel
{
    /* Get all the documents. */
    public function getAllDocuments()
    {
        $data = $this->getFromCache();
        if (is_null($data)) {
            $fname = DIR_DATA . '/documentation.xml';
            $parser = new XMLParser();
            $documentation = $parser->parseByFilename($fname);
            $data = [];
            foreach (array_values($documentation['documentation']['document']) as $value) {
                $data[] = new Document($value);
            }
            $this->saveToCache($data);
        }
        return $data;
    }
}
