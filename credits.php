<?

/*
 * Credits Page for ScummVM
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
		echo "<td>[&nbsp;".$nick."&nbsp;]</td>";
	else
		echo "<td></td>";
	echo "<td>- ".$desc."</td>";
}


// start of html
html_header("ScummVM :: Credits");
sidebar_start();

//display welcome table
echo html_round_frame_start("Credits","");

?>
	<h1>Credits</h1>
    
	<table border=0 cellpadding=5 cellspacing=0s style="margin-left: 3em;">
	  
      <tr><td colspan=3><h2>The ScummVM team:</h2></td></tr>
      
	  <?php
	  add_person('<a href="http://sourceforge.net/sendmessage.php?touser=2715">James Brown</a>',
	  			 '<a href="http://www.enderboi.com/">endy</a>',
	  			 "Lead developer");
	  add_person('<a href="http://sourceforge.net/sendmessage.php?touser=12935">Max Horn</a>',
	  			 'fingolfin', "Lead developer");
	  add_person("Jonathan Gray", "khalek", "Engine: SCUMM");
	  add_person("Robert G&ouml;ffringmann", "lavosspawn", "Engine: Beneath a Steel Sky");
	  add_person("Oliver Kiehl", "olki", "Engine: Beneath a Steel Sky, Simon");
	  add_person("Pawel Kolodziejski", "aquadran", "Engine: SCUMM (Codecs, iMUSE, Smush, etc.)");
	  add_person("Joost Peters", "joostp", "Engine: Beneath a Steel Sky");
	  add_person("Chris Apers ", "chrilith ", "Port: PalmOS");
	  add_person("Nicolas Bacca", "arisme", "Port: PocketPC/WinCE");
	  add_person("Marcus Comstedt", "", "Port: DreamCast");
	  add_person("Ruediger Hanke", "", "Port: MorphOS");
	  add_person("Travis Howell", "Kirben", "Port: Win32, Engine: Simon");
	  add_person("Peter Moraliyski", "ph0x", "Port: GP32");
	  add_person("Lionel Ulmer", "bbrox", "Port: X11");
	  add_person("Torbj&ouml;rn Andersson", "eriktorbjorn", "Generic Bugfixer and Patch Submitter");
	  add_person("Jamieson Christian", "jamieson630", "iMuse, MIDI, all things musical");
	  add_person("Jochen Hoenicke", "hoenicke", "Speaker & PCjr sound support, Adlib work");
	  add_person('<a href="http://sourceforge.net/sendmessage.php?touser=339357">Jeremy Newman</a>',
	  			 '<a href="http://www.dracowulf.com/">laxdragon</a>', "Webmaster");
	  ?>
  
      <tr><td colspan=3>&nbsp;</td></tr>
      <tr><td colspan=3><h2>Retired Team Members:</h2></td></tr>
      
	  <?php
	  add_person("Ralph Brorsen", "painelf", "Help with GUI Implementation");
	  add_person('<a href="http://sourceforge.net/sendmessage.php?touser=345958">Vincent Hamm</a>',
	  			 'yazoo', "Co-Founder");
	  add_person("Felix Jakschitsch", "yot", "Zak256 reverse engineering");
	  add_person("Mutwin Kraus", "mutle", "Original MacOS Porter");
	  add_person('Ludvig Strigeus', 'ludde', "Original ScummVM and SimonVM Author");
	  ?>

      <tr><td colspan=3>&nbsp;</td></tr>
      <tr><td colspan=3><h2>Contributors:</h2></td></tr>

	  <?php
	  add_person("Janne Huttunen", "", "V3 actor mask support, Dig/FT SMUSH audio");
	  add_person("Kov&aacute;cs Endre J&aacute;nos", "", "Several fixes for Simon1");
	  add_person("Jeroen Janssen", "", "Numerous readability and bugfix patches");
	  add_person("Claudio Matsuoka", "", 'Provided aily Linux/BeOS builds in the past');
	  add_person("Gregory Montoir", "", "AdvanceMAME Scale-2X, TV 2x and Dot Matrix implementation");
	  add_person("Mikesch Nepomuk", "", "MI1 VGA Floppy patches");
	  add_person("Nicolas Noble", "pixels", "Config file and ALSA support");
	  add_person("Edward Rudd", "", "Fixes for playing MP3 versions of MI1/Loom Audio");
	  add_person("Daniel Schepler", "", "Final MI1 CD music support/ Initial Ogg Vorbis support");
	  add_person("Andr&eacute; Souza", "", "SDL-based OpenGL renderer");
	  add_person("Tim ???", "realmz", "Initial MI1 CD music support");
	  add_person("Stuart Caie", "", "Decoders for Simon 1 Amiga data files");
	  add_person("Quietust", "", "Sound support for Amiga SCUMM V2 - V3 games");
	  ?>

      <tr><td colspan=3>&nbsp;</td></tr>
      <tr><td colspan=3>And to all the contributors, users, and beta testers we've missed. Thanks!</td></tr>
      
      <tr><td colspan=3>&nbsp;</td></tr>
      <tr><td colspan=3><h2>Special thanks to:</h2></td></tr>
      
	  <?php
	  add_person("Sander Buskens", "", "For his work on the initial reversing of Monkey2");
	  add_person("Kevin Carnes", "", "For Scumm16, the basis of ScummVM's older gfx codecs");
	  add_person("Jim Leiterman", "", "Various info on his FmTowns/Marty SCUMM ports");
	  add_person("Jimmi Th&oslash;gersen", "", "For ScummRev, and much obscure code/documentation");
	  ?>

      <tr><td colspan=3>&nbsp;</td></tr>
      <tr><td colspan=3>
        Aric Wilmunder, Ron Gilbert, David Fox, Vince Lee, and all those at
        LucasFilm/LucasArts who made SCUMM the insane mess to reimplement
        that it is today. Feel free to drop us a line and tell us what you
        think, guys!        
      </td></tr>

	</table>

<?

echo html_round_frame_end("&nbsp;");

// end of html
sidebar_end();
html_footer();

?>
