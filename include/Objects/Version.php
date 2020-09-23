<?php
namespace ScummVM\Objects;

/**
 * The Version object represents a ScummVM release version
 */
class Version extends DataObject
{
    private $releaseDate;

    /* Article object constructor. */
    public function __construct($data)
    {
        parent::__construct($data);
        $this->releaseDate = $this->assignFromArray('release_date', $data);
    }

    /* Get the version release name. */
    public function getDate()
    {
        return $this->releaseDate;
    }
}
