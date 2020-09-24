<?php
namespace ScummVM\Models;

use ScummVM\Objects\Document;

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
            $fname = DIR_DATA . '/documentation.yaml';
            $documentation = \yaml_parse_file($fname);
            $data = [];
            foreach ($documentation as $value) {
                $data[] = new Document($value);
            }
            $this->saveToCache($data);
        }
        return $data;
    }
}
