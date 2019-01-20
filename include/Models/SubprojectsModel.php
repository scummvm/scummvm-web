<?php
namespace ScummVM\Models;

use ScummVM\Objects\Project;
use ScummVM\Objects\File;
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
        $a = $parser->parseByFilename($fname);
        $entries = array();
        BasicObject::toArray($a['subprojects']['project']);
        foreach ($a['subprojects']['project'] as $key => $value) {
            $downloads = array();
            foreach ($value['entries'] as $type => $data) {
                if ($type == 'file') {
                    BasicObject::toArray($data);
                    foreach ($data as $file) {
                        $downloads[] = new File($file);
                    }
                }
            }
            $entries[] = new Project(array(
                'name' => $value['name'],
                'info' => $value['info'],
                'downloads' => $downloads,
            ));
        }
        return $entries;
    }
}
