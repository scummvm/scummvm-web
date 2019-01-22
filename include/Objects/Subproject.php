<?php
namespace ScummVM\Objects;

/**
 * The Subproject class represents a subproject on the website.
 */
class Subproject extends BasicObject
{

    private $info;
    private $downloads;

    /* Subproject object constructor. */
    public function __construct($data)
    {
        parent::__construct($data);
        $this->info = $data['info'];
        $this->downloads = $data['downloads'];
    }

    /* Get the information text for this project. */
    public function getInfo()
    {
        return $this->info;
    }

    /* Get the list of downloads available for this project. */
    public function getDownloads()
    {
        return $this->downloads;
    }
}
