<?

// set this for position of this file relative
$file_root = ".";

// load libraries
require($file_root."/include/"."incl.php");

// start of html
html_page_header('ScummVM :: Contact');

html_content_begin('Contact');

?>
  <div class="par-item">
    <div class="par-intro">
	<p>
	<br>
		<b>Please do not contact the team for questions about using ScummVM. Instead use the
		<a href="http://forums.scummvm.org/">forums</a> or the
		<a href="http://sourceforge.net/tracker/?group_id=37116&auml;atid=418820">bug reporting system</a>!</b><br><br>
	</p>
    </div>
	<br>

<?php html_subhead_start("IRC channel"); ?>

    <div class="par-subhead-content">
	<p>
		The #scummvm IRC channel on <a href="http://freenode.net/irc_servers.shtml">irc.freenode.net</a> is also a good
		place to ask questions. Many ScummVM developers hang out there regularly, as well as many ScummVM users.
	</p>
	<br>

    </div>	

    <?php html_subhead_start("Forums"); ?>

    <div class="par-subhead-content">
	<p>
	We offer several <a href="http://forums.scummvm.org/">forums</a>.
	Use the <a href="http://forums.scummvm.org/viewforum.php?f=2">Help and Support forum</a> if you encounter problems using ScummVM.
	The <a href="http://forums.scummvm.org/viewforum.php?f=1">General discussion forum</a> is, as the name suggests,
	meant for general discussion of any topics somehow related to ScummVM.
  Also there are some platform-specific forums and <a href="http://forums.scummvm.org/viewforum.php?f=8">the Junkyard</a>.
	</p>
	<p><b>Don't forget to read <a href="http://forums.scummvm.org/viewtopic.php?t=17">Forum Rules</a> before your first post.</b></p>
	<br>
	
    </div>	

<?php html_subhead_start("Bug reports, feature requests, patches"); ?>

    <div class="par-subhead-content">
	<p>
	If you think you found a bug, take a look at our <a href="http://sourceforge.net/tracker/?group_id=37116&auml;atid=418820">bug tracker</a>.
	Maybe a similar bug has already been filed, in which case you can add a comment to that bug report. If not, you can submit a new
	bug report, but <b>please carefully read the instructions given on the submit form</b>. And of course, follow them :-)
	</p>
	<p>
	Feature requests should go on our <a href="http://sourceforge.net/tracker/?group_id=37116&auml;atid=418823">feature request tracker</a>
	(again first check if something similar has already been requested).
	</p>
	<p>
	Finally, if you have made a modification to the ScummVM source code and want to see it merged back into the ScummVM main line,
	you can use our <a href="http://sourceforge.net/tracker/?group_id=37116&auml;atid=418822">patch tracker</a> for that. 
	</p>
	<br>
    
    </div>	

<?php html_subhead_start("Mailing lists"); ?>

    <div class="par-subhead-content">
	<p>
	There are three ScummVM related  <a href="http://sourceforge.net/mail/?group_id=37116">mailing lists</a>.
	Two of them are for automated content only. The one where you can send emails to yourself is scummvm-devel.
	</p>
    </div>
  </div>

<?

html_content_end();
html_page_footer();

?>
