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
            $this->id = join("_",[$data['game_id'],$data['version']]);
        }
    }

     /* Get the ID. */
    public function getId()
    {
        return $this->id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    /**
     * If the input array doesn't contain the numerical key 0, wrap it inside
     * an array. This functions operates on the data directly.
     *
     * @param mixed $data the input
     */
    public static function toArray(&$data)
    {
        if (!is_array($data) || !array_key_exists(0, $data)) {
            $data = array($data);
        }
    }
}
