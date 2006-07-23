<?php
$file_root = ".";

// load libraries
require($file_root."/include/"."incl.php");
require($file_root."/include/"."news.php");

header("Content-type: text/xml");
?>
<rss version="2.0">
    <channel>
        <title>ScummVM news</title>
        <link>http://www.scummvm.org/</link>
        <description>ScummVM is a cross-platform interpreter for several point-and-click adventure engines. This includes all SCUMM-based adventures by LucasArts, Simon the Sorcerer 1&amp;2 by AdventureSoft, Beneath a Steel Sky and Broken Sword 1&amp;2 by Revolution, and many more.</description>
        <language>en</language>

<?php

// Fetch news (only show the first 5 records)
$news = list_latest_news(5);

// Display news items
while (list($key,$item) = each($news)) {
  echo '<item>'.
	 '<title>'.htmlentities($item["title"]).'</title>'.
	 '<link>http://www.scummvm.org/?shownews=archive#'.date("Y-m-d", $item["date"]).'</link>'.
	 '<description>'.htmlentities($item["body"]).'</description>'.
	 '<pubDate>'.date("r", $item["date"]).'</pubDate>'.
       '</item>';
} // end of news loop
?>

  </channel>
</rss>
