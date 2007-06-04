<?php

function screenshot_path ($id) {
  global $file_root;
  return $file_root . "/screenshots/big_scummvm_" . $id . ".png";
}

function screenshot_thumb_path ($id) {
  global $file_root;
  return $file_root . "/screenshots/scummvm_" . $id . ".jpg";
}

function screenshot_caption ($id) {
  global $file_root;
  return implode("", file($file_root."/screenshots/scummvm_".$id.".txt"));
}

// Grab list of images from screenshot dir
// and loop through them and add to $screenshots array
$screenshots = array();
$scrcatnums = array();
$tmp = get_files($file_root."/screenshots","png");
foreach ($tmp as $image) {

  // Parse the ID of the screenshot in the file name, consisting of three numbers:
  // 1) the "broad" category
  // 2) the game
  // 3) sequential number, used to distinguish shots of a single game
  preg_match("/bigscummvm_(\d+)_(\d+)_(\d+).png/", $image, $cats);
  $num = $cats[3];

  // Push the three-number-id into an array (mainly used for selecting random screenshots)  
  array_push($screenshots,$cats[1]."_".$cats[2]."_".$cats[3]);

  // Update scrcatnums map
  if (!array_key_exists($cats[1], $scrcatnums) or
      !array_key_exists($cats[2], $scrcatnums[$cats[1]])) {
    $scrcatnums[$cats[1]][$cats[2]] = 0;
  }

  if ($scrcatnums[$cats[1]][$cats[2]] < $num + 1)
    $scrcatnums[$cats[1]][$cats[2]] = $num + 1;
}

?>
