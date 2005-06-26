<?php

function screenshot_path ($id)
{
	global $file_root;
	return $file_root . "/screenshots/big_scummvm_" . $id . ".png";
}

function screenshot_thumb_path ($id)
{
	global $file_root;
	return $file_root . "/screenshots/scummvm_" . $id . ".jpg";
}

function screenshot_caption ($id)
{
	global $file_root;
	return implode("", file($file_root."/screenshots/scummvm_".$id.".txt"));
}


// Grab list of images from screenshot dir
// and loop through them and add to $screenshots array
$screenshots = array();
$tmp = get_files($file_root."/screenshots","jpg");
while (list($key,$image) = each($tmp))
{
	array_push($screenshots,$image);
}
$screenshots_count = count($screenshots);

$thumb_w = 256;
$thumb_h = 192;

?>