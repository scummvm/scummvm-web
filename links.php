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
	
	<b>Other classic game engine open source projects</b><? echo html_line(); ?>
	<p>The following are links to other classic game engine open source projects similar to ScummVM. 
      Know any other classic game projects that should be linked here?
      <a href="http://sourceforge.net/sendmessage.php?touser=339357" target="_blank">Let me know!</a>
    </p>

	<blockquote>
	<table border=0 cellpadding=5 cellspacing=0>
	  
	  <tr><td><a href="http://freesci.linuxgames.com/"><b>FreeSCI :: Sierra On-Line SCI Games</b></a></td></tr>
	  <tr>
	    <td><blockquote>
	    The FreeSCI project is an attempt to create a portable interpreter written for Sierra
	    On-Line's SCI game system. This engine was used in such games as: <i>King's Quest IV,
	    Leisure Suit Larry III, Space Quest III,</i> and many more.
	    </blockquote></td>
	  </tr>


	  <tr><td><a href="http://sarien.sourceforge.net/"><b>Sarien :: Sierra On-Line AGI Games</b></a></td></tr>
	  <tr>
	    <td><blockquote>
	    Sarien is an open source, portable implementation of the Sierra On-Line Adventure Game
	    Interpreter (AGI). This engine was used in such games as: <i>King's Quest I - III,
	    Leisure Suit Larry I, Space Quest I - II, Police Quest I,</i> and many more.
	    </blockquote></td>
	  </tr>

	  <tr><td><a href="http://exult.sourceforge.net/"><b>Exult :: Ultima VII</b></a></td></tr>
	  <tr>
	    <td><blockquote>
	    Exult is the recreation of the Ultima VII engine used in <i>The Black Gate</i>
	    and <i>The Serpent Isle</i>.
	    </blockquote></td>
	  </tr>

	  <tr><td><a href="http://xu4.sourceforge.net/"><b>XU4 :: Ultima IV</b></a></td></tr>
	  <tr>
	    <td><blockquote>
	    XU4 is the recreation of Ultima IV - Quest of the Avatar.
	    </blockquote></td>
	  </tr>

	  <tr><td><a href="http://zak256.sourceforge.net/"><b>Zak256 :: The Zak256 Project</b></a></td></tr>
	  <tr>
	    <td><blockquote>
	    The ZakMcKracken and the Alien Mindbenders in 256 colors project. This project is
	    working to get this Towns-FM version of Zak translated and working.
	    </blockquote></td>
	  </tr>
	</table>
	</blockquote>
    
	<b>Technical information about SCUMM</b><? echo html_line(); ?>
	<p>SCUMM is a complex system that grew over many years. Understanding it can
	be quite difficult at times. Luckily there are some sites that provide you
	with a bunch of information about SCUMM; here are some of them.
	</p>
	<blockquote>
	<table border=0 cellpadding=5 cellspacing=0>

	  <tr><td><a href="http://www.cowlark.com/scumm/"><b>The inCompleat SCUMM Reference Guide</b></a></td></tr>
	  <tr>
	    <td><blockquote>
	    Information on the file format used by SCUMM five and six.
	    </blockquote></td>
	  </tr>
    
	  <tr><td><a href="http://scummrev.mixnmojo.com/"><b>SCUMM Revisited</b></a></td></tr>
	  <tr>
	    <td><blockquote>
	    Windows viewer for SCUMM data files. The site also has information on the 
	    file formats used by the various SCUMM versions.
	    </blockquote></td>
	  </tr>
    
	  <tr><td><a href="http://scumm.mixnmojo.com/"><b>LucasHacks</b></a></td></tr>
	  <tr>
	    <td><blockquote>
	    Contains lots of information about all SCUMM games, links to demos and utilities,
	    some documents on SCUMM internals and other useful things.
	    </blockquote></td>
	  </tr>

	</table>
	</blockquote>

	<b>GUI frontends for ScummVM</b><? echo html_line(); ?>
	<p>Currently ScummVM has no real graphical user interface which would allow users
	to specify options like the path to the game data or which music engine to use. Rather
	you have to steer it via the command line. For those of you who are not comfortable
	with this, here are some GUI frontends for ScummVM.
	</p>
	<blockquote>
	<table border=0 cellpadding=5 cellspacing=0>

	  <tr><td><a href="http://w1.864.telia.com/~u86428755/superqult_software/scummvm_frontend.html"><b>ScummVM Front-End</b></a></td></tr>
	  <tr>
	    <td><blockquote>
	    For Mac OS X.
	    </blockquote></td>
	  </tr>

	  <tr><td><a href="http://www.d.kth.se/~d00-ogo/ogosoft/scummaqua/"><b>ScummAqua</b></a></td></tr>
	  <tr>
	    <td><blockquote>
	    Yet another Mac OS X frontend.
	    </blockquote></td>
	  </tr>

	</table>
	</blockquote>
    

	<div align=center>
	<table width=300 border=0><tr><td>
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
