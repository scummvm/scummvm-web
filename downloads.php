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
echo html_round_frame_start("Downloads","");

?>
	<h1>Downloads for ScummVM <span style="color: gray;">version 0.6.0</span></h1>

	<p>
	  Downloads are hosted with SourceForge.net. If you have one of the supported systems, you can directly download
	  the appropriate binary distribution. If you have another system, download the source and read the
	  <a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/scummvm/scummvm/README?rev=release-0-6-0">README</a>
	  file for directions on how to build ScummVM.
	</p>

	<p>
	  If you have successfully ported ScummVM to a platform not listed, please drop us a note, telling which OS, etc.
	  you used.
	</p>

	<p>
	The latest STABLE release of ScummVM is 0.6.0, and can be downloaded below under 'Release Binaries'.<BR>
	For UNSTABLE experimental versions of ScummVM,	please see the <a href="#CVS">CVS</a> section, at the end of this page.<BR>
	 <a href="#extras">Extras</a>, such as the freeware release of Beneath a Steel Sky and Flight of the Amazon Queen, as well as Broken Sword cutscene 
packs, can also be found below.
	</p>

	<hr>
	<A name="stable">
	<p>
 	  <b>0.6.0 Release binaries:</b>
	</p>
	<p>For a list of changes since the previous version, <a href="http://sourceforge.net/project/shownotes.php?release_id=223566">read the release notes</a>.</p>
	<p>0.6.0 should be apt-get'able from Debian unstable (sid) shortly.</p>

	<ul>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.6.0-win32.exe?download">Windows Installer</a> <small>(1.2M Win32 .exe)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.6.0-win32.zip?download">Windows zipfile</a> <small>(1.2M zipfile)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.6.0-macosx.dmg?download">Mac OS X 10.2 Disk Image</a> <small>(1.5M disk image)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.6.0-1.i386.rpm?download">RedHat package</a> <small>(1.2M RPM)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.6.0-1.src.rpm?download">Source RPM</a> <small>(2.2M RPM)</small></li>
<!--
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.6.0-morphos.tgz?download">MorphOS binary</a> <small>(857k .tgz)</small></li>
-->
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm_0.6.0-0woody1_i386.deb?download">Debian Stable (woody) Package</a> <small>(1.7M .deb)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.6.0-beos-x86.pkg?download">BeOS package</a> <small>(1.6M pkg)</small></li>

	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.6.0-palmos.zip?download">PalmOS binary</a> <small>(530k zipfile)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.6.0-solaris8-sparc.tar.gz?download">Solaris 8 (Sparc) binary</a> <small>(1.0M .tar.gz)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.6.0-dreamcast-plainfiles.tar.bz2?download">Dreamcast plain files</a> <small>(1.3M zipfile)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.6.0-HandheldPC_ARM.zip?download">HandheldPC ARM binary</a> <small>(1.0M zipfile)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.6.0-HandheldPC_MIPS.zip?download">HandheldPC MIPS binary</a> <small>(1.3M zipfile)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.6.0-HandheldPC_SH3.zip?download">HandheldPC SH3 binary</a> <small>(1.1M zipfile)</small></li>

	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.6.0-PocketPC_ARM.zip?download">PocketPC ARM binary</a> <small>(1.0M zipfile)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.6.0-PocketPC_MIPS.zip?download">PocketPC MIPS binary</a> <small>(1.3M zipfile)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.6.0-PocketPC_SH3.zip?download">PocketPC SH3 binary</a> <small>(1.1M zipfile)</small></li>

	</ul>

	<p>
	  <b>0.6.0 Tools (mostly unsupported):</b>
	</p>
	<ul>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.6.0-win32.exe?download">ScummVM Tools - Windows Installer</a> <small>(118k Win32 .exe)</small></li>
	</ul>

	<p>
	  <b>0.6.0 Source Code:</b>
	</p>
	<ul>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.6.0.tar.bz2?download">Source tar.bz2</a> <small>(1.5M)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.6.0.zip?download">Source .zip</a> <small>(2.5M)</small></li>
	</ul>

	<p>
	  <b>0.6.0 Tools Source Code:</b>
	</p>
	<ul>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.6.0.tar.bz2?download">Tools - Source tar.bz2</a> <small>(74k)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.6.0.zip?download">Tools - Source .zip</a> <small>(102k)</small></li>
	</ul>

	<A NAME="extras">
	<p>
	   <b>Extras!:</b>
	</p>
	<ul>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/BASS-CD.zip?download">Beneath a Steel Sky, Freeware CD Version</a> <small>(67M)</small></li>
	  <li><a href="http://www.mixnmojo.com/bss/BASS-Floppy.zip">Beneath a Steel Sky, Freeware Floppy Version</a> <small>(7.3M)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/FOTAQ-Talkie.zip?download">Flight of the Amazon Queen, Freeware CD Version</a> <small>(34.8M)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/FOTAQ-Floppy.zip?download">Flight of the Amazon Queen, Freeware Floppy Version</a> <small>(6.7M)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/Sword1_Cutscenes.zip?download">Broken Sword 1 Cutscene Pack</a> <small>(31.2M)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/Sword2_Cutscenes.zip?download">Broken Sword 2 Cutscene Pack</a> <small>(27.8M)</small></li>
	</ul>

	<hr>
	<A NAME="CVS">
	<p>
	  <b>Daily CVS Builds:</b>
	</p>

	<p>
	  View the <a href="/daily/ChangeLog">ChangeLog</a> to see the latest updates of ScummVM.
	</p>
	<p>
	  You can get the latest development source and binaries for Linux/Intel from the
	  <a href="http://www.scummvm.org/daily/">CVS Daily Snapshot</a> page.
	</p>
	<p>
	  Additional snapshot builds:
	</p>

	<ul>
<!--
	  <li><a href="/downloads/scummvm-daily.tar.bz2">Source Code Daily Snapshot Bzipped</a> <small> (<? echo intval(filesize("downloads/scummvm-daily.tar.bz2")/1024) ?>K file, last update: <? echo date("F j, Y, g:i a",filemtime("downloads/scummvm-daily.tar.bz2")); ?>)</small></li>
	  <li><a href="/downloads/scummvm-daily.tar.gz">Source Code Daily Snapshot Gzipped</a> <small> (<? echo intval(filesize("downloads/scummvm-daily.tar.gz")/1024) ?>K file, last update: <? echo date("F j, Y, g:i a",filemtime("downloads/scummvm-daily.tar.gz")); ?>)</small></li>
	  <li><a href="/downloads/scummvm-daily.zip">Source Code Daily Snapshot Zipped</a> <small> (<? echo intval(filesize("downloads/scummvm-daily.zip")/1024) ?>K file, last update: <? echo date("F j, Y, g:i a",filemtime("downloads/scummvm-daily.zip")); ?>)</small></li>
-->
	  <li><a href="/downloads/scummvmwin32.exe">Win32 Daily Snapshot</a> <small> (<? echo intval(filesize("downloads/scummvmwin32.exe")/1024) ?>K exe file, last update: <? echo date("F j, Y, g:i a",filemtime("downloads/scummvmwin32.exe")); ?>)</small></li>
	  <li><a href="/downloads/ScummVM-snapshot.dmg">Mac OS X Snapshot</a> <small> (<? echo intval(filesize("downloads/ScummVM-snapshot.dmg")/1024) ?>K dmg file, last update: <? echo date("F j, Y, g:i a",filemtime("downloads/ScummVM-snapshot.dmg")); ?>)</small></li>
	  <li><a href="http://arisme.free.fr/PocketScumm/daily/">PocketPC Builds</a> <small> (infrequent snapshots of the PocketPC binaries)</small></li>
	  <li><a href="http://paras.rasmatazz.bei.t-online.de/">Dreamcast Daily Builds</a></li>
	  <li><a href="http://sourceforge.net/cvs/?group_id=37116">CVS Instructions</a> <small> (for if you wish to retrieve the latest code to compile yourself)</small></li>
	</ul>
	<hr>
	<p>
	  <b>Required Libraries:</b>
        </p>
	<ul>
	  <li><a href="http://www.libsdl.org/download-1.2.php">SDL 1.2.x</a></li>
	</ul>
		
	<p>
	  <b>Optional Libraries:</b>
	</p>
	<ul>
	  <li><a href="http://www.underbit.com/products/mad/">MAD</a>: MPEG Audio Decoder</li>
	  <li><a href="http://www.vorbis.com/">Ogg Vorbis</a></li>
	</ul>
<?

echo html_round_frame_end("&nbsp;");

// end of html
sidebar_end();
html_footer();

?>
