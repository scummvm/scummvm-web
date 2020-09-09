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

    /* Article object constructor. */
    public function __construct($data)
    {
        parent::__construct($data);
        $this->name = $data['name'];
        $this->engine = $data['engine_id'];
        $this->company = $data['company_id'];
        $this->moby_id = $data['moby_id'];
        $this->datafiles = $data['datafiles'];
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

}
