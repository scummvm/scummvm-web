<?

/*
 * Contact Page for ScummVM
 * by Jeremy Newman <jnewman@dracowulf.com>
 *
 */

// set this for position of this file relative
$file_root = ".";

// load libraries
require($file_root."/include/"."incl.php");

// start of html
html_header("ScummVM :: Contact");
sidebar_start();

//display welcome table
echo html_round_frame_start("Contact","98%","",20);

?>
	<h1>Contact</h1>
	<p>
		<b>Please do not contact the team for questions about using ScummVM. Instead use the
		<a href="http://sourceforge.net/forum/?group_id=37116">forums</a> or the
		<a href="http://sourceforge.net/tracker/?group_id=37116&atid=418820">bug reporting system</a>!</b><br>
	</p>
	<br>

	<h2>IRC channel</h2>
	<p>
		The #scummvm IRC channel on <a href="http://freenode.net/irc_servers.shtml">irc.freenode.net</a> is also a good
		place to ask questions. Many ScummVM developers hang out there regularly, as well as many ScummVM users.
	</p>
	<br>
	
	<h2>Forums</h2>
	<p>
	We offer two <a href="http://sourceforge.net/forum/?group_id=37116">forums</a> hosted by SourceForge.net.
	Use the <a href="http://sourceforge.net/forum/forum.php?forum_id=115757">help forum</a> if you encounter problems using ScummVM.
	The <a href="http://sourceforge.net/forum/forum.php?forum_id=115756">open discussion forum</a> is, as the name suggests,
	meant for open discussion of any topics somehow related to ScummVM.
	</p>
	<br>
	
	<h2>Bug reports, feature requests, patches</h2>
	<p>
	If you think you found a bug, take a look at our <a href="http://sourceforge.net/tracker/?group_id=37116&atid=418820">bug tracker</a>.
	Maybe a similar bug has already been filed, in which case you can add a comment to that bug report. If not, you can submit a new
	bug report, but <b>please carefully read the instructions given on the submit form</b>. And of course, follow them :-)
	</p>
	<p>
	Feature requests should go on our <a href="http://sourceforge.net/tracker/?group_id=37116&atid=418823">feature request tracker</a>
	(again first check if something similar has already been requested).
	</p>
	<p>
	Finally, if you have made a modification to the ScummVM source code and want to see it merged back into the ScummVM main line,
	you can use our <a href="http://sourceforge.net/tracker/?group_id=37116&atid=418822">patch tracker</a> for that. 
	</p>
	<br>
    
	<h2>Mailing list</h2>
	<p>
	There are three ScummVM related  <a href="http://sourceforge.net/mail/?group_id=37116">mailing lists</a>.
	Two of them are for automated content only. The one where you can send emails to yourself is scummvm-devel.
	</p>

<?

echo html_round_frame_end("&nbsp;");

// end of html
echo html_p();
sidebar_end();
html_footer();

?>
