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
      Feel free to stop by our #scummvm IRC channel on irc.openprojects.net
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
	  add_person("Felix Jakschitsc", "yot", "His hard work on Zak256");
	  add_person("Oliver Kiehl", "olki", "Simon The Sorcerer work");
	  add_person("Pawel Kolodziejski", "aquadran", "Added missing Dig SMUSH codecs");
	  add_person("Mutwin Kraus", "mutle", "MacOS Carbon port (retired)");
	  add_person("Peter Moraliyski", "ph0x", "GP32 port");
	  add_person("Nicolas Noble", "pixels", "Config file and ALSA support");
	  add_person("Lionel Ulmer", "bbrox", "X11/Linux port");
	  ?>

      <tr><td colspan=3>&nbsp;</td></tr>
      <tr><td colspan=3><b>Contributors:</b><? echo html_line(); ?></td></tr>

      <tr>
	    <td>Claudio Matsuoka</td>
	    <td></td>
	    <td>- Daily Linux/BeOS builds (<a href="http://scummvm.sf.net/daily/">http://scummvm.sf.net/daily/</a>)</td>
	  </tr>

      <tr>
	    <td>Janne Huttunen</td>
	    <td></td>
	    <td>- V3 actor mask support, Dig/FT SMUSH audio</td>
	  </tr>

      <tr>
	    <td>Jeroen Janssen</td>
	    <td></td>
	    <td>- Numerous readability and bugfix patches</td>
	  </tr>

      <tr>
	    <td>Gregory Montoir </td>
	    <td></td>
	    <td>- AdvanceMAME Scale-2X implementation</td>
	  </tr>

      <tr>
	    <td>Mikesch Nepomuk</td>
	    <td></td>
	    <td>- MI1 VGA Floppy patches</td>
	  </tr>

      <tr>
	    <td>Edward Rudd</td>
	    <td></td>
	    <td>- Fixes for playing MP3 versions of MI1/Loom Audio</td>
	  </tr>

      <tr>
	    <td>Daniel Schepler</td>
	    <td></td>
	    <td>- Final MI1 CD music support</td>
	  </tr>

      <tr>
	    <td>Tim ???</td>
	    <td>[ realmz ]</td>
	    <td>- Initial MI1 CD music support</td>
	  </tr>

      <tr>
	    <td>Andr&eacute; Souza </td>
	    <td></td>
	    <td>- SDL-based OpenGL renderer</td>
	  </tr>

      <tr>
	    <td>Kov&aacute;cs Endre J&aacute;nos</td>
	    <td></td>
	    <td>- Several fixes for Simon1</td>
	  </tr>

      <tr><td colspan=3>&nbsp;</td></tr>
      <tr><td colspan=3>And to all the contributors, users, and beta testers we've missed. Thanks!</td></tr>
      
      <tr><td colspan=3>&nbsp;</td></tr>
      <tr><td colspan=3><b>Special thanks to:</b><? echo html_line(); ?></td></tr>
      
      <tr>
	    <td>Sander Buskens</td>
	    <td></td>
	    <td>- For his work on the initial reversing of Monkey2</td>
	  </tr>

      <tr>
	    <td>Jimmi Th&oslash;gersen</td>
	    <td></td>
	    <td>- For ScummRev, and much obscure code/documentation</td>
	  </tr>

      <tr>
	    <td>Kevin Carnes</td>
	    <td></td>
	    <td>- For Scumm16, the basis of ScummVM's older gfx codecs</td>
	  </tr>

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
