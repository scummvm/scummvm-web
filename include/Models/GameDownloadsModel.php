<?php
namespace ScummVM\Models;

use ScummVM\Objects\DownloadsSection;
use Symfony\Component\Yaml\Yaml;
use ScummVM\Models\GameModel;

/**
 * The GameDownloadsModel will produce DownloadsSection objects.
 */
class GameDownloadsModel extends BasicModel
{
    private $gameModel;

    public function __construct()
    {
        $this->gameModel = new GameModel();
    }
    /* Get all download entries. */
    public function getAllDownloads()
    {
        $sections = $this->getFromCache();
        if (is_null($sections)) {
            $fname = $this->getLocalizedFile('game_resources.yaml');
            $parsedData = @Yaml::parseFile($fname);
            // error check yaml

            $sections = [];
            $sectionsData = $this->getSectionData();
            $games = $this->gameModel->getAllGames();
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
                if (!isset($sections[$category]->getSubSections()[$gameId])) {
                    $sections[$category]->addSubsection(new DownloadsSection([
                        'anchor' => $gameId,
                        'title' => $games[$gameId]->getName(),
                        'notes' => $sectionsData[$gameId]['notes']
                    ]));
                }

                // Add Download to subsection
                $data['name'] = $games[$gameId]->getName() . " - " . $data['name'];
                $sections[$category]->getSubsections()[$gameId]->addItem($data);
            }
            $this->saveToCache($sections);
        }
        return $sections;
    }

    private function getSectionData() {
        return [
            "games"=>["title"=>"{#gamesXMLTitle#} {#downloadsXMLVersion#}"],
            "addons"=>["title"=>"{#gamesXMLAddons#} {#downloadsXMLVersion#}"],
            "sword1"=>["notes"=>"{#sword1AddonsNote#}"],
            "sword2"=>["notes"=>"{#sword2AddonsNote#}"],
          ];
    }
}
