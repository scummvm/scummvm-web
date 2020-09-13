<?php
namespace ScummVM\Objects;

/**
 * The Company object represents a companies that created games supported
 * by ScummVM.
 */
class Company extends DataObject
{
    private $name;
    private $alt_name;

    /* Article object constructor. */
    public function __construct($data)
    {
        parent::__construct($data);
        $this->name = $this->assignFromArray('name', $data, true);
        $this->alt_name = $this->assignFromArray('alt_name', $data);
    }

    /* Get the company name. */
    public function getName()
    {
        return $this->name;
    }

    /* Get the alternative name */
    public function getAltName()
    {
        return $this->alt_name;
    }
}
