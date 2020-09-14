<?php
namespace ScummVM\Objects;

/**
 * The DataObject class is inherited by all other new data objects
 * and houses all common functions.
 */
abstract class DataObject
{
    protected $id;
    const NO_ID = 'Data object %s is missing an ID field';
    const BAD_KEY = 'Field %s is required and cannot be empty for %s';
    const NO_KEY = "Key is required and can not be blank";

    public function __construct($data)
    {
        try {
            $this->id = $this->assignFromArray('id', $data);
        } catch (\ErrorException $ex) {
            throw new \ErrorException(\sprintf(self::NO_ID, \get_class($this)));
        }
    }

     /* Get the ID. */
    public function getId()
    {
        return $this->id;
    }

    public function __toString()
    {
        return $this->id;
    }

    /**
     * Helper method to safely retrieve an object
     * from an array.
     */
    protected function assignFromArray($key, $array, $required = false)
    {
        if ($required) {
            if ($key === '') {
                throw new \ErrorException(\sprintf(self::NO_KEY, $key, \get_class($this)));
            }

            if (!isset($array[$key]) || $array[$key] === '') {
                throw new \ErrorException(\sprintf(self::BAD_KEY, $key, \get_class($this)));
            }
        }
        return $array[$key];
    }
}