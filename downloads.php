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
	  <a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/scummvm/scummvm/README?rev=HEAD">README</a>
	  file for directions on how to build ScummVM.
	</p>

	<p>
	  If you have successfully ported ScummVM to a platform not listed, please drop us a note, telling which OS, etc.
	  you used.
	</p>

	<p>
	  <b>Daily CVS Builds:</b>
	</p>

	<p>
<!--
	  You can get the latest development source and binaries for BeOS/Intel and Linux/Intel from the
	  <a href="http://scummvm.sourceforge.net/daily/">CVS Daily Snapshot</a> page. To quickly get a
	  binary executable from that page, download the .gz from the column of the OS you use. Then
	  simply rename the file to it&#146;s executable form.<br>

	  View the <a href="/daily/ChangeLog">ChangeLog</a> to see the latest updates of ScummVM
-->
	Please note that the 0.2.0 download linked below is several months old, and not recommended for use. We are planning a new 
release soon, but meanwhile here are links to experimental snapshots of the current code:

	  <ul>
	  <li><a href="/downloads/scummvmwin32.exe">Win32 Daily Snapshot</a> <small> (<? echo intval(filesize("downloads/scummvmwin32.exe")/1024) ?>K exe file, last update: <? echo date("F j, Y, g:i a",filemtime("downloads/scummvmwin32.exe")); ?>)</small></li>
	  <li><a href="http://arisme.free.fr/PocketScumm/daily/">PocketPC Builds</a> <small> (infrequent snapshots of the PocketPC binaries)</small></li>
	  <li><a href="http://sourceforge.net/cvs/?group_id=37116">CVS Instructions</a> <small> (for if you wish to retrieve the latest code to compile yourself</small></li>
	</p>
	
	<p>
 	  <b>0.2.0 Release binaries:</b>
	</p>
	<ul>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm_0.2.0-win32.zip">Win32 Official 0.2.0 Build</a> <small>(260k zip file)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm_0.2.0_i386.deb">Woody Official 0.2.0 Package</a> <small>(212k deb package)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.2.0-macosx_sdl.tar.gz">MacOS X Official 0.2.0 Build</a> <small>(359k gziped tarball)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm_0.2-3_arm.ipk">iPaq Linux Official 0.2.0 Build</a> <small>(250k ipkg package)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-mips-sgi-irix5.gz">SGI Irix MIPS Official 0.2.0 binary</a> <small>(516kb gzip file)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/PocketSCUMM_Install_0_2_0.exe">WinCE ARM/MIPS/SH3 Official 0.2.0 installer</a> <small>(820k Win32 executable)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.2.0-dc-bin.zip">Dreamcast Official 0.2.0 scrambled binary</a> <small>(338k zip file)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.2.0-dc-nero.zip">Dreamcast Official 0.2.0 NERO image</a> <small>(2.3mb zip file)</small></li>
	</ul>
	
	<p>
	  <b>0.2.0 Source Code:</b>
	</p>
	<ul>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm_0.2.0-src.tgz">Source tarball</a> <small>(668k)</small></li>
	</ul>
	
	<p>
	  <b>Required Libraries:</b>
    </p>
	<ul>
	  <li><a href="http://www.libsdl.org/download-1.2.html">SDL 1.2.x</a></li>
	</ul>
		
	<p>
	  <b>Optional Libraries:</b>
	</p>
	<ul>
	  <li><a href="http://www.mars.org/home/rob/proj/mpeg/">MAD</a>: MPEG Audio Decoder</li>
	  <li><a href="http://www.vorbis.com/">Ogg Vorbis</a></li>
	</ul>
<?

echo html_round_frame_end("&nbsp;");

// end of html
echo html_p();
sidebar_end();
html_footer();

?>
