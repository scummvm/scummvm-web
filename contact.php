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

// Function to insert people in the list of developers
function add_person ($name, $nick, $desc)
{
	echo "<tr>";
	echo "<td>".$name."</td>";
	if ($nick != "")
		echo "<td>[ ".$nick." ]</td>";
	else
		echo "<td></td>";
	echo "<td>- ".$desc."</td>";
	return do_indent("<b>$str</b><br>\n".html_line());
}


// start of html
html_header("ScummVM :: Contact");
sidebar_start();

//display welcome table
echo html_round_frame_start("Contact","98%","",20);

?>
	<p>
	  <big><b>Contacts and Credits</b></big><br>
	  <? echo html_line(); ?>
	</p>
	<p>
      <b>Please do not contact the team for questions about using ScummVM. Use the forums or bug reporting system instead!</b><br>
      Feel free to stop by our #scummvm IRC channel on
      <a href="http://freenode.net/irc_servers.shtml">irc.freenode.net</a>.
    </p>
    
	<blockquote>
	<table border=0 cellpadding=5 cellspacing=0>
	  
      <tr><td colspan=3><b>The core ScummVM team:</b><? echo html_line(); ?></td></tr>
      
	  <?php
	  add_person('<a href="http://sourceforge.net/sendmessage.php?touser=2715" target="_blank">James Brown</a>',
	  			 '<a href="http://www.enderboi.com/">endy</a>',
	  			 "Lead developer");
	  add_person('<a href="http://sourceforge.net/sendmessage.php?touser=345958" target="_blank">Vincent Hamm</a>',
	  			 'yazoo', "Developer (retired)");
	  add_person('<a href="http://sourceforge.net/sendmessage.php?touser=12935" target="_blank">Max Horn</a>',
	  			 'fingolfin', "Developer, MacOS X port, new GUI");
	  add_person('<a href="http://sourceforge.net/sendmessage.php?touser=339357" target="_blank">Jeremy Newman</a>',
	  			 '<a href="http://www.dracowulf.com/">laxdragon</a>', "Webmaster");
	  add_person('Ludvig Strigeus', 'ludde', "Original ScummVM author, initial Simon support (retired)");
	  ?>
  
      <tr><td colspan=3>&nbsp;</td></tr>
      <tr><td colspan=3><b>Developers:</b><? echo html_line(); ?></td></tr>
      
	  <?php
	  add_person("Torbj&ouml;rn Andersson", "eriktorbjorn", "Many different contributions");
	  add_person("Nicolas Bacca", "arisme", "PocketPC/WinCE port");
	  add_person("Ralph Brorsen", "painelf", "His work on the new GUI");
	  add_person("Jamieson Christian", "jamieson630", "Lots of work on iMuse/MIDI");
	  add_person("Marcus Comstedt", "", "Dreamcast port");
	  add_person("Jonathan Gray", "khalek", "Expert weaver in the Loom");
	  add_person("Ruediger Hanke", "", "MorphOS port");
	  add_person("Travis Howell", "Kirben", "Daily Win32 builds, Simon The Sorcerer work");
	  add_person("Felix Jakschitsch", "yot", "His hard work on Zak256");
	  add_person("Oliver Kiehl", "olki", "Simon The Sorcerer work");
	  add_person("Pawel Kolodziejski", "aquadran", "Added missing Dig SMUSH codecs");
	  add_person("Mutwin Kraus", "mutle", "MacOS Carbon port (retired)");
	  add_person("Peter Moraliyski", "ph0x", "GP32 port");
	  add_person("Nicolas Noble", "pixels", "Config file and ALSA support");
	  add_person("Joost Peters", "joostp", "Beneath a Steel Sky Support");
	  add_person("Lionel Ulmer", "bbrox", "X11/Linux port");
	  ?>

      <tr><td colspan=3>&nbsp;</td></tr>
      <tr><td colspan=3><b>Contributors:</b><? echo html_line(); ?></td></tr>

	  <?php
	  add_person("Kov&aacute;cs Endre J&aacute;nos", "", "Several fixes for Simon1");
	  add_person("Janne Huttunen", "", "V3 actor mask support, Dig/FT SMUSH audio");
	  add_person("Jeroen Janssen", "", "Numerous readability and bugfix patches");
	  add_person("Claudio Matsuoka", "", 'Daily Linux/BeOS builds (<a href="http://scummvm.sourceforge.net/daily/">http://scummvm.sourceforge.net/daily/</a>)');
	  add_person("Gregory Montoir", "", "AdvanceMAME Scale-2X implementation");
	  add_person("Mikesch Nepomuk", "", "MI1 VGA Floppy patches");
	  add_person("Edward Rudd", "", "Fixes for playing MP3 versions of MI1/Loom Audio");
	  add_person("Daniel Schepler", "", "Final MI1 CD music support");
	  add_person("Andr&eacute; Souza", "", "SDL-based OpenGL renderer");
	  add_person("Tim ???", "realmz", "Initial MI1 CD music support");
	  ?>

      <tr><td colspan=3>&nbsp;</td></tr>
      <tr><td colspan=3>And to all the contributors, users, and beta testers we've missed. Thanks!</td></tr>
      
      <tr><td colspan=3>&nbsp;</td></tr>
      <tr><td colspan=3><b>Special thanks to:</b><? echo html_line(); ?></td></tr>
      
	  <?php
	  add_person("Sander Buskens", "", "For his work on the initial reversing of Monkey2");
	  add_person("Jimmi Th&oslash;gersen", "", "For ScummRev, and much obscure code/documentation");
	  add_person("Kevin Carnes", "", "For Scumm16, the basis of ScummVM's older gfx codecs");
	  ?>

      <tr><td colspan=3>&nbsp;</td></tr>
      <tr><td colspan=3>
        Aric Wilmunder, Ron Gilbert, David Fox, Vince Lee, and all those at
        LucasFilm/LucasArts who made SCUMM the insane mess to reimplement
        that it is today. Feel free to drop us a line and tell us what you
        think, guys!        
      </td></tr>

	</table>
	</blockquote>

<?

echo html_round_frame_end("&nbsp;");

// end of html
echo html_p();
sidebar_end();
html_footer();

?>
