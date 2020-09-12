<?php
namespace ScummVM\Models;

use ScummVM\Objects\Company;

/**
 * The CompanysModel is used to cross reference companyies across the website
 */
abstract class CompaniesModel extends BasicModel
{
    /* Get all Companies from YAML */
    public static function getAllCompanies()
    {
        $fname = DIR_DATA . '/companies.yaml';
        $companies = \yaml_parse_file($fname);
        $data = [];
        foreach ($companies as $company) {
            $obj = new Company($company);
            $data[$obj->getId()] = $obj;
        }
        return $data;
    }
}
