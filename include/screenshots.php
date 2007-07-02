<?php

function screenshot_path ($id) {
	global $file_root;
	return $file_root . "/screenshots/bigscummvm_" . $id . ".png";
}

function screenshot_thumb_path ($id) {
	global $file_root;
	return $file_root . "/screenshots/scummvm_" . $id . ".jpg";
}

function screenshot_caption ($id) {
	global $scrcaption;
	return $scrcaption[$id];
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
	global $scrcaption;

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
	$scrcaption = array();

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
			$scrcaption[$id] = $data[4];

			// Insert into a table of screenshots which is indexed by category & subcategory.
			if (!isset($scrcatnums[$data[0]][$data[1]]))
				$scrcatnums[$data[0]][$data[1]] = array();
			array_push($scrcatnums[$data[0]][$data[1]], $id);
		}
	}

	fclose($fp);
}

read_screenshot_list("screenshots/screenshots.csv");

?>
