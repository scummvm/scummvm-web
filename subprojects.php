<?php
// set this for position of this file relative
$file_root = ".";

// load libraries
require($file_root."/include/"."incl.php");

// start of html
html_page_header("ScummVM :: Subprojects");

html_content_begin("ScummVM Subprojects");
?>
  <div class="par-item">
    <div class="par-intro">
<br>
<P>
The ScummVM team occasionally works on various subprojects, separate from the main 
ScummVM program. These projects are generally reasonably stagnant and not given a high 
priority. Regardless, this page is here to inform you of them, in the vague hope of 
attracting more developers to help maintain these side-programs.
</P>
<P>
Please do not ask where you can obtain binaries of these programs. Currently both 
subprojects are still in a state only suitable for developers... so if you can't compile 
the code yourself, then these are not really ready for you.
</P><br>

    </div>

<br>

<?php html_subhead_start("ScummEx (svn subtree 'scummex')"); ?>

    <div class="par-subhead-content">
<P>
ScummEx is a multi-platform SCUMM resource browser, viewer and extractor using the 
wxWindows toolkit.
</P>
<P>
Development on this project is currently stalled. The code-base needs quite some cleanup, 
and viewers for many resource types still need adding to the code. Patches and volunteers
are very welcome...
</P>
<P>
You can try compile engine for Windows:
</P>
<a href="downloads/scummexwin32.exe">Windows Daily Snapshot</a> <small> (build from Subversion trunk, <?php echo intval(filesize("downloads/scummexwin32.exe")/1024) ?>K Win32 .exe file, last update: <?php echo date("F j, Y, g:i a",filemtime("downloads/scummexwin32.exe")); ?>)</small>

<p>&nbsp;</p>
    </div>

<?php html_subhead_start("Residual (svn subtree 'residual')"); ?>

    <div class="par-subhead-content">
<P>
Residual is a LUA-powered 3D GRIME clone, designed to run the game Grim Fandango. Why 
'Residual'? Because this engine covers games that the main ScummVM application will not 
support due to their 3D nature. Also, GRIME is a residue. Yes, we know, it's a bad word 
pun.
</P>
<P>
Residual's core is in a fairly decent state, however it is not in full-time development and 
as such is progressing slowly.
</P>
<P>
You can try compiled engine for:
</P>
<p><a href="downloads/residualwin32.exe">Windows</a> <small> (build from Subversion trunk, <?php echo intval(filesize("downloads/residualwin32.exe")/1024) ?>K Win32 .exe file, last update: <?php echo date("F j, Y, g:i a",filemtime("downloads/residualwin32.exe")); ?>)</small></p>
<p><a href="downloads/Residual-MacOSX-Intel.dmg">Mac OS X Intel</a> <small> (build from Subversion trunk, <?php echo intval(filesize("downloads/Residual-MacOSX-Intel.dmg")/1024) ?>K dmg file, last update: <?php echo date("F j, Y, g:i a",filemtime("downloads/Residual-MacOSX-Intel.dmg")); ?>)</small></p>
<p><a href="downloads/residual_debian_i386.deb">Debian i386</a> <small> (build from Subversion trunk, <?php echo intval(filesize("downloads/residual_debian_i386.deb")/1024) ?>K deb file, last update: <?php echo date("F j, Y, g:i a",filemtime("downloads/residual_debian_i386.deb")); ?>)</small></p>
<p><a href="downloads/residual_debian_i386.deb">Debian x86_64</a> <small> (build from Subversion trunk, <?php echo intval(filesize("downloads/residual_debian_amd64.deb")/1024) ?>K deb file, last update: <?php echo date("F j, Y, g:i a",filemtime("downloads/residual_debian_amd64.deb")); ?>)</small></p>
<p><a href="downloads/residual_ubuntu_amd64.deb">Ubuntu i386</a> <small> (build from Subversion trunk, <?php echo intval(filesize("downloads/residual_ubuntu_i386.deb")/1024) ?>K deb file, last update: <?php echo date("F j, Y, g:i a",filemtime("downloads/residual_ubuntu_i386.deb")); ?>)</small></p>
<p><a href="downloads/residual_ubuntu_amd64.deb">Ubuntu x86_64</a> <small> (build from Subversion trunk, <?php echo intval(filesize("downloads/residual_ubuntu_amd64.deb")/1024) ?>K deb file, last update: <?php echo date("F j, Y, g:i a",filemtime("downloads/residual_ubuntu_amd64.deb")); ?>)</small></p>
<p></p>
    </div>
  </div>

<?php

// end of html
html_content_end();
html_page_footer();

?>
