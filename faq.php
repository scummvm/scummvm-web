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
echo html_round_frame_start("FAQ :: Frequently Asked Questions","98%","",20);

?>
	<p>
	  <big><b>FAQ</b></big><br>
	  <small>last updated: January 13, 2002</small><br>
	  <? echo html_line(); ?>
	</p>

1. Introduction<br>
1.1. Why is it called ScummVM - what does this name mean?<br>
1.2. What is SCUMM?<br>
1.3. Is ScummVM free?<br>
1.4. What games does ScummVM support?<br>
1.5. Will ScummVM support other games?<br>
1.6. Where do I find ScummVM?<br>
1.7. How do I compile the source code for my OS?<br>
1.8. What is the latest version of ScummVM?<br>
1.9. On what platforms does ScummVM run?<br>
<br>
<br>
2. ScummVM and SCUMM games<br>
2.1. Do I need original CDs/Floppies?<br>
2.2. Does ScummVM work with all versions of games?<br>
2.3. Can I play through xxx (place your favorite SCUMM adventure here) ?<br>
2.4. Can I save/load the game?<br>
2.5. Do savegames from the original work in ScummVM?<br>
<br>
<? echo html_line(); ?>
<br>
<br>
1. Introduction<br>
<br>
1.1. Why is it called ScummVM - what does this name mean?<br>
Scumm comes from the fact that it was designed to run SCUMM games, like Monkey Island.<br>
VM stands for VIRTUAL MACHINE.<br>
<br>
<br>
1.2. What is SCUMM?<br>
SCUMM stands for "Script Creation Utility for Maniac Mansion". It is an utility used to create the famous LucasArts adventure games.<br>
It was initially created in 1987 by Aric Wilmunder and Ron Gilbert for the game "Maniac Manson" and was used later, with some modifications, for Zak McKracken and the Alien Mindbenders, Loom, Indiana Jones and the Last Crusade, Indiana Jones and the Fate of Atlantis, Monkey Island 1,2,3, Sam & max Hit the Road, Day of the Tentacle, The Dig and Full Throttle.<br>
<br>
<br>
1.3. Is ScummVM free?<br>
ScummVM is released under the GPL (General Public License), so it's more than free. ScummVM source code is freely available and you can do whatever you want with it. If you make modifications to it and redistribute your work you MUST make the source available. However, ScummVM team would be pleased if you choose to send them your modifications, so they can be merged into the main tree.<br>
More information on the GNU GPL at http://www.gnu.org/copyleft/gpl.html.<br>
<br>
<br>
1.4. What games does ScummVM support?<br>
ScummVM currently supports Monkey Island 2, Indiana Jones and the Fate of Atlantis, Day of the Tentacle, Monkey Island ( CD version ), Sam&Max ( Floppy version ), and Full Throttle ( very buggy ).<br>
<br>
<br>
1.5. Will ScummVM support other games?<br>
Aren't those games enough? :-)<br>
Anyway, ScummVM team is working to made newer games (as The Dig and older games) playable.<br>
We are also working to correct make the currently supported games more acurate ( especialy Full Throttle ).<br>
The next game to be included is likely to be either Loom ( CD version ) and The Dig.<br>
<br>
<br>
<br>
1.6 Where do I find ScummVM?<br>
You can find it on the page on sourceforge: http://www.sourceforge.net/projects/scummvm. You can download the latest version, which could be a little old. For the most recent version, you have to get it via CVS (instructions are on SourceForge page).<br>
<br>
<br>
1.7. How do I compile the source code for my OS?<br>
The source code package contains a file called "README.txt" that explains everything.<br>
<br>
<br>
1.8. What is the latest version of ScummVM?<br>
It's currently in alpha status. See also 1.6 to learn where to find the latest version.<br>
<br>
<br>
1.9. On what platform does ScummVM run?<br>
ScummVM should be able to be compiled on any SDL platform, just with small modifications.<br>
However, it hasn't been tested fully on Big Endian CPU, so it may be buggy.<br>
Currently tested platforms are Win32 (Windows 9x/ME/NT/2000), Linux/i386, BeOS. Solaris is also working. ScummVM team is interested to receive feedback on other platforms (MacOSX, other UNIX platforms, etc.)<br>
<br>
<br>
<? echo html_line(); ?>
<br>
<br>
<br>
2. ScummVM and SCUMM games<br>
<br>
2.1. Do I need original CDs/Floppies?<br>
Most definitely. ScummVM won't work without them.<br>
<br>
2.1bis. Do I really need the ORIGINAL CDs/Floppies?<br>
Well... any working CDs/Floppies will do (See also 2.2), but I encourage you to use originals.<br>
<br>
<br>
2.2. Does ScummVM work with all versions of games?<br>
Tested games are Monkey Island 2, Monkey Island 1 CD, Indy4, Day of the Tentacle. Monkey 1 floppy doesn't work at all, Monkey 2 CD could work (if you made it, please tell to the ScummVM team).<br>
<br>
<br>
2.3. Can I play through xxx (place your favorite SCUMM adventure here) ?<br>
Games that can be completed by now is Monkey Island CD version and Indy4 (but not all features are implemented). All other games have some major bugs which makes them impossible to complete (except Monkey 2, which has just some minor bugs, but those make MI2 very hard to complete). Day of the tentacle could be completed, but the copy protection doesn't work as it should. If you have a copy without it, probably you could complete the game.<br>
<br>
<br>
2.4. Can I save/restore the game?<br>
Yes. Saving and restoring is already supported (SHIFT-1/9 to save, CTRL - 1/9 to restore, or F5 to access the saving screen).<br>
<br>
<br>
2.5. Do savegames from the original games work in ScummVM?<br>
No. And newer versions of ScummVM could also broke compatibility with older savegames.<br>


<?

echo html_round_frame_end("&nbsp;");

// end of html
echo html_p();
sidebar_end();
html_footer();

?>
