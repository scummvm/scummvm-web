<?

/*
 * SideBar lib for ScummVM
 * by Jeremy Newman <jnewman@dracowulf.com>
 *
 */
  
function sidebar_start ()
{
  
    global $file_root;

?>

<table width="100%" border=0 cellpadding=0 cellspacing=0>
<tr>
<td align=center valign=top>

<?

	$g = new htmlmenu("Main Menu");

	$g->add("Home", $file_root);
	$g->add("FAQ", $file_root."/faq.php");
	$g->add("ScreenShots", $file_root."/screenshots.php");
	$g->add("Compatibility", $file_root."/compatibility.php");
	$g->add("Documentation", $file_root."/documentation.php");
	$g->add("Downloads", $file_root."/downloads.php");

	$g->done();


	$g = new htmlmenu("SourceForge Menu");

	$g->add("Project Home", "http://sourceforge.net/projects/scummvm/");
	$g->add("Forums", "http://sourceforge.net/forum/?group_id=37116");
	$g->add("Bug Tracking", "http://sourceforge.net/tracker/?group_id=37116&amp;atid=418820");
	$g->add("Daily Snapshots", "/daily/");
	$g->add("CVS Tree", "http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/scummvm/scummvm/");

	$g->done();      

	$g = new htmlmenu("Misc. Menu");

	$g->add("Demos", $file_root."/demos.php");
	$g->add("Press", $file_root."/press.php");
	$g->add("Links", $file_root."/links.php");
	$g->add("Credits", $file_root."/credits.php");
	$g->add("Contact", $file_root."/contact.php");

	$g->done('<img src="'.$file_root.'/images/hangmonk.gif" alt="monkey">');
 
?>
	<p>&nbsp;</p>
	
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post"><div>
	<input type="hidden" name="cmd" value="_xclick">
	<input type="hidden" name="business" value="paypal@enderboi.com">
	<input type="hidden" name="item_name" value="ScummVM donation">
	<input type="image" src="<?=$file_root?>/images/ppdonate.gif" name="submit" alt="Donate to ScummVM with PayPal!">
	</div></form>	
	
	<p style="text-align: center">
	  <a href="http://sourceforge.net"><img src="http://sourceforge.net/sflogo.php?group_id=37116"
	  width="88" height="31" alt="SourceForge"></a>
	</p>

</td>
<td valign="top">

<?
}

function sidebar_end ()
{
?>

</td>
</tr>
</table>

<?
}

?>
