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
	  <big><b>Downloads for ScummVM</b> ver: 0.3.0b</big><br>
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

	  <ul>
	  <li><a href="/downloads/scummvmwin32.exe">Win32 Daily Snapshot</a> <small> (<? echo intval(filesize("downloads/scummvmwin32.exe")/1024) ?>K exe file, last update: <? echo date("F j, Y, g:i a",filemtime("downloads/scummvmwin32.exe")); ?>)</small></li>
	  <li><a href="http://arisme.free.fr/PocketScumm/daily/">PocketPC Builds</a> <small> (infrequent snapshots of the PocketPC binaries)</small></li>
	  <li><a href="http://sourceforge.net/cvs/?group_id=37116">CVS Instructions</a> <small> (for if you wish to retrieve the latest code to compile yourself</small></li>
	</p>
	
	<p>
 	  <b>0.3.0b Release binaries:</b>
	  <i><center>For a list of changes since the last version (0.2.0), <a href="http://sourceforge.net/project/shownotes.php?release_id=126358">read the release notes</a></center></i>
	</p>

	<ul>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm_0.3.0b-win32.exe?download">ScummVM Windows Installer</a> <small>(1.0M Win32 .exe)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm_0.3.0b-win32.zip?download">ScummVM Windows Zipfile</a> <small>(985k zipfile)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.3.0b-macosx.dmg?download">MacOS X Disk Image</a> <small>(627k dmg image)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm_0.3.0b-morphos.tar.bz2?download">MorphOS binary</a> <small>(397k tar.bz2)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm_0.3.0b-0.woody.1_i386.deb?download">Debian Stable (woody) Package</a> <small>(321k .deb)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.3.0b-redhat80.i386.rpm?download">RedHat 8.0 package</a> <small>(441k RPM)</small></li>
	  <li><hr></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/PocketSCUMM_Install_0_3_0b.exe?download">PocketSCUMM Windows-based Installer (PocketPC: ARM/SH3/MIPS)</a> <small>(1.1M Win32 .exe)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/PocketSCUMM_0_3_0b-ARM.zip?download">PocketSCUMM ARM binary</a> <small>(371k .zip)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/PocketSCUMM_0_3_0b-MIPS.zip?download">PocketSCUMM MIPS binary</a> <small>(437k .zip)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/PocketSCUMM_0_3_0b-SH3.zip?download">PocketSCUMM SH3 binary</a> <small>(405k .zip)</small></li>
	</ul>
	
	<p>
	  <b>0.3.0b Tools (mostly unsupported):</b>
	</p>
	<ul>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm_tools_0.3.0b-win32.exe?download">ScummVM Tools - Windows Installer</a> <small>(159k Win32 .exe)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm_tools_0.3.0b-win32.zip?download">ScummVM Tools - Windows Zipfile</a> <small>(119k zip file)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.3.0-macosx.tar.gz?download">ScummVM Tools - MacOS X tarball</a> <small>(147k tar.gz)</small></li>
	</ul>

	<p>
	  <b>0.3.0b Source Code:</b>
	</p>
	<ul>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm_0.3.0b-src.zip?download">Source Zipfile</a> <small>(868k)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm_0.3.0b-src.tar.gz?download">Source tar.gz</a> <small>(705k)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm_0.3.0b-src.tar.bz2?download">Source tar.bz2</a> <small>(585k)</small>
	  <li><hr></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm_tools_0.3.0b-src.zip?download">Tools - Source zipfile</a> <small>(82k)</small>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm_tools_0.3.0b-src.tar.gz?download">Tools - Source tar.gz</a> <small>(65k)</small>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm_tools_0.3.0b-src.tar.bz2?download">Tools - Source tar.bz2</a> <small>(36k)</small>
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
