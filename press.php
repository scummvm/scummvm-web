<?

/*
 * Press Page
 *
 */

// set this for position of this file relative
$file_root = ".";

// load libraries
require($file_root."/include/"."incl.php");

// start of html
html_header("ScummVM :: Press");
sidebar_start();

//display welcome table
echo html_round_frame_start("Press","98%","",20);

?>
	<p><a href="http://slashdot.org/article.pl?sid=01/11/03/1429247"
	   >Linux SCUMM Interpreter</a>, Slashdot, November 3, 2001
	</p>

	<p><a href="http://slashdot.org/article.pl?sid=02/06/26/1312251"
	   >Lucas Confuses ScummVM With Abandonware</a>, Slashdot, June 26, 2002
	</p>
	
	<p><a href="http://freshmeat.net/articles/view/543/"
	   >Linux Games, Category Review</a>, Freshmeat.net, August 31, 2002
	</p>

	<p><a href="http://happypenguin.org/forums/viewtopic.php?t=549"
	   >And the winners are...</a>, Game Tome, Jan 28, 2003
	</p>

	<p><a href="http://www.scummbar.com/resources/articles/index.php?newssniffer=readarticle&article=22"
	   >Get those old games working again</a>, Scumm Bar, March 7, 2003
	</p>
	
	<p><a href="http://slashdot.org/article.pl?sid=03/04/03/1530224"
	   >Gameboy Advance Clone Superemulator</a>, Slashdot, April 3, 2003
	</p>

	<p><a href="http://www.gamer-nation.co.uk/features/scummvm/index.shtml"
	   >A Deafening Silence</a>, Gamer Nation UK, June 30, 2003
	</p>

	<p><a href="http://games.slashdot.org/article.pl?sid=03/08/02/1235259"
	   >ScummVM 0.5.0 Out, With Some Official Game Support</a>, Slashdot, August 2, 2003
	</p>

	<p><a href="http://linux.oreillynet.com/pub/a/linux/2003/08/21/scummvm.html"
	   >Inside ScummVM: Classic Adventure Engine Overhaul</a>, Oreilly Network, August 21, 2003
	</p>

	<p><a href="http://207.44.176.77/~admin28/zodiacgamer/articles/scummvm.htm"
	   >Chrilith's ScummVM Zodiac Port WIP</a>, Zodiac Gamer, Sepetember 20, 2003
	</p>
	
<?

echo html_round_frame_end("&nbsp;");

// end of html
echo html_p();
sidebar_end();
html_footer();

?>
