<div class="par-item">
	<div class="par-head">SCRP: Scripts</div>
	<div class="par-content">
		<br>
		<div class="par-subhead">Introduction</div>
		<div class="par-subhead-dots">&nbsp;</div>
		<div class="par-subhead-content">
			<p>Insert here</p>
		</div>

		<div class="par-subhead">The SCUMM virtual machine</div>
		<div class="par-subhead-dots">&nbsp;</div>
		<div class="par-subhead-content">
			<p>
				The SCUMM virtual machine was given a complete rewrite between version 5 and
				version 6. Both virtual machines are simple byte-code machines with built-in
				cooperative threading; up to 25 threads can be run simultaneously.  Each thread
				gets 16 words of local storage. Up to 8192 words and 32768 bits of global
				storage are also available. The word and bit storage areas occupy seperate
				address spaces. The exception to this rule is Zak256, where both actually use
				the same memory (possibly this is also true for other older SCUMM versions).
			</p>
			<p>
				The V5 machine has hard-coded limits on 800 word variables and 2048 bit
				variables. All operations are done to and from a variable (global or local).
				The V6 machine can stores the number of variables in the <tt>MAXS</tt> resource
				in the index and uses a 100-word global stack for performing operations.
			</p>
			<p>
				Additional storage is supplied in Array resources. V5 requires arrays to be
				declared in the data file; V6 can define new ones on the fly, which means they
				can be used as a dynamic heap.
			</p>
		</div>

		<div class="par-subhead">Pointers</div>
		<div class="par-subhead-dots">&nbsp;</div>
		<div class="par-subhead-content">
			<p>
				Both V5 and V6 use a common system of encoding the address of something in
				memory. These are referred to as pointers. These come in several forms,
				depending on what is being pointed at.
			</p>

			<h4>Word variables</h4>
			<table class="bitfield">
				<tr>
					<th>15</th>
					<th>14</th>
					<th>13</th>
					<th>12</th>
					<th>&hellip;</th>
					<th>0</th>
				</tr>
				<tr>
					<td>0</td>
					<td>0</td>
					<td>0</td>
					<td colspan="3"><i>address</i></td>
				</tr>
			</table>

			<p>
				This is a plain direct reference to the word global storage.
			</p>

			<h4>Bit variables</h4>
			<table class="bitfield">
				<tr>
					<th>15</th>
					<th>14</th>
					<th>&hellip;</th>
					<th>0</th>
				</tr>
				<tr>
					<td>1</td>
					<td colspan="3"><i>address</i></td>
				</tr>
			</table>

			<h4>Local variables</h4>
			<table class=bitfield>
				<tr>
					<th>15</th>
					<th>14</th>
					<th>13</th>
					<th>12</th>
					<th>&hellip;</th>
					<th>4</th>
					<th>3</th>
					<th>&hellip;</th>
					<th>0</th>
				</tr>
				<tr>
					<td>0</td>
					<td>1</td>
					<td>?</td>
					<td colspan="3">0</td>
					<td colspan="3"><i>var no</i></td>
				</tr>
			</table>

			<h4>Indirected word variables (V5 only)</h4>
			<table class=bitfield>
				<tr>
					<th>15</th>
					<th>14</th>
					<th>13</th>
					<th>12</th>
					<th>&hellip;</th>
					<th>0</th>
				</tr>
				<tr>
					<td>0</td>
					<td>0</td>
					<td>1</td>
					<td colspan="3"><i>address</i></td>
				</tr>
				<tr>
					<td>0</td>
					<td>0</td>
					<td><i>I</i></td>
					<td colspan="3"><i>offset</i></td>
				</tr>
			</table>

			<p>
				If bit 13 is set, then the next 16 bit word from the script is fetched
				(represented by the second row in the above graph).
				If the <i>I</i> bit of this second word is not set, the effective word address
				becomes <i>address</i>+<i>offset</i>. If it is set, the effective word address
				<i>address</i>+[<i>offset</i>] is used instead.
			</p>
		</div>

		<div class="par-subhead">Threads</div>
		<div class="par-subhead-dots">&nbsp;</div>
		<div class="par-subhead-content">
			<p>
				Both engines have automatic cooperative threading. Instructions will be
				executed out of a single script until it suspends for some reason; the flow of
				execution will then move on to the next script. Each script has the opportunity
				to run once per frame, with some exceptions.
			</p>
			<p>
				In V6, because the stack is shared among all threads, it is the script's
				responsibility to ensure that the stack is empty when executing an instruction
				that could cause the thread to be descheduled. Leaving items on the stack is
				highly dangerous! If state needs to be saved from one frame to the next, it
				should be stored in local variables.
			</p>
			<p>
				Threads may be in one of the following states:
			</p>

			<table class=list>
				<tr>
					<th>State</th>
					<th>Meaning</th>
				</tr>
				<tr>
					<td>RUNNING</td>
					<td align="left">
						the thread is currently executing
					</td>
				</tr>
				<tr>
					<td>PENDED</td>
					<td align="left">
						the thread was executing, but has spawned another thread.  When the child
						thread is descheduled, the pended thread will start executing again
					</td>
				</tr>
				<tr>
					<td>DELAYED</td>
					<td align=left>
						the thread is not executing, and is waiting for a timer to expire
					</td>
				</tr>
				<tr>
					<td>FROZEN</td>
					<td align=left>
						the thread is suspended and will not execute until it has been thawed again
					</td>
				</tr>
			</table>

			<p>
				A thread may spawn another thread at any point. When this happens, the
				parent thread moves into the PENDED state and stops executing.  The child
				thread starts executing immediately. When the child thread is descheduled, the
				parent moves back into the RUNNING state and continues on immediately after the
				instruction that created the thread. PENDING threads may be nested up to 15
				times.
			</p>
			<p>
				To summarise:
			</p>
			<p>
				A thread will run once every frame, unless it is delayed or frozen.
			</p>
			<p>
				Any code may start a new thread at any point. (Sometimes this is done
				automatically.) The new thread will immediately run until it is descheduled, at
				which point execution continues in the parent thread.
			</p>
			<p>
				Any non-PENDED thread may be frozen at any point. That thread will not be
				run again until it is unfrozen. Attempts to freeze a PENDED thread will be
				ignored. It is possible to mark a thread as unfreezable when it is created;
				however, even unfreezable threads can be frozen with the appropriate code (see
				the <tt>freezeScripts</tt> and <tt>freezeUnfreeze</tt> opcodes).
			</p>
		</div>

		<div class="par-subhead">Version 5 instruction encoding</div>
		<div class="par-subhead-dots">&nbsp;</div>
		<div class="par-subhead-content">
			<p>
				Unfortunately, there is no set V5 instruction encoding. In the general form,
				instructions take a fixed number of parameters and return an optional value.
				The format is:
			</p>
			<p>
				<i>opcode</i> [<i>result</i>] [<i>parameter1</i>] [<i>parameter2</i>]...
			</p>
			<p>
				The result is a word pointer as usual. The parameters are word LE
				or byte values depending on the opcode. The meaning of the parameters
				is encoded in the top bits of the opcode. For example, the <tt>add</tt>
				instruction takes one parameter, and so the opcode looks like this:
			</p>

			<table class="bitfield">
				<tr>
					<th>7</th>
					<th>6</th>
					<th></th>
					<th>0</th>
				</tr>
				<tr>
					<td><i>p1</i></td>
					<td colspan="3">$5A</td>
				</tr>
			</table>

			<p>
				If the <i>p1</i> bit is set, then the parameter is evaluated as a pointer
				and dereferenced. Otherwise it is treated as a constant. If multiple
				parameters are present, the bits work down from the MSB to the LSB.
			</p>
			<p>
				However, many instructions are exceptions to this rule. For example,
				instructions such as <tt>actorSet</tt> that take an auxiliary opcode will put
				it somewhere in the instruction stream; <tt>actorSet</tt> puts it after the
				first parameter, and then the other parameters vary according to the particular
				operation. <tt>jumpRelative</tt> puts the jump target immediately after the
				opcode encoded as a constant. Some opcodes (such as <tt>drawBox</tt>) take too
				many parameters and have a supplementary opcode byte to contain the extra
				parameter bits. You have been warned.
			</p>
		</div>

		<div class="par-subhead">Version 6 instruction encoding</div>
		<div class="par-subhead-dots">&nbsp;</div>
		<div class="par-subhead-content">
			<p>
				After V5, the byte-code engine was rewritten completely. The new engine is
				far more orthogonal and considerably easier to understand.
			</p>
			<p>
				Most instructions use the stack for all input and output, so the opcodes in
				this case are single bytes with no parameters. Some instructions do take
				parameters, but these are always of fixed size and type and so no parameter
				type bits are needed.
			</p>
			<p>
				As a result of this more efficient encoding, the V6 engine actually has more
				instructions than the V5 one, despite using fewer entries in the opcode map.
			</p>
		</div>

		<div class="par-subhead">Arrays</div>
		<div class="par-subhead-dots">&nbsp;</div>
		<div class="par-subhead-content">
			<p>
				Both V5 and V6 allow Array resources to be used as a dynamic heap. V5
				allows up to 32 one-dimensional arrays, also referred to as Strings; V6 allows
				an arbitrary number (the maximum is defined in the MAXS chunk) of
				two-dimensional arrays. V5 arrays can only store bytes, while V6 ones can store
				bytes or words.
			</p>
			<p>
				Before an Array can be used, it must be defined. V5 does this with
				<tt>arrayOps/5</tt>, passing in the Array resource number (1..32) and the size.
				The specified Array is initialised to zero. V6 does it with the <tt>dim</tt>,
				<tt>dim2</tt> or <tt>arrayOps/208</tt> opcodes, depending on the type of array
				and how it is to be initialised.
			</p>
		</div>

		<hr>
		<p style="font-size: smaller; text-align: center">
			All material &copy; 2000-2002 David Given, unless where stated otherwise.
		</p>
	</div>
</div>
