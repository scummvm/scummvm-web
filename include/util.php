<?php

/*
 * util.php -- Misc Util Library for ScummVM
 * by Jeremy Newman <jnewman@dracowulf.com>
 *
 */
 
// format date
function make_date ($time)
{
    return date("F d, Y  H:i:s", $time);
}

// get users ip address
function get_remote_ip ()
{
    global $REMOTE_HOST, $REMOTE_ADDR;

    if($REMOTE_HOST)
	$ip = $REMOTE_HOST;
    else
	$ip = $REMOTE_ADDR;

    return $ip;
}

// add urls to text
function htmlify_urls ($text)
{
    // html-ify urls
    $urlreg = "([a-zA-Z]+://([^\t\r\n ]+))";
    $text = ereg_replace($urlreg, "<a href=\"\\1\"> \\2 </a>", $text);

    $emailreg = "([a-zA-Z0-9_%+.-]+@[^\t\r\n ]+)";
    $text = ereg_replace($emailreg, " <a href='mailto:\\1'>\\1</a>", $text);

    $text = str_replace("\n", "<br>", $text);

    return $text;
}

// open file and display contents of selected tag
function display_xml ($file, $mode = null)
{
    if (!$mode)
        return null;
    if (file_exists($file))
    { 
      $fp = @fopen($file, "r");
      $data = fread($fp, filesize($file));
      @fclose($fp);
      if (eregi("<" . $mode . ">(.*)</" . $mode . ">", $data, $out))
      {
	  return $out[1];
      }
    }
    else
    {
      return null;
    }	
}

// get a list of files in a directory
function get_files ($dir, $filter = null, $filter2 = null) {
  $flt = null;
  if ($filter2)
    $flt = $filter2;
  else if ($filter)
    $flt = "(.+)\\.".$filter;

  // read dir
  $files = array();
  $d = opendir($dir);
  while($entry = readdir($d)) {
    if ($flt) {
      if(!eregi($flt, $entry))
	continue;
    }
    array_push($files, $entry);
  }
  closedir($d);
    
  //sort dir
  sort($files);
    
  return $files;
}

$isOpera = strstr($_SERVER['HTTP_USER_AGENT'], 'Opera');
$isKHTML = strstr($_SERVER['HTTP_USER_AGENT'], 'KHTML');

function shadowed_text ($text, $textcolor, $shadowcolor, $textclass = 'shadow-text') {
  global $isKHTML;

  if ($isKHTML) {
    // Use the CSS3 text-shadow property for Safari and Konqueror
    echo '<span class="shadow-container"><font color="' . $textcolor .
         '" style="text-shadow: 0.1em 0.1em ' . $shadowcolor . '">'.
         $text.'</font></span>';
    return;
  }

  echo '<font color="'.$shadowcolor.'"><span class="shadow-container">'.$text.
    '<font color="'.$textcolor.'" class="'.$textclass.'">'. $text . '</font></span></font>';
}

?>
