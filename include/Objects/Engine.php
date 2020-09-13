<?php
namespace ScummVM\Objects;

/**
 * The Engine object represents a game engine supported by ScummVM
 */
class Engine extends DataObject
{
    private $name;
    private $alt_name;
    private $enabled;

    /* Article object constructor. */
    public function __construct($data)
    {
        parent::__construct($data);
        $this->name = $this->assignFromArray('name', $data, true);
        $this->alt_name = $this->assignFromArray('alt_name', $data);
        $this->enabled = $this->assignFromArray('enabled', $data);
    }

    /* Get the engine name. */
    public function getName()
    {
        return $this->name;
    }

    /* Get the alternative name */
    public function getAltName()
    {
        return $this->alt_name;
    }

     /* Get the engine enabled status. */
    public function getEnabled()
    {
        return $this->enabled;
    }

}
