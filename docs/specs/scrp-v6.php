<?php

$file_root = "../..";
// load libs
require($file_root."/include/"."incl.php");

// start of html
html_page_header("ScummVM :: SCUMM Reference Guide :: V6 opcode list", array("specs.css"));

//display welcome table
echo html_content_begin("V6 opcode list");
?>
  
<div class="par-item">
  <div class="par-head">
    V6 opcode list
  </div>
  <div class="par-content">

<p>The following conventions are used in the encoding descriptions:

<dl>
<dt><tt>$AB</tt>
<dd>The constant hexadecimal byte 0xAB.

<dt><tt>value[8]</tt>
<dd>A constant byte value.

<dt><tt>value[16]</tt>
<dd>A constant word LE value.
</dl>

<p>The following conventions are used in the stack descriptions:

<dl>
<dt>(<i>in1</i>, <i>in2</i>, <i>in3</i> : <i>out1</i>, <i>out2</i>)
<dd>Indicates
that the opcode is called with three items on the stack (the most
recently pushed being <i>in3</i>) and replaces them with two items
on the stack (the most recently pushed being <i>out2</i>).
</dl>

<!-- -->

<div class=opcode>
<h2>abs</h2>
<h3>$C4</h3>

<h4>Stack</h4>
(<i>in</i> : <i>out</i>)

<h4>Operation</h4>
<i>out</i> := abs(<i>in</i>)

<p>The absolute value of the top-most item on the stack is calculated.
(The absolute value being the value with the sign bit stripped off.)
</div>

<!-- -->

<div class=opcode>
<h2>actorFollowCamera</h2>
<h3>$79</h3>
</div>

<!-- -->

<div class=opcode>
<h2>actorSet</h2>
<h3>$9D</h3>
</div>

<!-- -->

<div class=opcode>
<h2>add</h2>
<h3>$14</h3>

<h4>Stack</h4>
(<i>in1</i>, <i>in2</i> : <i>out</i>)

<h4>Operation</h4>
<i>out</i> := <i>in1</i> + <i>in2</i>

<p>Performs a division operation on the stack.
</div>

<!-- -->

<div class=opcode>
<h2>animateActor</h2>
<h3>$82</h3>
</div>

<!-- -->

<div class=opcode>
<h2>arrayOps</h2>
This instruction varies considerably according to the form.<br>
<br>

<h4>Encoding</h4><dl compact=compact>
<dt>
load&nbsp;array:<dd>A4 CD  <i>arrayp</i><sup><font size=2>16</font></sup> 

<dt>define&nbsp;array:<dd>A4 D0  <i>arrayp</i><sup><font size=2>16</font></sup>   <i>data</i>... 

<dt>set&nbsp;array:<dd>A4 D4  <i>arrayp</i><sup><font size=2>16</font></sup> 
</dl>
<h4>Stack</h4><dl compact=compact>
<dt>
...todo...<dd>&nbsp;
</dl>
<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>6.4.7&nbsp;&nbsp; MM 95 beginOverride</h2>
<h3></h3>
</div>

<!-- -->

<div class=opcode>
<h2>MM 6C breakHere</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM CA breakMaybe</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 5A byteArrayDec</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 52 byteArrayInc</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>byteArrayIndexedRead</h2>
<br>

<h4>Encoding</h4>0A  <i>arrayp</i><sup><font size=2>8</font></sup> <br>
<br>

<h4>Stack</h4>( <i>index</i><sub><font size=2><i>x</i></font></sub> ,  <i>index</i><sub><font size=2><i>y</i></font></sub>  :  <i>value</i> )<br>
<br>

<h4>Operation</h4> <i>value</i>  :=  <i>arrayp</i> [ <i>index</i><sub><font size=2><i>x</i></font></sub> ,&nbsp; <i>index</i><sub><font size=2><i>y</i></font></sub> ]<br>
<br>
Reads the value at offset ( <i>index</i><sub><font size=2><i>x</i></font></sub> ,  <i>index</i><sub><font size=2><i>y</i></font></sub> ) from
the array whose resource number is pointed to by  <i>arrayp</i> . The
array can be a byte or word array; byte values are not sign extended.
Note that because  <i>arrayp</i>  is encoded as a byte, it can only
point to a word variable in the range 0000 to 00FF. Use <font color=purple>wordArrayIndexedRead</font>
for a more general form.<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>byteArrayIndexedWrite</h2>
<br>

<h4>Encoding</h4>4A  <i>arrayp</i><sup><font size=2>8</font></sup> <br>
<br>

<h4>Stack</h4>( <i>index</i><sub><font size=2><i>x</i></font></sub> ,  <i>index</i><sub><font size=2><i>y</i></font></sub> ,  <i>value</i>  : -)<br>
<br>

<h4>Operation</h4> <i>arrayp</i> [ <i>index</i><sub><font size=2><i>x</i></font></sub> ,&nbsp; <i>index</i><sub><font size=2><i>y</i></font></sub> ] :=  <i>value</i> <br>
<br>
Writes  <i>value</i>  to the array whose resource number is pointed
to by  <i>arrayp</i>  at offset ( <i>index</i><sub><font size=2><i>x</i></font></sub> ,  <i>index</i><sub><font size=2><i>y</i></font></sub> ).
The array can be a byte or word array; byte when writing to a byte
array,  <i>value</i>  is truncated. Note that because  <i>arrayp</i> 
is encoded as a byte, it can only point to a word variable in the
range 0000 to 00FF. Use <font color=purple>wordArrayIndexedWrite</font> for a more
general form.<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>byteArrayRead</h2>
<br>

<h4>Encoding</h4>06  <i>arrayp</i><sup><font size=2>8</font></sup> <br>
<br>

<h4>Stack</h4>( <i>index</i>  :  <i>value</i> )<br>
<br>

<h4>Operation</h4> <i>value</i>  :=  <i>arrayp</i> [0,&nbsp; <i>index</i> ]<br>
<br>
Reads the value at position (0,&nbsp; <i>index</i> ) from the array whose
resource number is pointed to by  <i>arrayp</i> . The array can be a
byte or word array; when writing to an array, byte values are not
sign extended. Note that because  <i>arrayp</i>  is encoded as a byte,
it can only point to a word variable in the range 0000 to 00FF. Use
<font color=purple>wordArrayRead</font> for a more general form.<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>byteArrayWrite</h2>
<br>

<h4>Encoding</h4>46  <i>arrayp</i><sup><font size=2>8</font></sup> <br>
<br>

<h4>Stack</h4>( <i>index</i>   <i>value</i>  : -)<br>
<br>

<h4>Operation</h4> <i>arrayp</i> [0,&nbsp; <i>index</i> ] :=  <i>value</i> <br>
<br>
Writes  <i>value</i>  to the array whose resource number is pointed
to by  <i>arrayp</i>  at offset (0,&nbsp; <i>index</i> ). The array can be
a byte or word array; when writing to a byte array,  <i>value</i>  is
truncated. Note that because  <i>arrayp</i>  is encoded as a byte, it
can only point to a word variable in the range 0000 to 00FF. Use <font color=purple>wordArrayWrite</font>
for a more general form.<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>MM 56 byteVarDec</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 4E byteVarInc</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 9A createBoxMatrix</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 6B cursorCommand</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 68 cutScene</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>delay</h2>
<br>

<h4>Encoding</h4>B0 <br>
<br>

<h4>Stack</h4>( <i>delay</i>  : -)<br>
<br>

<h4>Operation</h4>Prevents the current thread from being rescheduled until  <i>delay</i> 
ticks have passed. Deschedules immediately.<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>delayLonger</h2>
<br>

<h4>Encoding</h4>B1 <br>
<br>

<h4>Stack</h4>( <i>delay</i>  : -)<br>
<br>

<h4>Operation</h4>Prevents the current thread from being rescheduled until  <i>delay</i>× 60 
ticks have passed ( <i>delay</i>  seconds). Deschedules immediately.<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>delayVeryLong</h2>
<br>

<h4>Encoding</h4>B2<br>
<br>

<h4>Stack</h4>( <i>delay</i>  : -)<br>
<br>

<h4>Operation</h4>Prevents the current thread from being rescheduled until  <i>delay</i>× 3600 
ticks have passed ( <i>delay</i>  minutes). Deschedules immediately.<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>dim</h2>
<br>

<h4>Encoding</h4>BC  <i>type</i><sup><font size=2>8</font></sup>   <i>arrayp</i><sup><font size=2>16</font></sup> <br>
<br>

<h4>Stack</h4>( <i>max</i>  : -)<br>
<br>

<h4>Operation</h4>Allocates or frees an array.<br>
<br>
If  <i>type</i>  is CC, then the array whose resource number is pointed
to by  <i>arrayp</i>  is freed. Otherwise, a new one-dimensional array
with a maximum index of  <i>max</i>  (i.e.,  <i>max</i>  is one less than
the size) is allocated and the resource number written to  <i>arrayp</i> .<br>
<br>
When allocating an array, if  <i>type</i>  is C7 then the array will
contain words; if it is CB, then it will contain bytes. All other
values are undefined. [Currently they all produce a byte array.
What are they?]<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>dim2</h2>
<br>

<h4>Encoding</h4>C0  <i>type</i><sup><font size=2>8</font></sup>   <i>arrayp</i><sup><font size=2>16</font></sup> <br>
<br>

<h4>Stack</h4>( <i>maxx</i> ,  <i>maxy</i>  : -)<br>
<br>

<h4>Operation</h4>Allocates an array.<br>
<br>
A new two-dimensional array is allocated and the resource number is
written to  <i>arrayp</i> . The new array will have a maximum X index
of  <i>maxx</i>  and a maximum Y index of  <i>maxy</i>  (i.e.,  <i>maxy</i> 
is one less than the size).<br>
<br>
When allocating an array, if  <i>type</i>  is C7 then the array will
contain words; if it is CB, then it will contain bytes. All other
values are undefined. [Currently they all produce a byte array.
What are they?]<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>MM C5 distObjectObject</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM C6 distObjectPt</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM C7 distPtPt</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>div</h2>
<br>

<h4>Encoding</h4>17<br>
<br>

<h4>Stack</h4>( <i>in</i><sub><font size=2>1</font></sub> ,  <i>in</i><sub><font size=2>2</font></sub>  :  <i>out</i> )<br>
<br>

<h4> Operation</h4> <i>out</i>  :=  <i>in</i><sub><font size=2>1</font></sub>  /  <i>in</i><sub><font size=2>2</font></sub> <br>
<br>
Performs a division operation on the stack. Note the order.<br>
<br>
An attempt to divide by zero will cause undefined behaviour, and may
cause the interpreter to crash.<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>MM 83 doSentence</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>drawBox</h2>
<br>

<h4>Encoding</h4>A6<br>
<br>

<h4>Stack</h4>( <i>left</i> ,  <i>top</i> ,  <i>right</i> ,  <i>bottom</i> ,  <i>colour</i> 
: -)<br>
<br>

<h4>Operation</h4>Draws a solid box on the backbuffer from ( <i>left</i> ,  <i>top</i> )
to ( <i>right</i> ,  <i>bottom</i> ) in the colour  <i>colour</i> . <br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>dup</h2>
<br>

<h4>Encoding</h4>0C<br>
<br>

<h4>Stack</h4>( <i>value</i> &nbsp;:&nbsp; <i>value</i> ,&nbsp; <i>value</i> )<br>
<br>

<h4> Operation</h4>Duplicates the top-most item on the stack.<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>MM 67 endCutScene</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 96 endOverride</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>eq</h2>
<br>

<h4>Encoding</h4>0E<br>
<br>

<h4>Stack</h4>( <i>value</i><sub><font size=2>1</font></sub> ,&nbsp; <i>value</i><sub><font size=2>2</font></sub> &nbsp;:&nbsp; <i>bool</i> )<br>
<br>

<h4> Operation</h4>If  <i>value</i><sub><font size=2>1</font></sub>=<i>value</i><sub><font size=2>2</font></sub> , set  <i>bool</i>  to 1, otherwise set
it to 0<br>
<br>
Tests the top two values on the stack to see if they are equal.<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>MM 81 faceActor</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 92 findInventory</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM A0 findObject</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>freezeUnfreeze</h2>
<br>

<h4>Encoding</h4>6A<br>
<br>

<h4>Stack</h4>( <i>bool</i> &nbsp;:&nbsp;-)<br>
<br>

<h4> Operation</h4><dl compact=compact>
<dt>
 <i>bool</i>=0 :<dd>Thaw all currently frozen threads.

<dt> 0&lt;<i>bool</i>&lt;$80 :<dd>Freeze all threads that are not marked as unfreezable.

<dt> <i>bool</i><font face=symbol>³</font> $80 :<dd>Freeze all threads, even those that are marked
as unfreezable.
</dl>
Freezing is a nestable operation; a thread which is frozen twice must
be thawed twice before it becomes runnable again.<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>ge</h2>
<br>

<h4>Encoding</h4>13<br>
<br>

<h4>Stack</h4> ( <i>value</i><sub><font size=2>1</font></sub>&nbsp; <i>value</i><sub><font size=2>2</font></sub>&nbsp; :&nbsp; <i>bool</i>) <br>
<br>

<h4> Operation</h4>If  <i>value</i><sub><font size=2>1</font></sub><font face=symbol>³</font> <i>value</i><sub><font size=2>2</font></sub> , set  <i>bool</i>  to 1, otherwise
set it to 0<br>
<br>
Compares the top two values on the stack. Note the order.<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>MM AB getActorAnimCounter1</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 91 getActorCostume</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM A2 getActorElevation</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 9F getActorFromXY</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 8A getActorMoving</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 8C getActorRoom</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM AA getActorScaleX</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 90 getActorWalkBox</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM A8 getActorWidth</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 93 getInventoryCount</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 8F getObjectDir</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 8D getObjectX</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 8E getObjectY</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 72 getOwner</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>getRandomNumber</h2>
<br>

<h4>Encoding</h4>87<br>
<br>

<h4>Stack</h4>( <i>max</i> &nbsp;:&nbsp; <i>result</i> )<br>
<br>

<h4>Operation</h4>A random number in the range  0  to  <i>max</i>  inclusive is calculated,
and the result pushed onto the stack. The result is also written to
the <font color=purple>RandomNumber</font> word variable (see <a href="#System Variables">6.5</a>).<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>getRandomNumberRange</h2>
<br>

<h4>Encoding</h4>88<br>
<br>

<h4>Stack</h4>( <i>min</i> ,&nbsp; <i>max</i> ,&nbsp;:&nbsp; <i>result</i> )<br>
<br>

<h4>Operation</h4>A random number in the range  <i>min</i>  to  <i>max</i>  inclusive is
calculated, and the result pushed onto the stack. The result is also
written to the <font color=purple>RandomNumber</font> word variable (see <a href="#System Variables">6.5</a>).<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>MM 8B getScriptRunning</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 6F getState</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM A3 getVerbEntryPoint</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 94 getVerbFromXY</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>gt</h2>
<br>

<h4>Encoding</h4>10<br>
<br>

<h4>Stack</h4>( <i>value</i><sub><font size=2>1</font></sub> ,&nbsp; <i>value</i><sub><font size=2>2</font></sub> &nbsp;:&nbsp; <i>bool</i> )<br>
<br>

<h4> Operation</h4>If  <i>value</i><sub><font size=2>1</font></sub>  &gt;  <i>value</i><sub><font size=2>2</font></sub> , set  <i>bool</i>  to 1, otherwise
set it to 0<br>
<br>
Compares the top two values on the stack. Note the order.<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>MM 6D ifClassOfIs</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM AF isActorInBox</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>isAnyOf</h2>
<br>

<h4>Encoding</h4>AD<br>
<br>

<h4>Stack</h4>( <i>arg</i><sub><font size=2>1</font></sub> ,&nbsp; <i>arg</i><sub><font size=2>2</font></sub> ,&nbsp; <i>arg</i><sub><font size=2>3</font></sub> ,&nbsp;...,&nbsp; <i>arg</i><sub><font size=2><i>n</i></font></sub> ,&nbsp; <i>n</i> ,&nbsp; <i>value</i> &nbsp;:&nbsp; <i>bool</i> )<br>
<br>

<h4> Operation</h4>If  <i>value</i>  is any of  <i>arg</i><sub><font size=2>1</font></sub> .. <i>arg</i><sub><font size=2><i>n</i></font></sub> ,  <i>bool</i> 
:= 1, otherwise  <i>bool</i>  := 0<br>
<br>
Tests to see if  <i>value</i>  is equal to any of the passed in arguments.
If  <i>n</i>  is less than the number of entries on the stack, undefined
behaviour will result.<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>MM 98 isSoundRunning</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 73 jump</h2>
<br>

<h4>Encoding</h4>73  <i>offset</i><sup><font size=2>16</font></sup> <br>
<br>

<h4>Stack</h4>(-&nbsp;:&nbsp;-)<br>
<br>

<h4> Operation</h4>pc := pc +  <i>offset</i> <br>
<br>
 <i>offset</i>  is added to the current program counter after the instruction
has been decoded.<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>jumpFalse</h2>
<br>

<h4>Encoding</h4>5D  <i>offset</i><sup><font size=2>16</font></sup> <br>
<br>

<h4>Stack</h4>( <i>bool</i> &nbsp;:&nbsp;-)<br>
<br>

<h4> Operation</h4>if  <i>bool</i>  = 0, pc := pc +  <i>offset</i> <br>
<br>
Pops the top value off the stack. If zero, then  <i>offset</i>  is added
to the current program counter after the instruction has been decoded.<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>jumpTrue</h2>
<br>

<h4>Encoding</h4>5C  <i>offset</i><sup><font size=2>16</font></sup> <br>
<br>

<h4>Stack</h4>( <i>bool</i> &nbsp;:&nbsp;-)<br>
<br>

<h4> Operation</h4>if  <i>bool</i>  <font face=symbol> </font> 0, pc := pc +  <i>offset</i> <br>
<br>
Pops the top value off the stack. If non-zero, then  <i>offset</i> 
is added to the current program counter after the instruction has
been decoded.<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>kill</h2>
<br>

<h4>Encoding</h4>1A<br>
<br>

<h4>Stack</h4>( <i>value</i> &nbsp;:&nbsp;-)<br>
<br>

<h4> Operation</h4>Pops the top value off the stack and discards it.<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>land</h2>
<br>

<h4>Encoding</h4>18<br>
<br>

<h4>Stack</h4> ( <i>in</i><sub><font size=2>1</font></sub>&nbsp; <i>in</i><sub><font size=2>2</font></sub>&nbsp; :&nbsp; <i>out</i>) <br>
<br>

<h4> Operation</h4> <i>out</i>:=<i>in</i><sub><font size=2>1</font></sub>&nbsp; &amp;&amp;&nbsp; <i>in</i><sub><font size=2>2</font></sub> <br>
<br>
Performs a logical <font color=purple>and</font> operation on the stack (not a bitwise
<font color=purple>and</font>). Note the order.<br>
<br>
The boolean values are as in C, with 0 for <font color=purple>false</font> and non-zero
for <font color=purple>true</font>.<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>le</h2>
<br>

<h4>Encoding</h4>12<br>
<br>

<h4>Stack</h4> ( <i>value</i><sub><font size=2>1</font></sub>&nbsp; <i>value</i><sub><font size=2>2</font></sub>&nbsp; :&nbsp; <i>bool</i>) <br>
<br>

<h4> Operation</h4>If  <i>value</i><sub><font size=2>1</font></sub><font face=symbol>£</font> <i>value</i><sub><font size=2>2</font></sub> , set  <i>bool</i>  to 1, otherwise
set it to 0<br>
<br>
Compares the top two values on the stack. Note the order.<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>MM 7B loadRoom</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 85 loadRoomWithEgo</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>lor</h2>
<br>

<h4>Encoding</h4>19<br>
<br>

<h4>Stack</h4> ( <i>in</i><sub><font size=2>1</font></sub>&nbsp; <i>in</i><sub><font size=2>2</font></sub>&nbsp; :&nbsp; <i>out</i>) <br>
<br>

<h4> Operation</h4> <i>out</i>:=<i>in</i><sub><font size=2>1</font></sub>&nbsp; ||&nbsp; <i>in</i><sub><font size=2>2</font></sub> <br>
<br>
Performs a logical <font color=purple>or</font> operation on the stack (not a bitwise
<font color=purple>or</font>). Note the order.<br>
<br>
The boolean values are as in C, with 0 for <font color=purple>false</font> and non-zero
for <font color=purple>true</font>.<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>lt</h2>
<br>

<h4>Encoding</h4>11<br>
<br>

<h4>Stack</h4> ( <i>value</i><sub><font size=2>1</font></sub>&nbsp; <i>value</i><sub><font size=2>2</font></sub>&nbsp; :&nbsp; <i>bool</i>) <br>
<br>

<h4> Operation</h4>If  <i>value</i><sub><font size=2>1</font></sub>&lt;<i>value</i><sub><font size=2>2</font></sub> , set  <i>bool</i>  to 1, otherwise set
it to 0<br>
<br>
Compares the top two values on the stack. Note the order.<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>MM C9 miscOps</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>mul</h2>
<br>

<h4>Encoding</h4>16<br>
<br>

<h4>Stack</h4> ( <i>in</i><sub><font size=2>1</font></sub>&nbsp; <i>in</i><sub><font size=2>2</font></sub>&nbsp; :&nbsp; <i>out</i>) <br>
<br>

<h4> Operation</h4> <i>out</i>:=<i>in</i><sub><font size=2>1</font></sub>× <i>in</i><sub><font size=2>2</font></sub> <br>
<br>
Performs a multiplication operation on the stack. Note the order.<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>neq</h2>
<br>

<h4>Encoding</h4>0F<br>
<br>

<h4>Stack</h4>( <i>value</i><sub><font size=2>1</font></sub> ,  <i>value</i><sub><font size=2>2</font></sub>  :  <i>bool</i> )<br>
<br>

<h4> Operation</h4>If  <i>value</i><sub><font size=2>1</font></sub>   <font face=symbol> </font>   <i>value</i><sub><font size=2>2</font></sub> , set  <i>bool</i> 
to 1, otherwise set it to 0<br>
<br>
Tests the top two values on the stack to see if they are not equal.<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>MM 78 panCameraTo</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>pickOneOf</h2>
<br>

<h4>Encoding</h4>CB<br>
<br>

<h4>Stack</h4>( <i>index</i> ,&nbsp; <i>arg</i><sub><font size=2>0</font></sub> ,&nbsp; <i>arg</i><sub><font size=2>1</font></sub> ,&nbsp; <i>arg</i><sub><font size=2>2</font></sub> ,&nbsp;...,&nbsp; <i>arg</i><sub><font size=2><i>n</i></font></sub> ,&nbsp; <i>n</i> &nbsp;:&nbsp; <i>value</i> )<br>
<br>

<h4> Operation</h4> <i>value</i>  :=  <i>arg</i><sub><font size=2>[<i>index</i>]</font></sub> <br>
<br>
Returns the  <i>index</i> th argument on the stack. If  <i>n</i>  is less
than the number of entries on the stack or  <i>index</i>  is out of
range, undefined behaviour will result, usually involving the interpreter
shutting down.<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>pickOneOfDefault</h2>
<br>

<h4>Encoding</h4>CC<br>
<br>

<h4>Stack</h4>( <i>index</i> ,&nbsp; <i>arg</i><sub><font size=2>0</font></sub> ,&nbsp; <i>arg</i><sub><font size=2>1</font></sub> ,&nbsp; <i>arg</i><sub><font size=2>2</font></sub> ,&nbsp;...,&nbsp; <i>arg</i><sub><font size=2><i>n</i></font></sub> ,&nbsp; <i>n</i> ,&nbsp; <i>default</i> &nbsp;:&nbsp; <i>value</i> )<br>
<br>

<h4> Operation</h4>If  <i>index</i>  is in the range 0.. <i>n</i> ,  <i>value</i> &nbsp;:=&nbsp; <i>arg</i><sub><font size=2>[<i>index</i>]</font></sub> ;
otherwise  <i>value</i> &nbsp;:=&nbsp; <i>default</i> .<br>
<br>
Returns the  <i>index</i> th argument on the stack. If  <i>index</i> 
is out of range,  <i>default</i>  is returned instead. If  <i>n</i>  is
less than the number of entries on the stack, undefined behaviour
will result, usually involving the interpreter shutting down.<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>MM 84 pickupObject</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM B8 printActor</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM B9 printEgo</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM B4 print0</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM B5 print1</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM B6 print2</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM B7 print3</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM A1 pseudoRoom</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>pushByte</h2>
<br>

<h4>Encoding</h4>00  <i>value</i><sup><font size=2>8</font></sup> <br>
<br>

<h4>Stack</h4>(- :  <i>value</i> )<br>
<br>

<h4>Operation</h4>Pushes  <i>value</i>  onto the stack. It is not sign extended.<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>pushByteVar</h2>
<br>

<h4>Encoding</h4>02  <i>pointer</i><sup><font size=2>8</font></sup> <br>
<br>

<h4>Stack</h4>(- :  <i>value</i> )<br>
<br>

<h4>Operation</h4>Dereferences  <i>pointer</i>  and pushes the result onto the stack.
Note that because  <i>pointer</i>  is encoded as a byte, it can only
point to a word variable in the range 0000-00FF. Use <font color=purple>pushWordVar</font>
for a more general version of this instruction.<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>pushWord</h2>
<br>

<h4>Encoding</h4>01  <i>value</i><sup><font size=2>16</font></sup> <br>
<br>

<h4>Stack</h4>(- :  <i>value</i> )<br>
<br>

<h4>Operation</h4>Pushes  <i>value</i>  onto the stack.<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>pushWordVar</h2>
<br>

<h4>Encoding</h4>03  <i>pointer</i><sup><font size=2>16</font></sup> <br>
<br>

<h4>Stack</h4>(- :  <i>value</i> )<br>
<br>

<h4>Operation</h4>Dereferences  <i>pointer</i>  and pushes the result onto the stack.<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>MM 80 putActorAtObject</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 7F putActorInRoom</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>quitPauseRestart</h2>
This instruction varies according to the form.<br>
<br>

<h4>Encoding</h4><dl compact=compact>
<dt>
pause:<dd>AE 9E

<dt>quit:<dd>AE A0
</dl>
<h4>Stack</h4>(-&nbsp;:&nbsp;-) (both forms)<br>
<br>

<h4>Operation</h4>Pauses and quits the game. [Details, details!]<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>MM 9B resourceRoutines</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 9C roomOps</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM BF runScriptQuick</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM BE runVerbCodeQuick</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM A5 saveRestoreVerbs</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 99 setBoxFlags</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 7A setCameraAt</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 6E setClass</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 97 setObjectName</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 61 setObjectState</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 62 setObjectXY</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 71 setOwner</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 70 setState</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM AC soundKludge</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 76 startMusic</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 60 startObject</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>startScript</h2>
<br>

<h4>Encoding</h4>5F<br>
<br>

<h4>Stack</h4>( <i>script</i> ,&nbsp; <i>arg</i><sub><font size=2>0</font></sub> ,&nbsp; <i>arg</i><sub><font size=2>1</font></sub> ,&nbsp; <i>arg</i><sub><font size=2>2</font></sub> ,&nbsp;...,&nbsp; <i>arg</i><sub><font size=2><i>n</i></font></sub> ,&nbsp; <i>n</i> &nbsp;:&nbsp;-)<br>
<br>

<h4>Operation</h4>A new thread is started, running the code in the script whose resource
number is  <i>script</i> .  <i>arg</i><sub><font size=2>0</font></sub> .. <i>arg</i><sub><font size=2><i>n</i></font></sub>  form the thread's
initial local variables; unspecified variables are not initialised
to any specific value.<br>
<br>
The new thread starts executing immediately and the current thread
is put into the PENDING state until the new thread is descheduled.<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>MM 5E startScriptEx</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 74 startSound</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 69 stopMusic</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 65 stopObjectCode</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 66 stopObjectCode</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 77 stopObjectScript</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 7C stopScript</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM B3 stopSentence</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 75 stopSound</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>sub</h2>
<br>

<h4>Encoding</h4>15<br>
<br>

<h4>Stack</h4> ( <i>in</i><sub><font size=2>1</font></sub>&nbsp; <i>in</i><sub><font size=2>2</font></sub>:&nbsp; <i>out</i>) <br>
<br>

<h4> Operation</h4> <i>out</i>:=<i>in</i><sub><font size=2>1</font></sub>-<i>in</i><sub><font size=2>2</font></sub> <br>
<br>
The top two items on the stack are popped off, the first subtracted
from the second, and the result pushed back on the stack. Note the
order.<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>MM BA talkActor</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM BB talkEgo</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 9E verbOps</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM A9 wait</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 7E walkActorTo</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>MM 7D walkActorToObj</h2>
<h3></h3>

</div>

<!-- -->

<div class=opcode>
<h2>wordArrayDec</h2>
<br>

<h4>Encoding</h4>5B  <i>arrayp</i><sup><font size=2>16</font></sup> <br>
<br>

<h4>Stack</h4>( <i>index</i> &nbsp;:&nbsp;-)<br>
<br>

<h4>Operation</h4> <i>arrayp</i> [0,&nbsp; <i>index</i> ]&nbsp;:=&nbsp; <i>arrayp</i> [0,&nbsp; <i>index</i> ]&nbsp;-&nbsp;1<br>
<br>
Increments the value at offset (0,&nbsp; <i>index</i> ) in the array whose
resource number is pointed to by  <i>arrayp</i> .<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>wordArrayInc</h2>
<br>

<h4>Encoding</h4>53  <i>arrayp</i><sup><font size=2>16</font></sup> <br>
<br>

<h4>Stack</h4>( <i>index</i> &nbsp;:&nbsp;-)<br>
<br>

<h4>Operation</h4> <i>arrayp</i> [0,&nbsp; <i>index</i> ]&nbsp;:=&nbsp; <i>arrayp</i> [0,&nbsp; <i>index</i> ]&nbsp;+&nbsp;1<br>
<br>
Increments the value at offset (0,&nbsp; <i>index</i> ) in the array whose
resource number is pointed to by  <i>arrayp</i> .<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>wordArrayIndexedRead</h2>
<br>

<h4>Encoding</h4>0B  <i>arrayp</i><sup><font size=2>16</font></sup> <br>
<br>

<h4>Stack</h4>( <i>index</i><sub><font size=2><i>x</i></font></sub> ,  <i>index</i><sub><font size=2><i>y</i></font></sub>  :  <i>value</i> )<br>
<br>

<h4>Operation</h4> <i>value</i> &nbsp;:=&nbsp; <i>arrayp</i> [ <i>index</i><sub><font size=2><i>x</i></font></sub> ,&nbsp; <i>index</i><sub><font size=2><i>y</i></font></sub> ]<br>
<br>
Reads the value at offset ( <i>index</i><sub><font size=2><i>x</i></font></sub> ,&nbsp; <i>index</i><sub><font size=2><i>y</i></font></sub> ) from
the array whose resource number is pointed to by  <i>arrayp</i> . The
array can be a byte or word array; byte values are not sign extended.<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>wordArrayIndexedWrite</h2>
<br>

<h4>Encoding</h4>4B  <i>arrayp</i><sup><font size=2>16</font></sup> <br>
<br>

<h4>Stack</h4>( <i>index</i><sub><font size=2><i>x</i></font></sub> ,  <i>index</i><sub><font size=2><i>y</i></font></sub> ,  <i>value</i>  : -)<br>
<br>

<h4>Operation</h4> <i>arrayp</i> [ <i>index</i><sub><font size=2><i>x</i></font></sub> ,&nbsp; <i>index</i><sub><font size=2><i>y</i></font></sub> ] :=  <i>value</i> <br>
<br>
Writes  <i>value</i>  to the array whose resource number is pointed
to by  <i>arrayp</i>  at offset ( <i>index</i><sub><font size=2><i>x</i></font></sub> ,  <i>index</i><sub><font size=2><i>y</i></font></sub> ).
The array can be a byte or word array; when writing to a byte array,
 <i>value</i>  is truncated. <br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>wordArrayRead</h2>
<br>

<h4>Encoding</h4>07  <i>arrayp</i><sup><font size=2>16</font></sup> <br>
<br>

<h4>Stack</h4>( <i>index</i>  :  <i>value</i> )<br>
<br>

<h4>Operation</h4> <i>value</i>  :=  <i>arrayp</i> [0,&nbsp; <i>index</i> ]<br>
<br>
Reads the value at offset (0,&nbsp; <i>index</i> ) from the array whose
resource number is pointed to by  <i>arrayp</i> . The array can be a
byte or word array; byte values are not sign extended.<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>wordArrayWrite</h2>
<br>

<h4>Encoding</h4>47  <i>arrayp</i><sup><font size=2>8</font></sup> <br>
<br>

<h4>Stack</h4>( <i>index</i>   <i>value</i>  : -)<br>
<br>

<h4>Operation</h4> <i>arrayp</i> [0,&nbsp; <i>index</i> ] :=  <i>value</i> <br>
<br>
Writes  <i>value</i>  to the array whose resource number is pointed
to by  <i>arrayp</i>  at offset (0,&nbsp; <i>index</i> ). The array can be
a byte or word array; when writing to a byte array,  <i>value</i>  is
truncated. <br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>wordVarDec</h2>
<br>

<h4>Encoding</h4>57  <i>pointer</i><sup><font size=2>16</font></sup> <br>
<br>

<h4>Stack</h4>(- : -)<br>
<br>

<h4>Operation</h4>* <i>pointer</i>  := * <i>pointer</i>  - 1<br>
<br>
Decrements the variable pointed to by  <i>pointer</i> .<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>wordVarInc</h2>
<br>

<h4>Encoding</h4>4F  <i>pointer</i><sup><font size=2>16</font></sup> <br>
<br>

<h4>Stack</h4>(- : -)<br>
<br>

<h4>Operation</h4>* <i>pointer</i>  := * <i>pointer</i>  + 1<br>
<br>
Increments the variable pointed to by  <i>pointer</i> .<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>writeByteVar</h2>
<br>

<h4>Encoding</h4>42  <i>pointer</i><sup><font size=2>8</font></sup> <br>
<br>

<h4>Stack</h4>( <i>value</i>  : -)<br>
<br>

<h4>Operation</h4>* <i>pointer</i>  :=  <i>value</i> <br>
<br>
Writes  <i>value</i>  to the variable pointed to by  <i>pointer</i> .
Note that as  <i>pointer</i>  is encoded as a byte, it can only point
to word variables in the range 0x0000 to 0x00FF. For a more general
form of this instruction, use <font color=purple>writeWordVar</font>.<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>writeWordVar</h2>
<br>

<h4>Encoding</h4>43  <i>pointer</i><sup><font size=2>16</font></sup> <br>
<br>

<h4>Stack</h4>( <i>value</i>  : -)<br>
<br>

<h4>Operation</h4>* <i>pointer</i>  :=  <i>value</i> <br>
<br>
Writes  <i>value</i>  to the variable pointed to by  <i>pointer</i> .<br>
<br>

<br><br>
<br>


</div>

<!-- -->

<div class=opcode>
<h2>zero</h2>
<br>

<h4>Encoding</h4>0D<br>
<br>

<h4>Stack</h4>( <i>value</i> &nbsp;:&nbsp; <i>bool</i> )<br>
<br>

<h4> Operation</h4>If  <i>value</i>  = 0, set  <i>bool</i>  to 1, otherwise set it to
0<br>
<br>
Tests the value on the stack to see if it compares to zero.
</div>
<hr><p style="font-size: smaller; text-align: center">
All material &copy; 2000-2002 David Given, unless where stated otherwise.
</p>

  </div>
</div>

<?php

// end of html
html_content_end();
html_page_footer();
?>
