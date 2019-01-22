<?php
namespace ScummVM\Models;

use ScummVM\Objects\CreditsSection;
use ScummVM\XMLParser;

/**
 * The CreditsModel will generate CreditsSection objects.
 */
abstract class CreditsModel extends BasicModel
{
    /* Get all credit sections and their contents. */
    public static function getAllCredits()
    {
        $fname = DIR_DATA . '/credits.xml';
        $parser = new XMLParser();
        $a = $parser->parseByFilename($fname);
        $sections = array();
        foreach ($a['credits']['section'] as $key => $value) {
            $sections[] = new CreditsSection($value);
        }
        return $sections;
    }
}
