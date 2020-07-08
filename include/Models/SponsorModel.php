<?php
namespace ScummVM\Models;

use ScummVM\Objects\Sponsor;

/**
 * The SponsorModel class will generate Sponsor objects.
 */
abstract class SponsorModel extends BasicModel
{
    /* Get all Sponsors. */
    public static function getAllSponsors()
    {
        $fname = DIR_DATA . '/sponsors.yaml';
        $parsedData = \yaml_parse_file($fname);
        $entries = array();
        foreach (array_values($parsedData['sponsors']) as $value) {
            $entries[] = new Sponsor($value);
        }
        return $entries;
    }
}
