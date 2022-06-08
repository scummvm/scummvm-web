<?php

namespace ScummVM\OrmObjects;

use ScummVM\OrmObjects\Base\Compatibility as BaseCompatibility;

/**
 * Skeleton subclass for representing a row from the 'compatibility' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 */
class Compatibility extends BaseCompatibility
{
    private function processPlatforms($values)
    {
        $platforms = \explode(",", $values);

        $data = PlatformQuery::create()->findPks($platforms);
        $retVal = '';
        foreach ($data as $platform) {
            $retVal .= "- {$platform->getName()} \n";
        }
        return $retVal;
    }

    public function getNotes()
    {
        $notes = "### Support Level\n\n";
        $notes .= "%{$this->getSupport()}%\n\n";

        if ($stable = $this->getStablePlatforms()) {
            $notes .= "### Supported Platforms \n";
            $notes .= "{$this->processPlatforms($stable)}\n";
        }

        if ($unstable = $this->getUnstablePlatforms()) {
            $notes .= "### Unsupported Platforms\n";
            $notes .= "{$this->processPlatforms($unstable)}\n";
        }

        if ($this->notes) {
            $notes .= "### Additional Notes\n";
            $notes .= str_replace("- ", "\n- ", parent::getNotes()) . "\n";
        }

        $links = [];
        if ($this->getGame()->getMobyId() > 0) {
            $links[] = "- [MobyGames](https://www.mobygames.com/game/{$this->getGame()->getMobyId()})";
        }
        $dataFiles = $this->getGame()->getDataFiles();
        if ($dataFiles) {
            if (str_starts_with($dataFiles, "https://")) {
                $wikiLink = "- [ScummVM Wiki]({$this->getGame()->getDataFiles()})";
            } else {
                $wikiLink = "- [ScummVM Wiki](https://wiki.scummvm.org/index.php?title={$this->getGame()->getDataFiles()})";
            }
            $links[] = $wikiLink . " (includes list of required data files)";
        }
        $wikipediaPage = $this->getGame()->getWikipediaPage();
        if ($wikipediaPage) {
            // If we have a full URL, such as for a non-English Wikipedia page, use that
            // Otherwise, assume it's a page for English Wikipedia
            if (str_starts_with($wikipediaPage, "https://")) {
                $links[] = "- [Wikipedia]({$this->getGame()->getWikipediaPage()})";
            } else {
                $links[] = "- [Wikipedia](https://en.wikipedia.org/wiki/{$this->getGame()->getWikipediaPage()})";
            }
        }
        if ($links) {
            $notes .= "\n\n### Links\n";
            $notes .= join("\n", $links);
        }

        $availableSites = [];
        $gogId = $this->getGame()->getGogId();
        if ($gogId) {
            $availableSites[] = "- [GOG.com](" . GOG_URL_PREFIX . $gogId . GOG_URL_SUFFIX . ") (affiliate link)";
        }
        $steamId = $this->getGame()->getSteamId();
        if ($steamId) {
            $availableSites[] = "- [Steam](" . STEAM_URL_PREFIX . $steamId. ")";
        }
        // Additional stores could include the ScummVM Freeware Games page
        $additionalStores = $this->getGame()->getAdditionalStores();
        if ($additionalStores) {
            $availableSites[] = $additionalStores;
        }
        if ($availableSites) {
            $notes .= "\n\n### Available At\n";
            $notes .= "The ScummVM project does not recommend any individual supplier of games. This list is for reference purposes only.\n";
            $notes .= join("\n", $availableSites);
        }

        $config = \HTMLPurifier_Config::createDefault();
        $purifier = new \HTMLPurifier($config);
        $parsedown = new \Parsedown();
        $notes = $parsedown->text($notes);
        $notes = $purifier->purify($notes);
        return $notes;
    }
}
