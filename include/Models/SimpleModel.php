<?php
namespace ScummVM\Models;

/**
 * The SimpleModel is used automatically create simple models
 * that do not require any special handling
 */
class SimpleModel extends BasicModel
{
    private $query;

    public function __construct($type)
    {
        parent::__construct();
        $this->query = "ScummVM\OrmObjects\\{$type}Query::create" ;
    }

    public function getAllData()
    {
        $objects = $this->getFromCache();
        if (is_null($objects)) {
            $objects = ($this->query)()->find();
            $this->saveToCache($objects, $this->type);
        }
        return $objects;
    }
}
