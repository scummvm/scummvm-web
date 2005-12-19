<?

/*
 * Credits Page for ScummVM
 *
 */

// set this for position of this file relative
$file_root = ".";
  global $file_root;

// load libraries
require($file_root."/include/"."incl.php");

// start of html
html_page_header('ScummVM :: Credits');

html_content_begin('Credits');

include $file_root."/credits.inc";

html_content_end();
html_page_footer();

?>
