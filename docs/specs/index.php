<?php

$file_root = "../..";
// load libs
require($file_root."/include/"."incl.php");

// start of html
html_page_header("ScummVM :: The inComplete SCUMM Reference Guide", array("specs.css"));

html_content_begin('The inComplete SCUMM Reference Guide');

// add 

//display welcome table

?>
<div class="par-item">
  <div class="par-head">
    The inComplete SCUMM Reference Guide
  </div>
  <div class="par-content">
        <p>

	<i>being a Partially Complete and Mostly Accurate guide to the SCUMM Engine data file Format for Versions Five and Six (and above)</i>

<ul>
	<li><?php echo html_ahref("Introduction", $file_root."/docs/specs/"."introduction.php"); ?></li>
	<li><?php echo html_ahref("CHAR", $file_root."/docs/specs/"."char.php"); ?></li>
	<li><?php echo html_ahref("AARY", $file_root."/docs/specs/"."aary.php"); ?></li>
	<li><?php echo html_ahref("SCRP", $file_root."/docs/specs/"."scrp.php"); ?></li>
	<li><?php echo html_ahref("V5 opcode list", $file_root."/docs/specs/"."scrp-v5.php"); ?></li>
	<li><?php echo html_ahref("V6 opcode list", $file_root."/docs/specs/"."scrp-v6.php"); ?></li>
	<li><?php echo html_ahref("Glossary", $file_root."/docs/specs/"."glossary.php"); ?></li>
</ul>

<HR><P STYLE="font-size: smaller; text-align: center">
All material &copy; 2000-2002 David Given, unless where stated otherwise.
</P>

  </div>
</div>

<?

// end of html
html_content_end();
html_page_footer();
?>
