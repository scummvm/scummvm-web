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
echo html_round_frame_start("Links","");

?>
	<h1>Links</h1>
	
	<p>
	  <img src="images/scummvm-link.png" width="88" height="31" alt="ScummVM" style="vertical-align: middle; text-align: left; margin: 5px;">
	  <b>Link to us: </b>
	  If you want to link your site to us: please feel free to use this image.
	</p>

	<h2>Official ports</h2>
	<p>Some additional links for ports that have been merged into our CVS</p>

	<table border=0 cellpadding=5 cellspacing=0 style="margin-left: 3em;">

	  <tr><td><a href="http://arisme.free.fr/PocketScumm/index.php"><b>PocketScumm port</b></a></td></tr>
	  <tr>
	    <td style="padding-left: 3em;">
	    Information about the PocketScumm port.
	    </td>
	  </tr>

	  <tr><td><a href="http://forums.pocketmatrix.com/viewforum.php?f=20"><b>PocketScumm forum</b></a></td></tr>
	  <tr>
	    <td style="padding-left: 3em;">
	    For help and discussion relating to PocketScumm.
	    </td>
	  </tr>

	  <tr><td><a href="http://capers.free.fr/ScummVM/index.php"><b>PalmOS port</b></a></td></tr>
	  <tr>
	    <td style="padding-left: 3em;">
	    News and information about the PalmOS port.
	    </td>
	  </tr>

	  <tr><td><a href="http://people.inf.elte.hu/ph0x/gpscumm/"><b>GP32 port</b></a></td></tr>
	  <tr>
	    <td style="padding-left: 3em;">
	    Information about the GP32 port.
	    </td>
	  </tr>

	</table>
	
	<!-- -->

	<h2>Unofficial ports</h2>
	<p>There are a few unofficial ports of ScummVM floating around. Usually we prefer to merge any ports into our official
	CVS, but for the following this has not (yet) happened for various reasons. Note that the ScummVM team does not endorse
	any of these ports. We did not test them, and we do not guarantee that they work properly. <span style="color: red">Use at your own risk!</span></p>

	<table border=0 cellpadding=5 cellspacing=0 style="margin-left: 3em;">

	  <tr><td><a href="http://www.sebelinteractive.de/scummvm/"><b>Amiga ports</b></a></td></tr>
	  <tr>
	    <td style="padding-left: 3em;">
	    News site containing links and news for unofficial Amiga ports.
	    </td>
	  </tr>

	  <tr><td><a href="http://dreo.org/p800/escummvm/index.html"><b>P800 port</b></a></td></tr>
	  <tr>
	    <td style="padding-left: 3em;">
	    An unofficial port to the Sony Ericsson P800 running Symbian 7.0.
	    </td>
	  </tr>

	  <tr><td><a href="http://www.acornemus.freeserve.co.uk/scumm/scu_info.htm"><b>RiscOS port</b></a></td></tr>
	  <tr>
	    <td style="padding-left: 3em;">
	    A port to RiscOS. It's extremly dated (based on ScummVM 0.1.0), but hopefully it will be updated some day soon.
	    </td>
	  </tr>
	</table>

	<!-- -->

	<h2>Libraries &amp; Technologies</h2>
	<p>The following lists some libraries and technologies ScummVM makes use of
	(depending on which system your run it and which configuration is chosen).</p>

	<table border=0 cellpadding=5 cellspacing=0 style="margin-left: 3em;">

	  <tr><td><a href="http://www.libsdl.org/"><b>SDL</b></a></td></tr>
	  <tr>
	    <td style="padding-left: 3em;">
	    SDL (Simple DirectMedia Layer) is a cross-platform multimedia library, and used by
	    the primary backend of ScummVM.
	    </td>
	  </tr>

	  <tr><td><a href="http://www.underbit.com/products/mad/"><b>MAD</b></a></td></tr>
	  <tr>
	    <td style="padding-left: 3em;">
	    MAD is a high-quality MPEG (MP3) audio decoder.
	    ScummVM optionally supports playback of CD tracks and other audio data encoded using MP3.
	    </td>
	  </tr>

	  <tr><td><a href="http://www.xiph.org/ogg/vorbis/"><b>Ogg Vorbis</b></a></td></tr>
	  <tr>
	    <td style="padding-left: 3em;">
	    Ogg Vorbis is a fully open, non-proprietary, patent-and-royalty-free, general-purpose compressed audio format.
	    ScummVM optionally supports playback of CD tracks and other audio data encoded using Ogg Vorbis.
	    </td>
	  </tr>

	  <tr><td><a href="http://libmpeg2.sourceforge.net/"><b>libmpeg2</b></a></td></tr>
	  <tr>
	    <td style="padding-left: 3em;">
	    libmpeg2 is a free library for decoding mpeg-2 and mpeg-1 video streams.
	    ScummVM optionally supports playback of converted cutscenes in the Broken Sword games using libmpeg2.
	    </td>
	  </tr>

	  <tr><td><a href="http://scale2x.sourceforge.net/"><b>Scale2x/3x/4x</b></a></td></tr>
	  <tr>
	    <td style="padding-left: 3em;">
	    Scale2x is a real-time graphics effect able to increase the size of small bitmaps guessing the missing pixels without blurring the images.
	    ScummVM optionally supports enlarging the game graphics using this scaler.
	    </td>
	  </tr>

	  <tr><td><a href="http://www.hiend3d.com/hq3x.html"><b>hq2x/3x/4x</b></a></td></tr>
	  <tr>
	    <td style="padding-left: 3em;">
	    The hq2x/3x/4x filters form a family of fast, high-quality magnification filters.
	    ScummVM optionally supports enlarging the game graphics using these scaler.
	    </td>
	  </tr>

	</table>

	<!-- -->

	<h2>Other sites of interest</h2>
	<p>The following are links to sites that provide news and help on retro-gaming or are otherwise of interest.</p>

	<table border=0 cellpadding=5 cellspacing=0 style="margin-left: 3em;">
	  <tr><td><a href="http://vogons.zetafleet.com/"><b>VOGONS :: Very Old Games On New Systems</b></a></td></tr>
	  <tr>
	    <td style="padding-left: 3em;">
	    VOGONS is a large forum site, offering supports and tips for people who need help running older
	    classic games on their modern computers and operating systems. If you want to play a game that
	    ScummVM doesn't support, this is the place to ask for help!
	    </td>
	  </tr>

	  <tr><td><a href="http://www.mixnmojo.com/"><b>MixNMojo :: The Purple LucasArts Fan Site</b></a></td></tr>
	  <tr>
	    <td style="padding-left: 3em;">
	    MixNmojo is one of the longest running, and definitely largest, LucasArts sites out there. If your looking for
information, hints, news... or even just a place to hang... with hosted and partnered sites catering for everything, the
International House of Mojo should be your very first stop.
	    </td>
	  </tr>

	  <tr><td><a href="http://www.doublefine.com/news.htm"><b>DoubleFine :: Where taking over the word is a news scripts job</b></a></td></tr>
	  <tr>
	    <td style="padding-left: 3em;">
            DoubleFine is the company of the lovable Tim Schafer, the genius behind some of the best of the worst gags and games in 
LucasArts history. Go buy Psychonauts, their new game. Because if you don't, the rats will
get you and eat your family, computer and house. And poop everywhere.
	    </td>
	  </tr>
	  <tr><td><a href="http://www.revgames.com/"><b>Revolution Software</b></a></td></tr>
	  <tr>
	    <td style="padding-left: 3em;">
	    Revolution Software are the people behind such wonderful titles as Beneath a Steel Sky and
	    the Broken Sword series of games. Revolution have provided us with the source code to some
	    of these games so that we can add support for them, and allowed us to release BASS as freeware. Thanks guys!
	    </td>
	  </tr>
	  <tr><td><a href="http://scummlinux.sourceforge.net/"><b>ScummLinux :: a ScummVM LiveCD</b></a></td></tr>
	    <tr>
	      <td style="padding-left: 3em;">
	      ScummLinux allows you to play your favorite ScummVM-supported games anywhere; 
	      just boot the CD, choose a game, and enjoy.  It supports all the soundcards 
	      supported by the Linux kernel and TV-Out for some graphics cards, so you can
	      even play on a television set.
              </td>
	  </tr>

	</table>
	
	<!-- -->

	<h2>Other classic game engine open source projects</h2>
	<p>The following are links to other classic game engine open source projects similar to ScummVM. 
      Know any other classic game projects that should be linked here?
      <a href="http://sourceforge.net/sendmessage.php?touser=339357">Let me know!</a>
    </p>

	<table border=0 cellpadding=5 cellspacing=0 style="margin-left: 3em;">
	  <tr><td><a href="http://freesci.linuxgames.com/"><b>FreeSCI :: Sierra On-Line SCI Games</b></a></td></tr>
	  <tr>
	    <td style="padding-left: 3em;">
	    The FreeSCI project is an attempt to create a portable interpreter written for Sierra
	    On-Line's SCI game system. This engine was used in such games as: <i>King's Quest IV,
	    Leisure Suit Larry III, Space Quest III,</i> and many more.
	    </td>
	  </tr>


	  <tr><td><a href="http://sarien.sourceforge.net/"><b>Sarien :: Sierra On-Line AGI Games</b></a></td></tr>
	  <tr>
	    <td style="padding-left: 3em;">
	    Sarien is an open source, portable implementation of the Sierra On-Line Adventure Game
	    Interpreter (AGI). This engine was used in such games as: <i>King's Quest I - III,
	    Leisure Suit Larry I, Space Quest I - II, Police Quest I,</i> and many more.
	    </td>
	  </tr>

	  <tr><td><a href="http://xu4.sourceforge.net/"><b>XU4 :: Ultima IV</b></a></td></tr>
	  <tr>
	    <td style="padding-left: 3em;">
	    XU4 is the recreation of Ultima IV - Quest of the Avatar.
	    </td>
	  </tr>

	  <tr><td><a href="http://nuvie.sourceforge.net/"><b>Nuvie :: Ultima VI</b></a></td></tr>
	  <tr>
	    <td style="padding-left: 3em;">
	    Nuvie, pronounced 'New-Vee' is an open sourced game engine for playing Origin's games
	    Ultima 6, Martian Dreams and Savage Empire on modern operating systems.
	    </td>
	  </tr>

	  <tr><td><a href="http://exult.sourceforge.net/"><b>Exult :: Ultima VII</b></a></td></tr>
	  <tr>
	    <td style="padding-left: 3em;">
	    Exult is the recreation of the Ultima VII engine used in <i>The Black Gate</i>
	    and <i>The Serpent Isle</i>.
	    </td>
	  </tr>

	  <tr><td><a href="http://sourceforge.net/projects/yarn/"><b>Yarn :: Dreamer's Guild SAGA Games</b></a></td></tr>
	  <tr>
	    <td style="padding-left: 3em;">
	    Yarn is an open source replacement for the SAGA adventure-game engine used for some of Dreamer's Guild's games including <i>Inherit The Earth</i> and <i>I Have No Mouth And I Must Scream</i>.
	    </td>
	  </tr>
	</table>
    
	<!-- -->

	<h2>Technical information about SCUMM</h2>
	<p>SCUMM is a complex system that grew over many years. Understanding it can
	be quite difficult at times. Luckily there are some sites that provide you
	with a bunch of information about SCUMM; here are some of them.
	</p>
	<table border=0 cellpadding=5 cellspacing=0 style="margin-left: 3em;">

	  <tr><td><a href="http://www.cowlark.com/scumm/"><b>The inCompleat SCUMM Reference Guide</b></a></td></tr>
	  <tr>
	    <td style="padding-left: 3em;">
	    Information on the file format used by SCUMM five and six.
	    </td>
	  </tr>
    
	  <tr><td><a href="http://scummrev.mixnmojo.com/"><b>SCUMM Revisited</b></a></td></tr>
	  <tr>
	    <td style="padding-left: 3em;">
	    Windows viewer for SCUMM data files. The site also has information on the 
	    file formats used by the various SCUMM versions.
	    </td>
	  </tr>
    
	  <tr><td><a href="http://scumm.mixnmojo.com/"><b>LucasHacks</b></a></td></tr>
	  <tr>
	    <td style="padding-left: 3em;">
	    Contains lots of information about all SCUMM games, links to demos and utilities,
	    some documents on SCUMM internals and other useful things.
	    </td>
	  </tr>

	</table>

	<h2>GUI frontends for ScummVM</h2>
	<p>
Although ScummVM now includes a basic graphical user interface for adding and configuring basic game options, it is new and fairly
incomplete. For those whom are not comfortable using the command line to access the more advanced options, here are some other
GUI frontends for ScummVM.
	</p>
	<table border=0 cellpadding=5 cellspacing=0 style="margin-left: 3em;">

          <tr><td><a href="http://quick.mixnmojo.com/"><b>ScummVM Quick And Easy</b></a></td></tr>
	  <tr>
	    <td style="padding-left: 3em;">
	    For Win32.
	    </td>
	  </tr>

	  <tr><td><a href="http://www.d.kth.se/~d00-ogo/ogosoft/scummaqua/"><b>ScummAqua</b></a></td></tr>
	  <tr>
	    <td style="padding-left: 3em;">
	    For Mac OS X.
	    </td>
	  </tr>

	</table>
		
<?

echo html_round_frame_end("&nbsp;");

// end of html
sidebar_end();
html_footer();

?>
