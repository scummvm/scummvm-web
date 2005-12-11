<?

function sidebar_start () {
  
    global $file_root;

?>
<td class="menus">
<?

   $g = new htmlmenu("Main Menu", "menu-main");
    
    $g->add("Home", $file_root);
    $g->add("ScreenShots", $file_root."/screenshots.php");
    $g->add("Forums", "http://forums.scummvm.org/");
    $g->add("Downloads", $file_root."/downloads.php");

    $g->done();

    $g = new htmlmenu("Documentation", "menu-docs");
    $g->add("FAQ", $file_root."/faq.php");
    $g->add("Documentation", $file_root."/documentation.php");
    $g->add("Compatibility", $file_root."/compatibility.php");
    $g->add("Wiki", "http://wiki.scummvm.org/");
    $g->add("Credits", $file_root."/credits.php");
    
    $g->done();

    $g = new htmlmenu("SourceForge Menu", "menu-sf");

    $g->add("Project Home", "http://sourceforge.net/projects/scummvm/");
    $g->add("Bug Tracking", "http://sourceforge.net/tracker/?group_id=37116&amp;atid=418820");
    $g->add("Daily Snapshots", "/daily/");
    $g->add("CVS Tree", "http://cvs.sourceforge.net/viewcvs.py/scummvm/scummvm/");

    $g->done();      

    $g = new htmlmenu("Misc. Menu", "menu-misc", '<img src="'.$file_root.'/images/hangmonk.gif" alt="monkey" align="right" width="55" height=57">');

    $g->add("Subprojects", $file_root."/subprojects.php");
    $g->add("Demos", $file_root."/demos.php");
    $g->add("Press Coverage", $file_root."/press.php");
    $g->add("Contact", $file_root."/contact.php");
    $g->add("Links", $file_root."/links.php");
    
    $g->done();
}

function sidebar_end ()
{
?>

</td>

<?
}

?>
