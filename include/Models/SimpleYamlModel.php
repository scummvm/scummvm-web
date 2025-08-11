<?php
namespace ScummVM\Models;

use Symfony\Component\Yaml\Yaml;

/**
 * The SimpleModel is used automatically create simple models
 * that do not require any special handling
 */
class SimpleYamlModel extends BasicModel
{
    private string $filename;
    private string $type;

    const FILE_NOT_FOUND = 'The filename %s could not be found';
    const YAML_PARSE_FAILED = 'Unable to parse the contents of the file %s';

    public function __construct(string $type, string $filename)
    {
        parent::__construct();
        $this->filename = $this->getLocalizedFile($filename);
        $this->type = "ScummVM\Objects\\$type";
    }

    /**
     * @return array<string|int, mixed>
     */
    public function getAllData(bool $assignIdsToArray = true) : array
    {
        $objects = $this->getFromCache();
        if (is_null($objects)) {
            $data = @Yaml::parseFile($this->filename);
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
