<?php
namespace ScummVM\Models;

/**
 * The SimpleModel is used automatically create simple models
 * that do not require any special handling
 */
class SimpleModel extends BasicModel
{
    private $filename;
    private $type;

    const FILE_NOT_FOUND = 'The filename %s could not be found';
    const YAML_PARSE_FAILED = 'Unable to parse the contents of the file %s';

    public function __construct($type, $filename)
    {
        parent::__construct();
        $this->filename = DIR_DATA . "/$filename";
        if (!is_file($this->filename) || !is_readable($this->filename)) {
            throw new \ErrorException(\sprintf(self::FILE_NOT_FOUND, $this->filename));
        }
        $this->type = "ScummVM\Objects\\$type";
    }

    public function getAllData($assignIdsToArray = true)
    {
        $objects = $this->getFromCache();
        if (is_null($objects)) {
            $data = @\yaml_parse_file($this->filename);
            if (!$data || !\is_array($data)) {
                throw new \ErrorException(\sprintf(self::YAML_PARSE_FAILED, $this->filename));
            }
            $objects = [];
            foreach ($data as $item) {
                $obj = new $this->type($item);
                if ($assignIdsToArray && method_exists($obj, "getId")) {
                    $objects[$obj->getId()] = $obj;
                } else {
                    $objects[] = $obj;
                }
            }
            $this->saveToCache($objects, $this->type);
        }
        return $objects;
    }
}
