<?php
namespace ScummVM\Models;

use ScummVM\Objects\CSection;
use ScummVM\XMLParser;

/**
 * The CreditsModel will generate CSection objects.
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
            $sections[] = new CSection($value);
        }
        return $sections;
    }
}
