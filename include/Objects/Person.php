<?php
namespace ScummVM\Objects;

/**
 * The Person class represents a person entry on the credits page on the
 * website.
 */
class Person extends BasicObject
{
    private $alias;

    /* Person object constructor. */
    public function __construct($data)
    {
        parent::__construct($data);
        $this->alias = $data['alias'];
    }

    /* Get the alias. */
    public function getAlias()
    {
        return $this->alias;
    }
}
