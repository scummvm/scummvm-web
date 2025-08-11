<?php
namespace ScummVM\Objects;

/**
 * The menu class represents a sidebar menu group on the website.
 */
class MenuItem extends BasicObject
{

    private string $class;
    /** @var array<string, string> */
    private array $entries;

    /**
     * Menu object constructor.
     * @param array{'description'?: string, 'name'?: string, 'class': string,
     *      'links': array<array{'name': string, 'href': string}>} $data
     */
    public function __construct($data)
    {
        parent::__construct($data);
        $this->class = $data['class'];
        $this->entries = array();
        foreach (array_values($data['links']) as $value) {
            $this->entries[$value['name']] = $value['href'];
        }
    }

    /* Get the CSS class. */
    public function getClass(): string
    {
        return $this->class;
    }

    /**
     * Get the list of links, with the name as key and URL as value.
     *
     * @return array<string, string>
     */
    public function getEntries(): array
    {
        return $this->entries;
    }
}
