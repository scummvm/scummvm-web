<?php
namespace ScummVM\Objects;

/**
 * The Game object represents a game known to ScummVM
 */
class Game extends DataObject
{
    private $name;
    private $engine;
    private $company;
    private $moby_id;
    private $datafiles;
    private $series;

    /* Article object constructor. */
    public function __construct($data, $engines, $companies, $series)
    {
        parent::__construct($data);
        $this->name = $this->assignFromArray('name', $data, true);
        $this->moby_id = $this->assignFromArray('moby_id', $data);
        $this->datafiles = $this->assignFromArray('datafiles', $data);
        $this->company = $this->assignFromArray($data['company_id'], $companies);
        $this->engine = $this->assignFromArray($data['engine_id'], $engines, true);
        $this->series = $this->assignFromArray($data['series_id'], $series);
    }

    public function __toString()
    {
        return $this->getName();
    }

    /* Get the game name. */
    public function getName()
    {
        return $this->name;
    }

    /* Get the ScummVM engine name */
    public function getEngine()
    {
        return $this->engine;
    }

     /* Get the company who made the game */
    public function getCompany()
    {
        return $this->company;
    }

     /* Get the mobygames id. */
    public function getMobyId()
    {
        return $this->moby_id;
    }

     /* Get the link to the game datafiles. */
    public function getDatafiles()
    {
        return $this->datafiles;
    }

    /* Get the game series object. */
    public function getSeries()
    {
        return $this->series;
    }
}
