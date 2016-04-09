<?php

/*
 * FAQ Page
 *
 */

// set this for position of this file relative
$file_root = ".";

// load libraries
require($file_root."/include/"."incl.php");

// start of html
html_header("ScummVM :: FAQ", '<link href="faq.css" rel="stylesheet" type="text/css">');
sidebar_start();

//display welcome table
echo html_round_frame_start("FAQ :: Frequently Asked Questions","");

?>
<h1>
	FAQ<br>
	<span class="caption">last updated: <?php echo date("F d, Y",getlastmod()); ?></span>
</h1>
<?php
include $file_root."/faq.inc";

echo html_round_frame_end("&nbsp;");

// end of html
sidebar_end();
html_footer();

?>
