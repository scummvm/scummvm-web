<?php
namespace ScummVM\Models;

use ScummVM\Objects\DownloadsSection;
use ScummVM\XMLParser;

/**
 * The GameDownloadsModel will produce DownloadsSection objects.
 */
class GameDownloadsModel
{
    /* Get all download entries. */
    public function getAllDownloads()
    {
        $fname = DIR_DATA . '/games.xml';
        /* Now parse the data. */
        $parser = new XMLParser();
        $parsedData = $parser->parseByFilename($fname);
        $sections = array();
        foreach (array_values($parsedData['downloads']['section']) as $value) {
            $sections[] = new DownloadsSection($value);
        }
        return $sections;
    }

    /* Get all sections and their anchors. */
    public function getAllSections()
    {
        /* Get the list with all downloads/sections. */
        $downloads = self::getAllDownloads();
        $sections = array();
        foreach ($downloads as $dsection) {
            if ($dsection->getAnchor() != '' && $dsection->getTitle() != '') {
                $sections[] = array(
                    'title' => $dsection->getTitle(),
                    'anchor' => $dsection->getAnchor(),
                );
            }
            foreach ($dsection->getSubSections() as $dsubsection) {
                $title = $dsubsection->getTitle();
                /**
                 * If there is no title for this subsection, use the section
                 * title instead.
                 */
                if (empty($title)) {
                    $title = $dsection->getTitle();
                }
                $anchor = $dsubsection->getAnchor();
                if (!empty($anchor)) {
                    $sections[] = array(
                        'title' => $title,
                        'anchor' => $anchor,
                    );
                }
            }
        }
        return $sections;
    }
}
