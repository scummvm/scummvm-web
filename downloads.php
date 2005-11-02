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
echo html_round_frame_start("Download ScummVM","");

?>
	<h1>Downloads for ScummVM <span style="color: gray;">version 0.8.0</span></h1>

	<p>
	  Downloads are hosted with SourceForge.net. If you have one of the supported systems, you can directly download
	  the appropriate binary distribution. If you have another system, download the source and read the
	  <a href="http://cvs.sourceforge.net/viewcvs.py/scummvm/scummvm/README?rev=release-0-8-0">README</a>
	  file for directions on how to build ScummVM.
	  If you have successfully ported ScummVM to a platform not listed, please drop us a note, telling which OS, etc.
	  you used.
	</p>

	<p>
	<UL>
		<LI>The latest STABLE release of ScummVM is 0.8.0, and can be downloaded below
	under '<A HREF="#stable">Release Binaries</A>'. If you run Windows and are confused,
	download the 'Windows Installer'</LI>

		<LI>For UNSTABLE experimental versions of ScummVM (for people who know what they 
	are doing), please see the <a href="#CVS">CVS Builds</a> section, near the end of this page.</LI>

		<LI>Also below are the <a href="#extras">Extras</a>. These currently include two
	freeware games 'Beneath a Steel Sky' and 'Flight of the Amazon Queen', along with
	cutscene packs recommended for use when playing Broken Sword 1 or 2 under ScummVM</LI>
	</UL>

	<hr>
	<a name="stable"></a>
	<h3>0.8.0 Release binaries</h3>
	<p>For a list of changes since the previous version, <a href="http://sourceforge.net/project/shownotes.php?release_id=366764">read the release notes</a>.
	<BR>
	0.8.0 should be directly apt-get'able from Debian unstable (etch), and more packages for other platforms will be available in the upcoming week
	</p>

	<ul>
	  <li><B><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-win32.exe?download">Windows Installer</a></B> <small>(1.4M Win32 .exe)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-win32.zip?download">Windows zipfile</a> <small>(1.4M zipfile)</small></li>

	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-1_FC4.i386.rpm?download">Fedora Core 4 package</a> <small>(1.4M RPM)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-1_FC2.i386.rpm?download">Fedora Core 2 package</a> <small>(1.6M RPM)</small></li>

	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm_0.8.0-0.sarge.1_i386.deb?download">Debian Stable (sarge) package</a> <small>(1.4M .deb)</small></li>

	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0_slack-i486-1.tgz?download">SlackWare package</a> <small>(1.5M .tgz)</small></li>

	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-1mdk.i586.rpm?download">Mandriva 2006 package</a> <small>(1.3M RPM)</small></li>

	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0a-macosx.dmg?download">Mac OS X Disk Image (0.8.0a)</a> <small>(2.2M disk image)</small></li>

	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-os2r1.zip?download">OS/2 package</a> <small>(4.2M .zip)</small></li>

	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-psp-fw1.00.zip?download">PSP package for FW 1.00</a> <small>(1.7M .zip)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-psp-fw1.50.zip?download">PSP package for FW 1.50</a> <small>(1.7M .zip)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-psp-fw2.00.zip?download">PSP package for FW 2.00</a> <small>(1.7M .zip)</small></li>

	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-S60-v1.sis?download">Symbian S60 version 1 binary</a> <small>(1.0M .sis)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-S60-v2.sis?download">Symbian S60 version 2 binary</a> <small>(1.0M .sis)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-S80.sis?download">Symbian S80 binary</a> <small>(1.1M .sis)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-S90.sis?download">Symbian S90 binary</a> <small>(1.1M .sis)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-UIQ.sis?download">Symbian UIQ binary</a> <small>(1.1M .sis)</small></li>

<!--
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.7.1-palmos.zip?download">PalmOS binary</a> <small>(1.9M zipfile)</small></li>
-->

	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-WindowsMobile_ARM.zip?download">Windows Mobile 5 ARM package</a> for Pocket PC 2002, Pocket PC 2003, Pocket PC 2003 SE, 
Smartphone 2002, Smartphone 2003, and Windows Mobile 5 <small>(1.4M zipfile)</small></li>

	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-amigaos4.lha?download">AmigaOS 4 package</a> <small>(3.3M .lha)</small></li>

	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-dreamcast-plainfiles.tar.bz2?download">Dreamcast plain files</a> <small>(2.6M .tar.bz2)</small></li>
<!--
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.7.1-dreamcast-nero+demos.zip?download">Dreamcast Nero Image &amp; Demos</a> <small>4.7M zipfile</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.7.1-beos-x86.pkg?download">BeOS package</a> <small>(2.8M pkg)</small></li>
-->
	</ul>

	<h3>0.8.0 Source Code</h3>
	<ul>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0.tar.bz2?download">ScummVM - Source .tar.bz2</a> <small>(2.5M)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0.tar.gz?download">ScummVM - Source .tar.gz</a> <small>(3.1M)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0.zip?download">ScummVM - Source .zip</a> <small>(3.8M)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-1.src.rpm?download">ScummVM - Source RPM</a> <small>(3.3M RPM)</small></li>
	</ul>


	<h3>0.8.0 Tools (mostly unsupported)</h3>
	<ul>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.8.0-win32.exe?download">Tools - Windows Installer</a> <small>(384k Win32 .exe)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.8.0-win32.zip?download">Tools - Windows zipfile</a> <small>(183k Win32 .exe)</small></li>

	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.8.0-1.i386.rpm?download">Tools - Fedora Core 4 RPM</a> <small>(110k .rpm)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.8.0-macosx.tar.bz2?download">Tools - Mac OS X binary</a> <small>(212k .tar.bz2)</small></li>
<!--
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.7.0-solaris8-sparc.tar.bz2?download">Tools - Solaris 8 (Sparc)</a> <small>(119k .tar.bz2)</small></li>
-->

	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.8.0.tar.bz2?download">Tools - Source .tar.bz2</a> <small>(91k .tar.bz2)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.8.0.tar.gz?download">Tools - Source .tar.gz</a> <small>(107k .tar.bz2)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.8.0.zip?download">Tools - Source .zip</a> <small>(132k .zip)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.8.0-1.src.rpm?download">Tools - Source RPM</a> <small>(93k .rpm)</small></li>
	</ul>

	<h3>Older versions (unsupported)</h3>
	<p>
		In a few cases, we do not (yet) have new binaries of ScummVM
		and/or the ScummVM tools for some platforms. In these cases, we still
		have older versions around, for your convenience.
	</p>
	<ul>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.7.1-1.FC3.i386.rpm?download">0.7.1 Fedora Core 3 package</a> <small>(1.2M RPM)</small></li>

	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.7.1-palmos.zip?download">0.7.1 PalmOS binary</a> <small>(1.9M zipfile)</small></li>

	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.7.1-PocketPC_MIPS.zip?download">0.7.1 PocketPC MIPS binary</a> <small>(1.5M zipfile)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.7.1-PocketPC_SH3.zip?download">0.7.1 PocketPC SH3 binary</a> <small>(1.4M zipfile)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.7.1-HandheldPC_ARM.zip?download">0.7.1 HandheldPC ARM binary</a> <small>(1.3M zipfile)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.7.1-HandheldPC_MIPS.zip?download">0.7.1 HandheldPC MIPS binary</a> <small>(1.5M zipfile)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.7.1-HandheldPC_SH3.zip?download">0.7.1 HandheldPC SH3 binary</a> <small>(1.4M zipfile)</small></li>

	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.7.1-beos-x86.pkg?download">0.7.1 BeOS package</a> <small>(2.8M pkg)</small></li>

	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.7.0-solaris8-sparc.tar.bz2?download">0.7.0 Solaris 8 (Sparc) binary</a> <small>(1.1M .tar.bz2)</small></li>

	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.7.0-dreamcast-plainfiles.tar.bz2?download">0.7.0 Dreamcast plain files</a> <small>(2.2M zipfile)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.7.0-dreamcast-nero+demos.zip?download">0.7.0 Dreamcast Nero Image &amp; Demos</a> <small>4.7M zipfile</small></li>

	  <li><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.5.1-morphos.tgz?download">0.5.1 MorphOS binary</a> <small>(857k zipfile)</small></li>
	</ul>

	<a name="extras"></a>
	<h3>Extras!</h3>
	<ul>
	  <li><a href="http://www.scummvm.org/SKY.CPT">Beneath a Steel Sky, SKY.CPT - required to run the game with a post-0.7.* ScummVM</a> <small>(416k)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/bass-cd-1.2.zip?download">Beneath a Steel Sky, Freeware CD Version</a> <small>(67M)</small></li>
	  <li><a href="http://www.mixnmojo.com/bss/BASS-Floppy.zip">Beneath a Steel Sky, Freeware Floppy Version</a> <small>(7.3M)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/FOTAQ_Talkie.zip?download">Flight of the Amazon Queen, Freeware CD Version (small - has mp3 compressed sfx/speech)</a> <small>(34.8M)</small></li>
	  <li><a href="ftp://ftp.suse.com/pub/suse/i386/supplementary/X/FOTAQ/">Flight of the Amazon Queen, Freeware CD Version (small - has ogg compressed sfx/speech)</a> <small>(35.6M)</small></li>
	  <li><a href="http://www.lysator.liu.se/~zino/scummvm/queen/">Flight of the Amazon Queen, Freeware CD Version (large - unmodified original)</a> <small>(87M) download this version if your ScummVM doesn't have mp3 support</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/FOTAQ_Floppy.zip?download">Flight of the Amazon Queen, Freeware Floppy Version</a> <small>(6.7M)</small></li>
	  <li><a href="http://0x.7fc1.org/fotaq/queen.tbl">Flight of the Amazon Queen, queen.tbl - required to run original versions of FOTAQ</a> <small>(1.1M)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/Sword1_Cutscenes.zip?download">Broken Sword 1 Cutscene Pack (ENGLISH)</a> <small>(31.2M)</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/Sword1_Cutscenes_FRE_AddOn.zip?download">Broken Sword 1 Cutscene Pack (French AddOn)</a> <small>(1.6M) Override files in English Pack with this archive contents</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/Sword1_Cutscenes_GER_AddOn.zip?download">Broken Sword 1 Cutscene Pack (German AddOn)</a> <small>(1.8M) Override files in English Pack with this archive contents</small></li>
	  <li><a href="http://www.unet.univie.ac.at/~a0200586/binary/mirrors/scummvm/Sword1_Cutscenes_GER_Complete.zip">Broken Sword 1 Cutscene Pack (German)</a> <small>(32M) This is alternative offsite package with both German videos and audio</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/Sword1_Cutscenes_ITA_AddOn.zip?download">Broken Sword 1 Cutscene Pack (Italian AddOn)</a> <small>(2.5M) Override files in English Pack with this archive contents</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/Sword1_Cutscenes_ESP_AddOn.zip?download">Broken Sword 1 Cutscene Pack (Spanish AddOn)</a> <small>(2.2M) Override files in English Pack with this archive contents</small></li>
	  <li><a href="http://prdownloads.sourceforge.net/scummvm/Sword2_Cutscenes.zip?download">Broken Sword 2 Cutscene Pack (ALL LANGUAGES)</a> <small>(27.8M)</small></li>
	</ul>
	<p>
	<i>Having trouble downloading Flight of the Amazon Queen?</i>
	Sourceforge has been experiencing some downloading problems with certain mirrors 
lately. So, if you are having problems, try the following non-SourceForge mirror - kindly 
hosted by <a href="http://www.mthN.de">Snoke Media and Tech Hosting Network</a>!
	</p>
	<ul>
	 <li><a href="http://mikemth.de:1337/modules.php?name=Downloads&amp;d_op=getit&amp;lid=826">Flight of the Amazon Queen, Freeware CD Version</a> <small>(34.8M)</small></li>
	 <li><a href="http://mikemth.de:1337/modules.php?name=Downloads&amp;d_op=getit&amp;lid=827">Flight of the Amazon Queen, Freeware Floppy Version</a> <small>(6.7M)</small></li>
	</ul>

	<hr>

	<a name="CVS"></a>
	<h3>CVS Builds:</h3>
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
<!--
	  <li><a href="/downloads/ScummVM-snapshot.dmg">Mac OS X Snapshot</a> <small> (<? echo intval(filesize("downloads/ScummVM-snapshot.dmg")/1024) ?>K dmg file, last update: <? echo date("F j, Y, g:i a",filemtime("downloads/ScummVM-snapshot.dmg")); ?>)</small></li>
-->
	  <li><a href="http://arisme.free.fr/PocketScumm/daily/">PocketPC Builds</a> <small> (infrequent snapshots of the PocketPC binaries)</small></li>
	  <li><a href="/downloads/PocketPC2003.zip">Alternative PocketPC 2003 build</a> <small> (infrequently from CVS HEAD, <? echo intval(filesize("downloads/PocketPC2003.zip")/1024) ?>K zip file, last update: <? echo date("F j, Y, g:i a",filemtime("downloads/PocketPC2003.zip")); ?>)</small></li>
<!--  <li><a href="http://paras.rasmatazz.bei.t-online.de/">Dreamcast Daily Builds</a></li> -->
	  <li><a href="http://sourceforge.net/cvs/?group_id=37116">CVS Instructions</a> <small> (for if you wish to retrieve the latest code to compile yourself)</small></li>
	</ul>
	<hr>

	<h3>Required Libraries:</h3>
	<ul>
	  <li><a href="http://www.libsdl.org/download-1.2.php">SDL 1.2.x</a></li>
	</ul>
		
	<h3>Optional Libraries:</h3>
	<ul>
	  <li><a href="http://www.underbit.com/products/mad/">MAD</a>: MPEG Audio Decoder</li>
	  <li><a href="http://www.xiph.org/ogg/vorbis/">Ogg Vorbis</a></li>
	  <li><a href="http://flac.sourceforge.net/">FLAC</a></li>
	  <li><a href="http://libmpeg2.sourceforge.net/">libmpeg2</a>: a free MPEG-2 video stream decoder</li>
	</ul>
<?

echo html_round_frame_end("&nbsp;");

// end of html
sidebar_end();
html_footer();

?>
