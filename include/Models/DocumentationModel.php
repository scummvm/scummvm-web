<?php
require_once('Models/BasicModel.php');
require_once('Objects/Document.php');
/**
 * The DocumentationModel class will generate Document objects.
 */
abstract class DocumentationModel extends BasicModel {
	const ERROR_READING_FILE = 'Failed to load the list of MD5-sums.';

	/* Get all the documents. */
	static public function getAllDocuments() {
		$fname = DIR_DATA . '/documentation.xml';
		$parser = new XMLParser();
		$a = $parser->parseByFilename($fname);
		$entries = array();
		foreach ($a['documentation']['document'] as $key => $value) {
			$entries[] = new Document($value);
		}
		return $entries;
	}

	/**
	 * Get all the MD5 sums as an list.
	 *
	 * The format is as follows (quoted from scumm-md5.txt):
	 *
	 * This file is separated into multiple section. Each section represents a
	 * specific SCUMM gameid, and is started by a special line, which contains
	 * two tab separated fields:
	 * GAMEID <TAB> DESCRIPTION
	 * After this follows an arbitrary number of lines start with a tab. Each
	 * line describes one specific variant of the game. It contains tab
	 * separated data:
	 *  - MD5
	 *  - file size (or -1 if unknown)
	 *  - Language (two letter code)
	 *  - Platform
	 *  - Variant id
	 *    -> optional ID, used in an internal lookup table to distinguish of a
	 *       game.
	 *  - Description
	 *    -> optional short text that will be added to the description displayed
	 *       by ScummVM, and is also visible on our website. Where available,
	 *       use the text printed by 'Ctrl-V', possibly augmented by some extra
	 *       information (e.g. to distinguish 3.5" and 5.25" variants).
	 *  - Extra description
	 *    -> Some additional description text, only shown on the website
	 *  - Source
	 *    -> The source of the information, useful in case it has to be verified
	 */
	static public function getAllMD5Sums() {
		$fname = DIR_DATA . '/scumm-md5.txt';
		$games = array();
		if (!($data = @file_get_contents($fname))) {
			throw new ErrorException(self::ERROR_READING_FILE);
		}
		$gameid = null;
		foreach (explode("\n", $data) as $line) {
			/* Skip comments and empty lines. */
			if (substr($line, 0, 1) == '#' || strlen($line) == 0) {
				continue;
			}
			$tsv = explode("\t", $line);
			/**
			 * If we only got two values, it means we found the start for a game
			 * entry.
			 */
			if (count($tsv) == 2) {
				$gameid = $tsv[0];
				$games[$gameid] = array(
					//'description' => Utils::ampersandEntity($tsv[1]),
					'description' => $tsv[1],
					'md5sums' => array(),
				);
			/* Otherwise we found md5sum data for an open game entry. */
			} else {
				$games[$gameid]['md5sums'][] = array(
					'md5' => $tsv[1],
					'file_size' => $tsv[2],
					'language' => $tsv[3],
					'platform' => $tsv[4],
					'variant_id' => $tsv[5],
					'description' => $tsv[6],
					'extra_description' => $tsv[7],
					'source' => $tsv[8],
				);
			}
		}
		return $games;
	}

	/* Get the last modification date for the MD5 sums document. */
	static public function getMD5SumsDate() {
		return date('F d, Y', @filemtime(DIR_DATA . '/scumm-md5.txt'));
	}
}
?>
