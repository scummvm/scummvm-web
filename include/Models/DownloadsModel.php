<?php
require_once('Models/BasicModel.php');
require_once('Objects/DSection.php');
require_once('XMLParser.php');
/**
 * The DownloadsModel will produce DSection objects.
 */
abstract class DownloadsModel {
	/* Get all download entries. */
	static public function getAllDownloads() {
		$fname = DIR_DATA . '/downloads.xml';
		/* Now parse the data. */
		$parser = new XMLParser();
		$a = $parser->parseByFilename($fname);
		$sections = array();
		foreach ($a['downloads']['section'] as $key => $value) {
			$sections[] = new DSection($value);
		}
		return $sections;
	}

	/* Get all sections and their anchors. */
	static public function getAllSections() {
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
?>
