<?php
/*
 * Read the $num most recent news items (if $num is -1, then read all),
 * and return them in an array, ordered by date.
 *
 * TODO: It might be more elegant to solve this with a "News" class
 * which could offer extended functionality. I.e. it would allow
 * code to query the total number of news items, would load and cache news items
 * on-demand etc.
 */
function list_latest_news ($num = -1) {
  global $file_root;

  $news_files = get_files($file_root."/news","xml");
  $news_files = array_reverse ($news_files);
  
  $news = array();
  
  // loop and display news
  $c = 0;
  while (list($key,$item) = each($news_files)) {
	// Load news item file
	$file = $file_root."/news/".$item;
	if (!file_exists($file)) {
	  continue;
	}

	$fp = @fopen($file, "r");
	$data = fread($fp, filesize($file));
	@fclose($fp);

	// Parse the (pseudo-XML) contents of the news file.

	$news[$c]["date"] = "";
	if (eregi("<DATE>(.*)</DATE>", $data, $out)) {
	  $news[$c]["date"] = strtotime($out[1]);
	}

	$news[$c]["author"] = "";
	if (eregi("<AUTHOR>(.*)</AUTHOR>", $data, $out)) {
	  $news[$c]["author"] = $out[1];
	}

	$news[$c]["title"] = "";
	if (eregi("<NAME>(.*)</NAME>", $data, $out)) {
	  $news[$c]["title"] = $out[1];
	}

	$news[$c]["img"] = "";
	if (eregi("<IMG>(.*)</IMG>", $data, $out)) {
	  $news[$c]["img"] = $out[1];
	}

	$news[$c]["body"] = "";
	if (eregi("<BODY>(.*)</BODY>", $data, $out)) {
	  $news[$c]["body"] = $out[1];
	}

	$c++;
	
	if ($num >= 0 && $c >= $num) {
	  break;
	}
  }

  return $news;
}
?>