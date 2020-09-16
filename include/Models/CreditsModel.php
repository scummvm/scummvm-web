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
        $fname = DIR_DATA . '/credits.yaml';
        $parsedData = \yaml_parse_file($fname);
        $sections = [];
        foreach (array_values($parsedData['credits']['section']) as $value) {
            $sections[] = new CreditsSection($value);
        }
        return $sections;
    }
}
