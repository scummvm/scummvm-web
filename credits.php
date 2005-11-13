<?

/*
 * Credits Page for ScummVM
 *
 */

// set this for position of this file relative
$file_root = ".";

// load libraries
require($file_root."/include/"."incl.php");

// start of html
html_page_header('ScummVM :: Credits');

html_content_begin('Credits');

?>
<div class="par-item">
  <div class="par-head">
    Credits
  </div>
  <div class="par-content">

  <div class="credits-table">
<?php

include $file_root."/credits.inc";

echo "     </div>\n";
echo "  </div>\n";
echo "</div>\n";

html_content_end();
html_page_footer();

?>
