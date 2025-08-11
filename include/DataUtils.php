<?php // phpcs:ignore PSR1.Files.SideEffects.FoundWithSymbols -- Script directly executed
namespace ScummVM;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../orm/config.php';
require_once __DIR__ . '/../include/Constants.php';

use League\Csv\Reader;
use League\Csv\Statement;
use Symfony\Component\Yaml\Yaml;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use Propel\Runtime\Propel;
use Propel\Runtime\Connection\Exception\RollbackException;
use Propel\Runtime\Map\TableMap;

/**
 * DataUtils
 * This class pulls down the latest data from the ScummVM Data spreadsheet
 * and converts it to YAML files used to power the site.
 */
class DataUtils
{
    // phpcs:ignore Generic.Files.LineLength
    const SHEET_URL = 'https://docs.google.com/spreadsheets/d/e/2PACX-1vQamumX0p-DYQa5Umi3RxX-pHM6RZhAj1qvUP0jTmaqutN9FwzyriRSXlO9rq6kR60pGIuPvCDzZL3s/pub?output=tsv';
    // filename => sheet id
    const SHEET_IDS = [
        'platforms' => '1061029686',
        'compatibility' => '1989596967',
        'games' => '1775285192',
        'engines' => '0',
        'companies' => '226191984',
        'versions' => '1225902887',
        'game_demos' => '1303420306',
        'series' => '1095671818',
        'screenshots' => '168506355',
        'scummvm_downloads' => '1057392663',
        'game_downloads' => '810295288',
        'director_demos' => '1256563740',
    ];

    const OBJECT_NAMES = [
        'platforms' => 'Platform',
        'engines' => 'Engine',
        'companies' => 'Company',
        'versions' => 'Version',
        'series' => 'Series',
        'games' => 'Game',
        'compatibility' => 'Compatibility',
        'game_demos' => 'Demo',
        'screenshots' => 'Screenshot',
        'scummvm_downloads' => 'Download',
        'game_downloads' => 'GameDownload',
        'director_demos' => 'DirectorDemo',
    ];

    /**
     * Gets the TSV representation from sheets and converts it to YAML on file
     *
     * @return void
     */
    public static function updateData()
    {
        $client = new Client();
        $promises = [];
        foreach (self::SHEET_IDS as $name => $gid) {
            $url = self::SHEET_URL . "&gid=" . $gid;
            $promises[$name] = $client->getAsync($url);
            $promises[$name]->then(function ($response) use ($name) {
                self::doUpdateData($name, $response);
            });
        }

        Promise\Utils::unwrap($promises);

        DataUtils::convertYamlToOrm();
        // Clear the cache at the end of all data operations
        \file_put_contents('.clear-cache', '');
    }

    private static function doUpdateData($name, $response)
    {
        $tsv = $response->getBody();
        $reader = Reader::createFromString($tsv);
        $reader->setDelimiter("\t");
        $reader->setHeaderOffset(0);
        $stmt = new Statement();

        $records = $stmt->process($reader);
        // Convert to JSON because records are serializable
        // and cannot be converted directly to yaml
        $json = \json_encode($records);
        $data = \json_decode($json, true);

        // Convert TRUE/FALSE strings to Booleans
        foreach ($data as $objKey => $obj) {
            foreach ($obj as $key => $val) {
                if ($val === 'TRUE') {
                    $data[$objKey][$key] = true;
                } elseif ($val === 'FALSE') {
                    $data[$objKey][$key] = false;
                }
            }
        }

        // Convert to YAML
        $yaml = Yaml::dump($data);
        $yaml = "# This is a generated file, please do not edit manually\n" . $yaml;
        $outFile = DIR_DATA . "/" . DEFAULT_LOCALE . "/$name.yaml";
        echo("Writing $name data to $outFile\n");
        \file_put_contents($outFile, $yaml);
    }

    private static function convertYamlToOrm()
    {
        foreach (self::OBJECT_NAMES as $name => $object) {
            $failures = array();

            $query = "ScummVM\\OrmObjects\\{$object}Query";
            if ($query::create()->count() > 0) {
                continue;
            }
            $file = DIR_DATA . "/" . DEFAULT_LOCALE . "/$name.yaml";
            $data = Yaml::parseFile($file);
            $data = array_values($data);
            echo "Writing $object data to database\n";

            $class = "ScummVM\\OrmObjects\\$object";
            $mapClass = $class::TABLE_MAP;
            $con = Propel::getConnection($mapClass::DATABASE_NAME);
            do {
                $newFailures = array();
                // Use a transation to speed up writes
                $con->beginTransaction();
                foreach ($data as $i => $item) {
                    if (in_array($i, $failures)) {
                        continue;
                    }
                    foreach ($item as $key => $val) {
                        if ($val === '') {
                            unset($item[$key]);
                        }
                    }
                    $dbItem = new $class();
                    // TODO: Rename platform to platform_id
                    if ($object === 'Demo' || $object === 'DirectorDemo') {
                        $item['platform_id'] = $item['platform'];
                    }
                    try {
                        $dbItem->fromArray($item, TableMap::TYPE_FIELDNAME);
                        $dbItem->save($con);
                    } catch (\Exception $ex) {
                        $newFailures[] = $i;

                        echo json_encode($item) . "\n";
                        echo $ex->getMessage() . "\n";
                        $prev = $ex->getPrevious();
                        if ($prev) {
                            echo "  > " . $prev->getMessage() . "\n";
                        }
                    }
                }
                try {
                    $con->commit();
                    // If we could commit, we are done
                    break;
                } catch (RollbackException) {
                    $con->rollback();
                }
                $failures = array_merge($failures, $newFailures);
                // If there are no new failure, we will get an infinite loop
            } while (count($newFailures));
        }
    }
}

DataUtils::updateData();
