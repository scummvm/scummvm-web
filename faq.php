<?

/*
 * FAQ Page
 *
 */

// set this for position of this file relative
$file_root = ".";

// load libraries
require($file_root."/include/"."incl.php");

// start of html
html_header("ScummVM :: FAQ");
sidebar_start();

//display welcome table
echo html_round_frame_start("FAQ :: Frequently Asked Questions","");

?>
<h1>
	FAQ<br>
	<span class="caption">last updated: <? echo date("F d, Y",getlastmod()); ?></span>
</h1>

<ol>
 <li><a href="#1">Introduction</a>
   <ol>
       <li><a href="#1-1">Why is it called ScummVM - what does this name mean?</a></li>
       <li><a href="#1-2">What is SCUMM?</a></li>
       <li><a href="#1-3">Is ScummVM free?</a></li>
       <li><a href="#1-4">What games does ScummVM support?</a></li>
       <li><a href="#1-5">Will ScummVM support other games?</a></li>
       <li><a href="#1-6">Where do I find ScummVM?</a></li>
       <li><a href="#1-7">How do I compile the source code for my OS?</a></li>
       <li><a href="#1-8">On what platforms does ScummVM run?</a></li>
       <li><a href="#1-9">Does ScummVM run any non SCUMM games?</a></li>
       <li><a href="#1-10">Can I use ScummVM to make new games?</a></li>
    </ol>
  </li>
    
  <li><a href="#2">ScummVM and SCUMM games</a>
    <ol>
       <li><a href="#2-1">Do I need original CDs/Floppies?</a></li>
       <li><a href="#2-2">Does ScummVM work with all versions of games?</a></li>
       <li><a href="#2-3">Can I play through xxx (place your favorite SCUMM adventure here) ?</a></li>
       <li><a href="#2-4">Can I save/load the game?</a></li>
       <li><a href="#2-5">Do savegames from the original work in ScummVM?</a></li>
    </ol>
  </li>
    
  <li><a href="#3">Graphics and Audio</a>
    <ol>
      <li><a href="#3-1">Does ScummVM support CD audio?</a></li>
      <li><a href="#3-2">Does ScummVM support using MP3 files instead of CD audio?</a></li>
      <li><a href="#3-3">Does ScummVM support filtered graphics modes?</a></li>
      <li><a href="#3-4">Can I run my game full screen?</a></li>
    </ol>
  </li>

  <li><a href="#4">Troubleshooting</a>
    <ol>
      <li><a href="#4-1">My game won't run.</a></li>
      <li><a href="#4-2">I don't hear any sound.</a></li>
      <li><a href="#4-3">I don't hear any music.</a></li>
      <li><a href="#4-4">My game crashes at some point.</a></li>
      <li><a href="#4-5">The game colors are messed up.</a></li>
      <li><a href="#4-6">The characters in my non english game are messed up.</a></li>
      <li><a href="#4-7">How do I make my mac version of a game work?</a></li>
      <li><a href="#4-8">Reporting Bugs.</a></li>
    </ol>
  </li>
</ol>

<p>
<? echo html_line(); ?>
</p>

<ol>

  <li><a name="1"></a><b>Introduction</b><br>

    <ol>
      <li><p><a name="1-1"></a><b>Why is it called ScummVM - what does this name mean?</b><br>
	Scumm comes from the fact that it was originally designed to run SCUMM games, like
	Monkey Island.
	VM stands for Virtual Machine.</p></li>

      <li><p><a name="1-2"></a><b>What is SCUMM?</b><br>
	SCUMM stands for "Script Creation Utility for Maniac Mansion". It is a utility used
	to create the famous LucasArts adventure games.<br>
	It was initially created in 1987 by Aric Wilmunder and Ron Gilbert for the game
	"Maniac Mansion" and was used later, with some modifications, for Zak McKracken and
	the Alien Mindbenders. Development on the SCUMM system continued for some time,
	and was used in Loom, Indiana Jones and the Last Crusade, Indiana Jones and the Fate
	of Atlantis, Monkey Island 1,2,3, Sam &amp; Max Hit the Road, Day of the Tentacle, The Dig
	and Full Throttle.</p></li>

      <li><p><a name="1-3"></a><b>Is ScummVM free?</b><br>
	ScummVM is released under the
	<a href="http://www.gnu.org/copyleft/gpl.html">GPL (General Public License)</a>,
	so it's more than free.
	ScummVM source code is freely available and you can do whatever you want with it. If you
	make modifications to it and redistribute your work you MUST make the source available.
	However, the ScummVM team would be pleased if you choose to send them your
	modifications, so they can be merged into the main tree.</p></li>

      <li><p><a name="1-4"></a><b>What games does ScummVM support?</b><br>
	We have a <a href="compatibility.php">compatibility list</a> on our website
	that contains an up to date list of what games work, and how well they work. As
	well as SCUMM games, we also include virtual machines for the first two Simon the Sorcerer
	games (by Adventure Soft), and Beneath a Steel Sky by Revolution. Other games may be added,
	but this is not a common occurrence - see below.
	</p></li>

      <li><p><a name="1-5"></a><b>Will ScummVM support other games?</b><br>
	The ScummVM team is working to make newer SCUMM games, such as "Full Throttle" playable<br>
	We are also working to correct make the currently supported games more accurate, and are adding support (over time) for Broken Sword 1 and 2, by Revolution.<br>
	As Revolution Software Ltd are really nice people, and have provided us with source code
	for their games, so we are more than happy to add support for these classic adventures.<BR><BR>
	However we do <i>NOT</i> generally add support for non-SCUMM games! 
	Reverse engineering a completely new game without source is a long process, and our
	developers are all very busy as it is... so unless you work for a company interested
	in providing us with source code for one of your classic titles, please do not ask.
      </p></li>

      <li><p><a name="1-6"></a><b>Where do I find ScummVM?</b><br>
	You can find it on the download section on our <a href="http://www.scummvm.org">homepage</a>.
	You can download the latest version, which could be a little old. For the most
	recent cutting-edge in-development version, you have to compile it yourself from
	CVS or use the 'daily builds' linked from our download page.</p></li>

      <li><p><a name="1-7"></a><b>How do I compile the source code for my OS?</b><br>
	The source code package contains a file called
	<a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/scummvm/scummvm/README?rev=HEAD">README</a>
	that should explain everything.</p></li>

      <li><p><a name="1-8"></a><b>On what platform does ScummVM run?</b><br>
	ScummVM should be able to be compiled on any SDL platform, with just small modifications.<br>
	Currently tested platforms are Win32 (Windows 95/98/ME/NT/2000/XP), Linux i386 and PPC, BeOS, Solaris,
	Mac OS X, Dreamcast, MorphOS, IRIX, PalmOS and WinCE. It is also part of the Free/Net/Open BSD
	ports collections and included in Debian testing and unstable</p></li>

      <li><p><a name="1-9"></a><b>Does ScummVM run any non-SCUMM games?</b><br>
        Yes. Currently the only non-SCUMM games supported are Simon The Sorcerer (1 and 2), 
	and Beneath a Steel Sky. Simon support was originally written by the
	founder of ScummVM as a separate program, and later included in the main binary.
	Revolution Software Ltd. are very nice people and kindly provided us with the
	source code to BASS, on which we based our interpreter. We are currently working
	on support for Broken Sword 1 and 2, again thanks to Revolutions kind support.<BR>
	We do not have any plans to support any other non-SCUMM games at this time. If we
	do, it will be added to the <a href="compatibility.php">Compatibility List</a>.<BR><BR>
	Unless you work for a company interested providing us with source code for one of your
	classic titles, please do not ask us to support game XXX.
	</p></li>
  
        <li><p><a name="1-10"></a><b>Can I use ScummVM to make new games?</b><br>
	While it is theoretically possible to write a new game that uses ScummVM it is not
	advisable.  ScummVM has many hacks to support older games and no tools geared towards
	creating content usuable by ScummVM.  Potential game authors are encouraged to look
	at open source technologies such as <a href="http://www.libsdl.org">libSDL</a> for
	a cross platform DirectX like library, and the <a href="http://www.lua.org">Lua</a>
	and <a href="http://www.python.org">Python</a> scripting languages for game logic.
	</p></li>
	
	
    </ol>
  </li>

  <li><a name="2"></a><b>ScummVM and SCUMM games</b><br>

    <ol>
      <li><p><a name="2-1"></a><b>Do I need original CD or Floppy disks?</b><br>
	Most definitely. ScummVM won't work without them. If you would like to buy these games, we suggest you
	browse <a href="http://www.ebay.com">Ebay</a>. Do not ask the ScummVM team where you can download the 
	full versions of LucasArts games. These requests will be ignored.</p></li>

      <li><p><a name="2-2"></a><b>Does ScummVM work with all versions of games?</b><br>
	See <a href="#1-4">1.4 What games does ScummVM support?</a></p></li>
	
      <li><p><a name="2-3"></a><b>Can I play through xxx (place your favorite SCUMM adventure here) ?</b><br>
	See <a href="#1-4">1.4 What games does ScummVM support?</a></p></li>

      <li><p><a name="2-4"></a><b>Can I save/restore the game?</b><br>
	Yes. Saving and restoring is already supported (ALT-1/9 to save, CTRL - 1/9 to restore, or
	F5 to access the save/load menu).</p></li>

      <li><p><a name="2-5"></a><b>Do savegames from the original games work in ScummVM?</b><br>
	No. We do not have any plans to load old savegames (with the exception of the
	Simon the Sorcerer series of games). Newer versions of ScummVM have
	also broken compatibility with older ScummVM savegames. Since ScummVM is
	in heavy development, this may occur again in the future.</p></li>

    </ol>
  </li>

  <li><a name="3"></a><b>Graphics and Audio</b><br>

    <ol>
      <li><p><a name="3-1"></a><b>Does ScummVM support CD audio?</b><br>
      	Yes, ScummVM fully supports CD audio in Monkey Island CD, and Loom. Just keep your game CD
	inserted into your CD drive when you start ScummVM. If you have more than one CD drive in your
	system. You can specify your CD drive using the -c command line parameter. See the
	<a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/scummvm/scummvm/README?rev=HEAD">README</a>
	for more info.</p></li>

      <li><p><a name="3-2"></a><b>Does ScummVM support using MP3/Ogg files instead of CD audio?</b><br>
	Yes. You can use LAME or some other CD audio conversion utility to convert your CD audio to MP3. Since
	version 0.3.0 we also support Ogg Vorbis files. See the
	<a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/scummvm/scummvm/README?rev=HEAD">README</a>
	for more info.</p></li>

      <li><p><a name="3-3"></a><b>Does ScummVM support filtered graphic modes?</b><br>
      	Yes, ScummVM supports several filtered graphic modes such as super2xsai.  See the
	<a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/scummvm/scummvm/README?rev=HEAD">README</a>
	for more info.</p></li>
      
      <li><p><a name="3-4"></a><b>Can I run my game full screen?</b><br>
      	Yes. You can either start your game using the -f command line parameter. Or you can hit
	Alt+Enter in game to switch between full screen and windowed modes.</p></li>
      
    </ol>
  </li>

  <li><a name="4"></a><b>Troubleshooting</b><br>

    <ol>
      <li><p><a name="4-1"></a><b>My game won't run.</b><br>
      	First make sure your game is supported. See <a href="#1-4">1.4</a>. If it is a supported game and you
	have followed the instructions in
	<a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/scummvm/scummvm/README?rev=HEAD">README</a>
	to the letter, then see <a href="#4-8">4.6</a> to report this as a bug.</p></li>
	
      <li><p><a name="4-2"></a><b>I don't hear any sound.</b><br>
      	Check the <a href="compatibility.php">compatibility list</a> to see if your game has sound support currently. You can
	also try the -s command line parameter to set the in game SFX volume.</p></li>
      
      <li><p><a name="4-3"></a><b>I don't hear any music.</b><br>
	See <a href="#4-2">above</a></p></li>
      
      <li><p><a name="4-4"></a><b>My game crashes at some point.</b><br>
      	Check the <a href="compatibility.php">Compatibility List</a> to see if your game has any known issues. If you can
	reproduce this crash more than once, please report it to our Bug Tracker. See <a href="#4-8">4.8</a>.</p></li>
      
      <li><p><a name="4-5"></a><b>The game colors are messed up.</b><br>
      	This is a known issue with using Amiga version datafiles. Use the --platform=amiga command
	line parameter (or tick the Amiga checkbox in the Launcher / F5 menu) to enable Amiga
	palette conversion.</p></li>
      
      <li><p><a name="4-6"></a><b>The characters in my non english game are messed up.</b><br>
      	You are most likely using a game such as Maniac Mansion or Zak McKracken if you have this problem. 
	You need to specify a language with the -q parameter or use the language config file option.
	Consult the 
	<a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/scummvm/scummvm/README?rev=HEAD">README</a> 
	or command line help for further information.</p></li>
      
      <li><p><a name="4-7"></a><b>How do I make my mac version of a game work?</b><br>
      	The majority of mac versions won't work without first extracting the resources into a format ScummVM
	understands.  To do this you need to use the rescumm tool in the scummvm-tools package.
	An example usage might look like: <i>rescumm "Sam &amp; Max Demo Data"</i>.  Some CDs may appear to
	only contain a application, in which case there is still a seperate data file but it is invisible.  
	The older games which have LFL files should only need the --platform=macintosh option to run.</p></li>
      
      <li><p><a name="4-8"></a><b>Reporting Bugs.</b><br>
      	To report a bug, please create a SourceForge account and follow the
	<a href="http://sourceforge.net/tracker/?atid=418820&amp;group_id=37116&amp;func=browse">bugs</a>
	link from our homepage. Please make sure the bug is reproducible, and 
	still exists in the latest daily build/current CVS version. Also check the
	<a href="compatibility.php">compatibility listing</a> for that game to ensure
	the issue is not already known.</p></li>
            
    </ol>
  </li>

</ol>

<?

echo html_round_frame_end("&nbsp;");

// end of html
sidebar_end();
html_footer();

?>
