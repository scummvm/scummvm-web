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
      
	  <tr>
	    <td><a href="http://sourceforge.net/sendmessage.php?touser=2715" target="_blank">James Brown</a></td>
	    <td>[ <a href="http://www.enderboi.com/">endy</a> ]</td>
	    <td>- Developer, Current Project Admin</td>
	  </tr>
	  
	  <tr>
	    <td><a href="http://sourceforge.net/sendmessage.php?touser=345958" target="_blank">Vincent Hamm</a></td>
	    <td>[ yazoo ]</td>
	    <td>- Developer</td>
	  </tr>
	  
	  <tr>
	    <td><a href="http://sourceforge.net/sendmessage.php?touser=339357" target="_blank">Jeremy Newman</a></td>
	    <td>[ <a href="http://www.dracowulf.com/">laxdragon</a> ]</td>
	    <td>- Webmaster</td>	  
	  </tr>

	  <tr>
	    <td>Ludvig Strigeus</td>
	    <td>[ strigeus ]</td>
	    <td>- Original ScummVM author, Former Project Admin</td>
	  </tr>
	  
      <tr><td colspan=3>&nbsp;</td></tr>
      <tr><td colspan=3><b>Porters:</b><? echo html_line(); ?></td></tr>
      
	  <tr>
	    <td>Lionel Ulmer</td>
	    <td></td>
	    <td>- X11/Linux port</td>
	  </tr>

	  <tr>
	    <td>Nicolas Bacca</td>
	    <td></td>
	    <td>- PocketPC/WinCE port</td>
	  </tr>
      
      <tr>
	    <td>Mutwin Kraus</td>
	    <td></td>
	    <td>- Macintosh port (Retired)</td>
	  </tr>

      <tr>
	    <td>Max Horn </td>
	    <td></td>
	    <td>- Macintosh port, many bug fixes</td>
	  </tr>

      <tr>
	    <td>Marcus Comstedt</td>
	    <td></td>
	    <td>- Dreamcast port</td>
	  </tr>

      <tr>
	    <td>Ruediger Hanke</td>
	    <td></td>
	    <td>- MorphOS port</td>
	  </tr>

      <tr><td colspan=3>&nbsp;</td></tr>
      <tr><td colspan=3><b>Contributors:</b><? echo html_line(); ?></td></tr>

      <tr>
	    <td>Claudio Matsuoka</td>
	    <td></td>
	    <td>- Daily builds (<a href="http://scummvm.sf.net/daily/">http://scummvm.sf.net/daily/</a>)</td>
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
	    <td>Tim 'realmz'</td>
	    <td></td>
	    <td>- Initial MI1 CD music support</td>
	  </tr>

      <tr>
	    <td>Jonathan 'khalek'</td>
	    <td></td>
	    <td>- Expert weaver in the Loom</td>
	  </tr>

      <tr>
	    <td>Nicolas Noble</td>
	    <td></td>
	    <td>- Config file and ALSA support</td>
	  </tr>

      <tr>
	    <td>Pawel Kolodziejski</td>
	    <td></td>
	    <td>- Added missing Dig SMUSH codecs</td>
	  </tr>

      <tr>
	    <td>Felix Jakschitsc</td>
	    <td></td>
	    <td>- His hard work on Zak256</td>
	  </tr>

      <tr>
	    <td>Andr, Souza </td>
	    <td></td>
	    <td>- SDL-based OpenGL renderer</td>
	  </tr>

      <tr>
	    <td>Kov cs Endre J nos</td>
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
	    <td>Jimmi Thogersen</td>
	    <td></td>
	    <td>- For ScummRev, and much obscure code/documentation</td>
	  </tr>

      <tr>
	    <td>Kevin Carnes</td>
	    <td></td>
	    <td>- For Scumm16, the basis of ScummVM older gfx codecs</td>
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
