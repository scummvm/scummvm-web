<?php
$file_root = ".";

// load libraries
require($file_root."/include/"."incl.php");
require($file_root."/include/"."news.php");

header("Content-type: text/xml");
?>
<rss version="2.0">
    <channel>
        <title>ScummVM</title>
        <link>http://www.scummvm.org/</link>
        <description>ScummVM - http://www.scummvm.org/</description>
        <language>en</language>

<?php

// Fetch news (only show the first 5 records)
$news = list_latest_news(5);

// Display news items
while (list($key,$item) = each($news)) {
  echo '<item>'.
	 '<title>'.htmlentities($item["title"]).'</title>'.
	 '<link>http://www.scummvm.org/index.php#'.date("Y-m-d", $item["date"]).'</link>'.
	 '<description>'.htmlentities($item["body"]).'</description>'.
	 '<pubDate>'.date("r", $item["date"]).'</pubDate>'.
       '</item>';
} // end of news loop
?>

  </channel>
</rss>
