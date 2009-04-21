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

<?php

// end of html
html_content_end();
html_page_footer();

?>
