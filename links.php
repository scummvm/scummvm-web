<?

/*
 * Links Page
 *
 */

// set this for position of this file relative
$file_root = ".";

// load libraries
require($file_root."/include/"."incl.php");

// start of html
html_header("ScummVM :: Links");
sidebar_start();

//display welcome table
echo html_round_frame_start("Links","98%","",20);

?>
	<p>
	  <big><b>Links</b></big><br>
	  <? echo html_line(); ?>
	</p>
	
	<p>
	  The following are links to other classic game engine open source projects similar
	  to ScummVM.<br>
	</p>

	<p>
	  <a href="http://freesci.linuxgames.com/"><b>FreeSCI :: Sierra On-Line SCI Games</b></a>
	  <ul>
	    The FreeSCI project is an attempt to create a portable interpreter written for Sierra
	    On-Line's SCI game system. This engine was used in such games as: <i>King's Quest IV,
	    Leisure Suit Larry III, Space Quest III,</i> and many more.
	  </ul>

	<p>
	  <a href="http://sarien.sourceforge.net/"><b>Sarien :: Sierra On-Line AGI Games</b></a>
	  <ul>
	    Sarien is an open source, portable implementation of the Sierra On-Line Adventure Game
	    Interpreter (AGI). This engine was used in such games as: <i>King's Quest I - III,
	    Leisure Suit Larry I, Space Quest I - II, Police Quest I,</i> and many more.
	  </ul>
	</p>

	<p>
	  <a href="http://exult.sourceforge.net/"><b>Exult :: Ultima VII</b></a>
	  <ul>
	    Exult is the recreation of the Ultima VII engine used in <i>The Black Gate</i>
	    and <i>The Serpent Isle</i>.
	  </ul>
	</p>

	<p>
	  <a href="http://xu4.sourceforge.net/"><b>XU4 :: Ultima IV</b></a>
	  <ul>
	    XU4 is the recreation of Ultima IV - Quest of the Avatar.
	  </ul>
	</p>

<p>
      <a href="http://zak256.sourceforge.net/"><b>Zak256 :: The Zak256 Project</b></a>
	  <ul>
	    The ZakMcKracken and the Alien Mindbenders in 256 colors project. This project is
	    working to get this Towns-FM version of Zak translated and working.
	  </ul>
	</p>
    
    <p>
      Know any other classic game projects?
      <a href="http://sourceforge.net/sendmessage.php?touser=339357" target="_blank">Let me know!</a>
    </p>

	<div align=center>
	<table with=300 border=0><tr><td>
	  <img src="images/scummvm-link.png" border=0 width=88 height=31 alt="ScummVM" align=left>
	  <b>Link to us:</b><br>
	  If you want to link your site to us. Please feel free to use this image.
	</td></tr></table>
	</div>
		
<?

echo html_round_frame_end("&nbsp;");

// end of html
echo html_p();
sidebar_end();
html_footer();

?>
