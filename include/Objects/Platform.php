<?php
namespace ScummVM\Objects;

/**
 * The Platform object represents the named representation of a game platform
 */
class Platform extends DataObject
{
    private $name;

    /* Article object constructor. */
    public function __construct($data)
    {
        parent::__construct($data);
        $this->name = $this->assignFromArray('name', $data, true);
    }

    /* Get the platform name. */
    public function getName()
    {
        return $this->name;
    }
}
