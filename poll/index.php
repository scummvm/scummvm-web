<?

/*
 * Downloads Page for ScummVM
 * by Jeremy Newman <jnewman@dracowulf.com>
 *
 */

// set this for position of this file relative
$file_root = "..";

// load libraries
require($file_root."/include/"."incl.php");

// start of html
html_header("ScummVM :: Website Revamp contest poll");
sidebar_start();

//display welcome table
echo html_round_frame_start("Website Revamp contest poll","");

?>
	<h1>Website Revamp contest poll</h1>
	
	<p>The three finalists of the website revamp contest can be seen here. Keep in mind that those are all design drafts;
	the final web site may look different in some aspects.</p>
	
	<table cellpadding="10" cellspacing="10">
	<tr>
	<td align="center"><a href="arturom.jpg" target="_blank"><img src="arturom-thumb.jpg" height="120" width="120" alt="arturom"><br>arturom</a></td>
	<td align="center"><a href="draven.jpg" target="_blank"><img src="draven-thumb.jpg" height="120" width="120" alt="draven"><br>draven</a></td>
	<td align="center"><a href="jeanm.png" target="_blank"><img src="jeanm-thumb.png" height="120" width="120" alt="jeanm"><br>jeanm</a></td>
	</tr>
	
<tr coslpan=3><td>
<!-- // Begin Pollhost.com Poll Code // -->
<form method=post action=http://poll.pollhost.com/vote.cgi>
<table border=0 width=150 bgcolor=#EEEEEE cellspacing=0 cellpadding=2>
<tr><td colspan=2><font face="Arial" size=-1 color="#000000"><b>Which design do you prefer for the new ScummVM website?</b></td></tr>
<tr><td width=5><input type=radio name=answer value=1></td><td><font face="Arial" size=-1 color="#000000">I just love arturom!</td></tr>
<tr><td width=5><input type=radio name=answer value=2></td><td><font face="Arial" size=-1 color="#000000">Oh, draven is *sooo* cool!</td></tr>
<tr><td width=5><input type=radio name=answer value=3></td><td><font face="Arial" size=-1 color="#000000">The one and only choice is ... jeanm!</td></tr>
<tr><td width=5><input type=radio name=answer value=4></td><td><font face="Arial" size=-1 color="#000000">The old website is kinda cute... so ... green... and purple...</td></tr>
<tr><td colspan=2>
<input type=hidden name=config value="c2N1bW12bQkxMTAzMjk1MDM3CUVFRUVFRQkwMDAwMDAJQXJpYWwJQXNzb3J0ZWQ">
<center><input type=submit value=Vote></center>
</td></tr>
<tr><td bgcolor=#FFFFFF colspan=2 align=right><font face="Arial" size=-2 color="#000000"><a href=http://www.pollhost.com/><font color=#000099>Free polls from Pollhost.com</font></a></td></tr>
</table></form>
<!-- // End Pollhost.com Poll Code // -->
</td></tr>
	</table>


	<p>For techincal reasons, the actual poll is hosted at an
	external location. And somewhat annoyingly, it's adware-driven.
	
	<p>
	One final note: We do not promise anything regarding the outcome of the poll. In particular, we don't guarantee that 
	we'll go along with the user choice made by that poll (for example, if we have reasons to believe that the
	poll was tampered; or if a funny looking cloud makes us believe another choice to be obviously far superior to
	all the others).
	</p>

<?

echo html_round_frame_end("&nbsp;");

// end of html
sidebar_end();
html_footer();

?>
