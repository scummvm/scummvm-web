<?php
$file_root = ".";

// load libraries
require($file_root."/include/"."incl.php");
require($file_root."/include/"."news.php");


header("Content-type: application/atom+xml");
?>
<feed xml:lang="en" xml:base="http://<?php echo $_SERVER['SERVER_NAME'];?>/" xmlns="http://www.w3.org/2005/Atom">
    <id>tag:scummvm.org,2006:news/atom</id>
    <title>ScummVM news</title>
    <link rel="self" href="http://<?php echo $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];?>"/>

    <author>

        <name>ScummVM team</name>

        <uri>http://scummvm.org/</uri>

    </author>

<?php

// Fetch news (only show the first 5 records)
$news = list_latest_news(5);

// Get date of latest (first) item
$published = date("Y-m-d\Th:i:s\Z", $news[0]["date"] - date("Z", $news[0]["date"]));

echo "<updated>$published</updated>";

// loop and gather news
$newslist = "";
while (list($key,$item) = each($news)) {
  // Display news item
  $newslist .= 

       '<entry>'.
	 '<title type="html">'.htmlentities($item["title"]).'</title>'.

         '<id>tag:scummvm.org,2006:news/atom/'.$item["date"].'</id>'.
	 '<link rel="alternate">http://scummvm.org/?shownews=archive#'.date("Y-m-d", $item["date"]).'</link>'.
	 '<content type="html">'.htmlentities($item["body"]).'</content>'.
	 '<published>'.date("Y-m-d\Th:i:s\Z", $item["date"] - date("Z", $item["date"])).'</published>'.

         '<author><name>'.$item["author"].'</name></author>'.
       '</entry>';
} // end of news loop

echo $newslist;

?>
</feed>
