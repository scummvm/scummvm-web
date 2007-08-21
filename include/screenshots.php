<?php

function screenshot_path ($id) {
	global $scr_table;
	return $scr_table[$id]["path"];
}

function screenshot_thumb_path ($id) {
	global $scr_table;
	return $scr_table[$id]["thumb"];
}

function screenshot_caption ($id) {
	global $scr_table;
	return $scr_table[$id]["caption"];
}

function screenshot_previewer_link ($id, $content) {
	// We use a height of 483 instead of 480 to workaround something which appears to be a bug in Mozilla?
	$result =
	"<a href=\"javascript:window.open('screenshots.php?screenshotID='+" . $id . ",'scummvm_screenshot_viewer','menubar=no,scrollbars=no,status=no,width=640,height=483').focus()\"" .
	    " onMouseOver=\"window.status='Click to View Full Size Image';return true;\"".
	    " onMouseOut=\"window.status='';return true;\">" .
		$content .
	"</a>";

	return $result;
}

function read_screenshot_list($fname) {
	global $screenshots;
	global $scrcatnums;
	global $scr_table;

	global $file_root;

	if(!is_readable($fname)) {
		echo "No read permission for $fname !";
		exit;
	}

	@$fp = fopen($fname, 'r');
	if(!$fp) {
		echo "Could not open file $fname !";
		exit;
	}

	$screenshots = array();
	$scrcatnums = array();
	$scr_table = array();

	while (!feof($fp)) {
		$line = trim(fgets($fp));
		if (strlen($line) == 0) {
			// Skip empty lines
		} else if ($line[0] == "#") {
			// Skip comments
		} else {
			$data = explode('|', $line);

			// Compute an "id" consisting of category, subcategory and running number.
			$id = $data[0]."_".$data[1]."_".$data[2];

			// Push the three-number-id into an array (mainly used for selecting random screenshots)
			// FIXME/TODO: Just use the filename here? I.e. $data[3]
			array_push($screenshots, $id);
			
			// Store the screenshot caption from $data[4]
			$scr_table[$id] = array("caption" => $data[4],
						"path" => $file_root . "/screenshots/" . $data[3] . "-full.png",
						"thumb" => $file_root . "/screenshots/" . $data[3] . ".jpg"
					);

			// Insert into a table of screenshots which is indexed by category & subcategory.
			if (!isset($scrcatnums[$data[0]][$data[1]]))
				$scrcatnums[$data[0]][$data[1]] = array();
			array_push($scrcatnums[$data[0]][$data[1]], $id);
		}
	}

	fclose($fp);
}

read_screenshot_list($file_root . "/screenshots/screenshots.csv");

?>
