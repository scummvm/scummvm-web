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
	
	<b>Official ports</b><? echo html_line(); ?>
	<p>Some additional links for ports that have been merged into our CVS</p>

	<blockquote>
	<table border=0 cellpadding=5 cellspacing=0>

	  <tr><td><a href="http://arisme.free.fr/PocketScumm/index.php"><b>PocketScumm port</b></a></td></tr>
	  <tr>
	    <td><blockquote>
	    Information about the PocketScumm port.
	    </blockquote></td>
	  </tr>

	  <tr><td><a href="http://forums.pocketmatrix.com/viewforum.php?f=20"><b>PocketScumm forum</b></a></td></tr>
	  <tr>
	    <td><blockquote>
	    For help and discussion relating to PocketScumm.
	    </blockquote></td>
	  </tr>

	  <tr><td><a href="http://capers.free.fr/ScummVM/index.php"><b>PalmOS port</b></a></td></tr>
	  <tr>
	    <td><blockquote>
	    News and information about the PalmOS port.
	    </blockquote></td>
	  </tr>

	  <tr><td><a href="http://people.inf.elte.hu/ph0x/gpscumm/"><b>GP32 port</b></a></td></tr>
	  <tr>
	    <td><blockquote>
	    Information about the GP32 port.
	    </blockquote></td>
	  </tr>

	</table>
	</blockquote>
	
	<!-- -->

	<b>Unofficial ports</b><? echo html_line(); ?>
	<p>There are a few unofficial ports of ScummVM floating around. Usually we prefer to merge any ports into our official
	CVS, but for the following this has not (yet) happend for various reasons. Note that the ScummVM team does not endorse
	any of these ports. We did not test them, and we do not gurantee that they work properly. Use at your own risk.</p>

	<blockquote>
	<table border=0 cellpadding=5 cellspacing=0>

	  <tr><td><a href="http://www.sebelinteractive.de/scummvm/"><b>Amiga port</b></a></td></tr>
	  <tr>
	    <td><blockquote>
	    Not to be confused with our MorphOS port, this port runs on the "classic" AmigaOS 3.1.
	    </blockquote></td>
	  </tr>

	</table>
	</blockquote>

	<!-- -->

	<b>Libraries &amp; Technologies</b><? echo html_line(); ?>
	<p>The following lists some libraries and technologies ScummVM makes use of
	(depending on which system your run it and which configuration is chosen).</p>

	<blockquote>
	<table border=0 cellpadding=5 cellspacing=0>

	  <tr><td><a href="http://www.libsdl.org/"><b>SDL</b></a></td></tr>
	  <tr>
	    <td><blockquote>
	    SDL (Simple DirectMedia Layer) is a cross-platform multimedia library, and used by
	    the primary backend of ScummVM.
	    </blockquote></td>
	  </tr>

	  <tr><td><a href="http://www.underbit.com/products/mad/"><b>MAD</b></a></td></tr>
	  <tr>
	    <td><blockquote>
	    MAD is a high-quality MPEG (MP3) audio decoder.
	    ScummVM optionally supports playback of CD tracks etc. encoded using MP3.
	    </blockquote></td>
	  </tr>

	  <tr><td><a href="http://www.xiph.org/ogg/vorbis/"><b>Ogg Vorbis</b></a></td></tr>
	  <tr>
	    <td><blockquote>
	    Ogg Vorbis is a fully open, non-proprietary, patent-and-royalty-free, general-purpose compressed audio format.
	    ScummVM optionally supports playback of CD tracks etc. encoded using Ogg Vorbis.
	    </blockquote></td>
	  </tr>

	</table>
	</blockquote>

	<!-- -->

	<b>Classic gaming news and help sites</b><? echo html_line(); ?>
	<p>The following are links to sides that provide news and help on retro-gaming and other related news.</p>

	<blockquote>
	<table border=0 cellpadding=5 cellspacing=0>
	  <tr><td><a href="http://vogons.zetafleet.com/"><b>VOGONS :: Very Old Games On New Systems</b></a></td></tr>
	  <tr>
	    <td><blockquote>
	    VOGONS is a large forum site, offering supports and tips for people who need help running older
	    classic games on their modern computers and operating systems. If you want to play a game that
	    ScummVM doesn't support, this is the place to ask for help!
	    </blockquote></td>
	  </tr>

	  <tr><td><a href="http://www.mixnmojo.com/"><b>MixNMojo :: The Purple LucasArts Fan Site</b></a></td></tr>
	  <tr>
	    <td><blockquote>
	    MixNmojo is one of the longest running, and definitely largest, LucasArts sites out there. If your looking for
information, hints, news... or even just a place to hang... with hosted and partnered sites catering for everything, the
International House of Mojo should be your very first stop.
	    </blockquote></td>
	  </tr>

	  <tr><td><a href="http://www.doublefine.com/news.htm"><b>DoubleFine :: Where taking over the word is a news scripts job</b></a></td></tr>
	  <tr>
	    <td><blockquote>
            DoubleFine is the company of the lovable Tim Schafer, the genius behind some of the best of the worst gags and games in 
LucasArts history. Go buy Psychonauts, their new game. Because if you don't, their super-intelligent news script will know.. Oh yes, 
it will know..
	    </blockquote></td>
	  </tr>

	</table>
	</blockquote>
	
	<!-- -->

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

	  <tr><td><a href="http://xu4.sourceforge.net/"><b>XU4 :: Ultima IV</b></a></td></tr>
	  <tr>
	    <td><blockquote>
	    XU4 is the recreation of Ultima IV - Quest of the Avatar.
	    </blockquote></td>
	  </tr>

	  <tr><td><a href="http://nuvie.sourceforge.net/"><b>Nuvie :: Ultima VI</b></a></td></tr>
	  <tr>
	    <td><blockquote>
	    Nuvie, pronounced 'New-Vee' is an open sourced game engine for playing Origin's games
	    Ultima 6, Martian Dreams and Savage Empire on modern operating systems.
	    </blockquote></td>
	  </tr>

	  <tr><td><a href="http://exult.sourceforge.net/"><b>Exult :: Ultima VII</b></a></td></tr>
	  <tr>
	    <td><blockquote>
	    Exult is the recreation of the Ultima VII engine used in <i>The Black Gate</i>
	    and <i>The Serpent Isle</i>.
	    </blockquote></td>
	  </tr>

	  <tr><td><a href="http://sourceforge.net/projects/yarn/"><b>Yarn :: Dreamer's Guild SAGA Games</b></a></td></tr>
	  <tr>
	    <td><blockquote>
	    Yarn is an open source replacement for the SAGA adventure-game engine used for some of Dreamer's Guild's games including <i>Inherit The Earth</i> and <i>I Have No Mouth And I Must Scream</i>.
	    </blockquote></td>
	  </tr>
	</table>
	</blockquote>
    
	<!-- -->

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
	<p>
Although ScummVM now includes a basic graphical user interface for adding and configuring basic game options, it is new and fairly
incomplete. For those whom are not comfortable using the command line to access the more advanced options, here are some other
GUI frontends for ScummVM.
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
