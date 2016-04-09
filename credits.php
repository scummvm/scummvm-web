<?php

/*
 * Credits Page for ScummVM
 *
 */

// set this for position of this file relative
$file_root = ".";

// load libraries
require($file_root."/include/"."incl.php");

// start of html
html_header("ScummVM :: Credits");
sidebar_start();

//display welcome table
echo html_round_frame_start("Credits","");

include $file_root."/credits.inc";

echo html_round_frame_end("&nbsp;");

// end of html
sidebar_end();
html_footer();

?>
