<div class="par-item">
	<div class="par-head">Introduction</div>
	<div class="par-intro">
		<br>
		<div class="navigation">
			Navigation
			<div class="nav-dots">&nbsp;</div>
			<table border="0">
				<tr>
					<td class="nav-bullet">
						<img src="../../images/bullet-section.gif" alt="*" width="10" height="7">
					</td>
					<td class="nav-item">
						<a href="#changes">Changes</a>
					</td>
				</tr>
				<tr>
					<td class="nav-bullet">
						<img src="../../images/bullet-section.gif" alt="*" width="10" height="7">
					</td>
					<td class="nav-item">
						<a href="#whatis">What is SCUMM?</a>
					</td>
				</tr>
				<tr>
					<td class="nav-bullet">
						<img src="../../images/bullet-section.gif" alt="*" width="10" height="7">
					</td>
					<td class="nav-item">
						<a href='#versions'>What versions of SCUMM are there available?</a>
					</td>
				</tr>
				<tr>
					<td class="nav-bullet">
						<img src="../../images/bullet-section.gif" alt="*" width="10" height="7">
					</td>
					<td class="nav-item">
						<a href="#engines">Engines</a>
					</td>
				</tr>
			</table>
			<br>
		</div>
	</div>
	<br>
	<div class="par-content">
		<a name="changes"></a>
		<div class="par-subhead">Changes</div>
		<div class="par-subhead-dots">&nbsp;</div>
		<div class="par-subhead-content">
			<dl>
				<dt>2002-09-14:</dt>
				<dd>Imported into ScummVM CVS as David feels he doesn't have time to maintain this anymore.</dd>

				<dt>2002-04-10:</dt>
				<dd>Added James 'Ender' Brown's information (the engines, the resource tree introduction).</dd>

				<dt>2002-03-23:</dt>
				<dd>Rewrote it in HTML for the new Cowlark web server. LaTeX is good but for an on-line reference HTML is better.</dd>

				<dt>2002-01-30:</dt>
				<dd>Added Arrays, deciphered a lot of the threading and VM stuff and documented it, added a bunch of opcodes, assorted tidying.</dd>

				<dt>2002-01-18:</dt>
				<dd>Initial version.</dd>
		</dl>
			</div>
		</div>
	</div>

		<a name="whatis"></a>
			<div class="par-item">
			<div class="par-head">What is SCUMM?</div>
			<div class="par-content">
				SCUMM, the <b>S</b>cript <b>C</b>reation <b>U</b>tility for
				<b><em>M</em></b><em>aniac</em> <b><em>M</em></b><em>ansion</em>,
				is an engine for creating graphics adventure games.

				<p>
					It is well known that the best way to perform some very complex task is to
					start out by building a tool to help you with that task. In the same way, two
					programmers at LucasArts back in 1988 decided that rather than write a single,
					complicated program for their new graphic adventure game, they should instead
					build an generic engine that would play any graphic adventure game, if given
					the proper data files; this would let them concentrate on the game design,
					rather than the details of the programming.
				</p>
				<p>
					It worked. And so SCUMM was born.
				</p>
				<p>
					The way the SCUMM engine works is that there is a single executable program,
					called the interpreter, that operates on some data files.  The data files
					contain images, dialogue, details of object behaviour, and so on. The
					interpreter then brings all this to life and handles the details of drawing it
					all, animating the characters, processing user input, and all the other details
					that a graphic adventure game needs dealt with in order to work properly.
					Because the data files contain no executable code, it turns out to be trivial
					to port the game to a new platform: just port the interpreter, and use the same
					data files. You will get exactly the same game on the new system.
				</p>
				<p class="footnote">
					A lesson many people have learnt. Infocom, creators of
					possibly the finest text adventure games of all time, did a very similar trick
					with their Z-machine; you can now get Z-machine interpreters for everything
					from a Cray Supercomputer to a Game Boy, all of which will play Infocom's
					games, encoded in the data files. See <a href="http://brasslantern.org">Brass
					Lentern</a> for more information.
				</p>
				<p>
					Aric Wilmunder and Ron Gilbert's original SCUMM has been expanded
					a bit since 1988, of course. Every time a game required some feature
					that SCUMM had not previously supported, the interpreter was extended
					and the data file format expanded. The whole system was redesigned
					from scratch twice. Even now that LucasArts has finally retired SCUMM
					for their latest games, such as <em>Grim Fandango</em>, the
					interpreter/data file philosophy is still in use and you can see SCUMM
					design decisions in the data file format.
				</p>
				<p>
					This document attempts to document the SCUMM data file format. With
					reasonably complete documentation, it becomes possible to do all sorts
					of exiting things: like write a free, portable interpreter that will
					play and SCUMM game on any platform (such as <a href="http://www.scummvm.org">ScummVM</a>,
					written by Ludvig Strigeus and the ScummVM team), or to create your own
					SCUMM games from scratch.
				</p>
				<p>
					The information obtained here was almost all obtained by other people. All
					I have done is to collate it into one place. Among the many who have been
					working on the SCUMM file format, Ludvig Strigeus, Jimmi Thøgerson and Peter
					Kelly have performed incredible tasks of reverse-engineering, and I am indebted
					to them.
				</p>
				<p class="footnote">
					Jimmi Thøgerson and Peter Kelly have developed their own
					SCUMM file browsing and analysis tool called <a href="http://scummrev.mixnmojo.com">SCUMM
					Revisited</a>. If you are at all interested in SCUMM files, this is an
					essential tool.
				</p>
			</div>
		</div>

		<a name="versions"></a>
		<div class="par-item">
			<div class="par-head">What versions of SCUMM are there available?</div>
			<div class="par-content">
				<p>
					Many.
				</p>
				<p>
					SCUMM is a LucasArts in-house standard. The format was never designed
					to be public and so would change unpredictably from game to game to
					suit the task at hand.
				</p>
				<p>
					The first LucasArts adventure games used an unknown format that is
					now lost with time. We will ignore it because it wasn't really SCUMM
					as we know it know, wasn't very good, anyway, and only worked on the
					Commodore 64. The first PC versions started with V2 and a variation
					of the V1 format.
				</p>
				<p>
					With <em>Indiana Jones and the Last Crusade</em>, LucasArts developed
					a modular file format based loosely on the standard IFF format. This
					was used several times in various forms until <em>The Secret of
					Monkey Island</em>, where the SCUMM engine and file format was redesigned
					from scratch. The new format was used from then on, and vestiges of
					It are still visible in the latest LucasArts games such as <em>Grim
					Fandango</em>.
				</p>
				<p>
					The full list of games and versions follows.
				</p>
				<div class="frame" style="width: 60%;">
					<div class="frameTop"><span class="frameTitle">Game versions</span></div>
					<table width="100%" border="0" class="color4" cellpadding="2" cellspacing="1" >
						<tr valign="top" class="color4">
							<td>Version</td>
							<td align="center">Game</td>
						</tr>
						<tr valign="top" class="color2">
							<td>1</td>
							<td align="center" class="pct">Maniac Mansion (c64)</td>
						</tr>
						<tr valign="top" class="color0">
							<td>1</td>
							<td align="center" class="pct">Zak McKracken and the Alien Mindbenders (C64)</td>
						</tr>
						<tr valign="top" class="color2">
							<td>2</td>
							<td align="center" class="pct">Maniac Mansion</td>
						</tr>
						<tr valign="top" class="color0">
							<td>2</td>
							<td align="center" class="pct">Zak McKracken and the Alien Mindbenders</td>
						</tr>
						<tr valign="top" class="color2">
							<td>3</td>
							<td align="center" class="pct">Indiana Jones and the Last Crusade</td>
						</tr>
						<tr valign="top" class="color0">
							<td>3</td>
							<td align="center" class="pct">Zak McKracken and the Alien Mindbenders (256 - FmTowns)</td>
						</tr>
						<tr valign="top" class="color2">
							<td>3.0.22</td>
							<td align="center" class="pct">Indiana Jones and the Last Crusade (256)</td>
						</tr>
						<tr valign="top" class="color0">
							<td>3.5.37</td>
							<td align="center" class="pct">Loom</td>
						</tr>
						<tr valign="top" class="color2">
							<td>3.5.40</td>
							<td align="center" class="pct">Loom (alt. version)</td>
						</tr>
						<tr valign="top" class="color0">
							<td>4.0.67</td>
							<td align="center" class="pct">The Secret of Monkey Island (EGA)</td>
						</tr>
						<tr valign="top" class="color2">
							<td>5.0.19</td>
							<td align="center" class="pct">The Secret of Monkey Island (VGA Floppy)</td>
						</tr>
						<tr valign="top" class="color0">
							<td>5.1.42</td>
							<td align="center" class="pct">LOOM (256 color CD version)</td>
						</tr>
						<tr valign="top" class="color2">
							<td>5.2.2</td>
							<td align="center" class="pct">Monkey Island 2: LeChuck's revenge</td>
						</tr>
						<tr valign="top" class="color0">
							<td>5.3.06</td>
							<td align="center" class="pct">The Secret of Monkey Island (VGA CD)</td>
						</tr>
						<tr valign="top" class="color2">
							<td>5.5.2</td>
							<td align="center" class="pct">Indiana Jones 4 and the Fate of Atlantis (DEMO)</td>
						</tr>
						<tr valign="top" class="color0">
							<td>5.5.20</td>
							<td align="center" class="pct">Indiana Jones 4 and the Fate of Atlantis</td>
						</tr>
						<tr valign="top" class="color2">
							<td>6.3.0</td>
							<td align="center" class="pct">Sam & Max (DEMO)</td>
						</tr>
						<tr valign="top" class="color0">
							<td>6.3.9</td>
							<td align="center" class="pct">Day Of The Tentacle (DEMO)</td>
						</tr>
						<tr valign="top" class="color2">
							<td>6.4.2</td>
							<td align="center" class="pct">Day Of The Tentacle</td>
						</tr>
						<tr valign="top" class="color0">
							<td>6.5.0</td>
							<td align="center" class="pct">Sam & Max</td>
						</tr>
						<tr valign="top" class="color2">
							<td>7.3.5</td>
							<td align="center" class="pct">Full Thottle</td>
						</tr>
						<tr valign="top" class="color0">
							<td>7.5.0</td>
							<td align="center" class="pct">The DIG</td>
						</tr>
						<tr valign="top" class="color2">
							<td>8.1.0</td>
							<td align="center" class="pct">Curse of Monkey Island</td>
						</tr>
					</table>
					<div class="frameBottom"><span class="frameTitle">&nbsp;</span></div>
				</div>
				<p>This document will only concern itself with SCUMM versions 5-8.
			</div>
		</div>

		<a name="engines"></a>
		<div class="par-item">
			<div class="par-head">Engines</div>
			<div class="par-content">
				<p>
					The SCUMM virtual machine is made up of a number of sub engines
					working together. Strictly, the term SCUMM only refers to the
					scripting language itself. The official term for the virtual machine
					as a whole is SPUTM --- but getting people to change is probably
					a lost cause.
				</p>

				<p>
					Here are all the engines used by the SCUMM virtual machine.
				</p>

				<dl>
					<dt>SPUTM</dt>
					<dd>The 'real' name for the engine.</dd>

					<dt>SCUMM</dt>
					<dd>The actual scripting language.</dd>

					<dt>IMUSE</dt>
					<dd>The MIDI control system, allowing dynamic music.</dd>

					<dt>SMUSH</dt>
					<dd>A movie compression format and player.</dd>

					<dt>INSANE</dt>
					<dd>The event management system used in V7+ games.</dd>

					<dt>MMUCAS</dt>
					<dd>The memory allocation system used in <i>The Curse of Monkey Island</i>. V8 only.</dd>
				</dl>

				<hr>
				<p style="font-size: smaller; text-align: center">
					All material &copy; 2000-2002 David Given, unless where stated otherwise.
				</p>
			</div>
		</div>
	</div>
</div>
