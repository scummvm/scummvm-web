<?php

function sidebar_start () {
  
    global $file_root;

?>
<td class="menus">
<?php

   $g = new htmlmenu("Main Menu", "menu-main");
    
    $g->add("Home", $file_root);
    $g->add("Screenshots", $file_root."/screenshots.php");
    $g->add("Forums", "http://forums.scummvm.org/");
    $g->add("Downloads", $file_root."/downloads.php");
    $g->add("Donate to ScummVM", "http://sourceforge.net/donate/index.php?group_id=37116");

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
    $g->add("Feature Requests", "http://sourceforge.net/tracker/?group_id=37116&amp;atid=418823");
    $g->add("Daily Snapshots", "downloads.php#SVN");
    $g->add("Subversion Tree", "http://scummvm.svn.sourceforge.net/viewvc/scummvm/scummvm/trunk/");
    $g->done();      

    $g = new htmlmenu("Misc. Menu", "menu-misc", '<img src="'.$file_root.'/images/hangmonk.gif" alt="monkey" align="right" width="55" height="57"><a href="http://sourceforge.net/donate/index.php?group_id=37116"><img src="http://images.sourceforge.net/images/project-support.jpg" width="88" height="32" border="0" alt="Support This Project"> </a><br/><br/><br/><br/><br/><a href="http://www.gog.com/en/frontpage/pp/22d200f8670dbdb3e253a90eee5098477c95c23d"><img src="'.$file_root.'/images/GOG_button.jpg" alt="Buy with GOG.com" align="left" width="134" height="41"></a>
');

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

<?php
}

?>
