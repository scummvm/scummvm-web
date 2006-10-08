<?php
$file_root = ".";

// load specific libraries
require($file_root."/include/"."util.php");
require($file_root."/include/"."news.php");

header("Content-Type: text/xml; charset=UTF-8");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\n";
?>
<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/">
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
  $news_url = "http://www.scummvm.org/?shownews=archive#".date("Y-m-d",$item["date"]);
  echo "\t\t<item>\n";
  echo "\t\t\t<title><![CDATA[".$item["title"]."]]></title>\n";
  echo "\t\t\t<description><![CDATA[\n".$item["body"]."\n\t\t\t]]></description>\n";
  echo "\t\t\t<pubDate>".date("r",$item["date"])."</pubDate>\n";
  echo "\t\t\t<author>nospam@scummvm.org (".$item["author"].")</author>\n";
  echo "\t\t\t<guid isPermaLink=\"true\">".$news_url."</guid>\n";
  echo "\t\t\t<link>".$news_url."</link>\n";
  echo "\t\t</item>\n";
} // end of news loop
?>

  </channel>
</rss>
