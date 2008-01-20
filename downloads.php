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
       Downloads for ScummVM <span style="color: #aaaaaa;">version 0.11.0</span>
    </div>

    <div class="par-intro">
	<br>

       <table border=0>
	  <tr><td width="35%">

    <div class="navigation">
       Navigation

       <div class="nav-dots">
	  &nbsp;
       </div>

<table border=0>
<?php
  html_nav_item("#stable", "0.11.0 Release binaries");
  html_nav_item("#source", "0.11.0 Source Code");
  html_nav_item("#tools", "0.11.0 Tools");
  html_nav_item("#older", "Older versions (unsupported)");
  html_nav_item("#extras", "Extras, game downloads");
  html_nav_item("#SVN", "Subversion Builds");
  html_nav_item("#libs", "Libraries");
?>

</table>
    </div>

</td>
<td>
	  Downloads are mostly hosted with SourceForge.net. If you have one of the supported systems, you can directly
	  download the appropriate binary distribution. If you have another system, download the source and read the
	  <a href="http://scummvm.svn.sourceforge.net/svnroot/scummvm/scummvm/tags/release-0-11-0/README">README</a>
	  file for directions on how to build ScummVM.
	  If you have successfully ported ScummVM to a platform not listed, please drop us a note, telling which OS, etc.
	  you used.

	<UL>
		<LI>The latest STABLE release of ScummVM is 0.11.0, and can be downloaded below
	under '<A HREF="#stable">Release Binaries</A>'. If you run Windows and are confused,
	download the 'Windows Installer'</LI>

		<LI>For UNSTABLE experimental versions of ScummVM (for people who know what they
	are doing), please see the <a href="#SVN">Subversion Builds</a> section, near the end of this page.</LI>

		<LI>Also below are the <a href="#extras">Extras</a>. These currently include two
	  freeware games 'Beneath a Steel Sky', 'Flight of the Amazon Queen' and 'Lure of the Temptress', along with
    cutscene packs recommended for use when playing Broken Sword 1, 2 or Feeble Files under ScummVM</LI>
	</UL>
</td></tr>
</table>

	<br>
    </div>

	<a name="stable"></a>
	<br>
    <?php html_subhead_start("0.11.0 Release binaries"); ?>

    <div class="par-subhead-content">

	<p>For a list of changes since the previous version, <a href="http://sourceforge.net/project/shownotes.php?release_id=568141">read the release notes</a>.
	<BR>
	0.11.0 is not yet apt-get'able from Debian unstable (sid), only 0.10.0 is available there at this time. We still recommend using 0.11.0 as it contains major improvements and bug fixes, but you will have to compile it yourself or obtain it from an unofficial deb repository.
	</p>

<!-- ' Relax XEmacs syntax highlighting -->

	<table>

	  <tr><td class='cat-bullet'><img src='images/catpl-windows.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.11.0-win32.exe?download"><b>Windows Installer</b></a> <font class='cat-count'>(2.4M Win32 .exe)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-windows.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.11.0-win32.zip?download">Windows zipfile</a> <font class='cat-count'>(3.5M zipfile)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-fedora.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.11.0-1_F8.i386.rpm?download">Fedora 7 and 8 i386 package</a> <font class='cat-count'>(3.3M RPM)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-fedora.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.11.0-1_F8.x86_64.rpm?download">Fedora 7 and 8 x86 64bit package</a> <font class='cat-count'>(3.6M RPM)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-debian.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm_0.11.0-0.etch.1_i386.deb?download">Debian 4.0 (etch) package</a> <font class='cat-count'>(2.2M .deb)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-slackware.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.11.0_slack-i486-1.tgz?download">SlackWare package</a> <font class='cat-count'>(3.0M .tgz)</font></td></tr>
<!--

	  <tr><td class='cat-bullet'><img src='images/catpl-mandriva.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-1mdk.i586.rpm?download">Mandriva 2006 package</a> <font class='cat-count'>(1.3M RPM)</font></td></tr>
-->

	  <tr><td class='cat-bullet'><img src='images/catpl-macos-universal.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.11.0-macosx.dmg?download">Mac OS X Universal Disk Image</a> <font class='cat-count'>(6.5M disk image)</font></td></tr>

<!--
	  <tr><td class='cat-bullet'><img src='images/catpl-ps2.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.9.1-ps2.zip?download">PlayStation2 package</a> <font class='cat-count'>(3.0M .zip)</font></td></tr>
-->

	  <tr><td class='cat-bullet'><img src='images/catpl-psp.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.11.0-psp.zip?download">PSP (PlayStation Portable) package</a> <font class='cat-count'>(7.9M .zip)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-ds.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.11.0-ds.zip?download">Nintendo DS package</a> <font class='cat-count'>(7.1M .zip)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-symbian.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.11.0-s60-v3.sis?download">Symbian S60 version 3 binary</a> <font class='cat-count'>(3.1M .sis)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-uiq.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.11.0-uiq3.sis?download">Symbian UIQ 3 binary</a> <font class='cat-count'>(3.1M .sis)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-palmos.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.11.0-palmos-os5.zip?download">PalmOS 5 binary</a> <font class='cat-count'>(7.5M zipfile)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-palmos.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.11.0-palmos-zodiac.zip?download">PalmOS Tapwave Zodiac binary</a> <font class='cat-count'>(8.1M zipfile)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-wince.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.11.0-WinCE.zip?download">Windows CE ARM package</a> <font class='cat-count'>(4.2M zipfile)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-iphone.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.11.0-iphone.zip?download">iPhone package</a> <font class='cat-count'>(2.9M zipfile)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-opie.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.11.0-opie_arm.ipk?download">Opie SDL package<b> Only </b>for iPAQ h1910/h1915 and MyPal 716</a> <font class='cat-count'>(3.5M .ipk)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-maemo.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm_0.11.0-0_armel.deb?download">Maemo package (OS 2006, 2007 and 2008)</a> <font class='cat-count'>(2.4M .deb)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-maemo.png' alt=""></td><td class='cat-link'>Most recent version is available from Maemo Extras repository. For 
    single click install use Maemo Downloads: [<a href="http://downloads.maemo.org/product/OS2006/scummvm/">Nokia 770/OS2006</a>] [<a href="http://downloads.maemo.org/product/OS2007/scummvm/">N800/OS2007</a>] 
[<a href="http://downloads.maemo.org/product/OS2008/scummvm/">N8x0/OS2008</a>]</td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-dc.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.11.0-dreamcast-plainfiles.tar.bz2?download">Dreamcast plain files</a> <font class='cat-count'>(5.6M .tar.bz2)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-dc.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.11.0-dreamcast-nero+demos.zip?download">Dreamcast Nero Image &amp; Demos</a> <font class='cat-count'>(11M .zip)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-gp2x.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.11.0-gp2x.zip?download">GP2X package</a> <font class='cat-count'>(3.8M .zip)</font></td></tr>

<!--
	  <tr><td class='cat-bullet'><img src='images/catpl-solaris.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.10.0-solaris8-sparc.tar.bz2?download">Solaris 8 and up (Sparc) binary</a> <font class='cat-count'>(3.4M .tar.bz2)</font></td></tr>
-->
	  <tr><td class='cat-bullet'><img src='images/catpl-solaris.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.11.0-solaris10-x86.pkg.bz2?download">Solaris 10 (both IA32 and AMD64) binary</a> <font class='cat-count'>(10.0M .pkg.bz2)</font></td></tr>
<!--

	  <tr><td class='cat-bullet'><img src='images/catpl-beos.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.10.0-beosx86.pkg?download">BeOS package</a> <font class='cat-count'>(3.3M pkg)</font></td></tr>

-->
	  <tr><td class='cat-bullet'><img src='images/catpl-amiga.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.11.0-amigaos4.lha?download">AmigaOS 4 package</a> <font class='cat-count'>(6.0M .lha)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-morphos.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.11.0-morphos.lha?download">MorphOS package</a> <font class='cat-count'>(4.2M .lha)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-freemint.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.11.0-atari.zip?download">Atari/FreeMiNT package (68020 and up)</a> <font class='cat-count'>(3.3M .zip)</font></td></tr>

<!--
	  <tr><td class='cat-bullet'><img src='images/catpl-os2.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.10.0-os2.zip?download">OS/2 package</a> <font class='cat-count'>(3.0M .zip)</font></td></tr>
-->
	</table>
    </div>

    <a name="source"></a>
    <?php html_subhead_start("0.11.0 Source Code"); ?>

    <div class="par-subhead-content">
	<table>
	  <tr><td class='cat-bullet'><img src='images/catpl-cpp.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.11.0.tar.bz2?download">ScummVM - Source .tar.bz2</a> <font class='cat-count'>(5.4M)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-cpp.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.11.0.tar.gz?download">ScummVM - Source .tar.gz</a> <font class='cat-count'>(6.6M)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-cpp.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.11.0.zip?download">ScummVM - Source .zip</a> <font class='cat-count'>(8.4M)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-cpp.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.11.0-1.src.rpm?download">ScummVM - Source RPM</a> <font class='cat-count'>(6.1M RPM)</font></td></tr>
	</table>


    </div>

    <a name="tools"></a>
    <?php html_subhead_start("0.11.0 Tools (mostly unsupported)"); ?>

    <div class="par-subhead-content">

	<table>
	  <tr><td class='cat-bullet'><img src='images/catpl-windows.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.11.0-win32.exe?download">Tools - Windows Installer</a> <font class='cat-count'>(534k Win32 .exe)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-windows.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.11.0-win32.zip?download">Tools - Windows zipfile</a> <font class='cat-count'>(726k Win32 .zip)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-fedora.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.11.0-1_F8.i386.rpm?download">Tools - Fedora 7 and 8 i386 RPM</a> <font class='cat-count'>(180k .rpm)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-fedora.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.11.0-1_F8.x86_64.rpm?download">Tools - Fedora 7 and 8 x86 64bit RPM</a> <font class='cat-count'>(199k .rpm)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-macos-universal.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.11.0-macosx.tar.bz2?download">Tools - Mac OS X Universal binaries (10.3.9 and up)</a> <font class='cat-count'>(941k .tar.bz2)</font></td></tr>
<!--

	  <tr><td class='cat-bullet'><img src='images/catpl-solaris.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.10.0-solaris8-sparc.tar.bz2?download">Tools - Solaris 8 (Sparc)</a> <font class='cat-count'>(204k .tar.bz2)</font></td></tr>
-->
	  <tr><td class='cat-bullet'><img src='images/catpl-solaris.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.11.0-solaris10-x86.pkg.bz2?download">Tools - Solaris 10 (both IA32 and AMD64)</a> <font class='cat-count'>(182k .pkg.bz2)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-amiga.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.11.0-amigaos4.lha?download">Tools - AmigaOS 4</a> <font class='cat-count'>(2.1M .lha)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-freemint.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.11.0-atari.tar.gz?download">Tools - Atari/FreeMiNT (68020 and up)</a> <font class='cat-count'>(1031k .tar.gz)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-cpp.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.11.0.tar.bz2?download">Tools - Source .tar.bz2</a> <font class='cat-count'>(136k .tar.bz2)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-cpp.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.11.0.tar.gz?download">Tools - Source .tar.gz</a> <font class='cat-count'>(165k .tar.gz)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-cpp.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.11.0.zip?download">Tools - Source .zip</a> <font class='cat-count'>(257k .zip)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-cpp.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-tools-0.11.0-1.src.rpm?download">Tools - Source RPM</a> <font class='cat-count'>(139k .rpm)</font></td></tr>
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
	  <tr><td class='cat-bullet'><img src='images/catpl-solaris.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.10.0-solaris8-sparc.tar.bz2?download">0.10.0 Solaris 8 and up (Sparc) binary</a> <font class='cat-count'>(3.4M .tar.bz2)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-beos.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.10.0-beosx86.pkg?download">0.10.0 BeOS package</a> <font class='cat-count'>(3.3M pkg)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-os2.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.10.0-os2.zip?download">0.10.0 OS/2 package</a> <font class='cat-count'>(3.0M .zip)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-fedora.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.10.0-1_FC5.i386.rpm?download">0.10.0 Fedora Core 5 and 6 package</a> <font class='cat-count'>(2.8M RPM)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-fedora.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.9.1-1_FC2.i386.rpm?download">0.9.1 Fedora Core 2 package</a> <font class='cat-count'>(1.6M RPM)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-debian.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm_0.9.1-0.sarge.1_i386.deb?download">0.9.1 Debian 3.1 (sarge) package</a> <font class='cat-count'>(1.6M .deb)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-ps2.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.9.1-ps2.zip?download">0.9.1 PlayStation2 package</a> <font class='cat-count'>(3.0M .zip)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-symbian.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.9.1-s60-v1.sis?download">0.9.1 Symbian S60 version 1 binary</a> <font class='cat-count'>(1.4M .sis)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-symbian.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.9.1-s60-v2.sis?download">0.9.1 Symbian S60 version 2 binary</a> <font class='cat-count'>(1.4M .sis)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-symbian.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.9.1-s80.sis?download">0.9.1 Symbian S80 binary</a> <font class='cat-count'>(1.4M .sis)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-symbian.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.9.1-s90.sis?download">0.9.1 Symbian S90 binary</a> <font class='cat-count'>(1.4M .sis)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-uiq.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.9.1-uiq2.sis?download">0.9.1 Symbian UIQ 2 binary</a> <font class='cat-count'>(1.4M .sis)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-win64.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-win64.zip?download">0.8.0 Windows 64 zipfile</a> <font class='cat-count'>(1.4M zipfile)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-mandriva.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-1mdk.i586.rpm?download">0.8.0 Mandriva 2006 package</a> <font class='cat-count'>(1.3M RPM)</font></td></tr>

	  <tr><td class='cat-bullet'><img src='images/catpl-wince.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.7.1-PocketPC_MIPS.zip?download">0.7.1 PocketPC MIPS binary</a> <font class='cat-count'>(1.5M zipfile)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-wince.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.7.1-PocketPC_SH3.zip?download">0.7.1 PocketPC SH3 binary</a> <font class='cat-count'>(1.4M zipfile)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-wince.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.7.1-HandheldPC_ARM.zip?download">0.7.1 HandheldPC ARM binary</a> <font class='cat-count'>(1.3M zipfile)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-wince.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.7.1-HandheldPC_MIPS.zip?download">0.7.1 HandheldPC MIPS binary</a> <font class='cat-count'>(1.5M zipfile)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-wince.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/scummvm-0.7.1-HandheldPC_SH3.zip?download">0.7.1 HandheldPC SH3 binary</a> <font class='cat-count'>(1.4M zipfile)</font></td></tr>

	</table>

     </div>
  </div>

	<a name="extras"></a>
  <div class="par-item">
    <div class="par-head">
       Extras, game downloads
    </div>

    <div class="par-content">

	<table>
	  <tr><td class='cat-bullet'><img src='images/cat-sky.png' alt=""></td><td class='cat-link'><a href="https://scummvm.svn.sourceforge.net/svnroot/scummvm/scummvm/tags/release-0-11-0/dists/engine-data/sky.cpt">Beneath a Steel Sky, SKY.CPT - required to run the game with a post-0.7.* ScummVM</a> <font class='cat-count'>(410k)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-sky.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/bass-cd-1.2.zip?download">Beneath a Steel Sky, Freeware CD Version</a> <font class='cat-count'>(67M)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-sky.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/BASS-Floppy.zip?download">Beneath a Steel Sky, Freeware Floppy Version</a> <font class='cat-count'>(7.3M)</font></td></tr>

	  <tr><td></td><td>&nbsp;</td></tr>

	  <tr><td class='cat-bullet'><img src='images/cat-queen.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/FOTAQ_Talkie.zip?download">Flight of the Amazon Queen, Freeware CD Version (mp3 compressed sfx/speech)</a> <font class='cat-count'>(34.8M)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-queen.png' alt=""></td><td class='cat-link'><a href="http://mikemth.de:1337/modules.php?name=Downloads&amp;d_op=getit&amp;lid=826">Flight of the Amazon Queen, Freeware CD Version (mp3 compressed sfx/speech)</a> - <a href="http://www.mthN.de">hosted by Snoke Media and Tech Hosting Network</a> <font class='cat-count'>(34.8M)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-queen.png' alt=""></td><td class='cat-link'><a href="ftp://ftp.suse.com/pub/suse/i386/supplementary/X/FOTAQ/">Flight of the Amazon Queen, Freeware CD Version (ogg compressed sfx/speech)</a> <font class='cat-count'>(35.6M)</font></td></tr>
	   <tr><td class='cat-bullet'><img src='images/cat-queen.png' alt=""></td><td class='cat-link'><a href="ftp://holarse-linuxgaming.de/clients/opensource/Flight-of-the-Amazon-Queen/fotaq-english-flac.tar.bz2">Flight of the Amazon Queen, Freeware CD Version (FLAC compressed sfx/speech)</a> - <a href="http://holarse.de/">hosted by Holarse</a> <font class='cat-count'>(82M)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-queen.png' alt=""></td><td class='cat-link'><a href="http://www.lysator.liu.se/~zino/scummvm/queen/">Flight of the Amazon Queen, Freeware CD Version (unmodified original)</a> <font class='cat-count'>(87M) download this version if your ScummVM doesn't have mp3 support</font></td></tr>
<!-- ' Relax XEmacs syntax highlighting -->
	  <tr><td class='cat-bullet'><img src='images/cat-queen.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/FOTAQ_Heb_talkie.zip?download">Flight of the Amazon Queen, Freeware CD Version (<i>Hebrew</i> subtitles, English voices, ogg compressed sfx/speech)</a> <font class='cat-count'>(63.1M)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-queen.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/FOTAQ_Floppy.zip?download">Flight of the Amazon Queen, Freeware Floppy Version</a> <font class='cat-count'>(6.7M)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-queen.png' alt=""></td><td class='cat-link'><a href="http://mikemth.de:1337/modules.php?name=Downloads&amp;d_op=getit&amp;lid=827">Flight of the Amazon Queen, Freeware Floppy Version</a> - <a href="http://www.mthN.de">hosted by Snoke Media and Tech Hosting Network</a> <font class='cat-count'>(6.7M)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-queen.png' alt=""></td><td class='cat-link'><a href="https://scummvm.svn.sourceforge.net/svnroot/scummvm/scummvm/tags/release-0-11-0/dists/engine-data/queen.tbl">Flight of the Amazon Queen, queen.tbl - required to run original versions of FOTAQ</a> <font class='cat-count'>(1.0M)</font></td></tr>

	  <tr><td></td><td>&nbsp;</td></tr>

	  <tr><td class='cat-bullet'><img src='images/cat-lure.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/lure.zip?download">Lure of the Temptress, Freeware Version (English)</a> <font class='cat-count'>(3.9M)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-lure.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/lure-fr.zip?download">Lure of the Temptress, Freeware Version (French)</a> <font class='cat-count'>(3.4M)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-lure.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/lure-de.zip?download">Lure of the Temptress, Freeware Version (German)</a> <font class='cat-count'>(3.5M)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-lure.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/lure-it.zip?download">Lure of the Temptress, Freeware Version (Italian)</a> <font class='cat-count'>(3.0M)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-lure.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/lure-es.zip?download">Lure of the Temptress, Freeware Version (Spanish)</a> <font class='cat-count'>(2.1M)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-lure.png' alt=""></td><td class='cat-link'><a href="https://scummvm.svn.sourceforge.net/svnroot/scummvm/scummvm/tags/release-0-11-0/dists/engine-data/lure.dat">Lure of the Temptress, lure.dat - required to run original versions of Lure of the Temptress</a> <font class='cat-count'>(623k) - Requires ScummVM 0.11.0</font></td></tr>

	  <tr><td></td><td>&nbsp;</td></tr>

	  <tr><td class='cat-bullet'><img src='images/cat-sword.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/Sword1_DXA_Cutscenes.zip?download">Broken Sword 1 Cutscene Pack (English, DXA compression)</a> <font class='cat-count'>(58.5M) - Requires ScummVM 0.10.0</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-sword.png' alt=""></td><td class='cat-link'><a href="http://downloads.scummbr.com/Sword1_Cutscenes_BRA_Complete.zip">Broken Sword 1 Cutscene Pack (Brazilian)</a> <font class='cat-count'>(38M) This is an offsite package with both Brazillian videos and audio</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-sword.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/Sword1_OGG_Cutscenes.zip?download">Broken Sword 1 Cutscene Pack (English OGG AddOn)</a> <font class='cat-count'>(2.9M) Alternative audio pack, for ports without FLAC support</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-sword.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/Sword1_Cutscenes_FRE_AddOn.zip?download">Broken Sword 1 Cutscene Pack (French AddOn)</a> <font class='cat-count'>(1.6M) Overwrite files in English Pack with files from this archive</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-sword.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/Sword1_Cutscenes_GER_AddOn.zip?download">Broken Sword 1 Cutscene Pack (German AddOn)</a> <font class='cat-count'>(1.8M) Overwrite files in English Pack with files from this archive</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-sword.png' alt=""></td><td class='cat-link'><a href="http://www.unet.univie.ac.at/~a0200586/binary/mirrors/scummvm/Sword1_Cutscenes_GER_Complete.zip">Broken Sword 1 Cutscene Pack (German)</a> <font class='cat-count'>(32M) This is an alternative offsite package with both German videos and audio</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-sword.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/Sword1_Cutscenes_ITA_AddOn.zip?download">Broken Sword 1 Cutscene Pack (Italian AddOn)</a> <font class='cat-count'>(2.5M) Overwrite files in English Pack with files from this archive</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-sword.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/Sword1_Cutscenes_ESP_AddOn.zip?download">Broken Sword 1 Cutscene Pack (Spanish AddOn)</a> <font class='cat-count'>(2.2M) Overwrite files in English Pack with files from this archive</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-sword.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/Sword1_Demo_Cutscenes.zip?download">Broken Sword 1 Demo Cutscene Pack</a> <font class='cat-count'>(19M) - Requires ScummVM 0.10.0</font></td></tr>

	  <tr><td></td><td>&nbsp;</td></tr>

	  <tr><td class='cat-bullet'><img src='images/cat-sword2.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/Sword2_DXA_Cutscenes.zip?download">Broken Sword 2 Cutscene Pack (all languages, DXA compression)</a> <font class='cat-count'>(111M) - Requires ScummVM 0.10.0</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-sword2.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/Sword2_OGG_Cutscenes.zip?download">Broken Sword 2 Cutscene Pack (English OGG AddOn)</a> <font class='cat-count'>(2.9M) Alternative audio pack, for ports without FLAC support</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/cat-sword2.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/Sword2_Demo_Cutscenes.zip?download">Broken Sword 2 Demo Cutscene Pack</a> <font class='cat-count'>(767KB) - Requires ScummVM 0.10.0</font></td></tr>

	  <tr><td></td><td>&nbsp;</td></tr>

	  <tr><td class='cat-bullet'><img src='images/cat-feeble.png' alt=""></td><td class='cat-link'><a href="http://prdownloads.sourceforge.net/scummvm/Feeble_OmniTV_Cutscenes.zip?download">The Feeble Files - Omni TV and epilogue cutscenes for the Amiga and Macintosh versions</a> <font class='cat-count'>(13.6M) - Requires ScummVM 0.10.0</font></td></tr>

	  <tr><td></td><td>&nbsp;</td></tr>

	  <tr><td class='cat-bullet'><img src='images/cat-kyra.png' alt=""></td><td class='cat-link'><a href="https://scummvm.svn.sourceforge.net/svnroot/scummvm/scummvm/tags/release-0-11-0/dists/engine-data/kyra.dat">The Legend of Kyrandia, KYRA.DAT - required for all versions of the game</a> <font class='cat-count'>(182k)</font></td></tr>
	</table>

     </div>
  </div>

	<a name="SVN"></a>
  <div class="par-item">
    <div class="par-head">
       Subversion Builds
    </div>

    <div class="par-content">
    <p>
      <b>WARNING:</b> The following builds are bleeding edge development
      versions made directly from our Subversion (= SVN) source repository.
      That means that they received no proper testing (usually no testing at
      all) and that any number of things may be broken in the them. For
      example, they might corrupt your config file, crash frequently or or
      might not even start. Use them at your own risk!
    </p>
	<p>
	  View the <a href="/daily/ChangeLog">ChangeLog</a> to see the latest updates of ScummVM.
	</p>
	<p>
	  You can get the latest development source and binaries for Linux/Intel from the
	  <a href="http://www.scummvm.org/daily/">Subversion Daily Snapshot</a> page.
	</p>
	<p>
	  Additional snapshot builds:
	</p>

	<table>
	  <tr><td class='cat-bullet'><img src='images/catpl-windows.png' alt=""></td><td class='cat-link'><a href="http://scummvm.sourceforge.net/downloads/scummvmwin32.exe">Win32 Daily Snapshot</a> <font class='cat-count'> (<? echo intval(filesize("downloads/scummvmwin32.exe")/1024) ?>K exe file, last update: <? echo date("F j, Y, g:i a",filemtime("downloads/scummvmwin32.exe")); ?>)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-macos.png' alt=""></td><td class='cat-link'><a href="http://worldsmainorganization.org/scummvm/">Mac OS X Snapshots</a> <font class='cat-count'> (infrequently from Subversion trunk)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-gp2x.png' alt=""></td><td class='cat-link'><a href="http://www.distant-earth.com/scummvm/">GP2X Builds</a> <font class='cat-count'> (infrequent builds from Subversion trunk)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-wince.png' alt=""></td><td class='cat-link'><a href="http://arisme.free.fr/PocketScumm/daily/">Old PocketPC Builds</a> <font class='cat-count'> (infrequent snapshots of the PocketPC binaries)</font></td></tr>
	  <tr><td class='cat-bullet'><img src='images/catpl-opie.png' alt=""></td><td class='cat-link'><a href="/downloads/scummvm_opie_svn_arm.ipk">Opie SDL package<b> Only </b>for iPAQ h1910/h1915 and MyPal 716</a> - compiled against latest custom <a href="http://handhelds.org/~aquadran/distro/latest"><b>Familiar Opie distribution image</b></a> <font class='cat-count'> (infrequently from Subversion trunk, <? echo intval(filesize("downloads/scummvm_opie_svn_arm.ipk")/1024) ?>K ipk file, last update: <? echo date("F j, Y, g:i a",filemtime("downloads/scummvm_opie_svn_arm.ipk")); ?>)</font></td></tr>
	<tr><td class='cat-bullet'><img src='images/catpl-symbian.png' alt=""></td><td class='cat-link'><a href="http://anotherguest.k0.se/cvsbuilds/">SymbianOS Subversion Builds</a></td></tr>
	<tr><td class='cat-bullet'><img src='images/catpl-cpp.png' alt=""></td><td class='cat-link'><a href="http://sourceforge.net/svn/?group_id=37116">Subversion Instructions</a> <font class='cat-count'> (for if you wish to retrieve the latest code to compile yourself)</font></td></tr>
	</table>

     </div>
  </div>


  <a name="libs"></a>
  <div class="par-item">
    <div class="par-head">
       Libraries
    </div>

    <br>

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
	  <li><a href="http://www.xiph.org/vorbis/">Ogg Vorbis</a></li>
	  <li><a href="http://flac.sourceforge.net/">FLAC</a></li>
	</ul>
    </div>
  </div>
<?

html_content_end();
html_page_footer();

?>
