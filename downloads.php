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
	  <big><b>Downloads for ScummVM</b> ver: 0.2.0</big><br>
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
<!--          <b>Daily CVS Builds</b>
	  <ul>
	    <li><a href="/downloads/scummvmwin32.exe">Win32 Daily Snapshot</a> <small>
	    (<? echo intval(filesize("downloads/scummvmwin32.exe")/1024) ?>K exe file, last update:
	    <? echo date("F j, Y, g:i a",filemtime("downloads/scummvmwin32.exe")); ?>)</small></li>	  
          </ul> -->
	</p>
	
	<p>
 	  <b>0.2.0 Release binaries:</b>
	  <ul>
	    <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm_0.2.0-win32.zip">Win32 Official 0.2.0 Build</a> <small>(260k zip file)</small></li>
	    <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm_0.2.0_i386.deb">Woody Official 0.2.0 Package</a> <small>(212k deb package)</small></li>
	    <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.2.0-macosx_sdl.tar.gz">MacOS X Official 0.2.0 Build</a> <small>(359k gziped tarball)</small></li>
	    <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm_0.2-3_arm.ipk">iPaq Linux Official 0.2.0 Build</a> <small>(250k ipkg package)</small></li>
	    <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-mips-sgi-irix5.gz">SGI Irix MIPS Official 0.2.0 binary</a> <small>(516kb gzip file)</small></li>
	    <li><a href="http://prdownloads.sourceforge.net/scummvm/PocketSCUMM_Install_0_2_0.exe">WinCE ARM/MIPS/SH3 Official 0.2.0 installer</a> <small>(820k Win32 executable)</small></li>
	    <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.2.0-dc-bin.zip">Dreamcast Official 0.2.0 scrambled binary</a> <small>(338k zip file)</small></li>
	    <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.2.0-dc-nero.zip">Dreamcast Official 0.2.0 NERO image</a> <small>(2.3mb zip file)</small></li>
	    <li>more builds (eg, BeOS, RPMs, MorphOS) coming soon..</li>
	  </ul>
	</p>
	
	<p>
	  <b>0.2.0 Source Code:</b>
	  <ul>
	    <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm_0.2.0-src.tgz">Source tarball</a> <small>(668k)</small></li>
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
