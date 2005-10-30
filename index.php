<?

/*
 * Index Page for ScummVM
 * by Jeremy Newman <jnewman@dracowulf.com>
 *
 */

// set this for position of this file relative
$file_root = ".";

// load libraries
require($file_root."/include/"."incl.php");
require($file_root."/include/"."screenshots.php");

// start of html
html_header("ScummVM", '<script src="'.$file_root.'/screenshots.js" type="text/javascript"></script>');
sidebar_start();

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
  $randImg = $lastLECshot + rand(0, $screenshots_count - $lastLECshot - 1);
}

echo html_round_frame_start("About ScummVM","");
?>
	<script type="text/javascript">
	<!--
	i_jn = <?=$randImg?>;
	//-->
	</script>

	<table width="100%" border=0 cellpadding=10 cellspacing=0>
	<tr valign="top">
	  <td>
		<h1>What is <span style="color: green">Scumm</span>VM?</h1>

		<p>
		ScummVM is a program which allows you to run certain classic graphical point-and-click adventure
		games, provided you already have their data files. The clever part about this: ScummVM just replaces
		the executables shipped with the game, allowing you to play them on systems for which they were never designed!
		</p>
		<p>
		ScummVM lets you run these adventures: <a href="http://www.adventuresoft.com">Adventure Soft</a>'s
		<i>Simon the Sorcerer</i> 1 and 2; <a href="http://www.revolution.co.uk">Revolution</a>'s
		<i>Beneath A Steel Sky</i>, <i>Broken Sword 1</i> and <i>Broken Sword 2</i>;
		<i>Flight of the Amazon Queen</i>;
		<a href="http://www.wyrmkeep.com/ite/">Wyrmkeep</a>'s <i>Inherit the Earth</i>;
		Coktel Vision's <i>Gobliiins</i>
		and games based on <a href="http://www.lucasarts.com">LucasArts</a>'
		<span style="color: green">SCUMM</span> <span style="color: #666666">(<i>Script Creation Utility for Maniac
		Mansion</i>)</span> system. <span style="color: green">SCUMM</span> is used for many games,
		including <i>Monkey Island</i>, <i>Day of the Tentacle</i>, <i>Sam and Max</i> and more.
		Compatibility with supported games is continually improving, so check back often.
		</p>
		<p>
		Among the systems on which you can play those games are Windows, Linux, Mac OS X, Dreamcast, PocketPC,
		PalmOS, AmigaOS, BeOS, and many more...
		</p>
		<p>
		Our forum and IRC channel, <a href="irc://irc.freenode.net/scummvm">#scummvm on
		irc.freenode.net</a>, are open for comments and suggestions. Please read our <a href="faq.php">FAQ</a>
		before posting, particularly regarding support for other adventure games.
		</p>
	  </td>
	  <td>
		<table border=0 cellpadding=0 cellspacing=0>
		<tr><td colspan="3">
			<!-- We use a height of 483 instead of 480 to workaround something which
			  appears to be a bug in Mozilla? -->
			<a href="javascript:openWin('./screenshots/big_scummvm_'+i_jn+'.png','scummvm',640,483);"
			onMouseOver="window.status='Click to View Full Size Image';return true;"
			onMouseOut="window.status='';return true;"><img
			src="<?=screenshot_thumb_path($randImg)?>" width="<?=$thumb_w?>" height="<?=$thumb_h?>"
			style="margin: 5px"
			name="img_jn" alt="Click to view Full Size"></a>
		</td></tr>
		<tr>
			<td align=left>
			  <a href="javascript:scrshot_jn(<?=$screenshots_count?>,-1);">&lt;&lt; Previous</a>
			</td>
			<td></td>
			<td align=right>
			  <a href="javascript:scrshot_jn(<?=$screenshots_count?>,+1);">Next &gt;&gt;</a>
			</td>
		</tr>
		</table>
	  </td>
	</tr>
	</table>
<?
echo html_round_frame_end("&nbsp;"),html_br();
}
// end of welcome table

//display News
echo html_round_frame_start("Latest Developments","");
echo html_frame_start("","100%",1,1);

// get list of news items
$news = get_files($file_root."/news","xml");
$news = array_reverse ($news);

// loop and display news
$c = 0;
while (list($key,$item) = each($news))
{
	$c++;
	
	// Load news item (it's in a pseudo XML format).
	$file = $file_root."/news/".$item;
	if (file_exists($file))
	{ 
		$fp = @fopen($file, "r");
		$data = fread($fp, filesize($file));
		@fclose($fp);

		$news_date = "";
		if (eregi("<DATE>(.*)</DATE>", $data, $out))
		{
			$news_date = $out[1];
		}

		$news_author = "";
		if (eregi("<AUTHOR>(.*)</AUTHOR>", $data, $out))
		{
			$news_author = "Posted by ".$out[1];
		}

		$news_title = "";
		if (eregi("<NAME>(.*)</NAME>", $data, $out))
		{
			$news_title = $out[1];
		}

		$news_img = "";
		if (eregi("<IMG>(.*)</IMG>", $data, $out))
		{
			$news_img = $out[1];
		}

		$news_body = "";
		if (eregi("<BODY>(.*)</BODY>", $data, $out))
		{
			$news_body = $out[1];
		}
	}
	
	// Display news item
	echo html_frame_tr(
			    html_frame_td(
								'<div class="news-item">'.
									'<div class="news-header">'.
										'<span class="date">'.$news_date."</span>: ".
										$news_title.
									'</div>'.
									'<span class="news-author">'.$news_author."</span> ".
									$news_img.
									'<div class="news-body">'.$news_body.'</div>'.
								'</div>'
			                 )
	                  );
	
	
	// Only show first five records, unless we are in "news" mode
	if ($c == 4 && !$shownews)
	{
		echo html_frame_tr(
			           html_frame_td(
			                         '<p>[<a href="?shownews=archive">More News...</a>]</p>'."\n"
					        )
				  );
		break;
	}
} // end of news loop

echo html_frame_end();
echo html_round_frame_end("&nbsp;");
//end of news display

// end of html
sidebar_end();
html_footer();

?>
