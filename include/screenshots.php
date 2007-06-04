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

function getScr($n) {
  global $categories;
  global $scrcatnums;
  $scr_cats = array();
  $cat0 = 0;
  $cat1 = 0;
  $cat2 = 0;
  $curnum = 0;
  $idx = 0;

  foreach ($categories as $i) {
    foreach ($i->_list as $j)
      array_push($scr_cats, $scrcatnums[$i->_catnum][$j['catnum']]);
    array_push($scr_cats, 0);
  }


  while ($curnum < $n) {
    if ($scr_cats[$idx] == 0) {
      $idx++;
    }

    if ($curnum + $scr_cats[$idx] <= $n) {
      $curnum += $scr_cats[$idx];
      $cat1++;
      $idx++;
    } else {
      $cat2 = $n - $curnum;
      $curnum = $n;
    }
    if ($cat1 >= count($categories[$cat0]->_list)) {
      $cat1 = 0;
      $cat0++;
    }
  }

  return "scummvm_{$categories[$cat0]->_catnum}_{$categories[$cat0]->_list[$cat1]['catnum']}_{$cat2}.jpg";
}


// Grab list of images from screenshot dir
// and loop through them and add to $screenshots array
$screenshots = array();
$scrcatnums = array();
$tmp = get_files($file_root."/screenshots","png");
foreach ($tmp as $image) {

  // Parse the ID of the schot in the file name, consisting of three numbers:
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
