<?php
namespace ScummVM;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../include/Constants.php';

use League\Csv\Reader;
use League\Csv\Statement;

class DataUtils
{
    const SHEET_URL = 'https://docs.google.com/spreadsheets/d/e/2PACX-1vQamumX0p-DYQa5Umi3RxX-pHM6RZhAj1qvUP0jTmaqutN9FwzyriRSXlO9rq6kR60pGIuPvCDzZL3s/pub?output=tsv';
    const SHEET_IDS = [
        'platforms' => '1061029686',
        'compatibility' => '854570757',
        'games' => '1946612063',
        'engines' => '0',
        'companies' => '226191984',
        'versions' => '1225902887',
        'game_demos' => '713475305',
        'series' => '1095671818'
    ];

    public function getAllData()
    {
        foreach (self::SHEET_IDS as $name => $gid) {
            $tsv = \file_get_contents(self::SHEET_URL . "&gid=" . $gid);
            $reader = Reader::createFromString($tsv);
            $reader->setDelimiter("\t");
            $reader->setHeaderOffset(0);
            $stmt = new Statement();

            $records = $stmt->process($reader);
            // Convert to JSON because records are serializable
            // and cannot be converted directly to yaml
            $json = \json_encode($records);
            $data = \json_decode($json, true);
            $yaml = \yaml_emit($data, YAML_UTF8_ENCODING, YAML_LN_BREAK);
            $yaml = "# This is a generated file, please do not edit manually\n" . $yaml;
            $outFile = DIR_DATA . "/$name.yaml";
            echo("Writing $name data to $outFile\n");
            \file_put_contents($outFile, $yaml);
        }
    }
}

$dataUtils = new DataUtils();
$dataUtils->getAllData();