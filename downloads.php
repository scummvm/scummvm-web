<?

/*
 * Downloads Page for ScummVM
 * by Jeremy Newman <jnewman@dracowulf.com>
 *
 */

// set this for position of this file relative
$file_root = ".";

// load libraries
require($file_root."/include/"."incl.php");

// start of html
html_header("ScummVM :: Downloads");
sidebar_start();

//display welcome table
echo html_round_frame_start("Downloads","98%","",20);

?>
	<p>
	  <big><b>Downloads for ScummVM</b> ver: 0.1.0</big><br>
	  <? echo html_line(); ?>
	</p>

	<p>
	  Downloads are hosted with SourceForge.net. If you have one of the supported systems, you can directly download
	  the appropriate binary distribution. If you have another system, download the source and read the
	  <a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/*checkout*/scummvm/scummvm/readme.txt?rev=HEAD">readme.txt</a>
	  file for directions on how to build ScummVM.<br><br>

	  If you have successfully ported ScummVM to a platform not listed, please drop us a note, telling which OS, etc.
	  you used.<br><br>

	  You can also get the latest development source and binaries from the <a href="http://scummvm.sourceforge.net/daily/">CVS Daily Snapshot</a>
	  page. To quickly get the binary executable from that page, download the .gz from the column of the OS you use. Then
	  simply rename the file to it&#146;s executable form.<br>

	  View the <a href="/daily/ChangeLog">ChangeLog</a> to see the latest updates of ScummVM
	</p>
	
	<p>
	  <b>Daily CVS Builds</b>
	  <ul>
	    <li><a href="/downloads/scummvmwin32.exe">Win32 Daily Snapshot</a> <small>(246K exe file) </small></li>	  
	  </ul>
	</p>
	
	<p>
 	  <b>0.1.0 Release binaries:</b>
	  <ul>
	    <li><a href="http://scummvm.sourceforge.net/downloads/scummvm-0.1.0-win32.zip">Win32 Official 0.1.0 Build</a> <small>(478K zip file) </small></li>
	    <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.1.0-win32.exe">Win32 0.1.0 SDL Build</a> <small>(240K exe file) </small></li>
	    <li><a href="http://www.doc.ic.ac.uk/~mbt99/dcdev/">Dreamcast</a> port by Mark Thomas.</li>
	    <li>more builds (e.g. MacOS) coming soon....</li>
	  </ul>
	</p>
	
	<p>
	  <b>0.1.0 Source Code:</b>
	  <ul>
	    <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.1.0b.zip">zip</a> <small>(184k zip file)</small></li>
	  </ul>
	</p>
	
	<p>
	  <b>Required Libraries:</b>
	  <ul>
	    <li><a href="http://www.libsdl.org/download-1.2.html">SDL 1.2.x</a></li>
	  </ul>
	</p>
		
	<p>
	  <b>Optional Libraries:</b>
	  <ul>
	    <li><a href="http://www.mars.org/home/rob/proj/mpeg/">MAD</a>: MPEG Audio Decoder</li>
	  </ul>
	</p>		
		
<?

echo html_round_frame_end("&nbsp;");

// end of html
echo html_p();
sidebar_end();
html_footer();

?>
