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
<td align=center valign=top width="120">

<?

	$g = new htmlmenu("Main Menu");

	$g->add("Home", $file_root);
	$g->add("FAQ", $file_root."/faq.php");
	$g->add("ScreenShots", $file_root."/screenshots.php");
	$g->add("Compatibility", $file_root."/compatibility.php");
	$g->add("Downloads", $file_root."/downloads.php");

	$g->done();


	$g = new htmlmenu("SourceForge Menu");

	$g->add("Project Home", "http://sourceforge.net/projects/scummvm/");
	$g->add("Forums", "http://sourceforge.net/forum/?group_id=37116");
	$g->add("Bug Tracking", "http://sourceforge.net/tracker/?atid=418820&group_id=37116&func=browse");
	$g->add("Daily Snapshots", "http://scummvm.sourceforge.net/daily/");
	$g->add("CVS Tree", "http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/scummvm/scummvm/");

	$g->done();      

	$g = new htmlmenu("Misc. Menu");

	$g->add("Links", $file_root."/links.php");
	$g->add("Contact", $file_root."/contact.php");

	$g->done("",'<img src="'.$file_root.'/images/hangmonk.gif" border=0 alt="monkey">');
 
?>
	<p>&nbsp;</p>
	
	<p align="center">
	  <a href="http://sourceforge.net"><img src="http://sourceforge.net/sflogo.php?group_id=37116"
	  width="88" height="31" border="0" alt="SourceForge"></a>
	</p>

</td>
<td width="100%" valign="top">

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
