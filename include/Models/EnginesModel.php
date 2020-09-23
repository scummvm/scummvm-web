<?php
namespace ScummVM\Models;

use ScummVM\Objects\Engine;

/**
 * The EnginesModel is used to cross reference Engines across the website
 */
class EnginesModel extends BasicModel
{
    /* Get all Engines from YAML */
    public function getAllEngines()
    {
        $data = $this->getFromCache();
        if (is_null($data)) {
            $fname = DIR_DATA . '/engines.yaml';
            $engines = \yaml_parse_file($fname);
            $data = [];
            foreach ($engines as $engine) {
                $obj = new Engine($engine);
                $data[$obj->getId()] = $obj;
            }
            $this->saveToCache($data);
        }
        return $data;
    }
}
