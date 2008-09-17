<?php

$file_root = "../..";
// load libs
require($file_root."/include/"."incl.php");

// start of html
html_page_header("ScummVM :: SCUMM Reference Guide :: AARY Arrays and Strings", array("specs.css"));
    
//display welcome table
echo html_content_begin("AARY: Arrays and Strings","");
?>

<div class="par-item">
  <div class="par-head">
    AARY: Arrays and Strings
  </div>
  <div class="par-content">

    <br>
    <?php html_subhead_start("Introduction"); ?>

    <div class="par-subhead-content">

<p>Arrays are used for storing arbitrary blocks of data. They are accessible by
the scripts, and so can be used for storing anything that might be useful;
however, the contents of an array is not stored in the data file and can only
be set at run time. Arrays can be dynamically allocated and freed as desired,
but only a limited number are available. See the section on Arrays in the <a
href="scrp.php">Scripts</A> chapter for more information.</p>

<p>The way Arrays work was redesigned completely between V5 and V6.</p>

  </div>

    <?php html_subhead_start("V5 chunk Format"); ?>

    <div class="par-subhead-content">

<p>V5 Arrays are not stored in the data file. 32 Arrays are available for
access using the <tt>arrayOps</tt> opcode. V5 Arrays (sometimes also referred
to as Strings) are one-dimensional.</p>

  </div>

    <?php html_subhead_start("V6 chunk Format"); ?>

    <div class="par-subhead-content">

<pre class=box>
 <u>Size</u>    <u>Type</u>             <u>Description</u>
 8       chunk tag        AARY chunk tag
for each array {
 2       word LE          array resource number
 2       word LE          X size minus one
 2       word LE          Y size minus one
 2       word LE          array type
}
 2       word LE          zero
</pre>

<p>The X and Y size fields are set to one less than the actual size;
an entry of 0 means a size of 1. Arrays are always two-dimensional.</p>

<p>The type field can be one of:</p>

<table class=list align=center>
<tr><th>Value</th>	<th>Meaning</th></tr>
<tr><td>1</td>		<td>Array of bits</td></tr>
<tr><td>2</td>		<td>Array of nibbles (half bytes)</td></tr>
<tr><td>3</td>		<td>Array of bytes</td></tr>
<tr><td>4</td>		<td>Array of chars (= a string)</td></tr>
<tr><td>5</td>		<td>Array of integers</td></tr>
</table>

  </div>

<br>

    <?php html_subhead_start("V8 chunk Format"); ?>

    <div class="par-subhead-content">

<pre class=box>
 <u>Size</u>    <u>Type</u>             <u>Description</u>
 8       chunk tag        AARY chunk tag
for each array {
 4       dword LE          array resource number
 4       dword LE          X size minus one
 4       dword LE          Y size minus one
}
 4       dword LE          zero
</pre>

<p>The X and Y size fields are set to one less than the actual size;
an entry of 0 means a size of 1. One dimensional arrays are simply a
special case, where one dimension has size 1.</p>

</div>

<HR><P STYLE="font-size: smaller; text-align: center">
All material &copy; 2000-2002 David Given, unless where stated otherwise.
</P>

  </div>
</div>

<?php

// end of html
html_content_end();
html_page_footer();
?>

