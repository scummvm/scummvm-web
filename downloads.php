<?php

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
html_page_header('ScummVM :: Downloads', array("downloads.css"));

html_content_begin('Download ScummVM');

/*
 * Some extra tools
 */
function startDownloadList() {
	echo " <ul class='download-list'>";
}

function endDownloadList() {
	echo "</ul>";
}

function addDownloadSeparator() {
	echo "<li>&nbsp;</li>";
}

function addDownload($image, $linkText, $desc, $url) {
	echo "<li>";
	echo "<img src='images/$image.png' alt='' width=24 height=24 style='vertical-align: middle;' >";
	echo " <a href='$url'>$linkText</a>";
	echo " <span class='download-extras'>$desc</span>";
}

?>

  <div class="par-item">
    <div class="par-head">
       Downloads for ScummVM <span style="color: #aaaaaa;">version <?php echo $current_release; ?></span>
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
  html_nav_item("#stable", $current_release . " Release binaries");
  html_nav_item("#source", $current_release . " Source Code");
  html_nav_item("#tools", "$current_tools_release Tools");
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
	  <a href="http://scummvm.svn.sourceforge.net/svnroot/scummvm/scummvm/tags/<?php echo $current_release_tag; ?>/README">README</a>
	  file for directions on how to build ScummVM.
	  If you have successfully ported ScummVM to a platform not listed, please drop us a note, telling which OS, etc.
	  you used.

	<UL>
		<LI>The latest STABLE release of ScummVM is <?php echo $current_release; ?>, and can be downloaded below
	under '<A HREF="#stable">Release Binaries</A>'. If you run Windows and are confused,
	download the 'Windows Installer'</LI>

		<LI>For UNSTABLE experimental versions of ScummVM (for people who know what they
	are doing), please see the <a href="#SVN">Subversion Builds</a> section, near the end of this page.</LI>

		<LI>Also below are the <a href="#extras">Extras</a>. These currently include four
	  freeware games 'Beneath a Steel Sky', 'Drascula: The Vampire Strikes Back', 'Flight of the Amazon Queen' and 'Lure of the Temptress', along with
    cutscene packs recommended for use when playing Broken Sword 1, 2 or Feeble Files under ScummVM</LI>
	</UL>
</td></tr>
</table>

	<br>
    </div>

	<a name="stable"></a>
	<br>
    <?php html_subhead_start($current_release . " Release binaries"); ?>

    <div class="par-subhead-content">

	<p>For a list of changes since the previous version, <a href="http://sourceforge.net/project/shownotes.php?release_id=621976">read the release notes</a>.
	<BR>
	0.12.0 is also apt-get'able from Debian unstable (sid).
	</p>

<?php
	startDownloadList();

	addDownload("catpl-windows", "<b>Windows Installer</b>", "(2.9M Win32 .exe)", "http://prdownloads.sourceforge.net/scummvm/scummvm-${current_release}-win32.exe?download");

	addDownload("catpl-windows", "Windows zipfile", "(4.1M zipfile)", "http://prdownloads.sourceforge.net/scummvm/scummvm-${current_release}-win32.zip?download");

	addDownload("catpl-fedora", "Fedora 8, 9 and 10 i386 package", "(4.0M RPM)", "http://prdownloads.sourceforge.net/scummvm/scummvm-$current_release-1_F8.i386.rpm?download");

	addDownload("catpl-fedora", "Fedora 8, 9 and 10 x86 64bit package", "(4.3M RPM)", "http://prdownloads.sourceforge.net/scummvm/scummvm-$current_release-1_F8.x86_64.rpm?download");

	addDownload("catpl-debian", "Debian 5.0 (lenny) i386 package", "(3.7M .deb)", "http://prdownloads.sourceforge.net/scummvm/scummvm_$current_release-lenny.1_i386.deb?download");
	addDownload("catpl-debian", "Debian 5.0 (lenny) x86 64bit package", "(4.1M .deb)", "http://prdownloads.sourceforge.net/scummvm/scummvm_$current_release-lenny.1_amd64.deb?download");

	addDownload("catpl-ubuntu", "Ubuntu 8.10 (intrepid) i386 package", "(3.7M .deb)", "http://prdownloads.sourceforge.net/scummvm/scummvm_$current_release-intrepid.1_i386.deb?download");
	addDownload("catpl-ubuntu", "Ubuntu 8.10 (intrepid) x86 64bit package", "(4.1M .deb)", "http://prdownloads.sourceforge.net/scummvm/scummvm_$current_release-intrepid.1_amd64.deb?download");

/*
	addDownload("catpl-ubuntu", "Ubuntu 9.04 (jaunty) i386 package", "(3.7M .deb)", "http://prdownloads.sourceforge.net/scummvm/scummvm_$current_release-0.jaunty.1_i386.deb?download");
	addDownload("catpl-ubuntu", "Ubuntu 9.04 (jaunty) x86 64bit package", "(4.1M .deb)", "http://prdownloads.sourceforge.net/scummvm/scummvm_$current_release-0.jaunty.1_amd64.deb?download");
*/

	addDownload("catpl-slackware", "SlackWare package", "(3.6M .tgz)", "http://prdownloads.sourceforge.net/scummvm/scummvm-".$current_release."_slack-i486-1.tgz?download");

/*
	addDownload("catpl-mandriva", "Mandriva 2006 package", "(1.3M RPM)", "http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-1mdk.i586.rpm?download");

*/
	addDownload("catpl-macos-universal", "Mac OS X Universal Disk Image", "(7.9M disk image)", "http://prdownloads.sourceforge.net/scummvm/scummvm-$current_release-macosx.dmg?download");

	addDownload("catpl-ps2", "PlayStation2 package", "(4.6M .zip)", "http://prdownloads.sourceforge.net/scummvm/scummvm-$current_release-ps2.zip?download");

	addDownload("catpl-psp", "PSP (PlayStation Portable) package", "(8.4M .zip)", "http://prdownloads.sourceforge.net/scummvm/scummvm-$current_release-psp.zip?download");

	addDownload("catpl-ds", "Nintendo DS package", "(9.5M .zip)", "http://prdownloads.sourceforge.net/scummvm/scummvm-$current_release-ds.zip?download");

	addDownload("catpl-symbian", "Symbian S60 version 3 binary", "(4.4M .sis)", "http://prdownloads.sourceforge.net/scummvm/scummvm-$current_release-s60-v3.sis?download");
	addDownload("catpl-uiq", "Symbian UIQ 3 binary", "(4.4M .sis)", "http://prdownloads.sourceforge.net/scummvm/scummvm-$current_release-uiq3.sis?download");

/*
	addDownload("catpl-palmos", "PalmOS 5 binary", "(7.8M zipfile)", "http://prdownloads.sourceforge.net/scummvm/scummvm-0.11.1-palmos-os5.zip?download");
	addDownload("catpl-palmos", "PalmOS Tapwave Zodiac binary", "(8.0M zipfile)", "http://prdownloads.sourceforge.net/scummvm/scummvm-0.11.1-palmos-zodiac.zip?download");
*/

	addDownload("catpl-wince", "Windows CE ARM package", "(6.1M zipfile)", "http://prdownloads.sourceforge.net/scummvm/scummvm-$current_release-WinCE.zip?download");

	addDownload("catpl-iphone", "iPhone package", "(5.8M .deb)", "http://prdownloads.sourceforge.net/scummvm/scummvm-$current_release-iphone.deb?download");

/*
	addDownload("catpl-opie", "Opie SDL package <b>Only</b> for iPAQ h1910/h1915 and MyPal 716", "(3.6M .ipk)", "http://prdownloads.sourceforge.net/scummvm/scummvm-0.11.1-opie_arm.ipk?download");
*/

	addDownload("catpl-maemo", "Maemo package (OS 2006, 2007 and 2008)", "(3.1M .deb)", "http://prdownloads.sourceforge.net/scummvm/scummvm_".$current_release."_armel.deb?download");
	addDownload("catpl-maemo", "Maemo single click install package for N770/OS2006", "(Most recent version from Maemo Extras repository)", "http://downloads.maemo.org/product/OS2006/scummvm/");
	addDownload("catpl-maemo", "Maemo single click install package for N800/OS2007", "(Most recent version from Maemo Extras repository)", "http://downloads.maemo.org/product/OS2007/scummvm/");
	addDownload("catpl-maemo", "Maemo single click install package for N8x0/OS2008", "(Most recent version from Maemo Extras repository)", "http://downloads.maemo.org/product/OS2008/scummvm/");

	addDownload("catpl-dc", "Dreamcast plain files", "(7.0M .tar.bz2)", "http://prdownloads.sourceforge.net/scummvm/scummvm-$current_release-dreamcast-plainfiles.tar.bz2?download");
	addDownload("catpl-dc", "Dreamcast Nero Image &amp; Demos", "(11.0M .zip)", "http://prdownloads.sourceforge.net/scummvm/scummvm-$current_release-dreamcast-nero+demos.zip?download");

	addDownload("catpl-gc", "Nintendo GameCube package", "(3.5M .zip)", "http://prdownloads.sourceforge.net/scummvm/scummvm-$current_release-gamecube.zip?download");
	addDownload("catpl-wii", "Wii package", "(3.6M .zip)", "http://prdownloads.sourceforge.net/scummvm/scummvm-$current_release-wii.zip?download");

	addDownload("catpl-gp2x", "GP2X package", "(4.7M .zip)", "http://prdownloads.sourceforge.net/scummvm/scummvm-$current_release-gp2x.zip?download");

		addDownload("catpl-solaris", "Solaris 8 and up (Sparc) binary", "(4.8M .tar.bz2)", "http://prdownloads.sourceforge.net/scummvm/scummvm-$current_release-solaris8-sparc.tar.bz2?download");	
		addDownload("catpl-solaris", "Solaris 10 (both IA32 and AMD64) binary", "(11.0M .pkg.bz2)", "http://prdownloads.sourceforge.net/scummvm/scummvm-$current_release-solaris10-x86.pkg.bz2?download");

		addDownload("catpl-beos", "BeOS package", "(4.8M .tgz)", "http://prdownloads.sourceforge.net/scummvm/scummvm-$current_release-beos.tgz?download");
		addDownload("catpl-haiku", "Haiku package", "(4.3M .tgz)", "http://prdownloads.sourceforge.net/scummvm/scummvm-$current_release-haiku-gcc4.tgz?download");

		addDownload("catpl-amiga", "AmigaOS 4 package", "(5.3M .lha)", "http://prdownloads.sourceforge.net/scummvm/scummvm-$current_release-amigaos4.lha?download");

/*
		addDownload("catpl-morphos", "MorphOS package", "(4.2M .lha)", "http://prdownloads.sourceforge.net/scummvm/scummvm-0.11.0-morphos.lha?download");

*/
		addDownload("catpl-freemint", "Atari/FreeMiNT package (68020 and up)", "(4.3M .zip)", "http://prdownloads.sourceforge.net/scummvm/scummvm-$current_release-atari.zip?download");

		addDownload("catpl-os2", "OS/2 package", "(4.9M .zip)", "http://prdownloads.sourceforge.net/scummvm/scummvm-$current_release-os2.zip?download");

	endDownloadList();
?>

    </div>

    <a name="source"></a>
    <?php html_subhead_start($current_release . " Source Code"); ?>

    <div class="par-subhead-content">

<?php
	startDownloadList();
	
		addDownload("catpl-cpp", "ScummVM - Source .tar.bz2", "(6.8M)", "http://prdownloads.sourceforge.net/scummvm/scummvm-$current_release.tar.bz2?download");
		addDownload("catpl-cpp", "ScummVM - Source .tar.gz", "(8.2M)", "http://prdownloads.sourceforge.net/scummvm/scummvm-$current_release.tar.gz?download");
		addDownload("catpl-cpp", "ScummVM - Source .zip", "(10.2M)", "http://prdownloads.sourceforge.net/scummvm/scummvm-$current_release.zip?download");
		addDownload("catpl-cpp", "ScummVM - Source RPM", "(7.5M RPM)", "http://prdownloads.sourceforge.net/scummvm/scummvm-$current_release-1.src.rpm?download");

	endDownloadList();
?>

    </div>

    <a name="tools"></a>
    <?php html_subhead_start("$current_tools_release Tools (mostly unsupported)"); ?>

    <div class="par-subhead-content">

<?php
	startDownloadList();
		addDownload("catpl-windows", "Tools - Windows Installer", "(943k Win32 .exe)", "http://prdownloads.sourceforge.net/scummvm/scummvm-tools-$current_tools_release-win32.exe?download");
		addDownload("catpl-windows", "Tools - Windows zipfile", "(3,8M Win32 .zip)", "http://prdownloads.sourceforge.net/scummvm/scummvm-tools-$current_tools_release-win32.zip?download");

		addDownload("catpl-fedora", "Tools - Fedora 8, 9 and 10 i386 RPM", "(268k .rpm)", "http://prdownloads.sourceforge.net/scummvm/scummvm-tools-$current_tools_release-1_F8.i386.rpm?download");
		addDownload("catpl-fedora", "Tools - Fedora 8, 9 and 10 x86 64bit RPM", "(303k .rpm)", "http://prdownloads.sourceforge.net/scummvm/scummvm-tools-$current_tools_release-1_F8.x86_64.rpm?download");

		addDownload("catpl-macos-universal", "Tools - Mac OS X Universal binaries (10.3.9 and up)", "(9.8M .tar.bz2)", "http://prdownloads.sourceforge.net/scummvm/scummvm-tools-$current_tools_release-macosx.tar.bz2?download");

		addDownload("catpl-solaris", "Tools - Solaris 8 (Sparc)", "(445k .tar.bz2)", "http://prdownloads.sourceforge.net/scummvm/scummvm-tools-$current_tools_release-solaris8-sparc.tar.bz2?download");
		addDownload("catpl-solaris", "Tools - Solaris 10 (both IA32 and AMD64)", "(4.8M .pkg.bz2)", "http://prdownloads.sourceforge.net/scummvm/scummvm-tools-$current_tools_release-solaris10-x86.pkg.bz2?download");

		addDownload("catpl-amiga", "Tools - AmigaOS 4", "(7.5M .lha)", "http://prdownloads.sourceforge.net/scummvm/scummvm-tools-$current_tools_release-amigaos4.lha?download");

		addDownload("catpl-freemint", "Tools - Atari/FreeMiNT (68020 and up)", "(4.4M .zip)", "http://prdownloads.sourceforge.net/scummvm/scummvm-tools-$current_tools_release-atari.zip?download");

		addDownload("catpl-beos", "Tools - BeOS", "(1.3M .tgz)", "http://prdownloads.sourceforge.net/scummvm/scummvm-tools-$current_tools_release-beos.tgz?download");

		addDownload("catpl-cpp", "Tools - Source .tar.bz2", "(272k .tar.bz2)", "http://prdownloads.sourceforge.net/scummvm/scummvm-tools-$current_tools_release.tar.bz2?download");
		addDownload("catpl-cpp", "Tools - Source .tar.gz", "(330k .tar.gz)", "http://prdownloads.sourceforge.net/scummvm/scummvm-tools-$current_tools_release.tar.gz?download");
		addDownload("catpl-cpp", "Tools - Source .zip", "(372k .zip)", "http://prdownloads.sourceforge.net/scummvm/scummvm-tools-$current_tools_release.zip?download");

		addDownload("catpl-cpp", "Tools - Source RPM", "(274k .rpm)", "http://prdownloads.sourceforge.net/scummvm/scummvm-tools-$current_tools_release-1.src.rpm?download");

	endDownloadList();
?>

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

<?php
	startDownloadList();
	
		addDownload("catpl-palmos", "0.11.1 PalmOS 5 binary", "(7.8M zipfile)", "http://prdownloads.sourceforge.net/scummvm/scummvm-0.11.1-palmos-os5.zip?download");
		addDownload("catpl-palmos", "0.11.1 PalmOS Tapwave Zodiac binary", "(8.0M zipfile)", "http://prdownloads.sourceforge.net/scummvm/scummvm-0.11.1-palmos-zodiac.zip?download");

		addDownload("catpl-opie", "0.11.1 Opie SDL package <b>Only</b> for iPAQ h1910/h1915 and MyPal 716", "(3.6M .ipk)", "http://prdownloads.sourceforge.net/scummvm/scummvm-0.11.1-opie_arm.ipk?download");

		addDownload("catpl-morphos", "0.11.0 MorphOS package", "(4.2M .lha)", "http://prdownloads.sourceforge.net/scummvm/scummvm-0.11.0-morphos.lha?download");

		addDownload("catpl-fedora", "0.10.0 Fedora Core 5 and 6 package", "(2.8M RPM)", "http://prdownloads.sourceforge.net/scummvm/scummvm-0.10.0-1_FC5.i386.rpm?download");

		addDownload("catpl-fedora", "0.9.1 Fedora Core 2 package", "(1.6M RPM)", "http://prdownloads.sourceforge.net/scummvm/scummvm-0.9.1-1_FC2.i386.rpm?download");

		addDownload("catpl-debian", "0.9.1 Debian 3.1 (sarge) package", "(1.6M .deb)", "http://prdownloads.sourceforge.net/scummvm/scummvm_0.9.1-0.sarge.1_i386.deb?download");

		addDownload("catpl-symbian", "0.9.1 Symbian S60 version 1 binary", "(1.4M .sis)", "http://prdownloads.sourceforge.net/scummvm/scummvm-0.9.1-s60-v1.sis?download");
		addDownload("catpl-symbian", "0.9.1 Symbian S60 version 2 binary", "(1.4M .sis)", "http://prdownloads.sourceforge.net/scummvm/scummvm-0.9.1-s60-v2.sis?download");
		addDownload("catpl-symbian", "0.9.1 Symbian S80 binary", "(1.4M .sis)", "http://prdownloads.sourceforge.net/scummvm/scummvm-0.9.1-s80.sis?download");
		addDownload("catpl-symbian", "0.9.1 Symbian S90 binary", "(1.4M .sis)", "http://prdownloads.sourceforge.net/scummvm/scummvm-0.9.1-s90.sis?download");
		addDownload("catpl-uiq", "0.9.1 Symbian UIQ 2 binary", "(1.4M .sis)", "http://prdownloads.sourceforge.net/scummvm/scummvm-0.9.1-uiq2.sis?download");

		addDownload("catpl-win64", "0.8.0 Windows 64 zipfile", "(1.4M zipfile)", "http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-win64.zip?download");

		addDownload("catpl-mandriva", "0.8.0 Mandriva 2006 package", "(1.3M RPM)", "http://prdownloads.sourceforge.net/scummvm/scummvm-0.8.0-1mdk.i586.rpm?download");

		addDownload("catpl-wince", "0.7.1 PocketPC MIPS binary", "(1.5M zipfile)", "http://prdownloads.sourceforge.net/scummvm/scummvm-0.7.1-PocketPC_MIPS.zip?download");
		addDownload("catpl-wince", "0.7.1 PocketPC SH3 binary", "(1.4M zipfile)", "http://prdownloads.sourceforge.net/scummvm/scummvm-0.7.1-PocketPC_SH3.zip?download");
		addDownload("catpl-wince", "0.7.1 HandheldPC ARM binary", "(1.3M zipfile)", "http://prdownloads.sourceforge.net/scummvm/scummvm-0.7.1-HandheldPC_ARM.zip?download");
		addDownload("catpl-wince", "0.7.1 HandheldPC MIPS binary", "(1.5M zipfile)", "http://prdownloads.sourceforge.net/scummvm/scummvm-0.7.1-HandheldPC_MIPS.zip?download");
		addDownload("catpl-wince", "0.7.1 HandheldPC SH3 binary", "(1.4M zipfile)", "http://prdownloads.sourceforge.net/scummvm/scummvm-0.7.1-HandheldPC_SH3.zip?download");

	endDownloadList();
?>

     </div>
  </div>

	<a name="extras"></a>
  <div class="par-item">
    <div class="par-head">
       Extras, game downloads
    </div>

    <div class="par-content">

<?php
	startDownloadList();
	
		addDownload("cat-sky", "Beneath a Steel Sky, SKY.CPT - required to run the game with a post-0.7.* ScummVM", "(410k)", "https://scummvm.svn.sourceforge.net/svnroot/scummvm/scummvm/tags/$current_release_tag/dists/engine-data/sky.cpt");
		addDownload("cat-sky", "Beneath a Steel Sky, Freeware CD Version", "(67M)", "http://prdownloads.sourceforge.net/scummvm/bass-cd-1.2.zip?download");
		addDownload("cat-sky", "Beneath a Steel Sky, Freeware Floppy Version", "(7.3M)", "http://prdownloads.sourceforge.net/scummvm/BASS-Floppy-1.3.zip?download");

		addDownloadSeparator();

		addDownload("cat-queen", "Flight of the Amazon Queen, Freeware CD Version (mp3 compressed sfx/speech)", "(34.8M)", "http://prdownloads.sourceforge.net/scummvm/FOTAQ_Talkie-1.1.zip?download");
		addDownload("cat-queen", "Flight of the Amazon Queen, Freeware CD Version (ogg compressed sfx/speech)", "(35.6M)", "ftp://ftp.suse.com/pub/suse/i386/supplementary/X/FOTAQ/");
		addDownload("cat-queen", "Flight of the Amazon Queen, Freeware CD Version (FLAC compressed sfx/speech)", "(82M) <a href='http://holarse.de'>hosted by Holarse</a>", "ftp://holarse-linuxgaming.de/clients/opensource/Flight-of-the-Amazon-Queen/fotaq-english-flac.tar.bz2");
		addDownload("cat-queen", "Flight of the Amazon Queen, Freeware CD Version (unmodified original)", "(87M) download this version if your ScummVM doesn't have mp3 support", "http://www.lysator.liu.se/~zino/scummvm/queen/");
		addDownload("cat-queen", "Flight of the Amazon Queen, Freeware CD Version (<i>Hebrew</i> subtitles, English voices, ogg compressed sfx/speech)", "(63.1M)", "http://prdownloads.sourceforge.net/scummvm/FOTAQ_Heb_talkie.zip?download");
		addDownload("cat-queen", "Flight of the Amazon Queen, Freeware Floppy Version", "(6.7M)", "http://prdownloads.sourceforge.net/scummvm/FOTAQ_Floppy.zip?download");
		addDownload("cat-queen", "Flight of the Amazon Queen, queen.tbl - required to run original versions of FOTAQ", "(1.0M)", "https://scummvm.svn.sourceforge.net/svnroot/scummvm/scummvm/tags/$current_release_tag/dists/engine-data/queen.tbl");

		addDownloadSeparator();

		addDownload("cat-lure", "Lure of the Temptress, Freeware Version (English)", "(3.9M)", "http://prdownloads.sourceforge.net/scummvm/lure-1.1.zip?download");
		addDownload("cat-lure", "Lure of the Temptress, Freeware Version (French)", "(3.4M)", "http://prdownloads.sourceforge.net/scummvm/lure-fr-1.1.zip?download");
		addDownload("cat-lure", "Lure of the Temptress, Freeware Version (German)", "(3.5M)", "http://prdownloads.sourceforge.net/scummvm/lure-de-1.1.zip?download");
		addDownload("cat-lure", "Lure of the Temptress, Freeware Version (Italian)", "(3.0M)", "http://prdownloads.sourceforge.net/scummvm/lure-it-1.1.zip?download");
		addDownload("cat-lure", "Lure of the Temptress, Freeware Version (Spanish)", "(2.1M)", "http://prdownloads.sourceforge.net/scummvm/lure-es-1.1.zip?download");

		addDownload("cat-lure", "Lure of the Temptress, lure.dat - required to run original versions of Lure of the Temptress", "(623k) - Requires ScummVM $current_release", "https://scummvm.svn.sourceforge.net/svnroot/scummvm/scummvm/tags/$current_release_tag/dists/engine-data/lure.dat");

		addDownloadSeparator();

		addDownload("cat-drascula", "Drascula: The Vampire Strikes Back, Freeware Version (English)", "(31.3M)", "http://prdownloads.sourceforge.net/scummvm/drascula-1.0.zip?download");
		addDownload("cat-drascula", "Drascula: The Vampire Strikes Back, Freeware Version (Music AddOn, OGG format)", "(34.4M)", "http://prdownloads.sourceforge.net/scummvm/drascula-audio-1.0.zip?download");
		addDownload("cat-drascula", "Drascula: The Vampire Strikes Back, Freeware Version (Spanish, German, French and Italian AddOn)", "(33.2M)", "http://prdownloads.sourceforge.net/scummvm/drascula-int-1.0.zip?download");

		addDownload("cat-drascula", "Drascula: The Vampire Strikes Back, DRASCULA.DAT - required for all versions of the game", "(211k) - Requires ScummVM $current_release", "https://scummvm.svn.sourceforge.net/svnroot/scummvm/scummvm/tags/$current_release_tag/dists/engine-data/drascula.dat");

		addDownloadSeparator();

		addDownload("cat-sword", "Broken Sword 1 Cutscene Pack (English, DXA compression)", "(58.5M) - Requires ScummVM 0.10.0", "http://prdownloads.sourceforge.net/scummvm/Sword1_DXA_Cutscenes.zip?download");
		addDownload("cat-sword", "Broken Sword 1 Cutscene Pack (Brazilian)", "(38M) This is an offsite package with both Brazillian videos and audio", "http://downloads.scummbr.com/Sword1_Cutscenes_BRA_Complete.zip");
		addDownload("cat-sword", "Broken Sword 1 Cutscene Pack (English OGG AddOn)", "(2.9M) Alternative audio pack, for ports without FLAC support", "http://prdownloads.sourceforge.net/scummvm/Sword1_OGG_Cutscenes.zip?download");
		addDownload("cat-sword", "Broken Sword 1 Cutscene Pack (French AddOn)", "(1.6M) Overwrite files in English Pack with files from this archive", "http://prdownloads.sourceforge.net/scummvm/Sword1_Cutscenes_FRE_AddOn.zip?download");
		addDownload("cat-sword", "Broken Sword 1 Cutscene Pack (German AddOn)", "(1.8M) Overwrite files in English Pack with files from this archive", "http://prdownloads.sourceforge.net/scummvm/Sword1_Cutscenes_GER_AddOn.zip?download");
		addDownload("cat-sword", "Broken Sword 1 Cutscene Pack (Italian AddOn)", "(2.5M) Overwrite files in English Pack with files from this archive", "http://prdownloads.sourceforge.net/scummvm/Sword1_Cutscenes_ITA_AddOn.zip?download");
		addDownload("cat-sword", "Broken Sword 1 Cutscene Pack (Spanish AddOn)", "(2.2M) Overwrite files in English Pack with files from this archive", "http://prdownloads.sourceforge.net/scummvm/Sword1_Cutscenes_ESP_AddOn.zip?download");
		addDownload("cat-sword", "Broken Sword 1 Demo Cutscene Pack", "(19M) - Requires ScummVM 0.10.0", "http://prdownloads.sourceforge.net/scummvm/Sword1_Demo_Cutscenes.zip?download");

		addDownloadSeparator();

		addDownload("cat-sword2", "Broken Sword 2 Cutscene Pack (all languages, DXA compression)", "(111M) - Requires ScummVM 0.10.0", "http://prdownloads.sourceforge.net/scummvm/Sword2_DXA_Cutscenes.zip?download");
		addDownload("cat-sword2", "Broken Sword 2 Cutscene Pack (all languages, OGG AddOn)", "(2.9M) Alternative audio pack, for ports without FLAC support", "http://prdownloads.sourceforge.net/scummvm/Sword2_OGG_Cutscenes.zip?download");
		addDownload("cat-sword2", "Broken Sword 2 Demo Cutscene Pack", "(767KB) - Requires ScummVM 0.10.0", "http://prdownloads.sourceforge.net/scummvm/Sword2_Demo_Cutscenes.zip?download");

		addDownloadSeparator();

		addDownload("cat-feeble", "The Feeble Files - Omni TV and epilogue cutscenes for the Amiga and Macintosh versions", "(13.6M) - Requires ScummVM 0.10.0", "http://prdownloads.sourceforge.net/scummvm/Feeble_OmniTV_Cutscenes.zip?download");

		addDownloadSeparator();

		addDownload("cat-kyra", "The Legend of Kyrandia, KYRA.DAT - required for all versions of the game", "(182k)", "https://scummvm.svn.sourceforge.net/svnroot/scummvm/scummvm/tags/$current_release_tag/dists/engine-data/kyra.dat");

	endDownloadList();
?>

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
	  View the <a href="http://apps.sourceforge.net/trac/scummvm/timeline/">ChangeLog</a> to see the latest updates of ScummVM.
	</p>
	<p>
	  Nightly builds generated by our <a href="http://buildbot.scummvm.org">buildbot</a>:
	</p>

<?php
	startDownloadList();
	
		addDownload("catpl-gp2x", "GP2X nightly build", "", "http://buildbot.scummvm.org/snapshots/trunk/gp2x-trunk-latest.tar.bz2");

		addDownload("catpl-iphone", "iPhone nightly build", "", "http://buildbot.scummvm.org/snapshots/trunk/iphone-trunk-latest.tar.bz2");

		addDownload("catpl-macos", "Mac OS X Intel nightly build", "", "http://buildbot.scummvm.org/snapshots/trunk/os_x_intel-trunk-latest.tar.bz2");
		addDownload("catpl-macos", "Mac OS X PPC nightly build", "", "http://buildbot.scummvm.org/snapshots/trunk/os_x_ppc-trunk-latest.tar.bz2");

		addDownload("catpl-psp", "PSP (PlayStation Portable) nightly build", "", "http://buildbot.scummvm.org/snapshots/trunk/psp-trunk-latest.tar.bz2");

		addDownload("catpl-wii", "Wii nightly build", "", "http://buildbot.scummvm.org/snapshots/trunk/wii-trunk-latest.tar.bz2");

	endDownloadList();
?>
	<p>
	  Additional snapshot builds:
	</p>

<?php
	startDownloadList();
	
		$size = intval(filesize("downloads/scummvm-win32.exe")/1024);
		$date = date("F j, Y, g:i a",filemtime("downloads/scummvm-win32.exe"));
		addDownload("catpl-windows", "Win32 ScummVM Daily Snapshot", "(" . $size ."K exe file, last update: $date)", "http://scummvm.sourceforge.net/downloads/scummvm-win32.exe");
	echo "<br>Provided by ScummVM Team member Travis 'Kirben' Howell, updated several times daily";

		$size = intval(filesize("downloads/scummvm-tools-win32.exe")/1024);
		$date = date("F j, Y, g:i a",filemtime("downloads/scummvm-tools-win32.exe"));
		addDownload("catpl-windows", "Win32 ScummVM Tools Daily Snapshot", "(" . $size ."K exe file, last update: $date)", "http://scummvm.sourceforge.net/downloads/scummvm-tools-win32.exe");
	echo "<br>Provided by ScummVM Team member Travis 'Kirben' Howell, updated several times daily";

		$size = intval(filesize("downloads/scummvm_debian_i386.deb")/1024);
		$date = date("F j, Y, g:i a",filemtime("downloads/scummvm_debian_i386.deb"));
		addDownload("catpl-debian", "Debian i386 ScummVM Daily Snapshot", "(" . $size ."K deb file, last update: $date)", "http://scummvm.sourceforge.net/downloads/scummvm_debian_i386.deb");
	echo "<br>Provided by ScummVM Team member Pawel 'aquadran' Kolodziejski";

		$size = intval(filesize("downloads/scummvm_debian_amd64.deb")/1024);
		$date = date("F j, Y, g:i a",filemtime("downloads/scummvm_debian_amd64.deb"));
		addDownload("catpl-debian", "Debian x86_64 ScummVM Daily Snapshot", "(" . $size ."K deb file, last update: $date)", "http://scummvm.sourceforge.net/downloads/scummvm_debian_amd64.deb");
	echo "<br>Provided by ScummVM Team member Pawel 'aquadran' Kolodziejski";

		$size = intval(filesize("downloads/scummvm_ubuntu_i386.deb")/1024);
		$date = date("F j, Y, g:i a",filemtime("downloads/scummvm_ubuntu_i386.deb"));
		addDownload("catpl-ubuntu", "Ubuntu i386 ScummVM Daily Snapshot", "(" . $size ."K deb file, last update: $date)", "http://scummvm.sourceforge.net/downloads/scummvm_ubuntu_i386.deb");
	echo "<br>Provided by ScummVM Team member Pawel 'aquadran' Kolodziejski";

		$size = intval(filesize("downloads/scummvm_ubuntu_amd64.deb")/1024);
		$date = date("F j, Y, g:i a",filemtime("downloads/scummvm_ubuntu_amd64.deb"));
		addDownload("catpl-ubuntu", "Ubuntu x86_64 ScummVM Daily Snapshot", "(" . $size ."K deb file, last update: $date)", "http://scummvm.sourceforge.net/downloads/scummvm_ubuntu_amd64.deb");
	echo "<br>Provided by ScummVM Team member Pawel 'aquadran' Kolodziejski";

		addDownload("catpl-symbian", "SymbianOS Subversion Builds", "", "http://anotherguest.se/cvsbuilds/");
	echo "<br>Provided by ScummVM Team member Lars 'anotherguest' Persson";

		addDownload("catpl-cpp", "Subversion Instructions", "(for if you wish to retrieve the latest code to compile yourself)", "http://sourceforge.net/svn/?group_id=37116");

	endDownloadList();
?>

	<p>
	  Additional daily builds for Linux (x86) as well as source snapshots can be <a href="http://helllabs.org/scummvm/">downloaded from 
	  here</a>.
	</p>

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
<?php

html_content_end();
html_page_footer();

?>
