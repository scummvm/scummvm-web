<?php

function screenshot_path ($id) {
  global $file_root;
  return $file_root . "/screenshots/big_scummvm_" . $id . ".png";
}

function screenshot_thumb_path ($id) {
  global $file_root;
  return $file_root . "/screenshots/scummvm_" . $id . ".jpg";
}

function screenshot_thumb_from_full ($fname) {
  $t = explode("scummvm_", $fname);
  $t1 = explode(".", $t[1]);

  return screenshot_thumb_path($t1[0]);
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
  array_push($screenshots,$image);
  $cats = explode("_", $image);
  $n = count($cats);
  $t = explode(".", $cats[$n - 1]);
  $num = $t[0];

  if (!array_key_exists($cats[$n - 3], $scrcatnums) or
      !array_key_exists($cats[$n - 2], $scrcatnums[$cats[$n - 3]])) {
    $scrcatnums[$cats[$n - 3]][$cats[$n - 2]] = 0;
  }

  if ($scrcatnums[$cats[$n - 3]][$cats[$n - 2]] < $num + 1)
    $scrcatnums[$cats[$n - 3]][$cats[$n - 2]] = $num + 1;
}
$screenshots_count = count($screenshots);

$thumb_w = 256;
$thumb_h = 192;

?>
