<?

/*
 * SideBar lib for ScummVM
 * by Jeremy Newman <jnewman@dracowulf.com>
 *
 */
  
function sidebar_start ($specs_mode = false)
{
  
    global $file_root;

// It would be nice to use a plain simple <div> here, for maximum layout 
// flexibility. Sadly, due to a bug in Internet Explorer 6, we can't do this
// (at least not as long as we want the page to render correctly in IE 6).
// So we resort to using a table with two columns and one row.

?>

<table border=0 cellpadding=0 cellspacing=0><tr><td id=sideBar>

<?

	if ($specs_mode) {
		$g = new htmlmenu("Contents");
		$g->add("Introduction", $file_root."/docs/specs/"."introduction.php");
		$g->add("CHAR", $file_root."/docs/specs/"."char.php");
		$g->add("AARY", $file_root."/docs/specs/"."aary.php");
		$g->add("SCRP", $file_root."/docs/specs/"."scrp.php");
		$g->add("V5 opcode list", $file_root."/docs/specs/"."scrp-v5.php");
		$g->add("V6 opcode list", $file_root."/docs/specs/"."scrp-v6.php");
		$g->add("Glossary", $file_root."/docs/specs/"."glossary.php");
	
		$g->done();
	}


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
	$g->add("CVS Tree", "http://cvs.sourceforge.net/viewcvs.py/scummvm/scummvm/");

	$g->done();      

	$g = new htmlmenu("Misc. Menu");

	$g->add("Demos", $file_root."/demos.php");
	$g->add("Press", $file_root."/press.php");
	$g->add("Links", $file_root."/links.php");
	$g->add("Credits", $file_root."/credits.php");
	$g->add("Contact", $file_root."/contact.php");

	$g->done('<img src="'.$file_root.'/images/hangmonk.gif" alt="monkey">');
 
?>

	<form action="https://www.paypal.com/cgi-bin/webscr" method="post"><div>
	<input type="hidden" name="cmd" value="_xclick">
	<input type="hidden" name="business" value="paypal@enderboi.com">
	<input type="hidden" name="item_name" value="ScummVM donation">
	<input type="image" src="<?=$file_root?>/images/ppdonate.gif" name="submit" alt="Donate to ScummVM with PayPal!">
	</div></form>	
	
	<p>
		<a href="http://sourceforge.net/"><img src="http://sourceforge.net/sflogo.php?group_id=37116" width="88" height="31" alt="SourceForge"></a>
	</p>

	<p>
		<a href="http://validator.w3.org/check/referer"><img src="http://www.w3.org/Icons/valid-html401" width="88" height="31" alt="Valid HTML 4.01!"></a>
	</p> 

	<p>
		<a href="http://jigsaw.w3.org/css-validator/"><img src="http://jigsaw.w3.org/css-validator/images/vcss" width="88" height="31" alt="Valid CSS!" ></a>
	</p>
</td><td id="main">
<?
}

function sidebar_end ()
{
?>

</td></tr></table>

<?
}

?>
