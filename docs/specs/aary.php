<?

$file_root = "../..";
// load libs
require($file_root."/include/"."incl.php");

// start of html
html_header("SCUMM Reference Guide :: AARY Arrays and Strings");
sidebar_start(true);
    
//display welcome table
echo html_round_frame_start("AARY: Arrays and Strings","");
?>

        <p>
          <big><b>AARY: Arrays and Strings</b></big><br>
          <? echo html_line(); ?>
        </p>

<H2>Introduction</H2>

<p>Arrays are used for storing arbitrary blocks of data. They are accessible by
the scripts, and so can be used for storing anything that might be useful;
however, the contents of an array is not stored in the data file and can only
be set at run time. Arrays can be dynamically allocated and freed as desired,
but only a limited number are available. See the section on Arrays in the <a
href="scrp.php">Scripts</A> chapter for more information.</p>

<p>The way Arrays work was redesigned completely between V5 and V6.</p>

<H2>V5 chunk format</H2>

<p>V5 Arrays are not stored in the data file. 32 Arrays are available for
access using the <tt>arrayOps</tt> opcode. V5 Arrays (sometimes also referred
to as Strings) are one-dimensional.</p>

<H2>V6 chunk format</H2>

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

<H2>V8 chunk format</H2>

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

<HR><P STYLE="font-size: smaller; text-align: center">
All material &copy; 2000-2002 David Given, unless where stated otherwise.
</P>

<?
echo html_round_frame_end("&nbsp;");

// end of html
sidebar_end();
html_footer();
?>

