<?

$file_root = "../..";
// load libs
require($file_root."/include/"."incl.php");
require($file_root."/docs/specs/"."sidebar_specs.php");

// start of html
html_header("SCUMM Reference Guide :: V6 opcode list");
sidebar_specs_start();

//display welcome table
echo html_round_frame_start("V6 opcode list","98%","",20);
?>
  
        <p>
          <big><b>V6 opcode list</b></big><br>
          <? echo html_line(); ?>
        </p>  

<p>The following conventions are used in the encoding descriptions:

<DL>
<DT><tt>$AB</tt>
<DD>The constant hexadecimal byte 0xAB.

<DT><tt>value[8]</tt>
<DD>A constant byte value.

<DT><tt>value[16]</tt>
<DD>A constant word LE value.
</DL>

<p>The following conventions are used in the stack descriptions:

<DL>
<DT>(<i>in1</i>, <i>in2</i>, <i>in3</i> : <i>out1</i>, <i>out2</i>)
<DD>Indicates
that the opcode is called with three items on the stack (the most
recently pushed being <I>in3</I>) and replaces them with two items
on the stack (the most recently pushed being <I>out2</I>).
</DL>

</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode>
<h2>abs
<h3>$C4

<H4>Stack</H4>
(<I>in</I> : <I>out</I>)

<H4>Operation</H4>
<I>out</I> := abs(<I>in</I>)

<p>The absolute value of the top-most item on the stack is calculated.
(The absolute value being the value with the sign bit stripped off.)
</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode>
<h2>actorFollowCamera
<h3>$79
</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode>
<h2>actorSet
<h3>$9D
</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode>
<h2>add
<h3>$14

<H4>Stack</H4>
(<I>in1</I>, <I>in2</I> : <I>out</I>)

<H4>Operation</H4>
<I>out</I> := <I>in1</I> + <I>in2</I>

<p>Performs a division operation on the stack.
</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode>
<h2>animateActor
<h3>$82
</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.6&nbsp;&nbsp; arrayOps<A NAME="@default220"></A></H3>[t]1.00
This instruction varies considerably according to the form.<BR>
<BR>

<H4>Encoding</H4><DL COMPACT=compact>
<DT>
load&nbsp;array:<DD>A4 CD  <I>arrayp</I><SUP><FONT SIZE=2>16</FONT></SUP> 

<DT>define&nbsp;array:<DD>A4 D0  <I>arrayp</I><SUP><FONT SIZE=2>16</FONT></SUP>   <I>data</I>... 

<DT>set&nbsp;array:<DD>A4 D4  <I>arrayp</I><SUP><FONT SIZE=2>16</FONT></SUP> 
</DL>
<H4>Stack</H4><DL COMPACT=compact>
<DT>
...todo...<DD>&nbsp;
</DL>
<BR><BR>
<BR>


</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode>
<h2>6.4.7&nbsp;&nbsp; MM 95 beginOverride
<h3>
</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.8&nbsp;&nbsp; MM 6C breakHere
<h3>

</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.9&nbsp;&nbsp; MM CA breakMaybe
<h3>

</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.10&nbsp;&nbsp; MM 5A byteArrayDec
<h3>

</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.11&nbsp;&nbsp; MM 52 byteArrayInc
<h3>

</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.12&nbsp;&nbsp; byteArrayIndexedRead<A NAME="@default232"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>0A  <I>arrayp</I><SUP><FONT SIZE=2>8</FONT></SUP> <BR>
<BR>

<H4>Stack</H4>( <I>index</I><SUB><FONT SIZE=2><I>x</I></FONT></SUB> ,  <I>index</I><SUB><FONT SIZE=2><I>y</I></FONT></SUB>  :  <I>value</I> )<BR>
<BR>

<H4>Operation</H4> <I>value</I>  :=  <I>arrayp</I> [ <I>index</I><SUB><FONT SIZE=2><I>x</I></FONT></SUB> ,&nbsp; <I>index</I><SUB><FONT SIZE=2><I>y</I></FONT></SUB> ]<BR>
<BR>
Reads the value at offset ( <I>index</I><SUB><FONT SIZE=2><I>x</I></FONT></SUB> ,  <I>index</I><SUB><FONT SIZE=2><I>y</I></FONT></SUB> ) from
the array whose resource number is pointed to by  <I>arrayp</I> . The
array can be a byte or word array; byte values are not sign extended.
Note that because  <I>arrayp</I>  is encoded as a byte, it can only
point to a word variable in the range 0000 to 00FF. Use <FONT COLOR=purple>wordArrayIndexedRead</FONT>
for a more general form.<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.13&nbsp;&nbsp; byteArrayIndexedWrite<A NAME="@default234"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>4A  <I>arrayp</I><SUP><FONT SIZE=2>8</FONT></SUP> <BR>
<BR>

<H4>Stack</H4>( <I>index</I><SUB><FONT SIZE=2><I>x</I></FONT></SUB> ,  <I>index</I><SUB><FONT SIZE=2><I>y</I></FONT></SUB> ,  <I>value</I>  : -)<BR>
<BR>

<H4>Operation</H4> <I>arrayp</I> [ <I>index</I><SUB><FONT SIZE=2><I>x</I></FONT></SUB> ,&nbsp; <I>index</I><SUB><FONT SIZE=2><I>y</I></FONT></SUB> ] :=  <I>value</I> <BR>
<BR>
Writes  <I>value</I>  to the array whose resource number is pointed
to by  <I>arrayp</I>  at offset ( <I>index</I><SUB><FONT SIZE=2><I>x</I></FONT></SUB> ,  <I>index</I><SUB><FONT SIZE=2><I>y</I></FONT></SUB> ).
The array can be a byte or word array; byte when writing to a byte
array,  <I>value</I>  is truncated. Note that because  <I>arrayp</I> 
is encoded as a byte, it can only point to a word variable in the
range 0000 to 00FF. Use <FONT COLOR=purple>wordArrayIndexedWrite</FONT> for a more
general form.<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.14&nbsp;&nbsp; byteArrayRead<A NAME="@default236"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>06  <I>arrayp</I><SUP><FONT SIZE=2>8</FONT></SUP> <BR>
<BR>

<H4>Stack</H4>( <I>index</I>  :  <I>value</I> )<BR>
<BR>

<H4>Operation</H4> <I>value</I>  :=  <I>arrayp</I> [0,&nbsp; <I>index</I> ]<BR>
<BR>
Reads the value at position (0,&nbsp; <I>index</I> ) from the array whose
resource number is pointed to by  <I>arrayp</I> . The array can be a
byte or word array; when writing to an array, byte values are not
sign extended. Note that because  <I>arrayp</I>  is encoded as a byte,
it can only point to a word variable in the range 0000 to 00FF. Use
<FONT COLOR=purple>wordArrayRead</FONT> for a more general form.<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.15&nbsp;&nbsp; byteArrayWrite<A NAME="@default238"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>46  <I>arrayp</I><SUP><FONT SIZE=2>8</FONT></SUP> <BR>
<BR>

<H4>Stack</H4>( <I>index</I>   <I>value</I>  : -)<BR>
<BR>

<H4>Operation</H4> <I>arrayp</I> [0,&nbsp; <I>index</I> ] :=  <I>value</I> <BR>
<BR>
Writes  <I>value</I>  to the array whose resource number is pointed
to by  <I>arrayp</I>  at offset (0,&nbsp; <I>index</I> ). The array can be
a byte or word array; when writing to a byte array,  <I>value</I>  is
truncated. Note that because  <I>arrayp</I>  is encoded as a byte, it
can only point to a word variable in the range 0000 to 00FF. Use <FONT COLOR=purple>wordArrayWrite</FONT>
for a more general form.<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.16&nbsp;&nbsp; MM 56 byteVarDec
<h3>

</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.17&nbsp;&nbsp; MM 4E byteVarInc
<h3>

</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.18&nbsp;&nbsp; MM 9A createBoxMatrix
<h3>

</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.19&nbsp;&nbsp; MM 6B cursorCommand
<h3>

</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.20&nbsp;&nbsp; MM 68 cutScene
<h3>

</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.21&nbsp;&nbsp; delay<A NAME="@default250"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>B0 <BR>
<BR>

<H4>Stack</H4>( <I>delay</I>  : -)<BR>
<BR>

<H4>Operation</H4>Prevents the current thread from being rescheduled until  <I>delay</I> 
ticks have passed. Deschedules immediately.<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.22&nbsp;&nbsp; delayLonger<A NAME="@default252"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>B1 <BR>
<BR>

<H4>Stack</H4>( <I>delay</I>  : -)<BR>
<BR>

<H4>Operation</H4>Prevents the current thread from being rescheduled until  <I>delay</I>× 60 
ticks have passed ( <I>delay</I>  seconds). Deschedules immediately.<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.23&nbsp;&nbsp; delayVeryLong<A NAME="@default254"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>B2<BR>
<BR>

<H4>Stack</H4>( <I>delay</I>  : -)<BR>
<BR>

<H4>Operation</H4>Prevents the current thread from being rescheduled until  <I>delay</I>× 3600 
ticks have passed ( <I>delay</I>  minutes). Deschedules immediately.<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.24&nbsp;&nbsp; dim<A NAME="@default256"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>BC  <I>type</I><SUP><FONT SIZE=2>8</FONT></SUP>   <I>arrayp</I><SUP><FONT SIZE=2>16</FONT></SUP> <BR>
<BR>

<H4>Stack</H4>( <I>max</I>  : -)<BR>
<BR>

<H4>Operation</H4>Allocates or frees an array.<BR>
<BR>
If  <I>type</I>  is CC, then the array whose resource number is pointed
to by  <I>arrayp</I>  is freed. Otherwise, a new one-dimensional array
with a maximum index of  <I>max</I>  (i.e.,  <I>max</I>  is one less than
the size) is allocated and the resource number written to  <I>arrayp</I> .<BR>
<BR>
When allocating an array, if  <I>type</I>  is C7 then the array will
contain words; if it is CB, then it will contain bytes. All other
values are undefined. [Currently they all produce a byte array.
What are they?]<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.25&nbsp;&nbsp; dim2<A NAME="@default258"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>C0  <I>type</I><SUP><FONT SIZE=2>8</FONT></SUP>   <I>arrayp</I><SUP><FONT SIZE=2>16</FONT></SUP> <BR>
<BR>

<H4>Stack</H4>( <I>maxx</I> ,  <I>maxy</I>  : -)<BR>
<BR>

<H4>Operation</H4>Allocates an array.<BR>
<BR>
A new two-dimensional array is allocated and the resource number is
written to  <I>arrayp</I> . The new array will have a maximum X index
of  <I>maxx</I>  and a maximum Y index of  <I>maxy</I>  (i.e.,  <I>maxy</I> 
is one less than the size).<BR>
<BR>
When allocating an array, if  <I>type</I>  is C7 then the array will
contain words; if it is CB, then it will contain bytes. All other
values are undefined. [Currently they all produce a byte array.
What are they?]<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.26&nbsp;&nbsp; MM C5 distObjectObject
<h3>

</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.27&nbsp;&nbsp; MM C6 distObjectPt
<h3>

</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.28&nbsp;&nbsp; MM C7 distPtPt
<h3>

</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.29&nbsp;&nbsp; div<A NAME="@default266"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>17<BR>
<BR>

<H4>Stack</H4>( <I>in</I><SUB><FONT SIZE=2>1</FONT></SUB> ,  <I>in</I><SUB><FONT SIZE=2>2</FONT></SUB>  :  <I>out</I> )<BR>
<BR>

<H4> Operation</H4> <I>out</I>  :=  <I>in</I><SUB><FONT SIZE=2>1</FONT></SUB>  /  <I>in</I><SUB><FONT SIZE=2>2</FONT></SUB> <BR>
<BR>
Performs a division operation on the stack. Note the order.<BR>
<BR>
An attempt to divide by zero will cause undefined behaviour, and may
cause the interpreter to crash.<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.30&nbsp;&nbsp; MM 83 doSentence
<h3>

</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.31&nbsp;&nbsp; drawBox<A NAME="@default270"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>A6<BR>
<BR>

<H4>Stack</H4>( <I>left</I> ,  <I>top</I> ,  <I>right</I> ,  <I>bottom</I> ,  <I>colour</I> 
: -)<BR>
<BR>

<H4>Operation</H4>Draws a solid box on the backbuffer from ( <I>left</I> ,  <I>top</I> )
to ( <I>right</I> ,  <I>bottom</I> ) in the colour  <I>colour</I> . <BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.32&nbsp;&nbsp; dup<A NAME="@default272"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>0C<BR>
<BR>

<H4>Stack</H4>( <I>value</I> &nbsp;:&nbsp; <I>value</I> ,&nbsp; <I>value</I> )<BR>
<BR>

<H4> Operation</H4>Duplicates the top-most item on the stack.<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.33&nbsp;&nbsp; MM 67 endCutScene
<h3>

</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.34&nbsp;&nbsp; MM 96 endOverride
<h3>

</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.35&nbsp;&nbsp; eq<A NAME="@default278"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>0E<BR>
<BR>

<H4>Stack</H4>( <I>value</I><SUB><FONT SIZE=2>1</FONT></SUB> ,&nbsp; <I>value</I><SUB><FONT SIZE=2>2</FONT></SUB> &nbsp;:&nbsp; <I>bool</I> )<BR>
<BR>

<H4> Operation</H4>If  <I>value</I><SUB><FONT SIZE=2>1</FONT></SUB>=<I>value</I><SUB><FONT SIZE=2>2</FONT></SUB> , set  <I>bool</I>  to 1, otherwise set
it to 0<BR>
<BR>
Tests the top two values on the stack to see if they are equal.<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.36&nbsp;&nbsp; MM 81 faceActor
<h3>

</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.37&nbsp;&nbsp; MM 92 findInventory
<h3>

</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.38&nbsp;&nbsp; MM A0 findObject
<h3>

</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.39&nbsp;&nbsp; freezeUnfreeze<A NAME="@default286"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>6A<BR>
<BR>

<H4>Stack</H4>( <I>bool</I> &nbsp;:&nbsp;-)<BR>
<BR>

<H4> Operation</H4><DL COMPACT=compact>
<DT>
 <I>bool</I>=0 :<DD>Thaw all currently frozen threads.

<DT> 0&lt;<I>bool</I>&lt;$80 :<DD>Freeze all threads that are not marked as unfreezable.

<DT> <I>bool</I><FONT FACE=symbol>³</FONT> $80 :<DD>Freeze all threads, even those that are marked
as unfreezable.
</DL>
Freezing is a nestable operation; a thread which is frozen twice must
be thawed twice before it becomes runnable again.<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- ---------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.40&nbsp;&nbsp; ge<A NAME="@default288"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>13<BR>
<BR>

<H4>Stack</H4> ( <I>value</I><SUB><FONT SIZE=2>1</FONT></SUB>&nbsp; <I>value</I><SUB><FONT SIZE=2>2</FONT></SUB>&nbsp; :&nbsp; <I>bool</I>) <BR>
<BR>

<H4> Operation</H4>If  <I>value</I><SUB><FONT SIZE=2>1</FONT></SUB><FONT FACE=symbol>³</FONT> <I>value</I><SUB><FONT SIZE=2>2</FONT></SUB> , set  <I>bool</I>  to 1, otherwise
set it to 0<BR>
<BR>
Compares the top two values on the stack. Note the order.<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.41&nbsp;&nbsp; MM AB getActorAnimCounter1
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.42&nbsp;&nbsp; MM 91 getActorCostume
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.43&nbsp;&nbsp; MM A2 getActorElevation
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.44&nbsp;&nbsp; MM 9F getActorFromXY
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.45&nbsp;&nbsp; MM 8A getActorMoving
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.46&nbsp;&nbsp; MM 8C getActorRoom
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.47&nbsp;&nbsp; MM AA getActorScaleX
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.48&nbsp;&nbsp; MM 90 getActorWalkBox
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.49&nbsp;&nbsp; MM A8 getActorWidth
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.50&nbsp;&nbsp; MM 93 getInventoryCount
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.51&nbsp;&nbsp; MM 8F getObjectDir
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.52&nbsp;&nbsp; MM 8D getObjectX
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.53&nbsp;&nbsp; MM 8E getObjectY
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.54&nbsp;&nbsp; MM 72 getOwner
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.55&nbsp;&nbsp; getRandomNumber<A NAME="@default318"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>87<BR>
<BR>

<H4>Stack</H4>( <I>max</I> &nbsp;:&nbsp; <I>result</I> )<BR>
<BR>

<H4>Operation</H4>A random number in the range  0  to  <I>max</I>  inclusive is calculated,
and the result pushed onto the stack. The result is also written to
the <FONT COLOR=purple>RandomNumber</FONT> word variable (see <A HREF="#System Variables">6.5</A>).<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.56&nbsp;&nbsp; getRandomNumberRange<A NAME="@default320"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>88<BR>
<BR>

<H4>Stack</H4>( <I>min</I> ,&nbsp; <I>max</I> ,&nbsp;:&nbsp; <I>result</I> )<BR>
<BR>

<H4>Operation</H4>A random number in the range  <I>min</I>  to  <I>max</I>  inclusive is
calculated, and the result pushed onto the stack. The result is also
written to the <FONT COLOR=purple>RandomNumber</FONT> word variable (see <A HREF="#System Variables">6.5</A>).<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.57&nbsp;&nbsp; MM 8B getScriptRunning
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.58&nbsp;&nbsp; MM 6F getState
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.59&nbsp;&nbsp; MM A3 getVerbEntryPoint
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.60&nbsp;&nbsp; MM 94 getVerbFromXY
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.61&nbsp;&nbsp; gt<A NAME="@default330"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>10<BR>
<BR>

<H4>Stack</H4>( <I>value</I><SUB><FONT SIZE=2>1</FONT></SUB> ,&nbsp; <I>value</I><SUB><FONT SIZE=2>2</FONT></SUB> &nbsp;:&nbsp; <I>bool</I> )<BR>
<BR>

<H4> Operation</H4>If  <I>value</I><SUB><FONT SIZE=2>1</FONT></SUB>  &gt;  <I>value</I><SUB><FONT SIZE=2>2</FONT></SUB> , set  <I>bool</I>  to 1, otherwise
set it to 0<BR>
<BR>
Compares the top two values on the stack. Note the order.<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.62&nbsp;&nbsp; MM 6D ifClassOfIs
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.63&nbsp;&nbsp; MM AF isActorInBox
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.64&nbsp;&nbsp; isAnyOf<A NAME="@default336"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>AD<BR>
<BR>

<H4>Stack</H4>( <I>arg</I><SUB><FONT SIZE=2>1</FONT></SUB> ,&nbsp; <I>arg</I><SUB><FONT SIZE=2>2</FONT></SUB> ,&nbsp; <I>arg</I><SUB><FONT SIZE=2>3</FONT></SUB> ,&nbsp;...,&nbsp; <I>arg</I><SUB><FONT SIZE=2><I>n</I></FONT></SUB> ,&nbsp; <I>n</I> ,&nbsp; <I>value</I> &nbsp;:&nbsp; <I>bool</I> )<BR>
<BR>

<H4> Operation</H4>If  <I>value</I>  is any of  <I>arg</I><SUB><FONT SIZE=2>1</FONT></SUB> .. <I>arg</I><SUB><FONT SIZE=2><I>n</I></FONT></SUB> ,  <I>bool</I> 
:= 1, otherwise  <I>bool</I>  := 0<BR>
<BR>
Tests to see if  <I>value</I>  is equal to any of the passed in arguments.
If  <I>n</I>  is less than the number of entries on the stack, undefined
behaviour will result.<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.65&nbsp;&nbsp; MM 98 isSoundRunning
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.66&nbsp;&nbsp; MM 73 jump<A NAME="@default340"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>73  <I>offset</I><SUP><FONT SIZE=2>16</FONT></SUP> <BR>
<BR>

<H4>Stack</H4>(-&nbsp;:&nbsp;-)<BR>
<BR>

<H4> Operation</H4>pc := pc +  <I>offset</I> <BR>
<BR>
 <I>offset</I>  is added to the current program counter after the instruction
has been decoded.<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.67&nbsp;&nbsp; jumpFalse<A NAME="@default342"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>5D  <I>offset</I><SUP><FONT SIZE=2>16</FONT></SUP> <BR>
<BR>

<H4>Stack</H4>( <I>bool</I> &nbsp;:&nbsp;-)<BR>
<BR>

<H4> Operation</H4>if  <I>bool</I>  = 0, pc := pc +  <I>offset</I> <BR>
<BR>
Pops the top value off the stack. If zero, then  <I>offset</I>  is added
to the current program counter after the instruction has been decoded.<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.68&nbsp;&nbsp; jumpTrue<A NAME="@default344"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>5C  <I>offset</I><SUP><FONT SIZE=2>16</FONT></SUP> <BR>
<BR>

<H4>Stack</H4>( <I>bool</I> &nbsp;:&nbsp;-)<BR>
<BR>

<H4> Operation</H4>if  <I>bool</I>  <FONT FACE=symbol>¹</FONT> 0, pc := pc +  <I>offset</I> <BR>
<BR>
Pops the top value off the stack. If non-zero, then  <I>offset</I> 
is added to the current program counter after the instruction has
been decoded.<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.69&nbsp;&nbsp; kill<A NAME="@default346"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>1A<BR>
<BR>

<H4>Stack</H4>( <I>value</I> &nbsp;:&nbsp;-)<BR>
<BR>

<H4> Operation</H4>Pops the top value off the stack and discards it.<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.70&nbsp;&nbsp; land<A NAME="@default348"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>18<BR>
<BR>

<H4>Stack</H4> ( <I>in</I><SUB><FONT SIZE=2>1</FONT></SUB>&nbsp; <I>in</I><SUB><FONT SIZE=2>2</FONT></SUB>&nbsp; :&nbsp; <I>out</I>) <BR>
<BR>

<H4> Operation</H4> <I>out</I>:=<I>in</I><SUB><FONT SIZE=2>1</FONT></SUB>&nbsp; &amp;&amp;&nbsp; <I>in</I><SUB><FONT SIZE=2>2</FONT></SUB> <BR>
<BR>
Performs a logical <FONT COLOR=purple>and</FONT> operation on the stack (not a bitwise
<FONT COLOR=purple>and</FONT>). Note the order.<BR>
<BR>
The boolean values are as in C, with 0 for <FONT COLOR=purple>false</FONT> and non-zero
for <FONT COLOR=purple>true</FONT>.<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.71&nbsp;&nbsp; le<A NAME="@default350"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>12<BR>
<BR>

<H4>Stack</H4> ( <I>value</I><SUB><FONT SIZE=2>1</FONT></SUB>&nbsp; <I>value</I><SUB><FONT SIZE=2>2</FONT></SUB>&nbsp; :&nbsp; <I>bool</I>) <BR>
<BR>

<H4> Operation</H4>If  <I>value</I><SUB><FONT SIZE=2>1</FONT></SUB><FONT FACE=symbol>£</FONT> <I>value</I><SUB><FONT SIZE=2>2</FONT></SUB> , set  <I>bool</I>  to 1, otherwise
set it to 0<BR>
<BR>
Compares the top two values on the stack. Note the order.<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.72&nbsp;&nbsp; MM 7B loadRoom
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.73&nbsp;&nbsp; MM 85 loadRoomWithEgo
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.74&nbsp;&nbsp; lor<A NAME="@default356"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>19<BR>
<BR>

<H4>Stack</H4> ( <I>in</I><SUB><FONT SIZE=2>1</FONT></SUB>&nbsp; <I>in</I><SUB><FONT SIZE=2>2</FONT></SUB>&nbsp; :&nbsp; <I>out</I>) <BR>
<BR>

<H4> Operation</H4> <I>out</I>:=<I>in</I><SUB><FONT SIZE=2>1</FONT></SUB>&nbsp; ||&nbsp; <I>in</I><SUB><FONT SIZE=2>2</FONT></SUB> <BR>
<BR>
Performs a logical <FONT COLOR=purple>or</FONT> operation on the stack (not a bitwise
<FONT COLOR=purple>or</FONT>). Note the order.<BR>
<BR>
The boolean values are as in C, with 0 for <FONT COLOR=purple>false</FONT> and non-zero
for <FONT COLOR=purple>true</FONT>.<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.75&nbsp;&nbsp; lt<A NAME="@default358"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>11<BR>
<BR>

<H4>Stack</H4> ( <I>value</I><SUB><FONT SIZE=2>1</FONT></SUB>&nbsp; <I>value</I><SUB><FONT SIZE=2>2</FONT></SUB>&nbsp; :&nbsp; <I>bool</I>) <BR>
<BR>

<H4> Operation</H4>If  <I>value</I><SUB><FONT SIZE=2>1</FONT></SUB>&lt;<I>value</I><SUB><FONT SIZE=2>2</FONT></SUB> , set  <I>bool</I>  to 1, otherwise set
it to 0<BR>
<BR>
Compares the top two values on the stack. Note the order.<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.76&nbsp;&nbsp; MM C9 miscOps
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.77&nbsp;&nbsp; mul<A NAME="@default362"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>16<BR>
<BR>

<H4>Stack</H4> ( <I>in</I><SUB><FONT SIZE=2>1</FONT></SUB>&nbsp; <I>in</I><SUB><FONT SIZE=2>2</FONT></SUB>&nbsp; :&nbsp; <I>out</I>) <BR>
<BR>

<H4> Operation</H4> <I>out</I>:=<I>in</I><SUB><FONT SIZE=2>1</FONT></SUB>× <I>in</I><SUB><FONT SIZE=2>2</FONT></SUB> <BR>
<BR>
Performs a multiplication operation on the stack. Note the order.<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.78&nbsp;&nbsp; neq<A NAME="@default364"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>0F<BR>
<BR>

<H4>Stack</H4>( <I>value</I><SUB><FONT SIZE=2>1</FONT></SUB> ,  <I>value</I><SUB><FONT SIZE=2>2</FONT></SUB>  :  <I>bool</I> )<BR>
<BR>

<H4> Operation</H4>If  <I>value</I><SUB><FONT SIZE=2>1</FONT></SUB>   <FONT FACE=symbol>¹</FONT>   <I>value</I><SUB><FONT SIZE=2>2</FONT></SUB> , set  <I>bool</I> 
to 1, otherwise set it to 0<BR>
<BR>
Tests the top two values on the stack to see if they are not equal.<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.79&nbsp;&nbsp; MM 78 panCameraTo
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.80&nbsp;&nbsp; pickOneOf<A NAME="@default368"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>CB<BR>
<BR>

<H4>Stack</H4>( <I>index</I> ,&nbsp; <I>arg</I><SUB><FONT SIZE=2>0</FONT></SUB> ,&nbsp; <I>arg</I><SUB><FONT SIZE=2>1</FONT></SUB> ,&nbsp; <I>arg</I><SUB><FONT SIZE=2>2</FONT></SUB> ,&nbsp;...,&nbsp; <I>arg</I><SUB><FONT SIZE=2><I>n</I></FONT></SUB> ,&nbsp; <I>n</I> &nbsp;:&nbsp; <I>value</I> )<BR>
<BR>

<H4> Operation</H4> <I>value</I>  :=  <I>arg</I><SUB><FONT SIZE=2>[<I>index</I>]</FONT></SUB> <BR>
<BR>
Returns the  <I>index</I> th argument on the stack. If  <I>n</I>  is less
than the number of entries on the stack or  <I>index</I>  is out of
range, undefined behaviour will result, usually involving the interpreter
shutting down.<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.81&nbsp;&nbsp; pickOneOfDefault<A NAME="@default370"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>CC<BR>
<BR>

<H4>Stack</H4>( <I>index</I> ,&nbsp; <I>arg</I><SUB><FONT SIZE=2>0</FONT></SUB> ,&nbsp; <I>arg</I><SUB><FONT SIZE=2>1</FONT></SUB> ,&nbsp; <I>arg</I><SUB><FONT SIZE=2>2</FONT></SUB> ,&nbsp;...,&nbsp; <I>arg</I><SUB><FONT SIZE=2><I>n</I></FONT></SUB> ,&nbsp; <I>n</I> ,&nbsp; <I>default</I> &nbsp;:&nbsp; <I>value</I> )<BR>
<BR>

<H4> Operation</H4>If  <I>index</I>  is in the range 0.. <I>n</I> ,  <I>value</I> &nbsp;:=&nbsp; <I>arg</I><SUB><FONT SIZE=2>[<I>index</I>]</FONT></SUB> ;
otherwise  <I>value</I> &nbsp;:=&nbsp; <I>default</I> .<BR>
<BR>
Returns the  <I>index</I> th argument on the stack. If  <I>index</I> 
is out of range,  <I>default</I>  is returned instead. If  <I>n</I>  is
less than the number of entries on the stack, undefined behaviour
will result, usually involving the interpreter shutting down.<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.82&nbsp;&nbsp; MM 84 pickupObject
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.83&nbsp;&nbsp; MM B8 printActor
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.84&nbsp;&nbsp; MM B9 printEgo
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.85&nbsp;&nbsp; MM B4 print0
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.86&nbsp;&nbsp; MM B5 print1
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.87&nbsp;&nbsp; MM B6 print2
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.88&nbsp;&nbsp; MM B7 print3
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.89&nbsp;&nbsp; MM A1 pseudoRoom
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.90&nbsp;&nbsp; pushByte<A NAME="@default388"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>00  <I>value</I><SUP><FONT SIZE=2>8</FONT></SUP> <BR>
<BR>

<H4>Stack</H4>(- :  <I>value</I> )<BR>
<BR>

<H4>Operation</H4>Pushes  <I>value</I>  onto the stack. It is not sign extended.<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.91&nbsp;&nbsp; pushByteVar<A NAME="@default390"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>02  <I>pointer</I><SUP><FONT SIZE=2>8</FONT></SUP> <BR>
<BR>

<H4>Stack</H4>(- :  <I>value</I> )<BR>
<BR>

<H4>Operation</H4>Dereferences  <I>pointer</I>  and pushes the result onto the stack.
Note that because  <I>pointer</I>  is encoded as a byte, it can only
point to a word variable in the range 0000-00FF. Use <FONT COLOR=purple>pushWordVar</FONT>
for a more general version of this instruction.<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.92&nbsp;&nbsp; pushWord<A NAME="@default392"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>01  <I>value</I><SUP><FONT SIZE=2>16</FONT></SUP> <BR>
<BR>

<H4>Stack</H4>(- :  <I>value</I> )<BR>
<BR>

<H4>Operation</H4>Pushes  <I>value</I>  onto the stack.<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.93&nbsp;&nbsp; pushWordVar<A NAME="@default394"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>03  <I>pointer</I><SUP><FONT SIZE=2>16</FONT></SUP> <BR>
<BR>

<H4>Stack</H4>(- :  <I>value</I> )<BR>
<BR>

<H4>Operation</H4>Dereferences  <I>pointer</I>  and pushes the result onto the stack.<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.94&nbsp;&nbsp; MM 80 putActorAtObject
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.95&nbsp;&nbsp; MM 7F putActorInRoom
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.96&nbsp;&nbsp; quitPauseRestart<A NAME="@default400"></A></H3>[t]1.00
This instruction varies according to the form.<BR>
<BR>

<H4>Encoding</H4><DL COMPACT=compact>
<DT>
pause:<DD>AE 9E

<DT>quit:<DD>AE A0
</DL>
<H4>Stack</H4>(-&nbsp;:&nbsp;-) (both forms)<BR>
<BR>

<H4>Operation</H4>Pauses and quits the game. [Details, details!]<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.97&nbsp;&nbsp; MM 9B resourceRoutines
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.98&nbsp;&nbsp; MM 9C roomOps
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.99&nbsp;&nbsp; MM BF runScriptQuick
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.100&nbsp;&nbsp; MM BE runVerbCodeQuick
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.101&nbsp;&nbsp; MM A5 saveRestoreVerbs
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.102&nbsp;&nbsp; MM 99 setBoxFlags
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.103&nbsp;&nbsp; MM 7A setCameraAt
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.104&nbsp;&nbsp; MM 6E setClass
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.105&nbsp;&nbsp; MM 97 setObjectName
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.106&nbsp;&nbsp; MM 61 setObjectState
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.107&nbsp;&nbsp; MM 62 setObjectXY
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.108&nbsp;&nbsp; MM 71 setOwner
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.109&nbsp;&nbsp; MM 70 setState
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.110&nbsp;&nbsp; MM AC soundKludge
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.111&nbsp;&nbsp; MM 76 startMusic
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.112&nbsp;&nbsp; MM 60 startObject
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.113&nbsp;&nbsp; startScript<A NAME="@default434"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>5F<BR>
<BR>

<H4>Stack</H4>( <I>script</I> ,&nbsp; <I>arg</I><SUB><FONT SIZE=2>0</FONT></SUB> ,&nbsp; <I>arg</I><SUB><FONT SIZE=2>1</FONT></SUB> ,&nbsp; <I>arg</I><SUB><FONT SIZE=2>2</FONT></SUB> ,&nbsp;...,&nbsp; <I>arg</I><SUB><FONT SIZE=2><I>n</I></FONT></SUB> ,&nbsp; <I>n</I> &nbsp;:&nbsp;-)<BR>
<BR>

<H4>Operation</H4>A new thread is started, running the code in the script whose resource
number is  <I>script</I> .  <I>arg</I><SUB><FONT SIZE=2>0</FONT></SUB> .. <I>arg</I><SUB><FONT SIZE=2><I>n</I></FONT></SUB>  form the thread's
initial local variables; unspecified variables are not initialised
to any specific value.<BR>
<BR>
The new thread starts executing immediately and the current thread
is put into the PENDING state until the new thread is descheduled.<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.114&nbsp;&nbsp; MM 5E startScriptEx
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.115&nbsp;&nbsp; MM 74 startSound
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.116&nbsp;&nbsp; MM 69 stopMusic
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.117&nbsp;&nbsp; MM 65 stopObjectCode
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.118&nbsp;&nbsp; MM 66 stopObjectCode
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.119&nbsp;&nbsp; MM 77 stopObjectScript
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.120&nbsp;&nbsp; MM 7C stopScript
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.121&nbsp;&nbsp; MM B3 stopSentence
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.122&nbsp;&nbsp; MM 75 stopSound
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.123&nbsp;&nbsp; sub<A NAME="@default454"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>15<BR>
<BR>

<H4>Stack</H4> ( <I>in</I><SUB><FONT SIZE=2>1</FONT></SUB>&nbsp; <I>in</I><SUB><FONT SIZE=2>2</FONT></SUB>:&nbsp; <I>out</I>) <BR>
<BR>

<H4> Operation</H4> <I>out</I>:=<I>in</I><SUB><FONT SIZE=2>1</FONT></SUB>-<I>in</I><SUB><FONT SIZE=2>2</FONT></SUB> <BR>
<BR>
The top two items on the stack are popped off, the first subtracted
from the second, and the result pushed back on the stack. Note the
order.<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.124&nbsp;&nbsp; MM BA talkActor
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.125&nbsp;&nbsp; MM BB talkEgo
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.126&nbsp;&nbsp; MM 9E verbOps
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.127&nbsp;&nbsp; MM A9 wait
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.128&nbsp;&nbsp; MM 7E walkActorTo
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.129&nbsp;&nbsp; MM 7D walkActorToObj
<h3>

</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.130&nbsp;&nbsp; wordArrayDec<A NAME="@default468"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>5B  <I>arrayp</I><SUP><FONT SIZE=2>16</FONT></SUP> <BR>
<BR>

<H4>Stack</H4>( <I>index</I> &nbsp;:&nbsp;-)<BR>
<BR>

<H4>Operation</H4> <I>arrayp</I> [0,&nbsp; <I>index</I> ]&nbsp;:=&nbsp; <I>arrayp</I> [0,&nbsp; <I>index</I> ]&nbsp;-&nbsp;1<BR>
<BR>
Increments the value at offset (0,&nbsp; <I>index</I> ) in the array whose
resource number is pointed to by  <I>arrayp</I> .<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.131&nbsp;&nbsp; wordArrayInc<A NAME="@default470"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>53  <I>arrayp</I><SUP><FONT SIZE=2>16</FONT></SUP> <BR>
<BR>

<H4>Stack</H4>( <I>index</I> &nbsp;:&nbsp;-)<BR>
<BR>

<H4>Operation</H4> <I>arrayp</I> [0,&nbsp; <I>index</I> ]&nbsp;:=&nbsp; <I>arrayp</I> [0,&nbsp; <I>index</I> ]&nbsp;+&nbsp;1<BR>
<BR>
Increments the value at offset (0,&nbsp; <I>index</I> ) in the array whose
resource number is pointed to by  <I>arrayp</I> .<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.132&nbsp;&nbsp; wordArrayIndexedRead<A NAME="@default472"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>0B  <I>arrayp</I><SUP><FONT SIZE=2>16</FONT></SUP> <BR>
<BR>

<H4>Stack</H4>( <I>index</I><SUB><FONT SIZE=2><I>x</I></FONT></SUB> ,  <I>index</I><SUB><FONT SIZE=2><I>y</I></FONT></SUB>  :  <I>value</I> )<BR>
<BR>

<H4>Operation</H4> <I>value</I> &nbsp;:=&nbsp; <I>arrayp</I> [ <I>index</I><SUB><FONT SIZE=2><I>x</I></FONT></SUB> ,&nbsp; <I>index</I><SUB><FONT SIZE=2><I>y</I></FONT></SUB> ]<BR>
<BR>
Reads the value at offset ( <I>index</I><SUB><FONT SIZE=2><I>x</I></FONT></SUB> ,&nbsp; <I>index</I><SUB><FONT SIZE=2><I>y</I></FONT></SUB> ) from
the array whose resource number is pointed to by  <I>arrayp</I> . The
array can be a byte or word array; byte values are not sign extended.<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.133&nbsp;&nbsp; wordArrayIndexedWrite<A NAME="@default474"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>4B  <I>arrayp</I><SUP><FONT SIZE=2>16</FONT></SUP> <BR>
<BR>

<H4>Stack</H4>( <I>index</I><SUB><FONT SIZE=2><I>x</I></FONT></SUB> ,  <I>index</I><SUB><FONT SIZE=2><I>y</I></FONT></SUB> ,  <I>value</I>  : -)<BR>
<BR>

<H4>Operation</H4> <I>arrayp</I> [ <I>index</I><SUB><FONT SIZE=2><I>x</I></FONT></SUB> ,&nbsp; <I>index</I><SUB><FONT SIZE=2><I>y</I></FONT></SUB> ] :=  <I>value</I> <BR>
<BR>
Writes  <I>value</I>  to the array whose resource number is pointed
to by  <I>arrayp</I>  at offset ( <I>index</I><SUB><FONT SIZE=2><I>x</I></FONT></SUB> ,  <I>index</I><SUB><FONT SIZE=2><I>y</I></FONT></SUB> ).
The array can be a byte or word array; when writing to a byte array,
 <I>value</I>  is truncated. <BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.134&nbsp;&nbsp; wordArrayRead<A NAME="@default476"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>07  <I>arrayp</I><SUP><FONT SIZE=2>16</FONT></SUP> <BR>
<BR>

<H4>Stack</H4>( <I>index</I>  :  <I>value</I> )<BR>
<BR>

<H4>Operation</H4> <I>value</I>  :=  <I>arrayp</I> [0,&nbsp; <I>index</I> ]<BR>
<BR>
Reads the value at offset (0,&nbsp; <I>index</I> ) from the array whose
resource number is pointed to by  <I>arrayp</I> . The array can be a
byte or word array; byte values are not sign extended.<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.135&nbsp;&nbsp; wordArrayWrite<A NAME="@default478"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>47  <I>arrayp</I><SUP><FONT SIZE=2>8</FONT></SUP> <BR>
<BR>

<H4>Stack</H4>( <I>index</I>   <I>value</I>  : -)<BR>
<BR>

<H4>Operation</H4> <I>arrayp</I> [0,&nbsp; <I>index</I> ] :=  <I>value</I> <BR>
<BR>
Writes  <I>value</I>  to the array whose resource number is pointed
to by  <I>arrayp</I>  at offset (0,&nbsp; <I>index</I> ). The array can be
a byte or word array; when writing to a byte array,  <I>value</I>  is
truncated. <BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.136&nbsp;&nbsp; wordVarDec<A NAME="@default480"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>57  <I>pointer</I><SUP><FONT SIZE=2>16</FONT></SUP> <BR>
<BR>

<H4>Stack</H4>(- : -)<BR>
<BR>

<H4>Operation</H4>* <I>pointer</I>  := * <I>pointer</I>  - 1<BR>
<BR>
Decrements the variable pointed to by  <I>pointer</I> .<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.137&nbsp;&nbsp; wordVarInc<A NAME="@default482"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>4F  <I>pointer</I><SUP><FONT SIZE=2>16</FONT></SUP> <BR>
<BR>

<H4>Stack</H4>(- : -)<BR>
<BR>

<H4>Operation</H4>* <I>pointer</I>  := * <I>pointer</I>  + 1<BR>
<BR>
Increments the variable pointed to by  <I>pointer</I> .<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.138&nbsp;&nbsp; writeByteVar<A NAME="@default484"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>42  <I>pointer</I><SUP><FONT SIZE=2>8</FONT></SUP> <BR>
<BR>

<H4>Stack</H4>( <I>value</I>  : -)<BR>
<BR>

<H4>Operation</H4>* <I>pointer</I>  :=  <I>value</I> <BR>
<BR>
Writes  <I>value</I>  to the variable pointed to by  <I>pointer</I> .
Note that as  <I>pointer</I>  is encoded as a byte, it can only point
to word variables in the range 0x0000 to 0x00FF. For a more general
form of this instruction, use <FONT COLOR=purple>writeWordVar</FONT>.<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.139&nbsp;&nbsp; writeWordVar<A NAME="@default486"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>43  <I>pointer</I><SUP><FONT SIZE=2>16</FONT></SUP> <BR>
<BR>

<H4>Stack</H4>( <I>value</I>  : -)<BR>
<BR>

<H4>Operation</H4>* <I>pointer</I>  :=  <I>value</I> <BR>
<BR>
Writes  <I>value</I>  to the variable pointed to by  <I>pointer</I> .<BR>
<BR>

<BR><BR>
<BR>


</div>

<!-- --------------------------------------------------------------------- -->

<div class=opcode><h2>6.4.140&nbsp;&nbsp; zero<A NAME="@default488"></A></H3>[t]1.00<BR>
<BR>

<H4>Encoding</H4>0D<BR>
<BR>

<H4>Stack</H4>( <I>value</I> &nbsp;:&nbsp; <I>bool</I> )<BR>
<BR>

<H4> Operation</H4>If  <I>value</I>  = 0, set  <I>bool</I>  to 1, otherwise set it to
0<BR>
<BR>
Tests the value on the stack to see if it compares to zero.
</div>
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

