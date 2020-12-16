<?php
namespace ScummVM\Models;

use ScummVM\Objects\DownloadsSection;
use Symfony\Component\Yaml\Yaml;
use ScummVM\Models\GameModel;
use ScummVM\OrmObjects\GameQuery;

/**
 * The GameDownloadsModel will produce DownloadsSection objects.
 */
class GameDownloadsModel extends BasicModel
{
    /* Get all download entries. */
    public function getAllDownloads()
    {
        $sections = $this->getFromCache();
        if (is_null($sections)) {
            $fname = $this->getLocalizedFile('game_downloads.yaml');
            $parsedData = @Yaml::parseFile($fname);
            $sections = [];
            $sectionsData = $this->getSectionData();
            $gameQuery = GameQuery::create();
            foreach ($parsedData as $data) {
                // Create Sections
                $category = $data['category'];
                if (!isset($sections[$category])) {
                    $sections[$category] = new DownloadsSection([
                        'anchor' => $category,
                        'title' => $sectionsData[$category]['title'],
                        'notes' => $sectionsData[$category]['notes']
                    ]);
                }

                // Create Subsections
                $gameId = $data['game_id'];
                $gameName = $gameQuery->findPk($gameId)->getName();
                if (!isset($sections[$category]->getSubSections()[$gameId])) {
                    $sections[$category]->addSubsection(new DownloadsSection([
                        'anchor' => $gameId,
                        'title' => $gameName,
                        'notes' => $sectionsData[$gameId]['notes']
                    ]));
                }

                // Add Download to subsection
                $data['name'] = $gameName . " - " . $data['name'];
                $sections[$category]->getSubsections()[$gameId]->addItem($data);
            }
            $this->saveToCache($sections);
        }
        return $sections;
    }

    private function getSectionData()
    {
        return [
            "games"=>["title"=>"{#gamesXMLTitle#} {#downloadsXMLVersion#}"],
            "addons"=>["title"=>"{#gamesXMLAddons#} {#downloadsXMLVersion#}"],
            "sword1"=>["notes"=>"{#sword1AddonsNote#}"],
            "sword2"=>["notes"=>"{#sword2AddonsNote#}"],
          ];
    }
}
