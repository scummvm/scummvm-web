<?php
namespace ScummVM\Models;

use ScummVM\Objects\DownloadsSection;
use ScummVM\OrmObjects\GameDownload;
use ScummVM\OrmObjects\GameDownloadQuery;

/**
 * The GameDownloadsModel will produce DownloadsSection objects.
 */
class GameDownloadsModel extends BasicModel
{
    /**
     * Get all download entries.
     *
     * @return array<string, DownloadsSection>
     */
    public function getAllDownloads()
    {
        $sections = $this->getFromCache();
        if (is_null($sections)) {
            $sections = [];
            $sectionsData = $this->getSectionData();
            $categories = GameDownloadQuery::create()
                ->select('category')
                ->distinct()
                ->find();

            foreach ($categories as $category) {
                $sections[$category] = new DownloadsSection([
                        'anchor' => $category,
                        'title' => $sectionsData[$category]['title'] ?? '',
                        'notes' => $sectionsData[$category]['notes'] ?? ''
                    ]);
            }

            $gameDownloads = GameDownloadQuery::create()
                ->joinGame()
                ->find();
            foreach ($gameDownloads as $gameDownload) {
                // Create Sections
                $category = $gameDownload->getCategory();
                $gameId = $gameDownload->getGameId();
                $gameName = $gameDownload->getGame()->getName();

                // Create Subsections
                if (!isset($sections[$category]->getSubSections()[$gameId])) {
                    $sections[$category]->addSubsection(new DownloadsSection([
                        'anchor' => $gameId,
                        'title' => $gameName,
                        'notes' => $sectionsData[$gameId]['notes'] ?? ''
                    ]));
                }

                // Add Download to subsection
                $gameDownload->setName($gameName . " - " . $gameDownload->getName());
                $sections[$category]->getSubsections()[$gameId]->addItem($gameDownload);
            }
            $this->saveToCache($sections);
        }
        return $sections;
    }

    /**
     * @return array<string, array{'title'?: string, 'notes'?: string}>
     */
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
