<div class="par-item">
	<div class="par-head">V6 opcode list</div>
	<div class="par-content">
		<p>
			The following conventions are used in the encoding descriptions:
		</p>

		<dl>
			<dt><tt>$AB</tt></dt>
			<dd>The constant hexadecimal byte 0xAB.</dd>

			<dt><tt>value[8]</tt></dt>
			<dd>A constant byte value.</dd>

			<dt><tt>value[16]</tt></dt>
			<dd>A constant word LE value.</dd>
		</dl>

		<p>
			The following conventions are used in the stack descriptions:
		</p>

		<dl>
			<dt>(<i>in1</i>, <i>in2</i>, <i>in3</i> : <i>out1</i>, <i>out2</i>)</dt>
			<dd>
				Indicates that the opcode is called with three items on the stack (the most
				recently pushed being <i>in3</i>) and replaces them with two items
				on the stack (the most recently pushed being <i>out2</i>).
			</dd>
		</dl>

		<!-- -->
		<div class="opcode">
			<h2>abs</h2>
			<h3>$C4</h3>
			<h4>Stack</h4>
			(<i>in</i> : <i>out</i>)
			<h4>Operation</h4>
			<i>out</i> := abs(<i>in</i>)
			<p>
				The absolute value of the top-most item on the stack is calculated.
				(The absolute value being the value with the sign bit stripped off.)
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>actorFollowCamera</h2>
			<h3>$79</h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>actorSet</h2>
			<h3>$9D</h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>add</h2>
			<h3>$14</h3>
			<h4>Stack</h4>
			<p>
				(<i>in1</i>, <i>in2</i> : <i>out</i>)
			</p>
			<h4>Operation</h4>
			<p>
				<i>out</i> := <i>in1</i> + <i>in2</i>
			</p>
			<p>
				Performs a division operation on the stack.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>animateActor</h2>
			<h3>$82</h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>arrayOps</h2>
			<p>
				This instruction varies considerably according to the form.
			</p>

			<h4>Encoding</h4>
			<dl compact="compact">

				<dt>load&nbsp;array:</dt>
				<dd>A4 CD  <i>arrayp</i><sup><font size="2">16</font></sup></dd>

				<dt>define&nbsp;array:</dt>
				<dd>A4 D0  <i>arrayp</i><sup><font size="2">16</font></sup>   <i>data</i>...</dd>

				<dt>set&nbsp;array:</dt>
				<dd>A4 D4  <i>arrayp</i><sup><font size="2">16</font></sup></dd>
			</dl>

			<h4>Stack</h4>
			<dl compact="compact">
				<dt>...todo...</dt>
				<dd>&nbsp;</dd>
			</dl>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>6.4.7&nbsp;&nbsp; MM 95 beginOverride</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 6C breakHere</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM CA breakMaybe</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 5A byteArrayDec</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 52 byteArrayInc</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>byteArrayIndexedRead</h2>
			<h4>Encoding</h4>
			<p>
				0A  <i>arrayp</i><sup><font size="2">8</font></sup>
			</p>

			<h4>Stack</h4>
			<p>
				( <i>index</i><sub><font size="2"><i>x</i></font></sub> ,  <i>index</i><sub><font size="2"><i>y</i></font></sub>  :  <i>value</i> )
			</p>

			<h4>Operation</h4>
			<p>
				<i>value</i>  :=  <i>arrayp</i> [ <i>index</i><sub><font size="2"><i>x</i></font></sub> ,&nbsp; <i>index</i><sub><font size="2"><i>y</i></font></sub> ]
			</p>
			<p>
				Reads the value at offset ( <i>index</i><sub><font size="2"><i>x</i></font></sub> ,  <i>index</i><sub><font size="2"><i>y</i></font></sub> ) from
				the array whose resource number is pointed to by  <i>arrayp</i> . The
				array can be a byte or word array; byte values are not sign extended.
				Note that because  <i>arrayp</i>  is encoded as a byte, it can only
				point to a word variable in the range 0000 to 00FF. Use <font color="purple">wordArrayIndexedRead</font>
				for a more general form.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>byteArrayIndexedWrite</h2>
			<h4>Encoding</h4>
			<p>
				4A  <i>arrayp</i><sup><font size="2">8</font></sup>
			</p>
			<h4>Stack</h4>
			<p>
				( <i>index</i><sub><font size="2"><i>x</i></font></sub> ,  <i>index</i><sub><font size="2"><i>y</i></font></sub> ,  <i>value</i>  : -)
			</p>

			<h4>Operation</h4>
			<p>
				<i>arrayp</i> [ <i>index</i><sub><font size="2"><i>x</i></font></sub> ,&nbsp; <i>index</i><sub><font size="2"><i>y</i></font></sub> ] :=  <i>value</i>
			</p>

			<p>
				Writes  <i>value</i>  to the array whose resource number is pointed
				to by  <i>arrayp</i>  at offset ( <i>index</i><sub><font size="2"><i>x</i></font></sub> ,  <i>index</i><sub><font size="2"><i>y</i></font></sub> ).
				The array can be a byte or word array; byte when writing to a byte
				array,  <i>value</i>  is truncated. Note that because  <i>arrayp</i>
				is encoded as a byte, it can only point to a word variable in the
				range 0000 to 00FF. Use <font color="purple">wordArrayIndexedWrite</font> for a more
				general form.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>byteArrayRead</h2>
			<h4>Encoding</h4>
			<p>
				06  <i>arrayp</i><sup><font size="2">8</font></sup>
			</p>

			<h4>Stack</h4>
			<p>
				( <i>index</i>  :  <i>value</i> )
			</p>

			<h4>Operation</h4>
			<p>
				<i>value</i>  :=  <i>arrayp</i> [0,&nbsp; <i>index</i> ]
			</p>
			<p>
				Reads the value at position (0,&nbsp; <i>index</i> ) from the array whose
				resource number is pointed to by  <i>arrayp</i> . The array can be a
				byte or word array; when writing to an array, byte values are not
				sign extended. Note that because  <i>arrayp</i>  is encoded as a byte,
				it can only point to a word variable in the range 0000 to 00FF. Use
				<font color="purple">wordArrayRead</font> for a more general form.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>byteArrayWrite</h2>
			<h4>Encoding</h4>
			<p>
				46  <i>arrayp</i><sup><font size="2">8</font></sup>
			</p>

			<h4>Stack</h4>
			<p>
				( <i>index</i>   <i>value</i>  : -)
			</p>

			<h4>Operation</h4>
			<p>
				<i>arrayp</i> [0,&nbsp; <i>index</i> ] :=  <i>value</i>
			</p>
			<p>
				Writes  <i>value</i>  to the array whose resource number is pointed
				to by  <i>arrayp</i>  at offset (0,&nbsp; <i>index</i> ). The array can be
				a byte or word array; when writing to a byte array,  <i>value</i>  is
				truncated. Note that because  <i>arrayp</i>  is encoded as a byte, it
				can only point to a word variable in the range 0000 to 00FF.
				Use <font color="purple">wordArrayWrite</font> for a more general form.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 56 byteVarDec</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 4E byteVarInc</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 9A createBoxMatrix</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 6B cursorCommand</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 68 cutScene</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>delay</h2>
			<h4>Encoding</h4>
			<p>
				B0
			</p>
			<h4>Stack</h4>
			<p>
				( <i>delay</i>  : -)
			</p>

			<h4>Operation</h4>
			<p>
				Prevents the current thread from being rescheduled until  <i>delay</i>
				ticks have passed. Deschedules immediately.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>delayLonger</h2>
			<h4>Encoding</h4>
			<p>
				B1
			</p>
			<h4>Stack</h4>
			<p>
				( <i>delay</i>  : -)
			</p>
			<h4>Operation</h4>
			<p>
				Prevents the current thread from being rescheduled until  <i>delay</i>× 60
				ticks have passed ( <i>delay</i>  seconds). Deschedules immediately.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>delayVeryLong</h2>
			<h4>Encoding</h4>
			<p>
				B2
			</p>
			<h4>Stack</h4>
			<p>
				( <i>delay</i>  : -)
			</p>
			<h4>Operation</h4>
			<p>
				Prevents the current thread from being rescheduled until  <i>delay</i>× 3600
				ticks have passed ( <i>delay</i>  minutes). Deschedules immediately.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>dim</h2>
			<h4>Encoding</h4>
			<p>
				BC  <i>type</i><sup><font size="2">8</font></sup>
				<i>arrayp</i><sup><font size="2">16</font></sup>
			</p>

			<h4>Stack</h4>
			<p>
				( <i>max</i>  : -)
			</p>

			<h4>Operation</h4>
			<p>
				Allocates or frees an array.
			</p>
			<p>
				If  <i>type</i>  is CC, then the array whose resource number is pointed
				to by  <i>arrayp</i>  is freed. Otherwise, a new one-dimensional array
				with a maximum index of  <i>max</i>  (i.e.,  <i>max</i>  is one less than
				the size) is allocated and the resource number written to  <i>arrayp</i> .
			</p>
			<p>
				When allocating an array, if  <i>type</i>  is C7 then the array will
				contain words; if it is CB, then it will contain bytes. All other
				values are undefined. [Currently they all produce a byte array.
				What are they?]
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>dim2</h2>
			<h4>Encoding</h4>
			<p>
				C0  <i>type</i><sup><font size="2">8</font></sup>
				<i>arrayp</i><sup><font size="2">16</font></sup>
			</p>
			<br>

			<h4>Stack</h4>
			<p>
				( <i>maxx</i> ,  <i>maxy</i>  : -)
			</p>

			<h4>Operation</h4>
			<p>
				Allocates an array.
			</p>
			<p>
				A new two-dimensional array is allocated and the resource number is
				written to  <i>arrayp</i> . The new array will have a maximum X index
				of  <i>maxx</i>  and a maximum Y index of  <i>maxy</i>  (i.e.,  <i>maxy</i>
				is one less than the size).
			</p>
			<p>
				When allocating an array, if  <i>type</i>  is C7 then the array will
				contain words; if it is CB, then it will contain bytes. All other
				values are undefined. [Currently they all produce a byte array.
				What are they?]
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM C5 distObjectObject</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM C6 distObjectPt</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM C7 distPtPt</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>div</h2>
			<h4>Encoding</h4>
			<p>
				17
			</p>
			<h4>Stack</h4>
			<p>
				( <i>in</i><sub><font size="2">1</font></sub> ,
				<i>in</i><sub><font size="2">2</font></sub>  :  <i>out</i> )
			</p>

			<h4> Operation</h4>
			<p>
				<i>out</i>  :=  <i>in</i><sub><font size="2">1</font></sub>  /
				<i>in</i><sub><font size="2">2</font></sub>
			</p>
			<p>
				Performs a division operation on the stack. Note the order.
			</p>
			<p>
				An attempt to divide by zero will cause undefined behaviour, and may
				cause the interpreter to crash.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 83 doSentence</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>drawBox</h2>
			<h4>Encoding</h4>
			<p>
				A6
			</p>

			<h4>Stack</h4>
			<p>
				( <i>left</i> ,  <i>top</i> ,  <i>right</i> ,  <i>bottom</i> ,  <i>colour</i> : -)
			</p>

			<h4>Operation</h4>
			<p>
				Draws a solid box on the backbuffer from ( <i>left</i> ,  <i>top</i> )
				to ( <i>right</i> ,  <i>bottom</i> ) in the colour  <i>colour</i>
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>dup</h2>
			<h4>Encoding</h4>
			<p>
				0C
			</p>
			<h4>Stack</h4>
			<p>
				( <i>value</i> &nbsp;:&nbsp; <i>value</i> ,&nbsp; <i>value</i> )
			</p>
			<h4> Operation</h4>
			<p>
				Duplicates the top-most item on the stack.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 67 endCutScene</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 96 endOverride</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>eq</h2>
			<h4>Encoding</h4>
			<p>
				0E
			</p>
			<h4>Stack</h4>
			<p>
				( <i>value</i><sub><font size="2">1</font></sub> ,&nbsp;
				<i>value</i><sub><font size="2">2</font></sub> &nbsp;:&nbsp; <i>bool</i> )
			</p>
			<h4>Operation</h4>
			<p>
				If  <i>value</i><sub><font size="2">1</font></sub>=<i>value</i>
				<sub><font size="2">2</font></sub> , set  <i>bool</i>  to 1, otherwise set
				it to 0
			</p>
			<p>
				Tests the top two values on the stack to see if they are equal.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 81 faceActor</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 92 findInventory</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM A0 findObject</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>freezeUnfreeze</h2>
			<h4>Encoding</h4>
			<p>
				6A
			</p>
			<h4>Stack</h4>
			<p>
				( <i>bool</i> &nbsp;:&nbsp;-)
			</p>
			<h4> Operation</h4>
				<dl compact="compact">
				<dt><i>bool</i>=0 :</dt>
				<dd>Thaw all currently frozen threads.</dd>

				<dt> 0&lt;<i>bool</i>&lt;$80 :</dt>
				<dd>Freeze all threads that are not marked as unfreezable.</dd>

				<dt> <i>bool</i><font face="symbol">³</font> $80 :</dt>
				<dd>Freeze all threads, even those that are marked as unfreezable.</dd>
			</dl>
			<p>
				Freezing is a nestable operation; a thread which is frozen twice must
				be thawed twice before it becomes runnable again.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>ge</h2>
			<h4>Encoding</h4>
			<p>
				13
			</p>
			<h4>Stack</h4>
			<p>
				( <i>value</i><sub><font size="2">1</font></sub>&nbsp; <i>value</i>
				<sub><font size="2">2</font></sub>&nbsp; :&nbsp; <i>bool</i>)
			</p>
			<h4> Operation</h4>
			<p>
				If  <i>value</i><sub><font size="2">1</font></sub><font face="symbol">³</font>
				<i>value</i><sub><font size="2">2</font></sub> , set  <i>bool</i>  to 1, otherwise
				set it to 0.
			</p>
			<p>
				Compares the top two values on the stack. Note the order.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM AB getActorAnimCounter1</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 91 getActorCostume</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM A2 getActorElevation</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 9F getActorFromXY</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 8A getActorMoving</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 8C getActorRoom</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM AA getActorScaleX</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 90 getActorWalkBox</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM A8 getActorWidth</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 93 getInventoryCount</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 8F getObjectDir</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 8D getObjectX</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 8E getObjectY</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 72 getOwner</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>getRandomNumber</h2>
			<h4>Encoding</h4>
			<p>
				87
			</p>
			<h4>Stack</h4>
			<p>
				( <i>max</i> &nbsp;:&nbsp; <i>result</i> )
			</p>
			<h4>Operation</h4>
			<p>
				A random number in the range  0  to  <i>max</i>  inclusive is calculated,
				and the result pushed onto the stack. The result is also written to
				the <font color="purple">RandomNumber</font> word variable
				(see <a href="#System Variables">6.5</a>).
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>getRandomNumberRange</h2>
			<h4>Encoding</h4>
			<p>
				88
			</p>
			<h4>Stack</h4>
			<p>
				( <i>min</i> ,&nbsp; <i>max</i> ,&nbsp;:&nbsp; <i>result</i> )
			</p>
			<h4>Operation</h4>
			<p>
				A random number in the range  <i>min</i>  to  <i>max</i>  inclusive is
				calculated, and the result pushed onto the stack. The result is also
				written to the <font color="purple">RandomNumber</font> word variable
				(see <a href="#System Variables">6.5</a>).
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 8B getScriptRunning</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 6F getState</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM A3 getVerbEntryPoint</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 94 getVerbFromXY</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>gt</h2>
			<h4>Encoding</h4>
			<p>
				10
			</p>
			<h4>Stack</h4>
			<p>
				( <i>value</i><sub><font size=2"">1</font></sub> ,&nbsp; <i>value</i>
				<sub><font size="2">2</font></sub> &nbsp;:&nbsp; <i>bool</i> )
			</p>
			<h4> Operation</h4>
			<p>
				If  <i>value</i><sub><font size="2">1</font></sub>  &gt;  <i>value</i>
				<sub><font size="2">2</font></sub> , set  <i>bool</i>  to 1, otherwise
				set it to 0.
			</p>
			<p>
				Compares the top two values on the stack. Note the order.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 6D ifClassOfIs</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM AF isActorInBox</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>isAnyOf</h2>
			<h4>Encoding</h4>
			<p>
				AD
			</p>
			<h4>Stack</h4>
			<p>
				( <i>arg</i><sub><font size=2"">1</font></sub> ,&nbsp; <i>arg</i>
				<sub><font size="2">2</font></sub> ,&nbsp; <i>arg</i>
				<sub><font size="2">3</font></sub> ,&nbsp;...,&nbsp; <i>arg</i>
				<sub><font size="2"><i>n</i></font></sub> ,&nbsp; <i>n</i> ,&nbsp; <i>value</i>
				&nbsp;:&nbsp; <i>bool</i> )
			</p>
			<h4> Operation</h4>
			<p>
				If  <i>value</i>  is any of  <i>arg</i><sub><font size="2">1</font></sub> .. <i>arg</i>
				<sub><font size="2"><i>n</i></font></sub> ,  <i>bool</i>
				:= 1, otherwise  <i>bool</i>  := 0<br>
			</p>
			<p>
				Tests to see if  <i>value</i>  is equal to any of the passed in arguments.
				If  <i>n</i>  is less than the number of entries on the stack, undefined
				behaviour will result.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 98 isSoundRunning</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 73 jump</h2>
			<h4>Encoding</h4>
			<p>
				73  <i>offset</i><sup><font size="2">16</font></sup>
			</p>
			<h4>Stack</h4>
			<p>
				(-&nbsp;:&nbsp;-)
			</p>
			<h4> Operation</h4>
			<p>
				pc := pc +  <i>offset</i>
			</p>
			<p>
				<i>offset</i>  is added to the current program counter after the instruction
				has been decoded.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>jumpFalse</h2>
			<h4>Encoding</h4>
			<p>
				5D  <i>offset</i><sup><font size="2">16</font></sup>
			</p>
			<h4>Stack</h4>
			<p>
				( <i>bool</i> &nbsp;:&nbsp;-)
			</p>
			<h4> Operation</h4>
			<p>
				if  <i>bool</i>  = 0, pc := pc +  <i>offset</i>
			</p>
			<p>
				Pops the top value off the stack. If zero, then  <i>offset</i>  is added
				to the current program counter after the instruction has been decoded.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>jumpTrue</h2>
			<h4>Encoding</h4>
			<p>
				5C  <i>offset</i><sup><font size="2">16</font></sup>
			</p>
			<h4>Stack</h4>
			<p>
				( <i>bool</i> &nbsp;:&nbsp;-)
			</p>
			<h4> Operation</h4>
			<p>
				if  <i>bool</i>  <font face="symbol"> </font> 0, pc := pc +  <i>offset</i> <br>
			</p>
			<p>
				Pops the top value off the stack. If non-zero, then  <i>offset</i>
				is added to the current program counter after the instruction has
				been decoded.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>kill</h2>
			<h4>Encoding</h4>
			<p>
				1A
			</p>
			<h4>Stack</h4>
			<p>
				( <i>value</i> &nbsp;:&nbsp;-)
			</p>
			<h4>Operation</h4>
			<p>
				Pops the top value off the stack and discards it.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>land</h2>
			<h4>Encoding</h4>
			<p>
				18
			</p>
			<h4>Stack</h4>
			<p>
				( <i>in</i><sub><font size="2">1</font></sub>&nbsp; <i>in</i>
				<sub><font size="2">2</font></sub>&nbsp; :&nbsp; <i>out</i>)
			</p>
			<h4>Operation</h4>
			<p>
				<i>out</i>:=<i>in</i><sub><font size="2">1</font></sub>&nbsp; &amp;&amp;&nbsp;
				<i>in</i><sub><font size="2">2</font></sub>
			</p>
			<p>
				Performs a logical <font color="purple">and</font> operation on the stack (not a bitwise
				<font color="purple">and</font>). Note the order.
			</p>
			<p>
				The boolean values are as in C, with 0 for <font color="purple">false</font> and non-zero
				for <font color="purple">true</font>.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>le</h2>
			<h4>Encoding</h4>
			<p>
				12
			</p>
			<h4>Stack</h4>
			<p>
				( <i>value</i><sub><font size="2">1</font></sub>&nbsp; <i>value</i>
				<sub><font size="2">2</font></sub>&nbsp; :&nbsp; <i>bool</i>)
			</p>
			<h4> Operation</h4>
			<p>
				If  <i>value</i><sub><font size="2">1</font></sub>
				<font face="symbol">£</font> <i>value</i><sub><font size="2">2</font></sub> ,
				set  <i>bool</i>  to 1, otherwiseset it to 0.
			</p>
			<p>
				Compares the top two values on the stack. Note the order.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 7B loadRoom</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 85 loadRoomWithEgo</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>lor</h2>
			<h4>Encoding</h4>
			<p>
				19
			</p>
			<h4>Stack</h4>
			<p>
				( <i>in</i><sub><font size="2">1</font></sub>&nbsp; <i>in</i>
				<sub><font size="2">2</font></sub>&nbsp; :&nbsp; <i>out</i>)
			</p>
			<h4>Operation</h4>
			<p>
				<i>out</i>:=<i>in</i><sub><font size="2">1</font></sub>&nbsp; ||&nbsp;
				<i>in</i><sub><font size="2">2</font></sub>
			</p>
			<p>
				Performs a logical <font color="purple">or</font> operation on the stack (not a bitwise
				<font color="purple">or</font>). Note the order.
			</p>
			<p>
				The boolean values are as in C, with 0 for <font color="purple">false</font> and non-zero
				for <font color="purple">true</font>.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>lt</h2>
			<h4>Encoding</h4>
			<p>
				11
			</p>
			<h4>Stack</h4>
			<p>
				( <i>value</i><sub><font size="2">1</font></sub>&nbsp; <i>value</i>
				<sub><font size="2">2</font></sub>&nbsp; :&nbsp; <i>bool</i>)
			</p>
			<h4>Operation</h4>
			<p>
				If  <i>value</i><sub><font size="2">1</font></sub>&lt;<i>value</i>
				<sub><font size="2">2</font></sub> , set  <i>bool</i>  to 1,
				otherwise set it to 0.
			</p>
			<p>
				Compares the top two values on the stack. Note the order.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM C9 miscOps</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>mul</h2>
			<h4>Encoding</h4>
			<p>
				16
			</p>
			<h4>Stack</h4>
			<p>
				( <i>in</i><sub><font size="2">1</font></sub>&nbsp; <i>in</i>
				<sub><font size="2">2</font></sub>&nbsp; :&nbsp; <i>out</i>)
			</p>
			<h4>Operation</h4>
			<p>
				<i>out</i>:=<i>in</i><sub><font size="2">1</font></sub>× <i>in</i>
				<sub><font size="2">2</font></sub>
			</p>
			<p>
				Performs a multiplication operation on the stack. Note the order.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>neq</h2>
			<h4>Encoding</h4>
			<p>
				0F
			</p>
			<h4>Stack</h4>
			<p>
				( <i>value</i><sub><font size="2">1</font></sub> ,  <i>value</i>
				<sub><font size="2">2</font></sub>  :  <i>bool</i> )
			</p>
			<h4>Operation</h4>
			<p>
				If  <i>value</i><sub><font size="2">1</font></sub>
				<font face="symbol"> </font>   <i>value</i><sub><font size="2">2</font></sub> ,
				set  <i>bool</i> to 1, otherwise set it to 0.
			</p>
			<p>
				Tests the top two values on the stack to see if they are not equal.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 78 panCameraTo</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>pickOneOf</h2>
			<h4>Encoding</h4>
			<p>
				CB
			</p>
			<h4>Stack</h4>
			<p>
				( <i>index</i> ,&nbsp; <i>arg</i><sub><font size="2">0</font></sub> ,&nbsp;
				<i>arg</i><sub><font size="2">1</font></sub> ,&nbsp; <i>arg</i>
				<sub><font size="2">2</font></sub> ,&nbsp;...,&nbsp; <i>arg</i>
				<sub><font size="2"><i>n</i></font></sub> ,&nbsp; <i>n</i> &nbsp;:&nbsp; <i>value</i> )
			</p>
			<h4>Operation</h4>
			<p>
				<i>value</i>  :=  <i>arg</i><sub><font size="2">[<i>index</i>]</font></sub>
			</p>
			<p>
				Returns the  <i>index</i> th argument on the stack. If  <i>n</i>  is less
				than the number of entries on the stack or  <i>index</i>  is out of
				range, undefined behaviour will result, usually involving the interpreter
				shutting down.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>pickOneOfDefault</h2>
			<h4>Encoding</h4>
			<p>
				CC
			</p>
			<h4>Stack</h4>
			<p>
				( <i>index</i> ,&nbsp; <i>arg</i><sub><font size="2">0</font></sub> ,
				&nbsp; <i>arg</i><sub><font size="2">1</font></sub> ,&nbsp; <i>arg</i>
				<sub><font size="2">2</font></sub> ,&nbsp;...,&nbsp; <i>arg</i>
				<sub><font size="2"><i>n</i></font></sub> ,&nbsp; <i>n</i> ,&nbsp;
				<i>default</i> &nbsp;:&nbsp; <i>value</i> )
			</p>
			<h4>Operation</h4>
			<p>
				If  <i>index</i>  is in the range 0.. <i>n</i> ,  <i>value</i> &nbsp;:=&nbsp;
				<i>arg</i><sub><font size="2">[<i>index</i>]</font></sub> ;
				otherwise  <i>value</i> &nbsp;:=&nbsp; <i>default</i> .
			</p>
			<p>
				Returns the  <i>index</i> th argument on the stack. If  <i>index</i>
				is out of range,  <i>default</i>  is returned instead. If  <i>n</i>  is
				less than the number of entries on the stack, undefined behaviour
				will result, usually involving the interpreter shutting down.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 84 pickupObject</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM B8 printActor</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM B9 printEgo</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM B4 print0</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM B5 print1</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM B6 print2</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM B7 print3</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM A1 pseudoRoom</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>pushByte</h2>
			<h4>Encoding</h4>
			<p>
				00  <i>value</i><sup><font size="2">8</font></sup>
			</p>
			<h4>Stack</h4>
			<p>
				(- :  <i>value</i> )
			</p>
			<h4>Operation</h4>
			<p>
				Pushes  <i>value</i>  onto the stack. It is not sign extended.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>pushByteVar</h2>
			<h4>Encoding</h4>
			<p>
				02  <i>pointer</i><sup><font size="2">8</font></sup>
			</p>
			<h4>Stack</h4>
			<p>
				(- :  <i>value</i> )
			</p>
			<h4>Operation</h4>
			<p>
				Dereferences  <i>pointer</i>  and pushes the result onto the stack.
				Note that because  <i>pointer</i>  is encoded as a byte, it can only
				point to a word variable in the range 0000-00FF. Use <font color="purple">pushWordVar</font>
				for a more general version of this instruction.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>pushWord</h2>
			<h4>Encoding</h4>
			<p>
				01  <i>value</i><sup><font size="2">16</font></sup>
			</p>
			<h4>Stack</h4>
			<p>
				(- :  <i>value</i> )
			</p>
			<h4>Operation</h4>
			<p>
				Pushes  <i>value</i>  onto the stack.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>pushWordVar</h2>
			<h4>Encoding</h4>
			<p>
				03  <i>pointer</i><sup><font size="2">16</font></sup>
			</p>
			<h4>Stack</h4>
			<p>
				(- :  <i>value</i> )
			</p>
			<h4>Operation</h4>
			<p>
				Dereferences  <i>pointer</i>  and pushes the result onto the stack.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 80 putActorAtObject</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 7F putActorInRoom</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>quitPauseRestart</h2>
			<p>
				This instruction varies according to the form.
			</p>
			<h4>Encoding</h4>
			<dl compact="compact">
				<dt>pause:</dt>
				<dd>AE 9E</dd>

				<dt>quit:</dt>
				<dd>AE A0</dd>
			</dl>
			<h4>Stack</h4>
			<p>
				(-&nbsp;:&nbsp;-) (both forms)
			</p>
			<h4>Operation</h4>
			<p>
				Pauses and quits the game. [Details, details!]
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 9B resourceRoutines</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 9C roomOps</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM BF runScriptQuick</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM BE runVerbCodeQuick</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM A5 saveRestoreVerbs</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 99 setBoxFlags</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 7A setCameraAt</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 6E setClass</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 97 setObjectName</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 61 setObjectState</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 62 setObjectXY</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 71 setOwner</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 70 setState</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM AC soundKludge</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 76 startMusic</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 60 startObject</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>startScript</h2>
			<h4>Encoding</h4>
			<p>
				5F
			</p>
			<h4>Stack</h4>
			<p>
				( <i>script</i> ,&nbsp; <i>arg</i><sub><font size="2">0</font></sub> ,&nbsp;
				<i>arg</i><sub><font size="2">1</font></sub> ,&nbsp; <i>arg</i>
				<sub><font size="2">2</font></sub> ,&nbsp;...,&nbsp; <i>arg</i>
				<sub><font size="2"><i>n</i></font></sub> ,&nbsp; <i>n</i> &nbsp;:&nbsp;-)
			</p>
			<h4>Operation</h4>
			<p>
				A new thread is started, running the code in the script whose resource
				number is  <i>script</i> .  <i>arg</i><sub><font size="2">0</font></sub> ..
				<i>arg</i><sub><font size="2"><i>n</i></font></sub>  form the thread's
				initial local variables; unspecified variables are not initialised
				to any specific value.
			</p>
			<p>
				The new thread starts executing immediately and the current thread
				is put into the PENDING state until the new thread is descheduled.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 5E startScriptEx</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 74 startSound</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 69 stopMusic</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 65 stopObjectCode</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 66 stopObjectCode</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 77 stopObjectScript</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 7C stopScript</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM B3 stopSentence</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 75 stopSound</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>sub</h2>
			<h4>Encoding</h4>
			<p>
				15
			</p>
			<h4>Stack</h4>
			<p>
				( <i>in</i><sub><font size="2">1</font></sub>&nbsp; <i>in</i>
				<sub><font size="2">2</font></sub>:&nbsp; <i>out</i>)
			</p>
			<h4> Operation</h4>
			<p>
				<i>out</i>:=<i>in</i><sub><font size="2">1</font></sub>-<i>in</i>
				<sub><font size="2">2</font></sub>
			</p>
			<p>
				The top two items on the stack are popped off, the first subtracted
				from the second, and the result pushed back on the stack. Note the
				order.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM BA talkActor</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM BB talkEgo</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 9E verbOps</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM A9 wait</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 7E walkActorTo</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>MM 7D walkActorToObj</h2>
			<h3></h3>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>wordArrayDec</h2>
			<h4>Encoding</h4>
			<p>
				5B  <i>arrayp</i><sup><font size="2">16</font></sup>
			</p>
			<h4>Stack</h4>
			<p>
				( <i>index</i> &nbsp;:&nbsp;-)
			</p>
			<h4>Operation</h4>
			<p>
				<i>arrayp</i> [0,&nbsp; <i>index</i> ]&nbsp;:=&nbsp; <i>arrayp</i>
				[0,&nbsp; <i>index</i> ]&nbsp;-&nbsp;1
			</p>
			<p>
				Increments the value at offset (0,&nbsp; <i>index</i> ) in the array whose
				resource number is pointed to by  <i>arrayp</i> .
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>wordArrayInc</h2>
			<h4>Encoding</h4>
			<p>
				53  <i>arrayp</i><sup><font size="2">16</font></sup>
			</p>
			<h4>Stack</h4>
			<p>
				( <i>index</i> &nbsp;:&nbsp;-)
			</p>
			<h4>Operation</h4>
			<p>
				<i>arrayp</i> [0,&nbsp; <i>index</i> ]&nbsp;:=&nbsp; <i>arrayp</i>
				[0,&nbsp; <i>index</i> ]&nbsp;+&nbsp;1
			</p>
			<p>
				Increments the value at offset (0,&nbsp; <i>index</i> ) in the array whose
				resource number is pointed to by  <i>arrayp</i> .
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>wordArrayIndexedRead</h2>
			<h4>Encoding</h4>
			<p>
				0B  <i>arrayp</i><sup><font size="2">16</font></sup>
			</p>
			<h4>Stack</h4>
				( <i>index</i><sub><font size="2"><i>x</i></font></sub> ,
				<i>index</i><sub><font size="2"><i>y</i></font></sub>  :  <i>value</i> )
			</p>
			<h4>Operation</h4>
			<p>
				<i>value</i> &nbsp;:=&nbsp; <i>arrayp</i> [ <i>index</i>
				<sub><font size="2"><i>x</i></font></sub> ,&nbsp; <i>index</i>
				<sub><font size="2"><i>y</i></font></sub> ]
			</p>
			<p>
				Reads the value at offset ( <i>index</i><sub><font size="2"><i>x</i></font></sub> ,&nbsp;
				<i>index</i><sub><font size="2"><i>y</i></font></sub> ) from
				the array whose resource number is pointed to by  <i>arrayp</i> . The
				array can be a byte or word array; byte values are not sign extended.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>wordArrayIndexedWrite</h2>
			<h4>Encoding</h4>
			<p>
				4B  <i>arrayp</i><sup><font size="2">16</font></sup>
			</p>
			<h4>Stack</h4>
			<p>
				( <i>index</i><sub><font size="2"><i>x</i></font></sub> ,  <i>index</i>
				<sub><font size="2"><i>y</i></font></sub> ,  <i>value</i>  : -)
			</p>
			<h4>Operation</h4>
			<p>
				<i>arrayp</i> [ <i>index</i><sub><font size="2"><i>x</i></font></sub> ,&nbsp;
				<i>index</i><sub><font size="2"><i>y</i></font></sub> ] :=  <i>value</i>
			</p>
			<p>
				Writes  <i>value</i>  to the array whose resource number is pointed
				to by  <i>arrayp</i>  at offset ( <i>index</i><sub><font size="2"><i>x</i></font></sub>
				,  <i>index</i><sub><font size="2"><i>y</i></font></sub> ).
				The array can be a byte or word array; when writing to a byte array,
				<i>value</i>  is truncated.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>wordArrayRead</h2>
			<h4>Encoding</h4>
			<p>
				07  <i>arrayp</i><sup><font size="2">16</font></sup>
			</p>
			<h4>Stack</h4>
			<p>
				( <i>index</i>  :  <i>value</i> )
			</p>
			<h4>Operation</h4>
			<p>
				<i>value</i>  :=  <i>arrayp</i> [0,&nbsp; <i>index</i> ]
			</p>
			<p>
				Reads the value at offset (0,&nbsp; <i>index</i> ) from the array whose
				resource number is pointed to by  <i>arrayp</i> . The array can be a
				byte or word array; byte values are not sign extended.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>wordArrayWrite</h2>
			<h4>Encoding</h4>
			<p>
				47  <i>arrayp</i><sup><font size="2">8</font></sup>
			</p>
			<h4>Stack</h4>
			<p>
				( <i>index</i>   <i>value</i>  : -)
			</p>
			<h4>Operation</h4>
			<p>
				<i>arrayp</i> [0,&nbsp; <i>index</i> ] :=  <i>value</i>
			</p>
			<p>
				Writes  <i>value</i>  to the array whose resource number is pointed
				to by  <i>arrayp</i>  at offset (0,&nbsp; <i>index</i> ). The array can be
				a byte or word array; when writing to a byte array,  <i>value</i>  is
				truncated.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>wordVarDec</h2>
			<h4>Encoding</h4>
			<p>
				57  <i>pointer</i><sup><font size="2">16</font></sup>
			</p>
			<h4>Stack</h4>
			<p>
				(- : -)
			</p>
			<h4>Operation</h4>
			<p>
				* <i>pointer</i>  := * <i>pointer</i>  - 1
			</p>
			<p>
				Decrements the variable pointed to by  <i>pointer</i> .
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>wordVarInc</h2>
			<h4>Encoding</h4>
			<p>
				4F  <i>pointer</i><sup><font size="2">16</font></sup>
			</p>
			<h4>Stack</h4>
			<p>
				(- : -)
			</p>
			<h4>Operation</h4>
			<p>
				* <i>pointer</i>  := * <i>pointer</i>  + 1
			</p>
			<p>
				Increments the variable pointed to by  <i>pointer</i> .
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>writeByteVar</h2>
			<h4>Encoding</h4>
			<p>
				42  <i>pointer</i><sup><font size="2">8</font></sup>
			</p>
			<h4>Stack</h4>
			<p>
				( <i>value</i>  : -)
			</p>
			<h4>Operation</h4>
			<p>
				* <i>pointer</i>  :=  <i>value</i>
			</p>
			<p>
				Writes  <i>value</i>  to the variable pointed to by  <i>pointer</i> .
				Note that as  <i>pointer</i>  is encoded as a byte, it can only point
				to word variables in the range 0x0000 to 0x00FF. For a more general
				form of this instruction, use <font color="purple">writeWordVar</font>.
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>writeWordVar</h2>
			<h4>Encoding</h4>
			<p>
				43  <i>pointer</i><sup><font size="2">16</font></sup>
			</p>
			<h4>Stack</h4>
			<p>
				( <i>value</i>  : -)
			</p>
			<h4>Operation</h4>
			<p>
				* <i>pointer</i>  :=  <i>value</i>
			</p>
			<p>
				Writes  <i>value</i>  to the variable pointed to by  <i>pointer</i> .
			</p>
		</div>

		<!-- -->
		<div class="opcode">
			<h2>zero</h2>
			<h4>Encoding</h4>
			<p>
				0D
			</p>
			<h4>Stack</h4>
			<p>
				( <i>value</i> &nbsp;:&nbsp; <i>bool</i> )
			</p>
			<h4> Operation</h4>
			<p>
				If  <i>value</i>  = 0, set  <i>bool</i>  to 1, otherwise set it to
				0.
			</p>
			<p>
				Tests the value on the stack to see if it compares to zero.
			</p>
		</div>

		<hr>
		<p style="font-size: smaller; text-align: center">
			All material &copy; 2000-2002 David Given, unless where stated otherwise.
		</p>
	</div>
</div>
