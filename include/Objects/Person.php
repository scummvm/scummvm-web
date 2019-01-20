<?php
namespace ScummVM\Objects;

/**
 * The Person class represents a person entry on the credits page on the
 * website.
 */
class Person extends BasicObject
{

    private $alias;
    private $description;

    /* Person object constructor. */
    public function __construct($args)
    {
        $this->name = $args['name'];
        $this->alias = $args['alias'];
        $this->description = $args['description'];
    }

    /* Get the name. */
    public function getName()
    {
        return $this->name;
    }

    /* Get the alias. */
    public function getAlias()
    {
        return $this->alias;
    }

    /* Get the description. */
    public function getDescription()
    {
        return $this->description;
    }
}
