<?php
namespace ScummVM\Objects;

/**
 * The menu class represents a sidebar menu group on the website.
 */
class MenuItem extends BasicObject
{

    private $class;
    private $entries;

    /* Menu object constructor. */
    public function __construct($data)
    {
        parent::__construct($data);
        $this->class = $data['class'];
        $this->entries = array();
        foreach ($data['link'] as $key => $value) {
            $this->entries[$value['name']] = $value['href'];
        }
    }

    /* Get the CSS class. */
    public function getClass()
    {
        return $this->class;
    }

    /* Get the list of links, with the name as key and URL as value. */
    public function getEntries()
    {
        return $this->entries;
    }
}
