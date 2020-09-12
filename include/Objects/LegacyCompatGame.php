<?php
namespace ScummVM\Objects;

/**
 * The LegacyCompatGame class represents a game on the compatibility charts on the
 * website.
 */
class LegacyCompatGame extends BasicObject
{
    private $target;
    private $supportLevel;
    private $notes;
    private $datafiles;

    /* Project object constructor. */
    public function __construct($data)
    {
        parent::__construct($data);
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

        if (array_key_exists('datafiles', $data)) {
            $this->datafiles = $data['datafiles'];
        }
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

    /* Get the datafiles uri. */
    public function getDatafiles()
    {
        return $this->datafiles;
    }
}
