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
	</table>
	
	<p><b>Temporarily closed due to cheating :)</b></p>
<!--	<p>For techincal reasons, the actual poll is hosted at an
	external location (the homepage of one of our team members,
	to be precise). And somewhat annoyingly, it's partially german -- but hopefully you'll
	get along anyway, just keep in mind that "Abstimmen" means "Vote" and
	"Ergebnisse zeigen" means "Show results".</p>
	<p><b><a href="http://dev.quendi.de/tinc?key=M64eHnpS" target="_blank">Go to the poll</a></b></p> -->
	
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
