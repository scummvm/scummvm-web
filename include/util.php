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
function get_files ($dir, $filter = null)
{
    // read dir
    $files = array();
    $d = opendir($dir);
    while($entry = readdir($d))
    {
    	if ($filter)
	{
	    if(!eregi("(.+)\\.".$filter, $entry))
	        continue;
	}
    	array_push($files, $entry);
    }
    closedir($d);
    
    //sort dir
    sort($files);
    
    return $files;
}

?>
