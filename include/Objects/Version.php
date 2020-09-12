<?php
namespace ScummVM\Objects;

/**
 * The Version object represents a ScummVM release version
 */
class Version extends DataObject
{
    private $date;

    /* Article object constructor. */
    public function __construct($data)
    {
        parent::__construct($data);
        $this->date = $data['date'];
    }

    /* Get the version release name. */
    public function getDate()
    {
        return $this->date;
    }
}
