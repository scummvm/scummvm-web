<?

$file_root = "../..";
// load libs
require($file_root."/include/"."incl.php");
require($file_root."/docs/specs/"."sidebar_specs.php");

// start of html
html_header("SCUMM Reference Guide :: SLOB files");
sidebar_specs_start();

//display welcome table 
echo html_round_frame_start("SLOB files","98%","",20);
?>

        <p>
          <big><b>SLOB files</b></big><br>
          <? echo html_line(); ?>
        </p>


<H2>Introduction</H2>

<p>SLOB files are used by Skim to store intermediate data while working on
SCUMM files. Each file can contain one or more SCUMM resources, plus metadata
used to describe the resources to the linker and to tell the linker which other
resources the SLOB file refers to.

<p>SLOB files have the following format:

<p><pre class=box>
<u>Size</u>    <u>Type</u>             <u>Description</u>
8       chunk tag        Slob chunk tag
        chunk            SVer chunk
        chunk            Data chunk
        chunks...        fixup chunks
</pre>

<p>SVer:

<p><pre class=box>
<u>Size</u>    <u>Type</u>             <u>Description</u>
8       chunk tag        Sver chunk tag
1       byte             SCUMM major version
1       byte             SCUMM minor version
1       byte             Skim major version
1       byte             Skim minor version
</pre>

<p>Data:

<p><pre class=box>
<u>Size</u>    <u>Type</u>             <u>Description</u>
8       chunk tag        Data chunk tag
        chunk            any SCUMM chunk
</pre>

<H2>Fixup chunks</H2>

<p>There are two kind of fixup chunks. <tt>OInd</tt> is used to inform
the linker that the SLOB file contains an exported resource; <tt>OFix</tt>
is used to inform the linker that the SLOB file is referring to another
resource, and which the linker needs to insert references to when
the SLOB file is linked.

<p>The linker refers to named resources by name and class. The name can
be any short string, although the Skim compiler will have trouble
if the name is not a valid C identifier. When the files are linked,
the linker will choose a resource number and patch all the resources
that referenced that particular named resource to use it. It is also
possible to patch in an offset to a resource relative to another resource.
Each resource class has its own namespace, so <TT>char largetext</TT>
and <TT>scrp largetext</TT> will not conflict.

<p>This mechanism is also used to manage word and bit variables for use in
scripts.

<h2><tt>OInd</tt> --- named resource declaration</h2>

<p><pre class=box>
<u>Size</u>    <u>Type</u>             <u>Description</u>
8       chunk tag        OInd chunk tag
2       word LE          desired resource number
        bytes...         zero-terminated path
1       byte             resource class
        bytes...         zero-terminated resource name
</pre>

<p>This chunk notifies Skim that the given resource is a named resource.  The
path given is relative to the <tt>Data</tt> chunk (so a path of <tt>/</tt> ---
which is invalid --- refers to the <tt>Data</tt> chunk itself).

<p>The resource type is a standard SCUMM resource class, or an extension
(of which more later). The resource number should be -1 if the linker
is to choose a resource number when the final link is done, or else
the number can be explicitly specified. Attempting to link two SLOB
files that contain the same resource name with conflicting explicit
object numbers will cause an error.

<p>A negative object number indicates that you don't care about the actual
number. The linker is free to use any number to represent these, provided
they're consistent, and to renumber them as required when linking
together two different SLOB files.

<p>The object name is a string containing the name of the object, which
is used to distinguish dynamically numbered objects.

<p>This is also used to keep track of other entities by use of special
object types.

<p><table class=list align=center>
<tr><th>Value</th>		<th>Meaning</th></tr>
<tr><td>128</td>		<td>Word variable</th></tr>
<tr><td>129</td>                <td>Bit variable</th></tr>
</table>

<p>When these are used, the resource path is ignored.

<H2><tt>OFix</tt> --- named resource fixup</h2>

<p><pre class=box>
<u>Size</u>    <u>Type</u>             <u>Description</u>
8       chunk tag        OInd chunk tag
4       quad LE          offset into destination resource
1       byte             action
1       byte             fixup type
        bytes...         zero-terminated path of destination resource
1       byte             byte C
        bytes...         zero-terminated string S1
        bytes...         zero-terminated string S2
</pre>

<p>The actual action taken is as follows:

<p><table class=list align=center>
<tr><th>Value</th>	<th>Meaning</th></tr>

<tr><td>0</td>
<td class=l>
Do nothing.
</td></tr>

<tr><td>1</td>
<td class=l>
Write the resource number of the named resource specified by the resource class
C and name S1 into the destination resource, in the format specified by the
fixup byte. S2 is ignored.
</td></tr>

<tr><td>2</td>
<td class=l>
Write the offset of the resource specified by the path S1, relative to the path
S2, into the destination resource, in the format specified by the fixup byte.
If the offset is too large to fit in the specified fixup then the linker will
halt with an error. C is ignored. Note that both S1 and S2 are specified
relative to the SLOB's <tt>Data</tt> chunk; it is legal for S2 to be outside
S1.
</td></tr>

</table>

<p>When <tt>action</tt> is 2, the fixup byte is interpreted as follows:

<p><table class=list align=center>
<tr><th>Value</th>		<th>Meaning</th></tr>
<tr><td>0</td>			<td>Do nothing.</td></tr>
<tr><td>1</td>			<td>Write a byte.</td></tr>
<tr><td>2</td>			<td>Write a word LE.</td></tr>
<tr><td>3</td>			<td>Write a word BE.</td></tr>
<tr><td>4</td>			<td>Write a quad LE.</td></tr>
<tr><td>5</td>			<td>Write a quad BE.</td></tr>
</table>

<HR><P STYLE="font-size: smaller; text-align: center">
All material &copy; 2000-2002 David Given, unless where stated otherwise.
</P>

<?
echo html_round_frame_end("&nbsp;");

// end of html
echo html_p();
sidebar_end();
html_footer();
?>

