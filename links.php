<?php

/*
 * Links Page
 *
 */

// set this for position of this file relative
$file_root = ".";

// load libraries
require($file_root."/include/"."incl.php");

// start of html
html_header("ScummVM :: Links", '<link href="links.css" rel="stylesheet" type="text/css">');
sidebar_start();

//display welcome table
echo html_round_frame_start("Links","");

/* Insert a link table entry */
function addLinkEntry($name, $url, $desc) {
	echo '<div class="linkentry">';
	echo '<div class="linkhead">';
	echo '<a href="' . $url . '">' . $name . '</a>';
	echo '</div>';
	echo '<div class="linkbody">';
	echo $desc;
	echo '</div>';
	echo '</div>';
}

?>
	<h1>Links</h1>
	
	<p>
	  <img src="images/scummvm-link.png" width="88" height="31" alt="ScummVM" style="vertical-align: middle; text-align: left; margin: 5px;">
	  <b>Link to us: </b>
	  If you want to link your site to us: please feel free to use this image.
	</p>

	<h2>Official ports</h2>
	<p>Some additional links for ports that have been merged into our CVS</p>

	<div class="linklist">
		<?php
			addLinkEntry('PocketScumm port', 'http://arisme.free.fr/PocketScumm/index.php', 'Information about the PocketScumm port.');
			addLinkEntry('PocketScumm forum', 'http://forums.pocketmatrix.com/viewforum.php?f=20', 'For help and discussion relating to PocketScumm.');
			addLinkEntry('PalmOS port', 'http://capers.free.fr/ScummVM/index.php', 'News and information about the PalmOS port.');
			addLinkEntry('GP32 port', 'http://www.distant-earth.co.uk/', 'Information about the GP32 port.');
		?>
	</div>
	
	<!-- -->

	<h2>Unofficial ports</h2>
	<p>There are a few unofficial ports of ScummVM floating around. Usually we prefer to merge any ports into our official
	CVS, but for the following this has not (yet) happened for various reasons. Note that the ScummVM team does not endorse
	any of these ports. We did not test them, and we do not guarantee that they work properly. <span style="color: red">Use at your own risk!</span></p>

	<div class="linklist">
		<?php
			addLinkEntry('Amiga ports', 'http://www.sebelinteractive.de/scummvm/',
				'News site containing links and news for unofficial Amiga ports.');
			addLinkEntry('P800 port', 'http://dreo.org/p800/escummvm/index.html',
				'An unofficial port to the Sony Ericsson P800 running Symbian 7.0.');
			addLinkEntry('RISC OS port', 'http://www.riscos.info/unix/indexes/emulation.html#scummvm',
				"A port to RISC OS.");
			addLinkEntry('Old RISC OS port', 'http://www.acornemus.freeserve.co.uk/scumm/scu_info.htm',
				"Another (older) port to RISC OS. It's extremly dated (based on ScummVM 0.1.0).");
		?>
	</div>

	<!-- -->

	<h2>Libraries &amp; Technologies</h2>
	<p>The following lists some libraries and technologies ScummVM makes use of
	(depending on which system your run it and which configuration is chosen).</p>

	<div class="linklist">
		<?php
			addLinkEntry('SDL', 'http://www.libsdl.org/',
				'SDL (Simple DirectMedia Layer) is a cross-platform multimedia
				library, and used by the primary backend of ScummVM.');
			addLinkEntry('MAD', 'http://www.underbit.com/products/mad/',
				'MAD is a high-quality MPEG (MP3) audio decoder. ScummVM
				optionally supports playback of CD tracks and other audio data
				encoded using MP3.');
			addLinkEntry('Ogg Vorbis', 'http://www.xiph.org/ogg/vorbis/',
				'Ogg Vorbis is a fully open, non-proprietary,
				patent-and-royalty-free, general-purpose compressed audio
				format. ScummVM optionally supports playback of CD tracks and
				other audio data encoded using Ogg Vorbis.');
			addLinkEntry('FLAC', 'http://flac.sourceforge.net/',
				'FLAC stands for Free Lossless Audio Codec. Grossly
				oversimplified, FLAC is similar to MP3, but lossless, meaning
				that audio is compressed in FLAC without any loss in quality.
				ScummVM optionally supports playback of CD tracks and other
				audio data encoded using FLAC.');
			addLinkEntry('libmpeg2', 'http://libmpeg2.sourceforge.net/',
				'libmpeg2 is a free library for decoding mpeg-2 and mpeg-1
				video streams. ScummVM optionally supports playback of
				converted cutscenes in the Broken Sword games using libmpeg2.');
			addLinkEntry('Scale2x/3x/4x', 'http://scale2x.sourceforge.net/',
				'Scale2x is a real-time graphics effect able to increase the
				size of small bitmaps guessing the missing pixels without
				blurring the images. ScummVM optionally supports enlarging the
				game graphics using this scaler.');
			addLinkEntry('hq2x/3x/4x', 'http://www.hiend3d.com/hq3x.html',
				'The hq2x/3x/4x filters form a family of fast, high-quality
				magnification filters. ScummVM optionally supports enlarging
				the game graphics using these scaler.');
		?>
	</div>

	<!-- -->

	<h2>Other sites of interest</h2>
	<p>The following are links to sites that provide news and help on retro-gaming or are otherwise of interest.</p>

	<div class="linklist">
		<?php
			addLinkEntry('VOGONS :: Very Old Games On New Systems', 'http://vogons.zetafleet.com/',
				"VOGONS is a large forum site, offering supports and tips for people
				who need help running older classic games on their modern computers
				and operating systems. If you want to play a game that ScummVM
				doesn't support, this is the place to ask for help!");
			addLinkEntry('MixNMojo :: The Purple LucasArts Fan Site', 'http://www.mixnmojo.com/',
				'MixNmojo is one of the longest running, and definitely largest,
				LucasArts sites out there. If your looking for information, hints,
				news... or even just a place to hang... with hosted and partnered
				sites catering for everything, the International House of Mojo
				should be your very first stop.');
			addLinkEntry('DoubleFine :: Where taking over the word is a news scripts job', 'http://www.doublefine.com/news.htm',
				"DoubleFine is the company of the lovable Tim Schafer, the genius
				behind some of the best of the worst gags and games in LucasArts
				history. Go buy Psychonauts, their new game. Because if you don't,
				the rats will get you and eat your family, computer and house. And
				poop everywhere.");
			addLinkEntry('Revolution Software', 'http://www.revgames.com/',
				'Revolution Software are the people behind such wonderful titles as
				Beneath a Steel Sky and the Broken Sword series of games. Revolution
				have provided us with the source code to some of these games so that
				we can add support for them, and allowed us to release BASS as
				freeware. Thanks guys!');
			addLinkEntry('ScummLinux :: a ScummVM LiveCD', 'http://scummlinux.sourceforge.net/',
				'ScummLinux allows you to play your favorite ScummVM-supported games
				anywhere; just boot the CD, choose a game, and enjoy.  It supports
				all the soundcards supported by the Linux kernel and TV-Out for some
				graphics cards, so you can even play on a television set.');
		?>
	</div>
	
	<!-- -->

	<h2>Other classic game engine open source projects</h2>
	<p>The following are links to other classic game engine open source projects similar to ScummVM. 
      Know any other classic game projects that should be linked here?
      <a href="http://sourceforge.net/sendmessage.php?touser=339357">Let me know!</a>
    </p>

	<div class="linklist">
		<?php
			addLinkEntry('FreeSCI :: Sierra On-Line SCI Games', 'http://www.freesci.org/',
				"The FreeSCI project is an attempt to create a portable
				interpreter written for Sierra On-Line's SCI game system. This
				engine was used in such games as: <i>King's Quest IV, Leisure
				Suit Larry III, Space Quest III,</i> and many more.");
			addLinkEntry('Sarien :: Sierra On-Line AGI Games', 'http://sarien.sourceforge.net/',
				"Sarien is an open source, portable implementation of the Sierra
				On-Line Adventure Game Interpreter (AGI). This engine was used
				in such games as: <i>King's Quest I - III, Leisure Suit Larry I,
				Space Quest I - II, Police Quest I,</i> and many more.");
			addLinkEntry('XU4 :: Ultima IV', 'http://xu4.sourceforge.net/',
				"XU4 is the recreation of Ultima IV - Quest of the Avatar.");
			addLinkEntry('Nuvie :: Ultima VI', 'http://nuvie.sourceforge.net/',
				"Nuvie, pronounced 'New-Vee' is an open sourced game engine for
				playing Origin's games Ultima 6, Martian Dreams and Savage
				Empire on modern operating systems.");
			addLinkEntry('Exult :: Ultima VII', 'http://exult.sourceforge.net/',
				"Exult is the recreation of the Ultima VII engine used in <i>The
				Black Gate</i> and <i>The Serpent Isle</i>.");
			addLinkEntry('Pentagram :: Ultima VIII', 'http://pentagram.sourceforge.net/',
				"Pentagram is a project aiming to create an Ultima 8 engine for use on modern operating systems.");
		?>
	</div>
    
	<!-- -->

	<h2>Technical information about SCUMM</h2>
	<p>SCUMM is a complex system that grew over many years. Understanding it can
	be quite difficult at times. Luckily there are some sites that provide you
	with a bunch of information about SCUMM; here are some of them.
	</p>

	<div class="linklist">
		<?php
			addLinkEntry('The inCompleat SCUMM Reference Guide', 'http://www.cowlark.com/scumm/',
				'Information on the file format used by SCUMM five and six.');
			addLinkEntry('SCUMM Revisited', 'http://scummrev.mixnmojo.com/',
				'Windows viewer for SCUMM data files. The site also has information on
				the file formats used by the various SCUMM versions.');
			addLinkEntry('LucasHacks', 'http://scumm.mixnmojo.com/',
				'Contains lots of information about all SCUMM games, links to demos and
				utilities, some documents on SCUMM internals and other useful things.');
		?>
	</div>

	<h2>GUI frontends for ScummVM</h2>
	<p>
Although ScummVM now includes a basic graphical user interface for adding and configuring basic game options, it is new and fairly
incomplete. For those whom are not comfortable using the command line to access the more advanced options, here are some other
GUI frontends for ScummVM.
	</p>

	<div class="linklist">
		<?php
			addLinkEntry("ScummVM Quick And Easy", "http://quick.mixnmojo.com/", "For Win32.");
			addLinkEntry("ScummAqua", "http://www.d.kth.se/~d00-ogo/ogosoft/scummaqua/", "For Mac OS X.");
		?>
	</div>
		
<?

echo html_round_frame_end("&nbsp;");

// end of html
sidebar_end();
html_footer();

?>
