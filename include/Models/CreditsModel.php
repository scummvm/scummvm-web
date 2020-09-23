<?php
namespace ScummVM\Models;

use ScummVM\Objects\CreditsSection;

/**
 * The CreditsModel will generate CreditsSection objects.
 */
class CreditsModel extends BasicModel
{
    /* Get all credit sections and their contents. */
    public function getAllCredits()
    {
        $data = $this->getFromCache();
        if (is_null($data)) {
            $fname = DIR_DATA . '/credits.yaml';
            $credits = \yaml_parse_file($fname);
            $data = [];
            foreach (array_values($credits['credits']['section']) as $value) {
                $data[] = new CreditsSection($value);
            }
            $this->saveToCache($data);
        }
        return $data;
    }
}
