<?

$file_root = "../..";
// load libs
require($file_root."/include/"."incl.php");
require($file_root."/docs/specs/"."sidebar_specs.php");

// start of html
html_header("SCUMM Reference Guide :: V5 opcode list");
sidebar_specs_start();

//display welcome table 
echo html_round_frame_start("V5 opcode list","98%","",20);
?>

        <p>
          <big><b>V5 opcode list</b></big><br>
          <? echo html_line(); ?>
        </p>

<p>The following conventions are used in the encoding descriptions.

<p><DL CLASS=tablelike>
<DT><tt>opcode</tt>
<DD>
The instruction's opcode, with the appropriate bits set according to the
parameters.

<DT><tt>result</tt>
<DD>
A result pointer. (A standard word pointer, always a LE word.)

<DT><tt>value[8]</tt>
<DD>
An 8-bit constant (a byte).

<DT><tt>value[16]</tt>
<dd>A 16-bit constant (a word LE).

<DT><tt>value[p8]</tt>
<DD>An 8-bit parameter. This may be encoded as a word
LE if it's a pointer, or a byte if it's a constant.

<DT><tt>value[p16]</tt>
<DD>A 16-bit parameter. This is always encoded as
a word LE.

<DT><tt>value[v16]</tt>
<DD>A variable number of word LE parameters. These are encoded as a sequence of
<tt>aux[8] param[p16]</tt>; <I>param</I>; <I>aux</I> contains the parameter bit
to describe <I>param</I>. A byte of $FF terminates the sequence.

<DT><tt>value[o]</tt>
<DD>The offset word for parameter <I>value</I>. This
is only encoded if needed, but always at the position indicated. If
not specified, the offset word occurs immediately after the parameter.

<DT><tt>(term)</tt>
<DD>An optional term.
</DL>

<!-- actorFollowCamera ---------------------------------------------------- -->

<div class=opcode>
<h2>actorFollowCamera
<h3>$52
</div>

<!-- actorFromPos --------------------------------------------------------- -->

<div class=opcode>
<h2>actorFromPos
<h3>$15
</div>

<!-- actorFollowCamera ---------------------------------------------------- -->

<div class=opcode>
<h2>actorFollowCamera
<h3>$52
</div>

<!-- actorFromPos --------------------------------------------------------- -->

<div class=opcode>
<h2>actorFromPos
<h3>$15
</div>

<!-- actorSet ------------------------------------------------------------- -->

<div class=opcode>
<h2>actorSet
<h3>$13
</div>

<!-- actorSetClass -------------------------------------------------------- -->

<div class=opcode>
<h2>actorSetClass
<h3>$5D
</div>

<!-- add ------------------------------------------------------------------ -->

<div class=opcode>
<h2>add
<h3>$5A; one parameter, uses result
<h4>Encoding</h4>
<h5>opcode result value[p16]
<h4>Operation</h4>
<p class=operation><i>result</i> := <i>result</i> + <i>value</i>
<p>
The variable pointed to by <I>result</I> is read, <I>value</I> is
added to it, and the result written back.
</div>

<!-- and ------------------------------------------------------------------ -->

<div class=opcode>
<h2>and
<h3>$17; one parameter, uses result
<h4>Encoding</h4>
<h5>opcode result value[p16]
<h4>Operation</h4>
<p class=operation><i>result</i> := <i>result</i> and <i>value</i>
<p>
The variable pointed to by <I>result</I> is read, logically ANDed with
<I>value</I>, and the result written back.
</div>

<!-- animateActor --------------------------------------------------------- -->

<div class=opcode>
<h2>animateActor
<h3>$11
</div>

<!-- arrayOp -------------------------------------------------------------- -->

<div class=opcode>
<h2>arrayOp
<h3>$27; parameters depend on auxiliary opcode
<h4>Encoding</h4>
<h5>opcode $01 array[p8]
<h5>opcode $02 dest[p8] src[p8]
<h5>opcode $03 array[p8] index[p8] data[p8]
<h5>opcode $04 result array[p8] index[p8]
<h5>opcode $05 array[p8] size[p8]
<h4>Operation</h4>
<p>Miscellaneous actions on Arrays (referred to by resource number).
<p><table class=list>
<tr><th>Opcode</th><th>Meaning</th><th>Description</th></tr>

<tr><td>$01</td>
<td>load array</td>
<td class=l>
Ensures that the Array is loaded into memory. [I don't know what this does.]
</td></tr>

<tr><td>$02</td>
<td>copy array</td>
<td class=l>
Creates a duplicate of <i>src</i> at resource number <i>dest</i>. The old Array
at <i>dest</i> is lost.
</td></tr>

<tr><td>$02</td>
<td>copy array</td>
<td class=l>
Creates a duplicate of <i>src</i> at resource number <i>dest</i>. The old Array
at <i>dest</i> is lost.
</td></tr>

<tr><td>$03</td>
<td>write entry</td>
<td class=l>
Writes the byte <i>data</i> at offset <i>index</i> of Array <i>array</i>. Out
of bounds accesses cause undefined behaviour.
</td></tr>

<tr><td>$04</td>
<td>read entry</td>
<td class=l>
Sets <i>result</i> to the byte of data at offset <i>index</i> of Array
<i>array<i>. Out of bounds accesses cause undefined behaviour.
</td></tr>

<tr><td>$05</td>
<td>create entry</td>
<td class=l>
Allocates or frees an Array. The Array <i>array</i> is initialised to size <i>size</i>; if <i>size</i> is zero, the Array is freed.
</td></tr>
</table>
</div>

<!-- breakHere ------------------------------------------------------------ -->

<div class=opcode>
<h2>breakHere
<h3>$80; no parameters
<h4>Encoding</h4>
<h5>opcode
<h4>Operation</h4>
Deschedules the currently running thread. Execution continues at the next
instruction when the thread's next timeslot comes around.
</div>

<!-- chainScript ---------------------------------------------------------- -->

<div class=opcode>
<h2>chainScript
<h3>$42; one parameter plus varargs
<h4>Encoding</h4>
<h5>opcode script[p8] args[v16]...
<h4>Operation</h4>
Replaces the currently running script with another one. The current script is
terminated immediately and the new script, resource number <I>script</I>, is
executed in the same thread. The new script has its local variables initialised
to the list <I>args</I>. Uninitialised variables have undefined values.
</div>

<!-- cursorCommand -------------------------------------------------------- -->

<div class=opcode>
<h2>cursorCommand
<h3>$2C
</div>

<!-- cutScene ------------------------------------------------------------- -->

<div class=opcode>
<h2>cutScene
<h3>$40
</div>

<!-- debug ---------------------------------------------------------------- -->

<div class=opcode>
<h2>debug
<h3>$6B; one parameter, no result
<h4>Encoding</h4>
<h5>opcode param[p16]
<h4>Operation</h4>
Passes the parameter to the interpreter's debugger. What this does is entirely
platform-specific (and may do nothing).
</div>

<!-- decrement ------------------------------------------------------------ -->

<div class=opcode>
<h2>decrement
<h3>$C6; no parameters, uses result
<h4>Encoding</h4>
<h5>opcode result
<h4>Operation</h4>
<p><i>result</i> := <i>result</i> - 1
<p>Reads the variable pointed to by <i>result</i>, decrements it, and writes it back.
</div>

<!-- delay ---------------------------------------------------------------- -->

<div class=opcode>
<h2>delay
<h3>$2E; one constant parameter
<h4>Encoding</h4>
<h5>opcode param[24]
<h4>Operation</h4>
<p>Suspends the current thread for the appropriate number of 1/60ths of a second. Yes, that really is a 24-bit LE constant.
</div>

<!-- delayVariable -------------------------------------------------------- -->

<div class=opcode>
<h2>delayVariable
<h3>$2E; one constant parameter
<h4>Encoding</h4>
<h5>opcode pointer[16]
<h4>Operation</h4>
<p><i>pointer</i> is dereferenced and the current thread suspended for that number of 1/60ths of a second. Note that <i>pointer</i> is an inline constant, not a parameter.
</div>

<!-- divide --------------------------------------------------------------- -->

<div class=opcode>
<h2>divide
<h3>$5B; one parameter, uses result
<h4>Encoding</h4>
<h5>opcode result value[p16]
<h4>Operation</h4>
<p class=operation><i>result</i> := <i>result</i> / <i>value</i>
<p>
The variable pointed to by <I>result</I> is read, divided by <I>value</I>, and
the result written back. If <i>value</i> is zero, the result is undefined (and
the interpeter may halt with an error).
</div>

<!-- doSentence ----------------------------------------------------------- -->

<div class=opcode>
<h2>doSentence
<h3>$19
</div>

<!-- drawBox -------------------------------------------------------------- -->

<div class=opcode>
<h2>drawBox
<h3>$3F; two parameters, does not use result, supplementary opcode byte with three more subsequent parameters
<h4>Encoding</h4>
<h5>opcode left[p16] top[p16] auxopcode[8] right[p16] bottom[p16] colour[p8]
<h4>Operation</h4>
<p>Draws a solid box on the backbuffer from (<i>left</i>,
<i>top</i>)-(<i>right</i>, <i>bottom</i>) in the colour <i>colour</i>.

<p>The only part of <i>auxopcode</i> that is relevant are the parameter bits.
The rest of the opcode is ignored.
</div>

<!-- drawObject ----------------------------------------------------------- -->

<div class=opcode>
<h2>drawObject
<h3>$05
</div>

<!-- dummy ---------------------------------------------------------------- -->

<div class=opcode>
<h2>dummy
<h3>$67
</div>

<!-- endCutScene ---------------------------------------------------------- -->

<div class=opcode>
<h2>endCutScene
<h3>$C0
</div>

<!-- equalZero ------------------------------------------------------------ -->

<div class=opcode>
<h2>equalZero
<h3>$28
</div>

<!-- expression ----------------------------------------------------------- -->

<div class=opcode>
<h2>expression
<h3>$AC
</div>

<!-- faceActor ------------------------------------------------------------ -->

<div class=opcode>
<h2>faceActor
<h3>$09
</div>

<!-- findInventory -------------------------------------------------------- -->

<div class=opcode>
<h2>findInventory
<h3>$3D
</div>

<!-- findObject ----------------------------------------------------------- -->

<div class=opcode>
<h2>findObject
<h3>$35
</div>

<!-- freezeScripts -------------------------------------------------------- -->

<div class=opcode>
<h2>freezeScripts
<h3>$60
</div>

<!-- getActorCostume ------------------------------------------------------ -->

<div class=opcode>
<h2>getActorCostume
<h3>$71
</div>

<!-- getActorElevation ---------------------------------------------------- -->

<div class=opcode>
<h2>getActorElevation
<h3>$06
</div>

<!-- getActorFacing ------------------------------------------------------- -->

<div class=opcode>
<h2>getActorFacing
<h3>$63
</div>

<!-- getActorMoving ------------------------------------------------------- -->

<div class=opcode>
<h2>getActorMoving
<h3>$56
</div>

<!-- getActorRoom --------------------------------------------------------- -->

<div class=opcode>
<h2>getActorRoom
<h3>$03
</div>

<!-- getActorScale -------------------------------------------------------- -->

<div class=opcode>
<h2>getActorScale
<h3>$3B
</div>

<!-- getActorWalkBox ------------------------------------------------------ -->

<div class=opcode>
<h2>getActorWalkBox
<h3>$7B
</div>

<!-- getActorWidth -------------------------------------------------------- -->

<div class=opcode>
<h2>getActorWidth
<h3>$6C
</div>

<!-- getActorX ------------------------------------------------------------ -->

<div class=opcode>
<h2>getActorX
<h3>$43
</div>

<!-- getActorY ------------------------------------------------------------ -->

<div class=opcode>
<h2>getActorY
<h3>$23
</div>

<!-- getAnimCounter ------------------------------------------------------- -->

<div class=opcode>
<h2>getAnimCounter
<h3>$22
</div>

<!-- getClosestObjActor --------------------------------------------------- -->

<div class=opcode>
<h2>getClosestObjActor
<h3>$66
</div>

<!-- getDist -------------------------------------------------------------- -->

<div class=opcode>
<h2>getDist
<h3>$34
</div>

<!-- getInventoryCount ---------------------------------------------------- -->

<div class=opcode>
<h2>getInventoryCount
<h3>$31
</div>

<!-- getObjectOwner ------------------------------------------------------- -->

<div class=opcode>
<h2>getObjectOwner
<h3>$10
</div>

<!-- getObjectState ------------------------------------------------------- -->

<div class=opcode>
<h2>getObjectState
<h3>$0F
</div>

<!-- getRandomNumber ------------------------------------------------------ -->

<div class=opcode>
<h2>getRandomNumber
<h3>$16
</div>

<!-- getScriptRunning ----------------------------------------------------- -->

<div class=opcode>
<h2>getScriptRunning
<h3>$68
</div>

<!-- getVerbEntryPoint ---------------------------------------------------- -->

<div class=opcode>
<h2>getVerbEntryPoint
<h3>$0B
</div>

<!-- ifClassOfIs ---------------------------------------------------------- -->

<div class=opcode>
<h2>ifClassOfIs
<h3>$1D
</div>

<!-- increment ------------------------------------------------------------ -->

<div class=opcode>
<h2>increment
<h3>$46; no parameters, uses result
<h4>Encoding</h4>
<h5>opcode result
<h4>Operation</h4>
<p><i>result</i> := <i>result</i> + 1
<p>Reads the variable pointed to by <i>result</i>, increments it, and writes it back.
</div>

<!-- isActorInBox --------------------------------------------------------- -->

<div class=opcode>
<h2>isActorInBox
<h3>$1F
</div>

<!-- isEqual -------------------------------------------------------------- -->

<div class=opcode>
<h2>isEqual
<h3>$48
</div>

<!-- isGreater ------------------------------------------------------------ -->

<div class=opcode>
<h2>isGreater
<h3>$78
</div>

<!-- isGreaterEqual ------------------------------------------------------- -->

<div class=opcode>
<h2>isGreaterEqual
<h3>$04
</div>

<!-- isLess --------------------------------------------------------------- -->

<div class=opcode>
<h2>isLess
<h3>$44
</div>

<!-- isNotEqual ----------------------------------------------------------- -->

<div class=opcode>
<h2>isNotEqual
<h3>$08
</div>

<!-- isSoundRunning ------------------------------------------------------- -->

<div class=opcode>
<h2>isSoundRunning
<h3>$7C
</div>

<!-- jumpRelative --------------------------------------------------------- -->

<div class=opcode>
<h2>jumpRelative
<h3>$18; non-standard encoding
<h4>Encoding</h4>
<h5>opcode target[16]
<h4>Operation</h4>
<p>PC := PC + <i>target</i>

<p>The inline constant <i>target</i> is read as a signed word and added to the
program counter after the instruction has been read. Therefore, if
<i>target</i> is zero, the instruction will do nothing; if <i>target</i> is -3,
an infinite loop will result.
</div>

<!-- lessOrEqual ---------------------------------------------------------- -->

<div class=opcode>
<h2>lessOrEqual
<h3>$38
</div>

<!-- lights --------------------------------------------------------------- -->

<div class=opcode>
<h2>lights
<h3>$70
</div>

<!-- loadRoom ------------------------------------------------------------- -->

<div class=opcode>
<h2>loadRoom
<h3>$72
</div>

<!-- loadRoomWithEgo ------------------------------------------------------ -->

<div class=opcode>
<h2>loadRoomWithEgo
<h3>$24
</div>

<!-- matrixOp ------------------------------------------------------------- -->

<div class=opcode>
<h2>matrixOp
<h3>$30
</div>

<!-- move ----------------------------------------------------------------- -->

<div class=opcode>
<h2>move
<h3>$1A
</div>

<!-- multiply ------------------------------------------------------------- -->

<div class=opcode>
<h2>multiply
<h3>$1B
</div>

<!-- notEqualZero --------------------------------------------------------- -->

<div class=opcode>
<h2>notEqualZero
<h3>$A8
</div>

<!-- or ------------------------------------------------------------------- -->

<div class=opcode>
<h2>or
<h3>$57; one parameter, uses result
<h4>Encoding</h4>
<h5>opcode result value[p16]
<h4>Operation</h4>
<p class=operation><i>result</i> := <i>result</i> and <i>value</i>
<p>
The variable pointed to by <I>result</I> is read, logically ORed with
<I>value</I>, and the result written back.
</div>

<!-- overRide ------------------------------------------------------------- -->

<div class=opcode>
<h2>overRide
<h3>$58
</div>

<!-- panCameraTo ---------------------------------------------------------- -->

<div class=opcode>
<h2>panCameraTo
<h3>$12
</div>

<!-- pickupObject --------------------------------------------------------- -->

<div class=opcode>
<h2>pickupObject
<h3>$25
</div>

<!-- print ---------------------------------------------------------------- -->

<div class=opcode>
<h2>print
<h3>$14
</div>

<!-- printEgo ------------------------------------------------------------- -->

<div class=opcode>
<h2>printEgo
<h3>$D8
</div>

<!-- pseudoRoom ----------------------------------------------------------- -->

<div class=opcode>
<h2>pseudoRoom
<h3>$CC
</div>

<!-- putActor ------------------------------------------------------------- -->

<div class=opcode>
<h2>putActor
<h3>$01
</div>

<!-- putActorAtObject ----------------------------------------------------- -->

<div class=opcode>
<h2>putActorAtObject
<h3>$0E
</div>

<!-- putActorInRoom ------------------------------------------------------- -->

<div class=opcode>
<h2>putActorInRoom
<h3>$2D
</div>

<!-- quitPauseRestart ----------------------------------------------------- -->

<div class=opcode>
<h2>quitPauseRestart
<h3>$98
</div>

<!-- resourceRoutines ----------------------------------------------------- -->

<div class=opcode>
<h2>resourceRoutines
<h3>$0C
</div>

<!-- roomOp --------------------------------------------------------------- -->

<div class=opcode>
<h2>roomOp
<h3>$33
</div>

<!-- saveRestoreVerbs ----------------------------------------------------- -->

<div class=opcode>
<h2>saveRestoreVerbs
<h3>$AB
</div>

<!-- setCameraAt ---------------------------------------------------------- -->

<div class=opcode>
<h2>setCameraAt
<h3>$32
</div>

<!-- setObjectName -------------------------------------------------------- -->

<div class=opcode>
<h2>setObjectName
<h3>$54
</div>

<!-- setOwnerOf ----------------------------------------------------------- -->

<div class=opcode>
<h2>setOwnerOf
<h3>$29
</div>

<!-- setState ------------------------------------------------------------- -->

<div class=opcode>
<h2>setState
<h3>$07
</div>

<!-- setVarRange ---------------------------------------------------------- -->

<div class=opcode>
<h2>setVarRange
<h3>$26
</div>

<!-- soundKludge ---------------------------------------------------------- -->

<div class=opcode>
<h2>soundKludge
<h3>$4C
</div>

<!-- startMusic ----------------------------------------------------------- -->

<div class=opcode>
<h2>startMusic
<h3>$02
</div>

<!-- startObject ---------------------------------------------------------- -->

<div class=opcode>
<h2>startObject
<h3>$37
</div>

<!-- startScript ---------------------------------------------------------- -->

<div class=opcode>
<h2>startScript
<h3>$0A; one parameter plus varargs, extra encoding in opcode
<h4>Encoding</h4>
<h5>opcode script[p8] args[v16]...
<h4>Operation</h4>
<p>Spawns a new thread running the code in script <i>script</i>. The new script has its local variables initialised to the list <i>args</i>. Uninitialised variables have undefined values.

<p>The opcode carries extra information:

<p><table class=bitfield>
<tr><th>7</th>
	<th>6</th>
		<th>5</th>
			<th>4</th>
				<th></th>
					<th>0</th></tr>
<tr><td><i>P1</i></td>
	<td><i>Q</i></td>
		<td><i>F</i></td>
			<td colspan=3>$0A</td></tr>
</table>

<p>If the <i>Q</i> bit is set, the new thread is marked as <i>quick</i>. If the
<i>F</i> bit is set, the thread is marked as <i>unfreezable</i>. The <i>P1</i>
bit is the parameter bit for <i>script</i>, as usual.
</div>

<!-- startSound ----------------------------------------------------------- -->

<div class=opcode>
<h2>startSound
<h3>$1C
</div>

<!-- stopMusic ------------------------------------------------------------ -->

<div class=opcode>
<h2>stopMusic
<h3>$20
</div>

<!-- stopObjectCode ------------------------------------------------------- -->

<div class=opcode>
<h2>stopObjectCode
<h3>$00
</div>

<!-- stopObjectScript ----------------------------------------------------- -->

<div class=opcode>
<h2>stopObjectScript
<h3>$6E
</div>

<!-- stopScript ----------------------------------------------------------- -->

<div class=opcode>
<h2>stopScript
<h3>$62
</div>

<!-- stopSound ------------------------------------------------------------ -->

<div class=opcode>
<h2>stopSound
<h3>$3C
</div>

<!-- subtract ------------------------------------------------------------- -->

<div class=opcode>
<h2>subtract
<h3>$3A
</div>

<!-- verbOp --------------------------------------------------------------- -->

<div class=opcode>
<h2>animateActor
<h3>$11
</div>

<!-- wait ----------------------------------------------------------------- -->

<div class=opcode>
<h2>wait
<h3>$AE
</div>

<!-- walkActorTo ---------------------------------------------------------- -->

<div class=opcode>
<h2>walkActorTo
<h3>$1E
</div>

<!-- walkActorToActor ----------------------------------------------------- -->

<div class=opcode>
<h2>walkActorToActor
<h3>$0D
</div>

<!-- walkActorToObject ---------------------------------------------------- -->

<div class=opcode>
<h2>walkActorToObject
<h3>$36
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

