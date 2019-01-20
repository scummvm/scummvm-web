<?php
namespace ScummVM\Objects;

/**
 * The CompatGame class represents a game on the compatibility charts on the
 * website.
 */
class CompatGame extends BasicObject
{
    private $target;
    private $supportLevel;
    private $notes;

    /* Project object constructor. */
    public function __construct($data)
    {
        $this->name = $data['name'];
        $this->target = $data['target'];
        // In old compat pages we used 'percent' instead of 'support_level'.
        // we still want to support those thus we check whether the old tag
        // is present here.
        if (array_key_exists('percent', $data)) {
            $this->supportLevel = $data['percent'];
        } else {
            $this->supportLevel = $data['support_level'];
        }
        $this->notes = $data['notes'];
    }

    /* Get the name. */
    public function getName()
    {
        return $this->name;
    }

    /* Get the target name. */
    public function getTarget()
    {
        return $this->target;
    }

    /* Get the support level. */
    public function getSupportLevel()
    {
        return $this->supportLevel;
    }

    /* Get the notes. */
    public function getNotes()
    {
        return $this->notes;
    }
}
