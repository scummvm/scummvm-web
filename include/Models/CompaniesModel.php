<?php
namespace ScummVM\Models;

use ScummVM\Objects\Company;

/**
 * The CompaniesModel is used to cross reference companies across the website
 */
class CompaniesModel extends BasicModel
{
    /* Get all Companies from YAML */
    public function getAllCompanies()
    {
        $data = $this->getFromCache();
        if (is_null($data)) {
            $fname = DIR_DATA . '/companies.yaml';
            $companies = \yaml_parse_file($fname);
            $data = [];
            foreach ($companies as $company) {
                $obj = new Company($company);
                $data[$obj->getId()] = $obj;
            }
            $this->saveToCache($data);
        }
        return $data;
    }
}
