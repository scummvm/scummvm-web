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
html_page_header('ScummVM :: Downloads');

html_content_begin('Download ScummVM');

?>
  <div class="par-item">
    <div class="par-head">
       Downloads for ScummVM <span style="color: #aaaaaa;">version 0.8.0</span>
    </div>

    <div class="par-intro">
	<br/>

       <table border=0>
	  <tr><td width="35%">

    <div class="navigation">
       Navigation

       <div class="nav-dots">
	  &nbsp;
       </div>

<table border=0>
<?php
  html_nav_item("#stable", "0.8.0 Release binaries");
  html_nav_item("#source", "0.8.0 Source Code");
  html_nav_item("#tools", "0.8.0 Tools");
  html_nav_item("#older", "Older versions");
  html_nav_item("#extras", "Extras, game downloads");
  html_nav_item("#CVS", "CVS Builds");
  html_nav_item("#libs", "Libraries");
?>

</table>
    </div>

</td>
<td>
	  Downloads are hosted with SourceForge.net. If you have one of the supported systems, you can directly download
	  the appropriate binary distribution. If you have another system, download the source and read the
	  <a href="http://cvs.sourceforge.net/viewcvs.py/scummvm/scummvm/README?rev=release-0-8-0">README</a>
	  file for directions on how to build ScummVM.
	  If you have successfully ported ScummVM to a platform not listed, please drop us a note, telling which OS, etc.
	  you used.

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
</td></tr>
</table>

	<br/>
    </div>

	<a name="stable"></a>
	<br/>
    <?php html_subhead_start("0.8.0 Release binaries"); ?>

    <div class="par-subhead-content">

	<p>For a list of changes since the previous version, <a href="http://sourceforge.net/project/shownotes.php?release_id=366764">read the release notes</a>.
	<BR>
	0.8.0 should be directly apt-get'able from Debian unstable (sid), and more packages for other platforms will be available in the upcoming week
	</p>

	<table>
	  <tr><td class='cat-bullet'><img src='images/catpl-windows.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-win32.exe?download"><b>Windows Installer</b></a> <font class='cat-count'>(1.4M Win32 .exe)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-windows.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-win32.zip?download">Windows zipfile</a> <font class='cat-count'>(1.4M zipfile)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-win64.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-win64.zip?download">Windows 64 zipfile</a> <font class='cat-count'>(1.4M zipfile)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-fedora.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-1_FC4.i386.rpm?download">Fedora Core 4 package</a> <font class='cat-count'>(1.4M RPM)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-fedora.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-1_FC2.i386.rpm?download">Fedora Core 2 package</a> <font class='cat-count'>(1.6M RPM)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-debian.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm_0.8.0-0.sarge.1_i386.deb?download">Debian Stable (sarge) package</a> <font class='cat-count'>(1.4M .deb)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-slackware.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0_slack-i486-1.tgz?download">SlackWare package</a> <font class='cat-count'>(1.5M .tgz)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-mandriva.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-1mdk.i586.rpm?download">Mandriva 2006 package</a> <font class='cat-count'>(1.3M RPM)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-macos.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0a-macosx.dmg?download">Mac OS X Disk Image (0.8.0a)</a> <font class='cat-count'>(2.2M disk image)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-os2.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-os2r1.zip?download">OS/2 package</a> <font class='cat-count'>(4.2M .zip)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-psp.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-psp-fw1.00.zip?download">PSP package for FW 1.00</a> <font class='cat-count'>(1.7M .zip)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-psp.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-psp-fw1.50.zip?download">PSP package for FW 1.50</a> <font class='cat-count'>(1.7M .zip)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-psp.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-psp-fw2.00.zip?download">PSP package for FW 2.00</a> <font class='cat-count'>(1.7M .zip)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-symbian.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-S60-v1.sis?download">Symbian S60 version 1 binary</a> <font class='cat-count'>(1.0M .sis)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-symbian.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-S60-v2.sis?download">Symbian S60 version 2 binary</a> <font class='cat-count'>(1.0M .sis)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-symbian.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-S80.sis?download">Symbian S80 binary</a> <font class='cat-count'>(1.1M .sis)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-symbian.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-S90.sis?download">Symbian S90 binary</a> <font class='cat-count'>(1.1M .sis)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-symbian.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-UIQ.sis?download">Symbian UIQ binary</a> <font class='cat-count'>(1.1M .sis)</font></td></tr>

<!--
	  <tr><td class='cat-bullet'><img src='images/catpl-palmos.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.7.1-palmos.zip?download">PalmOS binary</a> <font class='cat-count'>(1.9M zipfile)</font></td></tr>
-->

	  <tr><td class='cat-bullet'><img src='images/catpl-wince.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-PPC2002_ARM.zip?download">PocketPC 2002 ARM package</a> <font class='cat-count'>(1.3M zipfile)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-wince.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-WindowsMobile_ARM.zip?download">Windows Mobile 5 ARM package</a> for PocketPC 2003, PocketPC 2003 SE,
Smartphone 2003, and Windows Mobile 5 <font class='cat-count'>(1.4M zipfile)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-amiga.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-amigaos4.lha?download">AmigaOS 4 package</a> <font class='cat-count'>(3.3M .lha)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-morphos.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-morphos.lha?download">MorphOS package</a> <font class='cat-count'>(2.4M .lha)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-dc.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-dreamcast-plainfiles.tar.bz2?download">Dreamcast plain files</a> <font class='cat-count'>(2.6M .tar.bz2)</font></td></tr>
<!--
	  <tr><td class='cat-bullet'><img src='images/catpl-dc.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.7.1-dreamcast-nero+demos.zip?download">Dreamcast Nero Image &amp; Demos</a> <font class='cat-count'>4.7M zipfile</font></td></tr>
-->
	  <tr><td class='cat-bullet'><img src='images/catpl-beos.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-beos-x86.pkg?download">BeOS package</a> <font class='cat-count'>(3.0M pkg)</font></td></tr>
	</table>
    </div>

    <a name="source"></a>
    <?php html_subhead_start("0.8.0 Source Code"); ?>

    <div class="par-subhead-content">
	<table>
	  <tr><td class='cat-bullet'><img src='images/catpl-cpp.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0.tar.bz2?download">ScummVM - Source .tar.bz2</a> <font class='cat-count'>(2.5M)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-cpp.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0.tar.gz?download">ScummVM - Source .tar.gz</a> <font class='cat-count'>(3.1M)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-cpp.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0.zip?download">ScummVM - Source .zip</a> <font class='cat-count'>(3.8M)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-cpp.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-1.src.rpm?download">ScummVM - Source RPM</a> <font class='cat-count'>(3.3M RPM)</font></td></tr>
	</table>


    </div>

    <a name="tools"></a>
    <?php html_subhead_start("0.8.0 Tools (mostly unsupported)"); ?>

    <div class="par-subhead-content">

	<table>
	  <tr><td class='cat-bullet'><img src='images/catpl-windows.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.8.0-win32.exe?download">Tools - Windows Installer</a> <font class='cat-count'>(384k Win32 .exe)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-windows.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.8.0-win32.zip?download">Tools - Windows zipfile</a> <font class='cat-count'>(183k Win32 .exe)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-fedora.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.8.0-1.i386.rpm?download">Tools - Fedora Core 4 RPM</a> <font class='cat-count'>(110k .rpm)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-fedora.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.8.0-macosx.tar.bz2?download">Tools - Mac OS X binary</a> <font class='cat-count'>(212k .tar.bz2)</font></td></tr>
<!--
	  <tr><td class='cat-bullet'><img src='images/catpl-solaris.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.7.0-solaris8-sparc.tar.bz2?download">Tools - Solaris 8 (Sparc)</a> <font class='cat-count'>(119k .tar.bz2)</font></td></tr>
-->

	  <tr><td class='cat-bullet'><img src='images/catpl-cpp.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.8.0.tar.bz2?download">Tools - Source .tar.bz2</a> <font class='cat-count'>(91k .tar.bz2)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-cpp.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.8.0.tar.gz?download">Tools - Source .tar.gz</a> <font class='cat-count'>(107k .tar.bz2)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-cpp.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.8.0.zip?download">Tools - Source .zip</a> <font class='cat-count'>(132k .zip)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-cpp.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.8.0-1.src.rpm?download">Tools - Source RPM</a> <font class='cat-count'>(93k .rpm)</font></td></tr>
	</table>

    </div>
   </div>

  <a name="older"></a>
  <div class="par-item">
    <div class="par-head">
       Older versions (unsupported)
    </div>

    <div class="par-content">
	<p>
		In a few cases, we do not (yet) have new binaries of ScummVM
		and/or the ScummVM tools for some platforms. In these cases, we still
		have older versions around, for your convenience.
	</p>
	<table>
	  <tr><td class='cat-bullet'><img src='images/catpl-fedora.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.7.1-1.FC3.i386.rpm?download">0.7.1 Fedora Core 3 package</a> <font class='cat-count'>(1.2M RPM)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-palmos.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.7.1-palmos.zip?download">0.7.1 PalmOS binary</a> <font class='cat-count'>(1.9M zipfile)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-wince.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.7.1-PocketPC_MIPS.zip?download">0.7.1 PocketPC MIPS binary</a> <font class='cat-count'>(1.5M zipfile)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-wince.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.7.1-PocketPC_SH3.zip?download">0.7.1 PocketPC SH3 binary</a> <font class='cat-count'>(1.4M zipfile)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-wince.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.7.1-HandheldPC_ARM.zip?download">0.7.1 HandheldPC ARM binary</a> <font class='cat-count'>(1.3M zipfile)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-wince.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.7.1-HandheldPC_MIPS.zip?download">0.7.1 HandheldPC MIPS binary</a> <font class='cat-count'>(1.5M zipfile)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-wince.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.7.1-HandheldPC_SH3.zip?download">0.7.1 HandheldPC SH3 binary</a> <font class='cat-count'>(1.4M zipfile)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-solaris.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.7.0-solaris8-sparc.tar.bz2?download">0.7.0 Solaris 8 (Sparc) binary</a> <font class='cat-count'>(1.1M .tar.bz2)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-dc.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.7.0-dreamcast-nero+demos.zip?download">0.7.0 Dreamcast Nero Image &amp; Demos</a> <font class='cat-count'>4.7M zipfile</font></td></tr>
	</table>

     </div>
  </div>

	<a name="extras"></a>
  <div class="par-item">
    <div class="par-head">
       Extras
    </div>

    <div class="par-content">

	<table>
	  <tr><td class='cat-bullet'><img src='images/cat-sky.png' alt="" /></td><td class='cat-link'><a href="http://www.scummvm.org/SKY.CPT">Beneath a Steel Sky, SKY.CPT - required to run the game with a post-0.7.* ScummVM</a> <font class='cat-count'>(416k)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-sky.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/bass-cd-1.2.zip?download">Beneath a Steel Sky, Freeware CD Version</a> <font class='cat-count'>(67M)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-sky.png' alt="" /></td><td class='cat-link'><a href="http://www.mixnmojo.com/bss/BASS-Floppy.zip">Beneath a Steel Sky, Freeware Floppy Version</a> <font class='cat-count'>(7.3M)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-queen.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/FOTAQ_Talkie.zip?download">Flight of the Amazon Queen, Freeware CD Version (small - has mp3 compressed sfx/speech)</a> <font class='cat-count'>(34.8M)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-queen.png' alt="" /></td><td class='cat-link'><a href="ftp://ftp.suse.com/pub/suse/i386/supplementary/X/FOTAQ/">Flight of the Amazon Queen, Freeware CD Version (small - has ogg compressed sfx/speech)</a> <font class='cat-count'>(35.6M)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-queen.png' alt="" /></td><td class='cat-link'><a href="http://www.lysator.liu.se/~zino/scummvm/queen/">Flight of the Amazon Queen, Freeware CD Version (large - unmodified original)</a> <font class='cat-count'>(87M) download this version if your ScummVM doesn't have mp3 support</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-queen.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/FOTAQ_Floppy.zip?download">Flight of the Amazon Queen, Freeware Floppy Version</a> <font class='cat-count'>(6.7M)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-queen.png' alt="" /></td><td class='cat-link'><a href="http://0x.7fc1.org/fotaq/queen.tbl">Flight of the Amazon Queen, queen.tbl - required to run original versions of FOTAQ</a> <font class='cat-count'>(1.1M)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-bs1.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/Sword1_Cutscenes.zip?download">Broken Sword 1 Cutscene Pack (ENGLISH)</a> <font class='cat-count'>(31.2M)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-bs1.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/Sword1_Cutscenes_FRE_AddOn.zip?download">Broken Sword 1 Cutscene Pack (French AddOn)</a> <font class='cat-count'>(1.6M) Override files in English Pack with this archive contents</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-bs1.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/Sword1_Cutscenes_GER_AddOn.zip?download">Broken Sword 1 Cutscene Pack (German AddOn)</a> <font class='cat-count'>(1.8M) Override files in English Pack with this archive contents</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-bs1.png' alt="" /></td><td class='cat-link'><a href="http://www.unet.univie.ac.at/~a0200586/binary/mirrors/scummvm/Sword1_Cutscenes_GER_Complete.zip">Broken Sword 1 Cutscene Pack (German)</a> <font class='cat-count'>(32M) This is alternative offsite package with both German videos and audio</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-bs1.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/Sword1_Cutscenes_ITA_AddOn.zip?download">Broken Sword 1 Cutscene Pack (Italian AddOn)</a> <font class='cat-count'>(2.5M) Override files in English Pack with this archive contents</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-bs1.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/Sword1_Cutscenes_ESP_AddOn.zip?download">Broken Sword 1 Cutscene Pack (Spanish AddOn)</a> <font class='cat-count'>(2.2M) Override files in English Pack with this archive contents</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-bs2.png' alt="" /></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/Sword2_Cutscenes.zip?download">Broken Sword 2 Cutscene Pack (ALL LANGUAGES)</a> <font class='cat-count'>(27.8M)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-kyra.png' alt="" /></td><td class='cat-link'><a href="http://cvs.sourceforge.net/viewcvs.py/*checkout*/scummvm/engine-data/kyra.dat">The Legend of Kyrandia, KYRA.DAT - required to run all versions of the game</a> <font class='cat-count'>(60k)</font></td></tr>
	</table>
	<p>
	<i>Having trouble downloading Flight of the Amazon Queen?</i>
	Sourceforge has been experiencing some downloading problems with certain mirrors 
lately. So, if you are having problems, try the following non-SourceForge mirror - kindly 
hosted by <a href="http://www.mthN.de">Snoke Media and Tech Hosting Network</a>!
	</p>
	<table>
	 <tr><td class='cat-bullet'><img src='images/cat-queen.png' alt="" /></td><td class='cat-link'><a href="http://mikemth.de:1337/modules.php?name=Downloads&amp;d_op=getit&amp;lid=826">Flight of the Amazon Queen, Freeware CD Version</a> <font class='cat-count'>(34.8M)</font></td></tr>
	 <tr><td class='cat-bullet'><img src='images/cat-queen.png' alt="" /></td><td class='cat-link'><a href="http://mikemth.de:1337/modules.php?name=Downloads&amp;d_op=getit&amp;lid=827">Flight of the Amazon Queen, Freeware Floppy Version</a> <font class='cat-count'>(6.7M)</font></td></tr>
	</table>

     </div>
  </div>

	<a name="CVS"></a>
  <div class="par-item">
    <div class="par-head">
       CVS Builds
    </div>

    <div class="par-content">
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

	<table>
<!--
	  <tr><td class='cat-bullet'><img src='images/catpl-cpp.png' alt="" /></td><td class='cat-link'><a href="/downloads/scummvm-daily.tar.bz2">Source Code Daily Snapshot Bzipped</a> <font class='cat-count'> (<? echo intval(filesize("downloads/scummvm-daily.tar.bz2")/1024) ?>K file, last update: <? echo date("F j, Y, g:i a",filemtime("downloads/scummvm-daily.tar.bz2")); ?>)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-cpp.png' alt="" /></td><td class='cat-link'><a href="/downloads/scummvm-daily.tar.gz">Source Code Daily Snapshot Gzipped</a> <font class='cat-count'> (<? echo intval(filesize("downloads/scummvm-daily.tar.gz")/1024) ?>K file, last update: <? echo date("F j, Y, g:i a",filemtime("downloads/scummvm-daily.tar.gz")); ?>)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-cpp.png' alt="" /></td><td class='cat-link'><a href="/downloads/scummvm-daily.zip">Source Code Daily Snapshot Zipped</a> <font class='cat-count'> (<? echo intval(filesize("downloads/scummvm-daily.zip")/1024) ?>K file, last update: <? echo date("F j, Y, g:i a",filemtime("downloads/scummvm-daily.zip")); ?>)</font></td></tr>
-->
	  <tr><td class='cat-bullet'><img src='images/catpl-windows.png' alt="" /></td><td class='cat-link'><a href="/downloads/scummvmwin32.exe">Win32 Daily Snapshot</a> <font class='cat-count'> (<? echo intval(filesize("downloads/scummvmwin32.exe")/1024) ?>K exe file, last update: <? echo date("F j, Y, g:i a",filemtime("downloads/scummvmwin32.exe")); ?>)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-macos.png' alt="" /></td><td class='cat-link'><a href="/downloads/ScummVM-snapshot.dmg">Mac OS X Snapshot</a> <font class='cat-count'> (infrequently from CVS HEAD, <? echo intval(filesize("downloads/ScummVM-snapshot.dmg")/1024) ?>K dmg file, last update: <? echo date("F j, Y, g:i a",filemtime("downloads/ScummVM-snapshot.dmg")); ?>)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-wince.png' alt="" /></td><td class='cat-link'><a href="http://arisme.free.fr/PocketScumm/daily/">PocketPC Builds</a> <font class='cat-count'> (infrequent snapshots of the PocketPC binaries)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-wince.png' alt="" /></td><td class='cat-link'><a href="/downloads/PocketPC2003.zip">Alternative PocketPC 2003 build</a> <font class='cat-count'> (infrequently from CVS HEAD, <? echo intval(filesize("downloads/PocketPC2003.zip")/1024) ?>K zip file, last update: <? echo date("F j, Y, g:i a",filemtime("downloads/PocketPC2003.zip")); ?>)</font></td></tr>
<!--  <tr><td class='cat-bullet'><img src='images/catpl-dc.png' alt="" /></td><td class='cat-link'><a href="http://paras.rasmatazz.bei.t-online.de/">Dreamcast Daily Builds</a></td></tr> -->
	<tr><td class='cat-bullet'><img src='images/catpl-symbian.png' alt="" /></td><td class='cat-link'><a href="http://anotherguest.b0.se/cvsbuilds/">SymbianOS CVS Builds</a></td></tr>	
	<tr><td class='cat-bullet'><img src='images/catpl-cpp.png' alt="" /></td><td class='cat-link'><a href="http://sourceforge.net/cvs/?group_id=37116">CVS Instructions</a> <font class='cat-count'> (for if you wish to retrieve the latest code to compile yourself)</font></td></tr>
	</table>

     </div>
  </div>


  <a name="libs"></a>
  <div class="par-item">
    <div class="par-head">
       Libraries
    </div>

    <br/>

    <?php html_subhead_start("Required Libraries"); ?>

    <div class="par-subhead-content">
	<ul>
	  <li><a href="http://www.libsdl.org/download-1.2.php">SDL 1.2.x</a></li>
	</ul>

    </div>		

    <?php html_subhead_start("Optional Libraries"); ?>

    <div class="par-subhead-content">
	<ul>
	  <li><a href="http://www.underbit.com/products/mad/">MAD</a>: MPEG Audio Decoder</li>
	  <li><a href="http://www.xiph.org/ogg/vorbis/">Ogg Vorbis</a></li>
	  <li><a href="http://flac.sourceforge.net/">FLAC</a></li>
	  <li><a href="http://libmpeg2.sourceforge.net/">libmpeg2</a>: a free MPEG-2 video stream decoder</li>
	</ul>
    </div>
  </div>
<?

html_content_end();
html_page_footer();

?>
