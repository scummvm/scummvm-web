<?php
namespace ScummVM\Models;

use ScummVM\Objects\Subproject;
use ScummVM\Objects\File;
use ScummVM\Objects\BasicObject;
use ScummVM\XMLParser;

/**
 * The SubprojectsModel will generate Project objects.
 */
abstract class SubprojectsModel extends BasicModel
{
    /* Get all the groups and the respectively demos. */
    public static function getAllSubprojects()
    {
        $fname = DIR_DATA . '/subprojects.xml';
        $parser = new XMLParser();
        $parsedData = $parser->parseByFilename($fname);
        $entries = array();
        BasicObject::toArray($parsedData['subprojects']['project']);
        foreach ($parsedData['subprojects']['project'] as $key => $value) {
            $downloads = array();
            foreach ($value['entries'] as $type => $data) {
                if ($type == 'file') {
                    BasicObject::toArray($data);
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
        return $entries;
    }
}
