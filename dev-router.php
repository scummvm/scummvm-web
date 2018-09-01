<?php
if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js|svg)/', basename($_SERVER["REQUEST_URI"]))) {
  return false; // serve the requested resource as-is.
} else {
  $url = str_replace('index.php', '', strtolower($_SERVER['PHP_SELF']));
  $url = trim($url, '/');
  $urlArray = explode("/", $url);

  $_GET['p'] = $urlArray[0];
  switch ($urlArray[0]) {
    case "feeds":
      $_GET['f'] = $urlArray[1];
      break;
    case "compatibility":
      $_GET['v'] = $urlArray[1];
      $_GET['t'] = $urlArray[2];
      break;
    case "news":
      $_GET['d'] = $urlArray[1];
      break;
    case "screenshots":
      $_GET['cat'] = $urlArray[1];
      $_GET['game'] = $urlArray[2];
      $_GET['num'] = $urlArray[3];
      break;
  }

}
$_SERVER['SCRIPT_NAME'] = '/index.php';
require 'index.php';
