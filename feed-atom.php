<?php
$file_root = ".";

// load libraries
require($file_root."/include/"."incl.php");
require($file_root."/include/"."news.php");

header("Content-type: application/atom+xml");
?>
<feed xml:lang="en" xml:base="http://www.scummvm.org/" xmlns="http://www.w3.org/2005/Atom">
    <id>tag:scummvm.org,2006:news/atom</id>
    <title>ScummVM news</title>
    <link rel="self" href="http://<?php echo $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];?>"/>
    <tagline mode="escaped" type="text/html">ScummVM is a cross-platform interpreter for several point-and-click adventure engines. This includes all SCUMM-based adventures by LucasArts, Simon the Sorcerer 1&amp;2 by AdventureSoft, Beneath a Steel Sky and Broken Sword 1&amp;2 by Revolution, and many more.</tagline>
    <author>
        <name>ScummVM team</name>
        <uri>http://www.scummvm.org/</uri>
    </author>

<?php

// Fetch news (only show the first 5 records)
$news = list_latest_news(5);

// Get date of latest (first) item
$published = date("Y-m-d\Th:i:s\Z", $news[0]["date"] - date("Z", $news[0]["date"]));
echo "<updated>$published</updated>";

// Display news item
while (list($key,$item) = each($news)) {
  echo '<entry>'.
	 '<title mode="escaped">'.htmlentities($item["title"]).'</title>'.
     '<id>tag:scummvm.org,2006:news/atom/'.$item["date"].'</id>'.
	 '<link rel="alternate" href="http://www.scummvm.org/?shownews=archive#'.date("Y-m-d", $item["date"]).'" />'.
	 '<content mode="escaped" type="text/html">'.htmlentities($item["body"]).'</content>'.
	 '<published>'.date("Y-m-d\Th:i:s\Z", $item["date"] - date("Z", $item["date"])).'</published>'.
     '<author><name>'.$item["author"].'</name></author>'.
     '</entry>';
} // end of news loop
?>
</feed>
