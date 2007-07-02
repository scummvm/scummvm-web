<?php
$file_root = ".";

// load libraries
require($file_root."/include/"."incl.php");
require($file_root."/include/"."scr-categories.php");
require($file_root."/include/"."news.php");

html_page_header('ScummVM :: Home', array("index.css"));

$shownews = $HTTP_GET_VARS['shownews'];

// display welcome table
// don't show this if we are in news mode
if (!$shownews)
{

// counter vars
srand((double) microtime() * 1000000);

// Make LEC games appear in 60% of total shots
$lastLECshot = 55;
$randPart = rand(0, 10);

if ($randPart < 6) {
  $randImg = rand(0, $lastLECshot - 1);
} else {
  $randImg = $lastLECshot + rand(0, count($screenshots) - $lastLECshot - 1);
}
?>

<script type="text/javascript">

<?php
  echo "screenshotIds = [\n";
  foreach ($screenshots as $s) {
    echo " [\"$s\", \"" . screenshot_thumb_path($s) . "\"],\n";
  }
  echo "];\n";

  echo "var curScreenshotId = $randImg;\n";

?>

function scrshot_jn(n) {
  curScreenshotId += n;
  if (curScreenshotId >= screenshotIds.length) curScreenshotId = 0;
  if (curScreenshotId < 0) curScreenshotId = screenshotIds.length-1;

  document['curScreenshot'].src = screenshotIds[curScreenshotId][1];
}
</script>

			<table class="intro" cellspacing="0" style="margin-bottom:8px;">
			<tr>
				<td class="sshots">
<table width="100%" cellspacing="0"><tr><td>
	<table width="100%" cellspacing="0"><tr>
	<td class="tlc">&nbsp;</td>
	<td class="heading"><h2><?php
 if($isOpera)
   shadowed_text("Screenshots", '#356a02', '#ffffff', 'shadow-text-em');
 else
   shadowed_text("Screenshots", '#356a02', '#ffffff');
 ?></h2></td>
	<td class="trc">&nbsp;</td>
	</tr></table>
</td></tr>
<tr><td class="content-wrap">
<table border="0" cellpadding="0" cellspacing="0" align="center">
<tr><td>
<?php
echo screenshot_previewer_link("screenshotIds[curScreenshotId][0]", 
	'<img src="' . screenshot_thumb_path($screenshots[$randImg]) . '" width=128 height=96 '.
	'style="margin: 5px" ' .
	'name="curScreenshot" title="Click to view Full Size" alt="Random screenshot">');
?>
	</td></tr>
</table>					
</td></tr>
<tr><td class="foot">
<table width="100%" cellspacing="0" cellpadding="0"><tr>
<td class="blc"></td>
<td class="nav-prev">
<?php
  echo '<a href="javascript:scrshot_jn(-1);">&lt;&lt; previous</a>&nbsp;</td>';
?>
<td class="nav-next">&nbsp;
<?php
  echo '<a href="javascript:scrshot_jn(+1);">next &gt;&gt;</a>&nbsp;</td>';
?>
<td class="brc"></td>
</tr></table></td></tr>
</table>
				</td>
<td class="intro">
<table width="100%" cellspacing="0" cellpadding="0" >
<tr><td>
	<table width="100%" cellspacing="0"><tr>
	<td class="tlc">&nbsp;</td>
	<td style="background:url('images/header-background.gif')"><h2><?php
shadowed_text("What Is ScummVM?", '#356a02', '#ffffff');
?></h2>
	<td class="trc">&nbsp;</td>
	</tr></table>
</td></tr>
<tr><td class="content">
<br>
<p>ScummVM is a program which allows you to run certain classic graphical point-and-click adventure
games, provided you already have their data files. The clever part about this: ScummVM just replaces
the executables shipped with the game, allowing you to play them on systems for which they were never designed!
</p>
<p>
Some of the adventures ScummVM supports include <a href="http://www.adventuresoft.com">Adventure Soft</a>'s
<i>Simon the Sorcerer</i> 1 and 2; <a href="http://www.revolution.co.uk">Revolution</a>'s
<i>Beneath A Steel Sky</i>, <i>Broken Sword 1</i> and <i>Broken Sword 2</i>;
<i>Flight of the Amazon Queen</i>;
<a href="http://www.wyrmkeep.com/ite/">Wyrmkeep</a>'s <i>Inherit the Earth</i>;
Coktel Vision's <i>Gobliiins</i>; Westwood Studios' <i>The Legend of Kyrandia</i> 
and games based on <a href="http://www.lucasarts.com">LucasArts</a>'
<span style="color: green">SCUMM</span> <span style="color: #666666">(<i>Script Creation Utility for Maniac
Mansion</i>)</span> system such as <i>Monkey Island</i>, <i>Day of the Tentacle</i>, <i>Sam and Max</i> and more.
You can find a thorough list with details on which games are supported and how well on the <a href="compatibility.php">compatibility page</a>. ScummVM is continually improving, so check back often.
</p>

<p>
Among the systems on which you can play those games are Windows, Linux, Mac OS X, Dreamcast, PocketPC,
PalmOS, AmigaOS, BeOS, OS/2, PSP, PS2, SymbianOS/EPOC and many more...
</p>
<p>
Our forum and IRC channel, <a href="irc://irc.freenode.net/scummvm">#scummvm on
irc.freenode.net</a>, are open for comments and suggestions. Please read our <a href="http://www.scummvm.org/faq.php">FAQ</a>
before posting.
</p>
</td></tr>
<tr>
	<td><table width="100%" cellspacing="0" cellpadding="0"><tr>
	<td class="blc">&nbsp;</td>
	<td class="bm">&nbsp;</td>
	<td class="brc">&nbsp;</td>
	</tr></table></td>
</tr>
</table>
</td></tr>
</table>

<?php

}

html_content_begin('Latest Developments');

// loop and display news
if ($shownews) {
  $news = list_latest_news(-1);
} else {
  $news = list_latest_news(4);
}

function displayNewsItem($item) {
  // Display news item
  echo '<div class="par-item">'.
	 '<div class="par-head">'.
	   '<a name="' . date("Y-m-d", $item["date"]) . '"></a>'.
	    '<a href="http://www.scummvm.org/?shownews=' . $item["filename"] . '">'.
	      '<span class="newsdate">' . date("M. jS, Y", $item["date"]) . "</span>: ".
           $item["title"].
        '</a>'.
	 '</div>'.
         '<div class="par-content">'.
		 	 '<div class="news-author">Posted by '.$item["author"]."</div> ".
  		$item["img"].
		$item["body"].
	 '</div>'.
       '</div>';
}

if (!$shownews or $shownews == "archive") {
	while (list($key,$item) = each($news)) {
	  // Display news item
	  displayNewsItem($item);
	}
} else if ($news[$shownews] != "") {
	displayNewsItem($news[$shownews]);
} else {
	echo "ERROR";
}

// Show 'More News...' link, unless we are already in the showsnews mode.
if (!$shownews) {
  echo '<p class="bottom-link"><a href="?shownews=archive">More News...</a></p>'."\n";
}

html_content_end();
html_page_footer();

?>
