<?php
namespace ScummVM\Models;

use ScummVM\Objects\Sponsor;

/**
 * The SponsorModel class will generate Sponsor objects.
 */
class SponsorModel extends BasicModel
{
    /* Get all Sponsors. */
    public function getAllSponsors()
    {
        $sponsors = $this->getFromCache();
        if (is_null($sponsors)) {
            $fname = DIR_DATA . '/sponsors.yaml';
            $data = \yaml_parse_file($fname);
            $sponsors = array();
            foreach (array_values($data['sponsors']) as $value) {
                $sponsors[] = new Sponsor($value);
            }
            $this->saveToCache($sponsors);
        }
        return $sponsors;
    }
}
