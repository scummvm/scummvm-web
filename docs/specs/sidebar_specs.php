<?

/*
 * SideBar lib for ScummVM
 * by Jeremy Newman <jnewman@dracowulf.com>
 *
 */
  
function sidebar_specs_start ()
{
  
    global $file_root;

?>

<table width="100%" border=0 cellpadding=0 cellspacing=0>
<tr>
<td align=center valign=top width="120">

<?

	$g = new htmlmenu("Contents");
	$g->add("Introduction", $file_root."/docs/specs/"."introduction.php");
	$g->add("CHAR", $file_root."/docs/specs/"."char.php");
	$g->add("AARY", $file_root."/docs/specs/"."aary.php");
	$g->add("SCRP", $file_root."/docs/specs/"."scrp.php");
	$g->add("V5 opcode list", $file_root."/docs/specs/"."scrp-v5.php");
	$g->add("V6 opcode list", $file_root."/docs/specs/"."scrp-v6.php");
	$g->add("Glossary", $file_root."/docs/specs/"."glossary.php");

	$g->done();


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
	$g->add("Bug Tracking", "http://sourceforge.net/tracker/?group_id=37116&atid=418820");
	$g->add("Daily Snapshots", "http://scummvm.sourceforge.net/daily/");
	$g->add("CVS Tree", "http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/scummvm/scummvm/");

	$g->done();      

	$g = new htmlmenu("Misc. Menu");

	$g->add("Links", $file_root."/links.php");
	$g->add("Contact", $file_root."/contact.php");

	$g->done("",'<img src="'.$file_root.'/images/hangmonk.gif" border=0 alt="monkey">');
 
?>
	<p>&nbsp;</p>
	
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
	<input type="hidden" name="cmd" value="_xclick">
	<input type="hidden" name="business" value="paypal@enderboi.com">
	<input type="hidden" name="item_name" value="ScummVM donation">
	<input type="image" src="<?=$file_root?>/images/ppdonate.gif" name="submit" alt="Donate to ScummVM with PayPal!">
	</form>	
	
	<p align="center">
	  <a href="http://sourceforge.net"><img src="http://sourceforge.net/sflogo.php?group_id=37116"
	  width="88" height="31" border="0" alt="SourceForge"></a>
	</p>

</td>
<td width="100%" valign="top">

<?
}

?>
