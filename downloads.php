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
	  <big><b>Downloads for ScummVM</b> version 0.5.0</big><br>
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
	  View the <a href="/daily/ChangeLog">ChangeLog</a> to see the latest updates of ScummVM.
	</p>
	<p>
	  You can get the latest development source and binaries for Linux/Intel from the
	  <a href="http://scummvm.sourceforge.net/daily/">CVS Daily Snapshot</a> page.
	</p>
	<p>
	  Additional daily builds:
	</p>

	<ul>
<!--
	  <li><a href="/downloads/scummvm-daily.tar.bz2">Source Code Daily Snapshot Bzipped</a> <small> (<? echo intval(filesize("downloads/scummvm-daily.tar.bz2")/1024) ?>K file, last update: <? echo date("F j, Y, g:i a",filemtime("downloads/scummvm-daily.tar.bz2")); ?>)</small></li>
	  <li><a href="/downloads/scummvm-daily.tar.gz">Source Code Daily Snapshot Gzipped</a> <small> (<? echo intval(filesize("downloads/scummvm-daily.tar.gz")/1024) ?>K file, last update: <? echo date("F j, Y, g:i a",filemtime("downloads/scummvm-daily.tar.gz")); ?>)</small></li>
	  <li><a href="/downloads/scummvm-daily.zip">Source Code Daily Snapshot Zipped</a> <small> (<? echo intval(filesize("downloads/scummvm-daily.zip")/1024) ?>K file, last update: <? echo date("F j, Y, g:i a",filemtime("downloads/scummvm-daily.zip")); ?>)</small></li>
-->
	  <li><a href="/downloads/scummvmwin32.exe">Win32 Daily Snapshot</a> <small> (<? echo intval(filesize("downloads/scummvmwin32.exe")/1024) ?>K exe file, last update: <? echo date("F j, Y, g:i a",filemtime("downloads/scummvmwin32.exe")); ?>)</small></li>
	  <li><a href="http://arisme.free.fr/PocketScumm/daily/">PocketPC Builds</a> <small> (infrequent snapshots of the PocketPC binaries)</small></li>
	  <li><a href="http://paras.rasmatazz.bei.t-online.de/">Dreamcast Daily Builds</a></li>
	  <li><a href="http://sourceforge.net/cvs/?group_id=37116">CVS Instructions</a> <small> (for if you wish to retrieve the latest code to compile yourself</small></li>
	</ul>

	<p>There are no daily builds for Mac OS X available at this point</p>
	<hr>
	<p>
 	  <b>0.5.0 Release binaries:</b>
	</p>
	<p>For a list of changes since the previous version, <a href="https://sourceforge.net/project/shownotes.php?release_id=175327">read the release notes</a>.</p>
	<p>0.5.0 should be apt-get'able from Debian Unstable (sid) later in the week. Debian Stable (woody) downloads will also be added later in the week, as will downloads for BeOS and MorphOS</p>

	<ul>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.5.0-win32.exe?download">Windows Installer</a> <small>(1.0M Win32 .exe)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.5.0-win32.zip?download">Windows zipfile</a> <small>(1.0M zipfile)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.5.0-macosx.dmg?download">Mac OS X 10.2 Disk Image</a> <small>(672k disk image)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.5.0-1.i386.rpm?download">RedHat package</a> <small>(596k RPM)</small>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.5.0-1.src.rpm?download">Source RPM</a> <small>(1.3M RPM)</small>
<!--
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm_0.4.1-0woody1_i386.deb?download">Debian Stable (woody) Package</a> <small>(377k .deb)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.3.0-morphos.tar.bz2?download">MorphOS binary</a> <small>(397k .tar.bz2)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.4.1-beos.pkg?download">BeOS package</a> <small>(2.9M pkg)</small></li>
-->
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.5.0-palmos.zip?download">PalmOS binary</a> <small>(332k zipfile)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.5.0-solaris8-sparc.tar.gz?download">Solaris 8 (Sparc) binary</a> <small>(797k .tar.gz)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.5.0-dreamcast-plainfiles.tar.bz2?download">Dreamcast plain files</a> <small>(761k zipfile)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.5.0-dreamcast-nero.zip?download">Dreamcast CD-ROM image for Nero</a> <small>(2.9M zipfile)</small></li>
	  <hr></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.5.0-HandheldPC_ARM.zip?download">HandheldPC ARM binary</a> <small>(698k zipfile)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.5.0-HandheldPC_MIPS.zip?download">HandheldPC MIPS binary</a> <small>(782k zipfile)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.5.0-HandheldPC_SH3.zip?download">HandheldPC SH3 binary</a> <small>(733k zipfile)</small></li>

	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.5.0-PocketPC_ARM.zip?download">PocketPC ARM binary</a> <small>(681k zipfile)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.5.0-PocketPC_MIPS.zip?download">PocketPC MIPS binary</a> <small>(777k zipfile)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.5.0-PocketPC_SH3.zip?download">PocketPC SH3 binary</a> <small>(725k zipfile)</small></li>

	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.5.0-Smartphone2002.zip?download">Smartphone 2002 binary</a> <small>(681k zipfile)</small></li>
	</ul>

	<p>
	  <b>0.5.0 Tools (mostly unsupported):</b>
	</p>
	<ul>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.5.0-win32.exe?download">ScummVM Tools - Windows Installer</a> <small>(89k Win32 .exe)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.5.0-win32.zip?download">ScummVM Tools - Windows zipfile</a> <small>(50k zip file)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.5.0-macosx.tar.gz?download">ScummVM Tools - Mac OS X tarball</a> <small>(121k tar.gz)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.5.0-solaris8-sparc.tar.gz?download">ScummVM Tools - Sparc Solaris 8 tarball</a> <small>(121k tar.gz)</small></li>
	</ul>

	<p>
	  <b>0.5.0 Source Code:</b>
	</p>
	<ul>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.5.0.tar.gz?download">Source tar.gz</a> <small>(1.4M)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.5.0.tar.bz2?download">Source tar.bz2</a> <small>(1.1M)</small>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.5.0.zip?download">Source .zip</a> <small>(1.7M)</small>
	  <hr></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.5.0.tar.gz?download">Tools - Source tar.gz</a> <small>(48k)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.5.0.tar.bz2?download">Tools - Source tar.bz2</a> <small>(40k)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.5.0.zip?download">Tools - Source .zip</a> <small>(58k)</small></li>
	</ul>
	
	<p>
	   <b>Extras!:</b>
	</p>
	<ul>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/BASS-CD.zip?download">Beneath a Steel Sky, Freeware CD Version</a> <small>(67M)</small></li>
	  <li><a href="http://www.mixnmojo.com/bss/BASS-Floppy.zip">Beneath a Steel Sky, Freeware Floppy Version</a> <small>(7.3M)</small>
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
echo html_p();
sidebar_end();
html_footer();

?>
