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
	  <big><b>Downloads for ScummVM</b> version 0.4.1</big><br>
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
	
	<p>There are no daily builds for Mac OS X available at this point, but you can 
	<a href="/downloads/ScummVM-20030724.tar.gz">download a prerelease build of 0.5.0</a>
	(from 2003-07-24) in case you want to help us complete the Macintosh part of the
	<a href="/documentation.php?view=release">0.5.0 release checklist</a>.
	</p>
	

	<p>
 	  <b>0.4.1 Release binaries:</b>
	</p>
	<p>For a list of changes since the previous version, <a href="http://sourceforge.net/project/shownotes.php?release_id=161513">read the release notes</a>.</p>
	<p>Users of Debian Unstable (sid) can apt-get ScummVM. Please do not attempt to use the Woody packages below on Sid, it won't work due to a Vorbis library conflict.</p>

	<ul>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.4.1-win32.exe?download">Windows Installer</a> <small>(1.0M Win32 .exe)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.4.1-win32.zip?download">Windows zipfile</a> <small>(1.0M zipfile)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.4.1-macosx.dmg?download">Mac OS X 10.2 Disk Image</a> <small>(672k disk image)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.4.1-1.rh80.i386.rpm?download">RedHat 8.0 package</a> <small>(405k RPM)</small>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.4.1-1.src.rpm?download">Source RPM</a> <small>(1.1M RPM)</small>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm_0.4.1-0woody1_i386.deb?download">Debian Stable (woody) Package</a> <small>(377k .deb)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.4.1-palmos.zip?download">PalmOS binary</a> <small>(292k zipfile)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.4.1-solaris8-sparc.tar.gz?download">Solaris 8 (Sparc) binary</a> <small>(2.3M .tar.gz)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.4.1-beos.pkg?download">BeOS package</a> <small>(2.9M pkg)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.4.1-dreamcast-plainfiles.tar.bz2?download">Dreamcast plain files</a> <small>(462k zipfile)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.4.1-dreamcast-nero.zip?download">Dreamcast CD-ROM image for Nero</a> <small>(2.5M zipfile)</small></li>
	  <hr></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.4.1-HandheldPC_ARM.zip?download">HandheldPC ARM binary</a> <small>(463k zipfile)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.4.1-HandheldPC_MIPS.zip?download">HandheldPC MIPS binary</a> <small>(531k zipfile)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.4.1-HandheldPC_SH3.zip?download">HandheldPC SH3 binary</a> <small>(498k zipfile)</small></li>

	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.4.1-PocketPC_ARM.zip?download">PocketPC ARM binary</a> <small>(447k zipfile)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.4.1-PocketPC_MIPS.zip?download">PocketPC MIPS binary</a> <small>(526k zipfile)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.4.1-PocketPC_SH3.zip?download">PocketPC SH3 binary</a> <small>(491k zipfile)</small></li>

	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.4.1-Smartphone2002.zip?download">Smartphone 2002 binary</a> <small>(447k zipfile)</small></li>
	</ul>
	<p>
 	  <b>0.3.0 Release binaries (outdated):</b>
	</p>
	<p>A few binaries were not yet updated for the 0.4.0 release. Until that changes, here you can still find the old 0.3.0 binaries.
	<ul>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.3.0-morphos.tar.bz2?download">MorphOS binary</a> <small>(397k .tar.bz2)</small></li>
	</ul>

	<p>
	  <b>0.4.1 Tools (mostly unsupported):</b>
	</p>
	<ul>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.4.1-win32.exe?download">ScummVM Tools - Windows Installer</a> <small>(89k Win32 .exe)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.4.1-win32.zip?download">ScummVM Tools - Windows zipfile</a> <small>(49k zip file)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.4.1-macosx.tar.gz?download">ScummVM Tools - Mac OS X tarball</a> <small>(127k tar.gz)</small></li>
	</ul>

	<p>
	  <b>0.4.1 Source Code:</b>
	</p>
	<ul>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.4.1.tar.gz?download">Source tar.gz</a> <small>(1105k)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.4.1.tar.bz2?download">Source tar.bz2</a> <small>(934k)</small>
	  <hr></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.4.1.tar.gz?download">Tools - Source tar.gz</a> <small>(46k)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.4.1.tar.bz2?download">Tools - Source tar.bz2</a> <small>(39k)</small></li>
	</ul>
	
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
