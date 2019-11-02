<?php
namespace ScummVM\Models;

use ScummVM\Objects\CreditsSection;

/**
 * The CreditsModel will generate CreditsSection objects.
 */
abstract class CreditsModel extends BasicModel
{
    /* Get all credit sections and their contents. */
    public static function getAllCredits()
    {
        $fname = DIR_DATA . '/credits.yaml';
        $credits = \yaml_parse_file($fname);
        foreach ($credits['credits']['section'] as $key => $value) {
            $sections[] = new CreditsSection($value);
        }
        return $sections;
    }
}
