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
	<h1>Website Revamp contest poll -- closed, draven declared winner</h1>
	
	<p>The three finalists of the website revamp contest can be seen here. The contest was won by draven, you can see the final standings below</p>
	
	<center>
	<table cellpadding="10" cellspacing="10">
	<tr>
	<td align="center"><a href="arturom.jpg" target="_blank"><img src="arturom-thumb.jpg" height="120" width="120" alt="arturom"><br>arturom</a></td>
	<td align="center"><a href="draven.jpg" target="_blank"><img src="draven-thumb.jpg" height="120" width="120" alt="draven"><br>draven</a></td>
	<td align="center"><a href="jeanm.png" target="_blank"><img src="jeanm-thumb.png" height="120" width="120" alt="jeanm"><br>jeanm</a></td>
	</tr>
	
<tr><td colspan="3" align="center">

<table border="0" bgcolor="#EEEEEE" cellspacing="0" cellpadding="3">
	<tr>
		<td colspan="2"><b>Which design do you prefer for the new ScummVM website?</b></td>
		<td colspan="1">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
		<td valign="bottom" align="center">
			<b>Votes</b></td>
	</tr>
	<tr>
		<td align="right">
			I just love arturom!</td>
		<td align="left">
			<small><img src="Redbar.gif" height="12" width="36">&nbsp;12%</small></td>
		<td align="right">
			165</td>
	</tr>
	<tr>
		<td align="right">
			Oh, draven is *sooo* cool!</td>
		<td align="left">
			<small><img src="Orangebar.gif" height="12" width="166">&nbsp;55%</small></td>
		<td align="right">
			769</td>
	</tr>
	<tr>
		<td align="right">
			The one and only choice is ... jeanm!</td>
		<td align="left">
			<small><img src="Yellowbar.gif" height="12" width="65">&nbsp;21%</small></td>
		<td align="right">
			299</td>
	</tr>
	<tr>
		<td align="right">
			The old website is kinda cute... so ... green... and purple...</td>
		<td align="left">
			<small><img src="Greenbar.gif" height="12" width="37">&nbsp;12%</small></td>
		<td align="right">
			166</td>
	</tr>
	<tr>
		<td colspan="3">
			&nbsp;</td>
	</tr>
	<tr>
		<td colspan="3" align="right">
			<b>1,399 votes total</b></td>
	</tr>
</table>


</td></tr>
	</table>
</center>


<?

echo html_round_frame_end("&nbsp;");

// end of html
sidebar_end();
html_footer();

?>
