<?php
namespace ScummVM\Models;

use ScummVM\Objects\Subproject;
use ScummVM\Objects\File;
use ScummVM\Objects\BasicObject;
use ScummVM\XMLParser;

/**
 * The SubprojectsModel will generate Project objects.
 */
class SubprojectsModel extends BasicModel
{
    /* Get all the groups and the respectively demos. */
    public function getAllSubprojects()
    {
        $entries = $this->getFromCache();
        if (is_null($entries)) {
            $fname = DIR_DATA . '/subprojects.xml';
            $parser = new XMLParser();
            $parsedData = $parser->parseByFilename($fname);
            $entries = array();
            foreach (array($parsedData['subprojects']['project']) as $key => $value) {
                $downloads = array();
                foreach (array($value['entries']) as $type => $data) {
                    if ($type == 'file') {
                        foreach ($data as $file) {
                            $downloads[] = new File($file);
                        }
                    }
                }
                $entries[] = new Subproject(
                    array(
                    'name' => $value['name'],
                    'info' => $value['info'],
                    'downloads' => $downloads,
                    )
                );
            }
            $this->saveToCache($entries);
        }
        return $entries;
    }
}
