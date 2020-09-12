<?php
namespace ScummVM\Objects;

/**
 * The DataObject class is inherited by all other new data objects
 * and houses all common functions.
 */
abstract class DataObject
{
    protected $id;

    public function __construct($data)
    {
        if (array_key_exists('id', $data)) {
            $this->id = $data['id'];
        } elseif (array_key_exists('support', $data)) { // Compatibility
            $this->id = $data['game_id'];
        }
    }

     /* Get the ID. */
    public function getId()
    {
        return $this->id;
    }

    public function __toString()
    {
        return strval($this->id);
    }

    /**
     * Helper method to safely retrieve an object
     * from an array.
     */
    protected function assignFromArray($key, $array)
    {
        if (array_key_exists($key, $array)) {
            return $array[$key];
        } else {
            return $key;
        }
    }
}