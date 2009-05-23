<div class="par-item">
	<div class="par-head">V5 opcode list</div>
	<div class="par-content">
		<p>
			The following conventions are used in the encoding descriptions.
		</p>

		<dl class="tablelike">
			<dt><tt>opcode</tt></dt>
			<dd>The instruction's opcode, with the appropriate bits set according to the parameters.</dd>

			<dt><tt>result</tt></dt>
			<dd>A result pointer. (A standard word pointer, always a LE word.)</dd>

			<dt><tt>value[8]</tt></dt>
			<dd>An 8-bit constant (a byte).</dd>

			<dt><tt>value[16]</tt></dt>
			<dd>A 16-bit constant (a word LE).</dd>

			<dt><tt>value[p8]</tt></dt>
			<dd>An 8-bit parameter. This may be encoded as a word LE if it's a pointer, or a byte if it's a constant.</dd>

			<dt><tt>value[p16]</tt></dt>
			<dd>A 16-bit parameter. This is always encoded as a word LE.</dd>

			<dt><tt>value[v16]</tt></dt>
			<dd>
				A variable number of word LE parameters. These are encoded as a sequence of
				<tt>aux[8] param[p16]</tt>; <i>param</i>; <i>aux</i> contains the parameter bit
				to describe <i>param</i>. A byte of $FF terminates the sequence.
			</dd>

			<dt><tt>value[o]</tt></dt>
			<dd>
				The offset word for parameter <i>value</i>. This
				is only encoded if needed, but always at the position indicated. If
				not specified, the offset word occurs immediately after the parameter.
			</dd>

			<dt><tt>(term)</tt></dt>
			<dd>An optional term.</dd>
		</dl>

		<!-- actorFollowCamera -->
		<div class="opcode">
			<h2>actorFollowCamera</h2>
			<h3>$52</h3>
		</div>

		<!-- actorFromPos -->
		<div class="opcode">
			<h2>actorFromPos</h2>
			<h3>$15</h3>
		</div>

		<!-- actorFollowCamera -->
		<div class="opcode">
			<h2>actorFollowCamera</h2>
			<h3>$52</h3>
		</div>

		<!-- actorFromPos -->
		<div class="opcode">
			<h2>actorFromPos</h2>
			<h3>$15</h3>
		</div>

		<!-- actorSet -->
		<div class="opcode">
			<h2>actorSet</h2>
			<h3>$13</h3>
		</div>

		<!-- actorSetClass -->
		<div class="opcode">
			<h2>actorSetClass</h2>
			<h3>$5D</h3>
		</div>

		<!-- add -->
		<div class="opcode">
			<h2>add</h2>
			<h3>$5A; one parameter, uses result</h3>
			<h4>Encoding</h4>
			<h5>opcode result value[p16]</h5>
			<h4>Operation</h4>
			<p class="operation">
				<i>result</i> := <i>result</i> + <i>value</i>
			</p>
			<p>
				The variable pointed to by <i>result</i> is read, <i>value</i> is
				added to it, and the result written back.
			</p>
		</div>

		<!-- and -->
		<div class="opcode">
			<h2>and</h2>
			<h3>$17; one parameter, uses result</h3>
			<h4>Encoding</h4>
			<h5>opcode result value[p16]</h5>
			<h4>Operation</h4>
			<p class="operation">
				<i>result</i> := <i>result</i> and <i>value</i>
			</p>
			<p>
				The variable pointed to by <i>result</i> is read, logically ANDed with
				<i>value</i>, and the result written back.
			</p>
		</div>

		<!-- animateActor -->
		<div class="opcode">
			<h2>animateActor</h2>
			<h3>$11</h3>
		</div>

		<!-- arrayOp -->
		<div class="opcode">
			<h2>arrayOp</h2>
			<h3>$27; parameters depend on auxiliary opcode</h3>
			<h4>Encoding</h4>
			<h5>opcode $01 array[p8]</h5>
			<h5>opcode $02 dest[p8] src[p8]</h5>
			<h5>opcode $03 array[p8] index[p8] data[p8]</h5>
			<h5>opcode $04 result array[p8] index[p8]</h5>
			<h5>opcode $05 array[p8] size[p8]</h5>
			<h4>Operation</h4>

			<p>
				Miscellaneous actions on Arrays (referred to by resource number).
			</p>

			<table class=list>
				<tr>
					<th>Opcode</th>
					<th>Meaning</th>
					<th>Description</th>
				</tr>
				<tr>
					<td>$01</td>
					<td>load array</td>
					<td class="l">
						Ensures that the Array is loaded into memory. [I don't know what this does.]
					</td>
				</tr>
				<tr>
					<td>$02</td>
					<td>copy array</td>
					<td class="l">
						Creates a duplicate of <i>src</i> at resource number <i>dest</i>. The old Array
						at <i>dest</i> is lost.
					</td>
				</tr>
				<tr>
					<td>$02</td>
					<td>copy array</td>
					<td class="l">
						Creates a duplicate of <i>src</i> at resource number <i>dest</i>. The old Array
						at <i>dest</i> is lost.
					</td>
				</tr>
				<tr>
					<td>$03</td>
					<td>write entry</td>
					<td class="l">
						Writes the byte <i>data</i> at offset <i>index</i> of Array <i>array</i>. Out
						of bounds accesses cause undefined behaviour.
					</td>
				</tr>
				<tr>
					<td>$04</td>
					<td>read entry</td>
					<td class=l>
						Sets <i>result</i> to the byte of data at offset <i>index</i> of Array
						<i>array</i>. Out of bounds accesses cause undefined behaviour.
					</td>
				</tr>
				<tr>
					<td>$05</td>
					<td>create entry</td>
					<td class=l>
						Allocates or frees an Array. The Array <i>array</i> is initialised to
						size <i>size</i>; if <i>size</i> is zero, the Array is freed.
					</td>
				</tr>
			</table>
		</div>

		<!-- breakHere -->
		<div class="opcode">
			<h2>breakHere</h2>
			<h3>$80; no parameters</h3>
			<h4>Encoding</h4>
			<h5>opcode</h5>
			<h4>Operation</h4>
			<p>
				Deschedules the currently running thread. Execution continues at the next
				instruction when the thread's next timeslot comes around.
			</p>
		</div>

		<!-- chainScript -->
		<div class="opcode">
			<h2>chainScript</h2>
			<h3>$42; one parameter plus varargs</h3>
			<h4>Encoding</h4>
			<h5>opcode script[p8] args[v16]...</h5>
			<h4>Operation</h4>
			<p>
				Replaces the currently running script with another one. The current script is
				terminated immediately and the new script, resource number <i>script</i>, is
				executed in the same thread. The new script has its local variables initialised
				to the list <i>args</i>. Uninitialised variables have undefined values.
			</p>
		</div>

		<!-- cursorCommand -->
		<div class="opcode">
			<h2>cursorCommand</h2>
			<h3>$2C</h3>
		</div>

		<!-- cutScene -->
		<div class="opcode">
			<h2>cutScene</h2>
			<h3>$40</h3>
		</div>

		<!-- debug -->
		<div class="opcode">
			<h2>debug</h2>
			<h3>$6B; one parameter, no result</h3>
			<h4>Encoding</h4>
			<h5>opcode param[p16]</h5>
			<h4>Operation</h4>
			<p>
				Passes the parameter to the interpreter's debugger. What this does is entirely
				platform-specific (and may do nothing).
			</p>
		</div>

		<!-- decrement -->
		<div class="opcode">
			<h2>decrement</h2>
			<h3>$C6; no parameters, uses result</h3>
			<h4>Encoding</h4>
			<h5>opcode result</h5>
			<h4>Operation</h4>
			<p class="operation">
				<i>result</i> := <i>result</i> - 1
			</p>
			<p>
				Reads the variable pointed to by <i>result</i>, decrements it, and writes it back.
			</p>
		</div>

		<!-- delay -->
		<div class="opcode">
			<h2>delay</h2>
			<h3>$2E; one constant parameter</h3>
			<h4>Encoding</h4>
			<h5>opcode param[24]</h5>
			<h4>Operation</h4>
			<p>
				Suspends the current thread for the appropriate number of 1/60ths of a
				second. Yes, that really is a 24-bit LE constant.
			</p>
		</div>

		<!-- delayVariable -->
		<div class="opcode">
			<h2>delayVariable</h2>
			<h3>$2E; one constant parameter</h3>
			<h4>Encoding</h4>
			<h5>opcode pointer[16]</h5>
			<h4>Operation</h4>
			<p>
				<i>pointer</i> is dereferenced and the current thread suspended for that
				number of 1/60ths of a second. Note that <i>pointer</i> is an inline
				constant, not a parameter.
			</p>
		</div>

		<!-- divide -->
		<div class="opcode">
			<h2>divide</h2>
			<h3>$5B; one parameter, uses result</h3>
			<h4>Encoding</h4>
			<h5>opcode result value[p16]</h5>
			<h4>Operation</h4>
			<p class="operation">
				<i>result</i> := <i>result</i> / <i>value</i>
			</p>
			<p>
				The variable pointed to by <i>result</i> is read, divided by <i>value</i>, and
				the result written back. If <i>value</i> is zero, the result is undefined (and
				the interpeter may halt with an error).
			</p>
		</div>

		<!-- doSentence -->
		<div class="opcode">
			<h2>doSentence</h2>
			<h3>$19</h3>
		</div>

		<!-- drawBox -->
		<div class="opcode">
			<h2>drawBox</h2>
			<h3>$3F; two parameters, does not use result, supplementary opcode byte with three more subsequent parameters</h3>
			<h4>Encoding</h4>
			<h5>opcode left[p16] top[p16] auxopcode[8] right[p16] bottom[p16] colour[p8]</h5>
			<h4>Operation</h4>
			<p>
				Draws a solid box on the backbuffer from (<i>left</i>,
				<i>top</i>)-(<i>right</i>, <i>bottom</i>) in the colour <i>colour</i>.
			</p>
			<p>
				The only part of <i>auxopcode</i> that is relevant are the parameter bits.
				The rest of the opcode is ignored.
			</p>
		</div>

		<!-- drawObject -->
		<div class="opcode">
			<h2>drawObject</h2>
			<h3>$05</h3>
		</div>

		<!-- dummy -->
		<div class="opcode">
			<h2>dummy</h2>
			<h3>$67</h3>
		</div>

		<!-- endCutScene -->
		<div class="opcode">
			<h2>endCutScene</h2>
			<h3>$C0</h3>
		</div>

		<!-- equalZero -->
		<div class="opcode">
			<h2>equalZero</h2>
			<h3>$28</h3>
		</div>

		<!-- expression -->
		<div class="opcode">
			<h2>expression</h2>
			<h3>$AC</h3>
		</div>

		<!-- faceActor -->
		<div class="opcode">
			<h2>faceActor</h2>
			<h3>$09</h3>
		</div>

		<!-- findInventory -->
		<div class="opcode">
			<h2>findInventory</h2>
			<h3>$3D</h3>
		</div>

		<!-- findObject -->
		<div class="opcode">
			<h2>findObject</h2>
			<h3>$35</h3>
		</div>

		<!-- freezeScripts -->
		<div class="opcode">
			<h2>freezeScripts</h2>
			<h3>$60</h3>
		</div>

		<!-- getActorCostume -->
		<div class="opcode">
			<h2>getActorCostume</h2>
			<h3>$71</h3>
		</div>

		<!-- getActorElevation -->
		<div class="opcode">
			<h2>getActorElevation</h2>
			<h3>$06</h3>
		</div>

		<!-- getActorFacing -->
		<div class="opcode">
			<h2>getActorFacing</h2>
			<h3>$63</h3>
		</div>

		<!-- getActorMoving -->
		<div class="opcode">
			<h2>getActorMoving</h2>
			<h3>$56</h3>
		</div>

		<!-- getActorRoom -->
		<div class="opcode">
			<h2>getActorRoom</h2>
			<h3>$03</h3>
		</div>

		<!-- getActorScale -->
		<div class="opcode">
			<h2>getActorScale</h2>
			<h3>$3B</h3>
		</div>

		<!-- getActorWalkBox -->
		<div class="opcode">
			<h2>getActorWalkBox</h2>
			<h3>$7B</h3>
		</div>

		<!-- getActorWidth -->
		<div class="opcode">
			<h2>getActorWidth</h2>
			<h3>$6C</h3>
		</div>

		<!-- getActorX -->
		<div class="opcode">
			<h2>getActorX</h2>
			<h3>$43</h3>
		</div>

		<!-- getActorY -->
		<div class="opcode">
			<h2>getActorY</h2>
			<h3>$23</h3>
		</div>

		<!-- getAnimCounter -->
		<div class="opcode">
			<h2>getAnimCounter</h2>
			<h3>$22</h3>
		</div>

		<!-- getClosestObjActor -->
		<div class="opcode">
			<h2>getClosestObjActor</h2>
			<h3>$66</h3>
		</div>

		<!-- getDist -->
		<div class="opcode">
			<h2>getDist</h2>
			<h3>$34</h3>
		</div>

		<!-- getInventoryCount -->
		<div class="opcode">
			<h2>getInventoryCount</h2>
			<h3>$31</h3>
		</div>

		<!-- getObjectOwner -->
		<div class="opcode">
			<h2>getObjectOwner</h2>
			<h3>$10</h3>
		</div>

		<!-- getObjectState -->
		<div class="opcode">
			<h2>getObjectState</h2>
			<h3>$0F</h3>
		</div>

		<!-- getRandomNumber -->
		<div class="opcode">
			<h2>getRandomNumber</h2>
			<h3>$16</h3>
		</div>

		<!-- getScriptRunning -->
		<div class="opcode">
			<h2>getScriptRunning</h2>
			<h3>$68</h3>
		</div>

		<!-- getVerbEntryPoint -->
		<div class="opcode">
			<h2>getVerbEntryPoint</h2>
			<h3>$0B</h3>
		</div>

		<!-- ifClassOfIs -->
		<div class="opcode">
			<h2>ifClassOfIs</h2>
			<h3>$1D</h3>
		</div>

		<!-- increment -->
		<div class="opcode">
			<h2>increment</h2>
			<h3>$46; no parameters, uses result</h3>
			<h4>Encoding</h4>
			<h5>opcode result</h5>
			<h4>Operation</h4>
			<p class="operation">
				<i>result</i> := <i>result</i> + 1
			</p>
			<p>
				Reads the variable pointed to by <i>result</i>, increments it, and writes it back.
			</p>
		</div>

		<!-- isActorInBox -->
		<div class="opcode">
			<h2>isActorInBox</h2>
			<h3>$1F</h3>
		</div>

		<!-- isEqual -->
		<div class="opcode">
			<h2>isEqual</h2>
			<h3>$48</h3>
		</div>

		<!-- isGreater -->
		<div class="opcode">
			<h2>isGreater</h2>
			<h3>$78</h3>
		</div>

		<!-- isGreaterEqual -->
		<div class="opcode">
			<h2>isGreaterEqual</h2>
			<h3>$04</h3>
		</div>

		<!-- isLess -->
		<div class="opcode">
			<h2>isLess</h2>
			<h3>$44</h3>
		</div>

		<!-- isNotEqual -->
		<div class="opcode">
			<h2>isNotEqual</h2>
			<h3>$08</h3>
		</div>

		<!-- isSoundRunning -->
		<div class="opcode">
			<h2>isSoundRunning</h2>
			<h3>$7C</h3>
		</div>

		<!-- jumpRelative -->
		<div class="opcode">
			<h2>jumpRelative</h2>
			<h3>$18; non-standard encoding</h3>
			<h4>Encoding</h4>
			<h5>opcode target[16]</h5>
			<h4>Operation</h4>
			<p class="operation">
				PC := PC + <i>target</i>
			</p>
			<p>
				The inline constant <i>target</i> is read as a signed word and added to the
				program counter after the instruction has been read. Therefore, if
				<i>target</i> is zero, the instruction will do nothing; if <i>target</i> is -3,
				an infinite loop will result.
			</p>
		</div>

		<!-- lessOrEqual -->
		<div class="opcode">
			<h2>lessOrEqual</h2>
			<h3>$38</h3>
		</div>

		<!-- lights -->
		<div class="opcode">
			<h2>lights</h2>
			<h3>$70</h3>
		</div>

		<!-- loadRoom -->
		<div class="opcode">
			<h2>loadRoom</h2>
			<h3>$72</h3>
		</div>

		<!-- loadRoomWithEgo -->
		<div class="opcode">
			<h2>loadRoomWithEgo</h2>
			<h3>$24</h3>
		</div>

		<!-- matrixOp -->
		<div class="opcode">
			<h2>matrixOp</h2>
			<h3>$30</h3>
		</div>

		<!-- move -->
		<div class="opcode">
			<h2>move</h2>
			<h3>$1A</h3>
		</div>

		<!-- multiply -->
		<div class="opcode">
			<h2>multiply</h2>
			<h3>$1B</h3>
		</div>

		<!-- notEqualZero -->
		<div class="opcode">
			<h2>notEqualZero</h2>
			<h3>$A8</h3>
		</div>

		<!-- or -->
		<div class="opcode">
			<h2>or</h2>
			<h3>$57; one parameter, uses result</h3>
			<h4>Encoding</h4>
			<h5>opcode result value[p16]</h5>
			<h4>Operation</h4>
			<p class=operation>
				<i>result</i> := <i>result</i> and <i>value</i>
			</p>
			<p>
				The variable pointed to by <i>result</i> is read, logically ORed with
				<i>value</i>, and the result written back.
			</p>
		</div>

		<!-- overRide -->
		<div class="opcode">
			<h2>overRide</h2>
			<h3>$58</h3>
		</div>

		<!-- panCameraTo -->
		<div class="opcode">
			<h2>panCameraTo</h2>
			<h3>$12</h3>
		</div>

		<!-- pickupObject -->
		<div class="opcode">
			<h2>pickupObject</h2>
			<h3>$25</h3>
		</div>

		<!-- print -->
		<div class="opcode">
			<h2>print</h2>
			<h3>$14</h3>
		</div>

		<!-- printEgo -->
		<div class="opcode">
			<h2>printEgo</h2>
			<h3>$D8</h3>
		</div>

		<!-- pseudoRoom -->
		<div class="opcode">
			<h2>pseudoRoom</h2>
			<h3>$CC</h3>
		</div>

		<!-- putActor -->
		<div class="opcode">
			<h2>putActor</h2>
			<h3>$01</h3>
		</div>

		<!-- putActorAtObject -->
		<div class="opcode">
			<h2>putActorAtObject</h2>
			<h3>$0E</h3>
		</div>

		<!-- putActorInRoom -->
		<div class="opcode">
			<h2>putActorInRoom</h2>
			<h3>$2D</h3>
		</div>

		<!-- quitPauseRestart -->
		<div class="opcode">
			<h2>quitPauseRestart</h2>
			<h3>$98</h3>
		</div>

		<!-- resourceRoutines -->
		<div class="opcode">
			<h2>resourceRoutines</h2>
			<h3>$0C</h3>
		</div>

		<!-- roomOp -->
		<div class="opcode">
			<h2>roomOp</h2>
			<h3>$33</h3>
		</div>

		<!-- saveRestoreVerbs -->
		<div class="opcode">
			<h2>saveRestoreVerbs</h2>
			<h3>$AB</h3>
		</div>

		<!-- setCameraAt -->
		<div class="opcode">
			<h2>setCameraAt</h2>
			<h3>$32</h3>
		</div>

		<!-- setObjectName -->
		<div class="opcode">
			<h2>setObjectName</h2>
			<h3>$54</h3>
		</div>

		<!-- setOwnerOf -->
		<div class="opcode">
			<h2>setOwnerOf</h2>
			<h3>$29</h3>
		</div>

		<!-- setState -->
		<div class="opcode">
			<h2>setState</h2>
			<h3>$07</h3>
		</div>

		<!-- setVarRange -->
		<div class="opcode">
			<h2>setVarRange</h2>
			<h3>$26</h3>
		</div>

		<!-- soundKludge -->
		<div class="opcode">
			<h2>soundKludge</h2>
			<h3>$4C</h3>
		</div>

		<!-- startMusic -->
		<div class="opcode">
			<h2>startMusic</h2>
			<h3>$02</h3>
		</div>

		<!-- startObject -->
		<div class="opcode">
			<h2>startObject</h2>
			<h3>$37</h3>
		</div>

		<!-- startScript -->
		<div class="opcode">
			<h2>startScript</h2>
			<h3>$0A; one parameter plus varargs, extra encoding in opcode</h3>
			<h4>Encoding</h4>
			<h5>opcode script[p8] args[v16]...</h5>
			<h4>Operation</h4>
			<p>
				Spawns a new thread running the code in script <i>script</i>. The new
				script has its local variables initialised to the list <i>args</i>.
				Uninitialised variables have undefined values.
			</p>
			<p>
				The opcode carries extra information:
			</p>

			<table class="bitfield">
				<tr>
					<th>7</th>
					<th>6</th>
					<th>5</th>
					<th>4</th>
					<th></th>
					<th>0</th>
				</tr>
				<tr>
					<td><i>P1</i></td>
					<td><i>Q</i></td>
					<td><i>F</i></td>
					<td colspan="3">$0A</td>
				</tr>
			</table>

			<p>
				If the <i>Q</i> bit is set, the new thread is marked as <i>quick</i>. If the
				<i>F</i> bit is set, the thread is marked as <i>unfreezable</i>. The <i>P1</i>
				bit is the parameter bit for <i>script</i>, as usual.
			</p>
		</div>

		<!-- startSound -->
		<div class="opcode">
			<h2>startSound</h2>
			<h3>$1C</h3>
		</div>

		<!-- stopMusic -->
		<div class="opcode">
			<h2>stopMusic</h2>
			<h3>$20</h3>
		</div>

		<!-- stopObjectCode -->
		<div class="opcode">
			<h2>stopObjectCode</h2>
			<h3>$00</h3>
		</div>

		<!-- stopObjectScript -->
		<div class="opcode">
			<h2>stopObjectScript</h2>
			<h3>$6E</h3>
		</div>

		<!-- stopScript -->
		<div class="opcode">
			<h2>stopScript</h2>
			<h3>$62</h3>
		</div>

		<!-- stopSound -->
		<div class="opcode">
			<h2>stopSound</h2>
			<h3>$3C</h3>
		</div>

		<!-- subtract -->
		<div class="opcode">
			<h2>subtract</h2>
			<h3>$3A</h3>
		</div>

		<!-- verbOp -->
		<div class="opcode">
			<h2>animateActor</h2>
			<h3>$11</h3>
		</div>

		<!-- wait -->
		<div class="opcode">
			<h2>wait</h2>
			<h3>$AE</h3>
		</div>

		<!-- walkActorTo -->
		<div class="opcode">
			<h2>walkActorTo</h2>
			<h3>$1E</h3>
		</div>

		<!-- walkActorToActor -->
		<div class="opcode">
			<h2>walkActorToActor</h2>
			<h3>$0D</h3>
		</div>

		<!-- walkActorToObject -->
		<div class="opcode">
			<h2>walkActorToObject</h2>
			<h3>$36</h3>
		</div>

		<hr>
		<p style="font-size: smaller; text-align: center">
			All material &copy; 2000-2002 David Given, unless where stated otherwise.
		</p>
	</div>
</div>
