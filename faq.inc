<!-- This file was generated from faq.xml. Do *NOT* edit by hand -->
<div class="qandaset"><dl><dt>1.  <a href="#id2541646">Introduction</a></dt><dd><dl><dt>1.1. <a href="#id2541650">Why is it called ScummVM - what does this name mean?</a></dt><dt>1.2. <a href="#id2541688">What is SCUMM?</a></dt><dt>1.3. <a href="#id2541705">Is ScummVM free?</a></dt><dt>1.4. <a href="#id2504337">Where do I find ScummVM?</a></dt><dt>1.5. <a href="#id2504360">How do I compile the source code for my OS?</a></dt><dt>1.6. <a href="#id2504382">On what platform does ScummVM run?</a></dt><dt>1.7. <a href="#id2504416">Can I use ScummVM to make new games?</a></dt></dl></dd><dt>2.  <a href="#id2503678">Supported games</a></dt><dd><dl><dt>2.1. <a href="#id2503683">What games does ScummVM support?</a></dt><dt>2.2. <a href="#id2503823">Does ScummVM run any non-SCUMM games?</a></dt><dt>2.3. <a href="#id2503871">Will ScummVM support other games?</a></dt><dt>2.4. <a href="#id2503897">When will Maniac Mansion Deluxe be supported?</a></dt><dt>2.5. <a href="#id2503934">Will you add support for Sierra's SCI games?</a></dt><dt>2.6. <a href="#id2503963">Why don't you merge with FreeSCI?</a></dt></dl></dd><dt>3.  <a href="#id2504035">Running games</a></dt><dd><dl><dt>3.1. <a href="#id2504040">Do I need original CD or Floppy disks?</a></dt><dt>3.2. <a href="#id2504064">Does ScummVM work with all versions of games?</a></dt><dt>3.3. <a href="#id2504090">Can I play through xxx (place your favorite SCUMM adventure here) ?</a></dt><dt>3.4. <a href="#id2504774">Can I save/restore the game?</a></dt><dt>3.5. <a href="#id2504789">Do savegames from the original games work in ScummVM?</a></dt></dl></dd><dt>4.  <a href="#id2504809">Graphics and Audio</a></dt><dd><dl><dt>4.1. <a href="#id2504814">Does ScummVM support CD audio?</a></dt><dt>4.2. <a href="#id2504850">Does ScummVM support using MP3/Ogg/FLAC files instead of CD audio?</a></dt><dt>4.3. <a href="#id2504876">Does ScummVM support using MP3/Ogg/FLAC files instead of the original MIDI music?</a></dt><dt>4.4. <a href="#id2504912">Does ScummVM support filtered graphic modes?</a></dt><dt>4.5. <a href="#id2504942">Can I run my game full screen?</a></dt></dl></dd><dt>5.  <a href="#id2504960">Troubleshooting</a></dt><dd><dl><dt>5.1. <a href="#id2504965">My game won't run.</a></dt><dt>5.2. <a href="#id2505011">I installed my game but ScummVM can't find it.</a></dt><dt>5.3. <a href="#id2505037">I don't hear any sound.</a></dt><dt>5.4. <a href="#id2505067">I don't hear any music.</a></dt><dt>5.5. <a href="#id2505092">My game crashes at some point.</a></dt><dt>5.6. <a href="#id2551089">ScummVM crashes, but console window disappears too quick to see the error message.</a></dt><dt>5.7. <a href="#id2551112">The game colors are messed up.</a></dt><dt>5.8. <a href="#id2551138">The subtitles in my non English game are messed up.</a></dt><dt>5.9. <a href="#id2551167">How do I make my mac version of a game work?</a></dt><dt>5.10. <a href="#id2551223">Reporting Bugs.</a></dt><dt>5.11. <a href="#id2551305">I downloaded the Broken Sword packs from your site but the game won't run.</a></dt><dt>5.12. <a href="#id2551324">There are no graphics in the Broken Sword I intro.</a></dt><dt>5.13. <a href="#id2551340">I get "WARNING: Unable to open configuration file C:\windows\scummvm.ini!"</a></dt><dt>5.14. <a href="#id2551357">I get "Failed to save game state to file: xxx"</a></dt><dt>5.15. <a href="#id2551374">ScummVM starts, but all I get is a transparent window!</a></dt><dt>5.16. <a href="#id2551415">ScummVM runs, but sound is stuttering and/or garbled!</a></dt><dt>5.17. <a href="#id2551436">How do I set an environment variable?</a></dt><dt>5.18. <a href="#id2551488">ScummVM starts somewhere in the middle of my two Xinerama monitors in fullscreen mode. Help!</a></dt></dl></dd><dt>6.  <a href="#id2551513">Features</a></dt><dd><dl><dt>6.1. <a href="#id2551517">Will you add support for zip archives?</a></dt></dl></dd></dl><table border="0" summary="Q and A Set"><col align="left" width="1%"><tbody><tr class="qandadiv"><td align="left" valign="top" colspan="2"><h3 class="title"><a name="id2541646"></a>1. Introduction</h3></td></tr><tr class="toc"><td align="left" valign="top" colspan="2"><dl><dt>1.1. <a href="#id2541650">Why is it called ScummVM - what does this name mean?</a></dt><dt>1.2. <a href="#id2541688">What is SCUMM?</a></dt><dt>1.3. <a href="#id2541705">Is ScummVM free?</a></dt><dt>1.4. <a href="#id2504337">Where do I find ScummVM?</a></dt><dt>1.5. <a href="#id2504360">How do I compile the source code for my OS?</a></dt><dt>1.6. <a href="#id2504382">On what platform does ScummVM run?</a></dt><dt>1.7. <a href="#id2504416">Can I use ScummVM to make new games?</a></dt></dl></td></tr><tr class="question"><td align="left" valign="top"><a name="id2541650"></a><a name="id2541651"></a><p><b>1.1.</b></p></td><td align="left" valign="top"><p>Why is it called ScummVM - what does this name mean?</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		&#8220;<span class="quote">Scumm</span>&#8221; comes from the fact that it was originally designed to run SCUMM games, like
		Monkey Island.
		&#8220;<span class="quote">VM</span>&#8221; stands for Virtual Machine.
		</p><p>
		Every now and then somebody will raise the subject of finding
		a &#8220;<span class="quote">better</span>&#8221; name for ScummVM, one that fits better with it's modern
		scope (which extends well beyond SCUMM games). So
		<a class="ulink" href="http://wiki.scummvm.org/index.php/ScummVM_Name" target="_top">at this page</a>
		we present you with some nice alternatives. Choose whichever suits you
		best -- but we will stay ScummVM.
		</p></td></tr><tr class="question"><td align="left" valign="top"><a name="id2541688"></a><a name="id2541689"></a><p><b>1.2.</b></p></td><td align="left" valign="top"><p>What is SCUMM?</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		SCUMM stands for "Script Creation Utility for Maniac Mansion". It is a
		utility used to create the famous LucasArts adventure games.
		</p><p>
		It was initially created in 1987 by Aric Wilmunder and Ron Gilbert for
		the game "Maniac Mansion" and was used later, with some modifications,
		for Zak McKracken and the Alien Mindbenders. Development on the SCUMM
		system continued for some time, and was used in Loom, Indiana Jones and
		the Last Crusade, Indiana Jones and the Fate of Atlantis, Monkey Island
		1,2,3, Sam &amp; Max Hit the Road, Day of the Tentacle, The Dig and Full
		Throttle.
		</p></td></tr><tr class="question"><td align="left" valign="top"><a name="id2541705"></a><a name="id2541706"></a><p><b>1.3.</b></p></td><td align="left" valign="top"><p>Is ScummVM free?</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		ScummVM is released under the <a class="ulink" href="http://www.gnu.org/copyleft/gpl.html" target="_top">GPL (General Public
		License)</a>, so it's more than free. ScummVM source code is freely
		available and you can do whatever you want with it. If you make
		modifications to it and redistribute your work you MUST make the source
		available. However, the ScummVM team would be pleased if you choose to
		send them your modifications, so they can be merged into the main tree.
		</p></td></tr><tr class="question"><td align="left" valign="top"><a name="id2504337"></a><a name="id2504338"></a><p><b>1.4.</b></p></td><td align="left" valign="top"><p>Where do I find ScummVM?</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		You can find it on the download section on our <a class="ulink" href="http://www.scummvm.org" target="_top">web site</a>.
		You can download the latest version, which could be a little old. For the most
		recent cutting-edge in-development version, you have to compile it yourself from
		Subversion or use the precompiled 'daily builds' linked from our download page.
		</p></td></tr><tr class="question"><td align="left" valign="top"><a name="id2504360"></a><a name="id2504361"></a><p><b>1.5.</b></p></td><td align="left" valign="top"><p>How do I compile the source code for my OS?</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		The source code package contains a file called
		<a class="ulink" href="http://scummvm.svn.sourceforge.net/viewvc/*checkout*/scummvm/scummvm/trunk/README" target="_top">README</a>
		that should explain everything.
		</p></td></tr><tr class="question"><td align="left" valign="top"><a name="id2504382"></a><a name="id2504384"></a><p><b>1.6.</b></p></td><td align="left" valign="top"><p>On what platform does ScummVM run?</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		ScummVM should be able to be compiled on any SDL platform, with just small modifications.
		</p><p>
		Currently tested platforms include Win32 (Windows 95/98/ME/NT/2000/XP), Linux i386 and PPC, BeOS, Solaris,
		Mac OS X, Dreamcast, MorphOS, IRIX, PalmOS, WinCE, GP32, Sony PSP and PS2. It is also part of the
		Free/Net/Open BSD ports collections and included in Debian testing and unstable.
		</p><p>
		See also the <a class="ulink" href="http://wiki.scummvm.org/index.php/Platforms" target="_top">platforms list</a>
		in our Wiki.
		</p></td></tr><tr class="question"><td align="left" valign="top"><a name="id2504416"></a><a name="id2504417"></a><p><b>1.7.</b></p></td><td align="left" valign="top"><p>Can I use ScummVM to make new games?</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		While it is theoretically possible to write a new game that uses ScummVM it is not
		advisable.	ScummVM has many hacks to support older games and no tools geared towards
		creating content usable by ScummVM.	 Potential game authors are encouraged to look
		at open source technologies such as <a class="ulink" href="http://www.libsdl.org" target="_top">SDL</a> for
		a cross platform DirectX like library, and the <a class="ulink" href="http://www.lua.org" target="_top">Lua</a>
		and <a class="ulink" href="http://www.python.org" target="_top">Python</a> scripting languages for game logic.
		</p></td></tr><tr class="qandadiv"><td align="left" valign="top" colspan="2"><h3 class="title"><a name="id2503678"></a>2. Supported games</h3></td></tr><tr class="toc"><td align="left" valign="top" colspan="2"><dl><dt>2.1. <a href="#id2503683">What games does ScummVM support?</a></dt><dt>2.2. <a href="#id2503823">Does ScummVM run any non-SCUMM games?</a></dt><dt>2.3. <a href="#id2503871">Will ScummVM support other games?</a></dt><dt>2.4. <a href="#id2503897">When will Maniac Mansion Deluxe be supported?</a></dt><dt>2.5. <a href="#id2503934">Will you add support for Sierra's SCI games?</a></dt><dt>2.6. <a href="#id2503963">Why don't you merge with FreeSCI?</a></dt></dl></td></tr><tr class="question"><td align="left" valign="top"><a name="id2503683"></a><a name="question.supported-games"></a><p><b>2.1.</b></p></td><td align="left" valign="top"><p><a name="question.supported-games.text"></a>What games does ScummVM support?</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		We have a <a class="ulink" href="http://www.scummvm.org/compatibility.php" target="_top">compatibility
		list</a> on our website that contains an up to date list of what
		games work, and how well they work. As well as SCUMM games, we also
		include virtual machines for the first two Simon the Sorcerer games (by
		Adventure Soft), Broken Sword 1/2 and Beneath a Steel Sky (by
		Revolution), Flight of the Amazon Queen, Gobliiins 1 (by Coktel Vision)
		as well as Inherit the Earth (by The Dreamers' Guild). Other games may
		be added, but this is not a common occurrence - see below.
		</p></td></tr><tr class="question"><td align="left" valign="top"><a name="id2503823"></a><a name="id2503824"></a><p><b>2.2.</b></p></td><td align="left" valign="top"><p>Does ScummVM run any non-SCUMM games?</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		Yes. As well as SCUMM titles, ScummVM supports Simon the Sorcerer (1 and 2),
		Flight of the Amazon Queen, and the Revolution Games: Broken Sword 1, Broken Sword 
		2, and Beneath a Steel Sky, as well as Gobliiins 1 and Inherit the Earth.
		</p><p>
		Simon support was initially written by the original founder of ScummVM as a 
		separate program, and later included in the main binary.
		Revolution Software Ltd. are very nice people and kindly provided us with the
		source code to BASS and Broken Sword 1/2, from which we based our interpreters.
		John Passfield and Steven Stamatiadis kindly provided the original source code to
		Flight of the Amazon Queen. The Wyrmkeep Entertainment Co. kindly provided the
		sourcecode to Inherit the Earth. Gobliiins 1 was widely researched by Ivan Dubrov.
		</p><p>
		We do not have any plans to support any other non-SCUMM games at this time. If we
		do, it will be added to the <a class="ulink" href="compatibility.php" target="_top">Compatibility List</a>.
		</p><p>
		Unless you work for a company interested providing us with source code for one of your
		classic titles, please do not ask us to support a game.
		</p></td></tr><tr class="question"><td align="left" valign="top"><a name="id2503871"></a><a name="id2503872"></a><p><b>2.3.</b></p></td><td align="left" valign="top"><p>Will ScummVM support other games?</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		The ScummVM team is currently focusing on bugfixes for our next release.
		</p><p>
		We do <span class="emphasis"><em>NOT</em></span> generally add support for non-SCUMM
		games! Reverse engineering a completely new game without source is a
		long process, and our developers are all very busy as it is... so unless
		you work for a company interested in providing us with source code for
		one of your classic titles, please do not ask.
		</p></td></tr><tr class="question"><td align="left" valign="top"><a name="id2503897"></a><a name="id2503898"></a><p><b>2.4.</b></p></td><td align="left" valign="top"><p>When will Maniac Mansion Deluxe be supported?</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		The short answer: never. The long answer:
		This game is a fan-made replica of the original Maniac Mansion. It is not the same
		game as Maniac Mansion Enhanced, which we do support. It features improved
		music, sound, 256-colors graphics and reworked game interface. It was made using
		the <a class="ulink" href="http://www.adventuregamestudio.co.uk/" target="_top">Adventure Game Studio</a> which
		is a free, albeit closed-source graphics adventures engine. There are Windows,
		Linux and FreeBSD versions of the engine. Its author keeps his source code closed
		due to reasons explained in the project <a class="ulink" href="http://www.bigbluecup.com/acfaq.htm" target="_top">FAQ</a>
		(see last two questions). That means that you need to download that program to
		play the game.
		</p></td></tr><tr class="question"><td align="left" valign="top"><a name="id2503934"></a><a name="id2503936"></a><p><b>2.5.</b></p></td><td align="left" valign="top"><p>Will you add support for Sierra's SCI games?</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		If you want to play SCI games, have a look at <a class="ulink" href="http://freesci.linuxgames.com/" target="_top">FreeSCI</a>.
		or at <a class="ulink" href="http://dosbox.sourceforge.net" target="_top">DOSBox</a>.
		</p></td></tr><tr class="question"><td align="left" valign="top"><a name="id2503963"></a><a name="id2503965"></a><p><b>2.6.</b></p></td><td align="left" valign="top"><p>Why don't you merge with FreeSCI?</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		Again and again people suggest this. The argument usually involves the observation that the
		two projects have similar goals, and that FreeSCI's development is appears to be quite slow
		while ScummVM's seems to be very fast. So, people conclude, that a merge would somehow miraculously
		solve all perceived problems (i.e. increase development speed, increase portability, fix bugs,
		enhance support for newer SCI games, whatever).
		</p><p>
		This logic is flawed in several ways. For example, a merge would not automatically ensure
		SCI support on all platforms ScummVM supports right now; porters would still have to adapt it
		for each platform. It is however true that this would probably be easier than adding support
		for all these platforms to FreeSCI itself. Still, it's far from being easy or simple.
		</p><p>
		Next, it is not true that the development speed would automatically increase. If you look
		at the internal organization of ScummVM, not all our devs actually work on all engines. Typically,
		between one and five people work on a given engine. When new engines are added, only a very
		few people (typically those who performed the merge) actually work on it. That means that in
		order to support (Free)SCI, we first would have to find people who performed that merge,
		and who then secondly would continue to work on the added code. One might wonder whether
		anybody who is capable of such a task and interested in it could not do the very same directly
		within the framework of the FreeSCI project itself, but saving the hassle of first porting
		the code to ScummVM... ? So where is the advantage here, exactly? The only potential
		advantage in this regard would be the hope that other ScummVM devs might develop an interest
		in the SCI code base and started to work on it. Not a completely invalid hope, but there is
		a steep and long road from some trivial bug fixes to actual improvements to the SCI engine.
		Not to forget that those people who know most about how SCI games (its creators aside)
		already work on FreeSCI anyway... :-).
		</p><p>
		We are not fundamentally opposed to merging FreeSCI, but the plain truth is: 
		There is not as much to be gained from this as you might naively believe. Nor is it easy to
		do. There are many more details we could list here, but in the meantime, just have a look
		at <a class="ulink" href="http://forums.scummvm.org/viewtopic.php?t=1979" target="_top">this thread on our forums</a>
		for a thorough discussion of the subject.
		</p></td></tr><tr class="qandadiv"><td align="left" valign="top" colspan="2"><h3 class="title"><a name="id2504035"></a>3. Running games</h3></td></tr><tr class="toc"><td align="left" valign="top" colspan="2"><dl><dt>3.1. <a href="#id2504040">Do I need original CD or Floppy disks?</a></dt><dt>3.2. <a href="#id2504064">Does ScummVM work with all versions of games?</a></dt><dt>3.3. <a href="#id2504090">Can I play through xxx (place your favorite SCUMM adventure here) ?</a></dt><dt>3.4. <a href="#id2504774">Can I save/restore the game?</a></dt><dt>3.5. <a href="#id2504789">Do savegames from the original games work in ScummVM?</a></dt></dl></td></tr><tr class="question"><td align="left" valign="top"><a name="id2504040"></a><a name="id2504041"></a><p><b>3.1.</b></p></td><td align="left" valign="top"><p>Do I need original CD or Floppy disks?</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		Most definitely. ScummVM won't work without them. If you would like to
		buy these games, we suggest you browse <a class="ulink" href="http://www.ebay.com" target="_top">Ebay</a>.
		Do not ask the ScummVM team where you can download the full versions of
		LucasArts games. These requests will be ignored.
		</p></td></tr><tr class="question"><td align="left" valign="top"><a name="id2504064"></a><a name="id2504065"></a><p><b>3.2.</b></p></td><td align="left" valign="top"><p>Does ScummVM work with all versions of games?</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		See "<a class="xref" href="#question.supported-games" title="Question">What games does ScummVM support?</a>".
		</p></td></tr><tr class="question"><td align="left" valign="top"><a name="id2504090"></a><a name="id2504091"></a><p><b>3.3.</b></p></td><td align="left" valign="top"><p>Can I play through xxx (place your favorite SCUMM adventure here) ?</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		See "<a class="xref" href="#question.supported-games" title="Question">What games does ScummVM support?</a>".
		</p></td></tr><tr class="question"><td align="left" valign="top"><a name="id2504774"></a><a name="id2504775"></a><p><b>3.4.</b></p></td><td align="left" valign="top"><p>Can I save/restore the game?</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		Yes. Saving and restoring is already supported (ALT-1/9 to save, CTRL - 1/9 to restore, or
		F5 to access the save/load menu).
		</p></td></tr><tr class="question"><td align="left" valign="top"><a name="id2504789"></a><a name="id2504790"></a><p><b>3.5.</b></p></td><td align="left" valign="top"><p>Do savegames from the original games work in ScummVM?</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		In general, no. We do not have any plans to load old savegames (with the exception of the
		Simon the Sorcerer series of games). Newer versions of ScummVM have
		also sometimes broken compatibility with older ScummVM savegames. Since ScummVM is
		under heavy development, this may occur again in the future.
		</p></td></tr><tr class="qandadiv"><td align="left" valign="top" colspan="2"><h3 class="title"><a name="id2504809"></a>4. Graphics and Audio</h3></td></tr><tr class="toc"><td align="left" valign="top" colspan="2"><dl><dt>4.1. <a href="#id2504814">Does ScummVM support CD audio?</a></dt><dt>4.2. <a href="#id2504850">Does ScummVM support using MP3/Ogg/FLAC files instead of CD audio?</a></dt><dt>4.3. <a href="#id2504876">Does ScummVM support using MP3/Ogg/FLAC files instead of the original MIDI music?</a></dt><dt>4.4. <a href="#id2504912">Does ScummVM support filtered graphic modes?</a></dt><dt>4.5. <a href="#id2504942">Can I run my game full screen?</a></dt></dl></td></tr><tr class="question"><td align="left" valign="top"><a name="id2504814"></a><a name="id2504815"></a><p><b>4.1.</b></p></td><td align="left" valign="top"><p>Does ScummVM support CD audio?</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		Yes, ScummVM fully supports CD audio in Gobliins (CD), Indiana Jones and the Last Crusade (FM-TOWNS),
		Loom (CD &amp; FM-TOWNS), Monkey Island 1 (CD, FM-TOWNS &amp; SegaCD) and Zak McKracken (FM-TOWNS). Just keep your game CD
		inserted into your CD drive when you start ScummVM. If you have more than one CD drive in your
		system, you can specify your CD drive using the -c command line parameter. See the
		<a class="ulink" href="http://scummvm.svn.sourceforge.net/viewvc/*checkout*/scummvm/scummvm/trunk/README" target="_top">README</a>
		for more info.
		</p></td></tr><tr class="question"><td align="left" valign="top"><a name="id2504850"></a><a name="id2504852"></a><p><b>4.2.</b></p></td><td align="left" valign="top"><p>Does ScummVM support using MP3/Ogg/FLAC files instead of CD audio?</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		Yes. You can use LAME or some other CD audio conversion utility to convert your CD audio to MP3. Since
		version 0.3.0 we also support Ogg Vorbis files, and FLAC is supported since version 0.7.0. See the
		<a class="ulink" href="http://scummvm.svn.sourceforge.net/viewvc/*checkout*/scummvm/scummvm/trunk/README" target="_top">README</a>
		for more info.
		</p></td></tr><tr class="question"><td align="left" valign="top"><a name="id2504876"></a><a name="id2504877"></a><p><b>4.3.</b></p></td><td align="left" valign="top"><p>Does ScummVM support using MP3/Ogg/FLAC files instead of the original MIDI music?</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		No. If all the game does is to play or loop a tune it would be possible, but many of the games do
		fancy stuff like smooth transitions from one tune to another, or turn individual instruments on and
		off, etc. There's simply no way ScummVM could take a piece of digital music and emulate that kind
		of behavior.
		</p><p>
		This question usually comes up in connection with Sam &amp; Max Hit the Road (which has a few
		unused bonus audio tracks on the CD) and Monkey Island 2 (which is sometimes distributed on
		the same CD as the version of Monkey Island 1 that uses CD audio). Both of these games do far
		too much fancy stuff to even consider an idea like this.
		</p></td></tr><tr class="question"><td align="left" valign="top"><a name="id2504912"></a><a name="id2504913"></a><p><b>4.4.</b></p></td><td align="left" valign="top"><p>Does ScummVM support filtered graphic modes?</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		Yes, ScummVM supports several filtered graphic modes such as AdvMAME2x, also known as 
		<a class="ulink" href="http://scale2x.sourceforge.net/" target="_top">Scale2x</a>.
		See the
		<a class="ulink" href="http://scummvm.svn.sourceforge.net/viewvc/*checkout*/scummvm/scummvm/trunk/README" target="_top">README</a>
		for more info.
		</p></td></tr><tr class="question"><td align="left" valign="top"><a name="id2504942"></a><a name="id2504943"></a><p><b>4.5.</b></p></td><td align="left" valign="top"><p>Can I run my game full screen?</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		Yes. You can either start your game using the -f command line parameter, setting 
		the game to Full Screen in the ScummVM Options dialog, or by using the Alt+Enter key
		combination in-game to switch between full screen and windowed modes.
		</p></td></tr><tr class="qandadiv"><td align="left" valign="top" colspan="2"><h3 class="title"><a name="id2504960"></a>5. Troubleshooting</h3></td></tr><tr class="toc"><td align="left" valign="top" colspan="2"><dl><dt>5.1. <a href="#id2504965">My game won't run.</a></dt><dt>5.2. <a href="#id2505011">I installed my game but ScummVM can't find it.</a></dt><dt>5.3. <a href="#id2505037">I don't hear any sound.</a></dt><dt>5.4. <a href="#id2505067">I don't hear any music.</a></dt><dt>5.5. <a href="#id2505092">My game crashes at some point.</a></dt><dt>5.6. <a href="#id2551089">ScummVM crashes, but console window disappears too quick to see the error message.</a></dt><dt>5.7. <a href="#id2551112">The game colors are messed up.</a></dt><dt>5.8. <a href="#id2551138">The subtitles in my non English game are messed up.</a></dt><dt>5.9. <a href="#id2551167">How do I make my mac version of a game work?</a></dt><dt>5.10. <a href="#id2551223">Reporting Bugs.</a></dt><dt>5.11. <a href="#id2551305">I downloaded the Broken Sword packs from your site but the game won't run.</a></dt><dt>5.12. <a href="#id2551324">There are no graphics in the Broken Sword I intro.</a></dt><dt>5.13. <a href="#id2551340">I get "WARNING: Unable to open configuration file C:\windows\scummvm.ini!"</a></dt><dt>5.14. <a href="#id2551357">I get "Failed to save game state to file: xxx"</a></dt><dt>5.15. <a href="#id2551374">ScummVM starts, but all I get is a transparent window!</a></dt><dt>5.16. <a href="#id2551415">ScummVM runs, but sound is stuttering and/or garbled!</a></dt><dt>5.17. <a href="#id2551436">How do I set an environment variable?</a></dt><dt>5.18. <a href="#id2551488">ScummVM starts somewhere in the middle of my two Xinerama monitors in fullscreen mode. Help!</a></dt></dl></td></tr><tr class="question"><td align="left" valign="top"><a name="id2504965"></a><a name="id2504966"></a><p><b>5.1.</b></p></td><td align="left" valign="top"><p>My game won't run.</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		First make sure your game is supported.
		See "<a class="xref" href="#question.supported-games" title="Question">What games does ScummVM support?</a>".
		If it is a supported game and you
		have followed the instructions in
		<a class="ulink" href="http://scummvm.svn.sourceforge.net/viewvc/*checkout*/scummvm/scummvm/trunk/README" target="_top">README</a>
		to the letter, then see "<a class="xref" href="#question.report-bugs" title="Question">Reporting Bugs.</a>"
		to report this as a bug.
		</p></td></tr><tr class="question"><td align="left" valign="top"><a name="id2505011"></a><a name="id2505012"></a><p><b>5.2.</b></p></td><td align="left" valign="top"><p>I installed my game but ScummVM can't find it.</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		First don't use the install.exe or setup.exe shipped with the game. They usually will
		not do what you need to run the game with ScummVM -- rather they just copy the game
		.exe and install some shortcuts. ScummVM requires all game
		data to run, so you will need to copy those manually. Look at the
		<a class="ulink" href="http://www.scummvm.org/documentation.php?view=datafiles" target="_top">Game Data Files</a> page for
		further details.
		</p></td></tr><tr class="question"><td align="left" valign="top"><a name="id2505037"></a><a name="question.no-sound"></a><p><b>5.3.</b></p></td><td align="left" valign="top"><p><a name="question.no-sound.text"></a>I don't hear any sound.</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		Check the <a class="ulink" href="http://www.scummvm.org/compatibility.php" target="_top">compatibility list</a>
		to see if your game has sound support currently. You can
		also try the -s command line parameter to set the in game SFX volume.
		</p></td></tr><tr class="question"><td align="left" valign="top"><a name="id2505067"></a><a name="id2505068"></a><p><b>5.4.</b></p></td><td align="left" valign="top"><p>I don't hear any music.</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		See "<a class="xref" href="#question.no-sound" title="Question">I don't hear any sound.</a>".
		</p></td></tr><tr class="question"><td align="left" valign="top"><a name="id2505092"></a><a name="id2505093"></a><p><b>5.5.</b></p></td><td align="left" valign="top"><p>My game crashes at some point.</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		Check the <a class="ulink" href="http://www.scummvm.org/compatibility.php" target="_top">Compatibility List</a> to see if your game has any known issues. If you can
		reproduce this crash more than once, please report it to our Bug Tracker.
		See "<a class="xref" href="#question.report-bugs" title="Question">Reporting Bugs.</a>".
		</p><p>
		If you are experiencing random crashes, and your game plays music from
		CD, you most certainly have encountered a Windows bug. Try copying the data files from
		CD to your hard disk, and running them from there.
		</p></td></tr><tr class="question"><td align="left" valign="top"><a name="id2551089"></a><a name="id2551090"></a><p><b>5.6.</b></p></td><td align="left" valign="top"><p>ScummVM crashes, but console window disappears too quick to see the error message.</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		To make it visible, you should run ScummVM from command line. To open a 
		command prompt, open the Start Menu and select the 'Run' option. Under 
		Windows NT/2000/XP, type 'cmd.exe' (no quotes) in the dialog box that 
		shows up; under Windows 95/98/Me, type 'command.com' instead. If 
		necessary, change to the proper drive first by typing 'D:' (where 'D' is 
		the drive ScummVM is located). Change to ScummVM's directory by typing 
		'cd \your\path\to\scummvm' (substituting the appropriate path) and then 
		type 'scummvm'.
		</p></td></tr><tr class="question"><td align="left" valign="top"><a name="id2551112"></a><a name="question.messy-colors"></a><p><b>5.7.</b></p></td><td align="left" valign="top"><p><a name="question.messy-colors.text"></a>The game colors are messed up.</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		This is a known issue with using Amiga version datafiles. Select Amiga as a 
		platform in the ScummVM Game Options dialog, or use the --platform=amiga command
		line parameter to enable Amiga-specific code.
		</p></td></tr><tr class="question"><td align="left" valign="top"><a name="id2551138"></a><a name="id2551139"></a><p><b>5.8.</b></p></td><td align="left" valign="top"><p>The subtitles in my non English game are messed up.</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		You are most likely using a game such as Maniac Mansion or Zak McKracken if you have this problem. 
		You need to specify a language in the ScummVM Game Options dialog, with the -q parameter or by
		using the 'language' config file option.
		</p><p>
		Consult the 
		<a class="ulink" href="http://scummvm.svn.sourceforge.net/viewvc/*checkout*/scummvm/scummvm/trunk/README" target="_top">README</a> 
		or command line help for further information.
		</p></td></tr><tr class="question"><td align="left" valign="top"><a name="id2551167"></a><a name="id2551168"></a><p><b>5.9.</b></p></td><td align="left" valign="top"><p>How do I make my mac version of a game work?</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		First, if you use a ScummVM version prior to 0.7.0 we strongly recommend you
		to upgrade to the latest version, as we improved support for mac games considerably starting with 0.7.0.
		</p><p>
		For newer games ScummVM needs the main data file, usually called
		"&lt;Game Title&gt; Data" (where &lt;Game Title&gt; is
		name of your game, such as "The Dig" or "Sam &amp; Max").
		Some CDs may appear to only contain an application (watch out, it has
		almost the same name as the data file, except that it lacks the " Data"
		at the end). In that case there is still a separate data file but it is
		invisible.
		</p><p>
		There also exists a separate <a class="ulink" href="http://wiki.scummvm.org/index.php/HOWTO-Mac_Games" target="_top">tutorial
		</a> for setting up Mac versions
		</p><p>
		The older games which have LFL files should only need the platform set
		to 'macintosh' to run. See "<a class="xref" href="#question.messy-colors" title="Question">The game colors are messed up.</a>" for information on specifying the
		game platform.
		</p></td></tr><tr class="question"><td align="left" valign="top"><a name="id2551223"></a><a name="question.report-bugs"></a><p><b>5.10.</b></p></td><td align="left" valign="top"><p><a name="question.report-bugs.text"></a>Reporting Bugs.</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		To report a bug, please create a SourceForge account and follow the
		<a class="ulink" href="http://sourceforge.net/tracker/?atid=418820&amp;group_id=37116&amp;func=browse" target="_top">bugs</a>
		link from our homepage. Please make sure the bug is reproducible, and 
		still exists in the latest daily build/current Subversion version. Also check the
		<a class="ulink" href="http://www.scummvm.org/compatibility.php" target="_top">compatibility listing</a> for that game to ensure
		the issue is not already known. In your bugreport please provide the following
		information:
		</p><div class="itemizedlist"><ul type="disc"><li>ScummVM version (PLEASE test the latest Subversion/Daily build)</li><li>Bug details, including instructions on reproducing it</li><li>Language of game (English, German, ...)</li><li>Version of game (talkie, floppy, ...)</li><li>Platform and Compiler (Win32, Linux, MacOS, ...)</li><li>Attach a save game if possible</li><li>If this bug only occurred recently, please note the last
			version without the bug, and the first version including	 
			the bug. That way we can fix it quicker by looking at the
			changes made.</li></ul></div></td></tr><tr class="question"><td align="left" valign="top"><a name="id2551305"></a><a name="id2551306"></a><p><b>5.11.</b></p></td><td align="left" valign="top"><p>I downloaded the Broken Sword packs from your site but the game won't run.</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		These are not full games but reencoded cutscene (video) packs. To run the games you 
		still need the original disks. Originally cutscenes were encoded in proprietary
		format and Revolution Software kindly permitted us to reencode them into
		MPEG and distribute them freely on our site.
		</p></td></tr><tr class="question"><td align="left" valign="top"><a name="id2551324"></a><a name="id2551325"></a><p><b>5.12.</b></p></td><td align="left" valign="top"><p>There are no graphics in the Broken Sword I intro.</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		Be patient. There are about 12 seconds of speech only and eventually the Revolution logo
		will appear.
		</p></td></tr><tr class="question"><td align="left" valign="top"><a name="id2551340"></a><a name="id2551341"></a><p><b>5.13.</b></p></td><td align="left" valign="top"><p>I get "WARNING: Unable to open configuration file C:\windows\scummvm.ini!"</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		Make sure you have enough permissions to write in c:\windows directory. Also note that this warning the
		first time you run ScummVM, since the file does not exist yet then.
		</p></td></tr><tr class="question"><td align="left" valign="top"><a name="id2551357"></a><a name="id2551358"></a><p><b>5.14.</b></p></td><td align="left" valign="top"><p>I get "Failed to save game state to file: xxx"</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		Check savepath in Options-&gt;Paths-&gt;Save Path. That should point to writable directory.
		</p></td></tr><tr class="question"><td align="left" valign="top"><a name="id2551374"></a><a name="id2551375"></a><p><b>5.15.</b></p></td><td align="left" valign="top"><p>ScummVM starts, but all I get is a transparent window!</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		This problem has been reported to happen under Windows in some cases. Check
		that you have the latest drivers for your graphics card. If that does not
		help, try setting the <code class="envar">SDL_VIDEODRIVER</code> environment variable to
		"windib" and try again.
		</p><p>
		Apparently other applications have had the same problem, because the release
		notes for SDL 1.2.10 (May 17, 2006) contained the following note:
		</p><div class="blockquote"><blockquote class="blockquote"><p>
		The "windib" video driver is the default now, to prevent problems with
		certain laptops, 64-bit Windows, and Windows Vista. The DirectX driver
		is still available, and can be selected by setting the environment
		variable <code class="envar">SDL_VIDEODRIVER</code> to "directx".
		</p></blockquote></div></td></tr><tr class="question"><td align="left" valign="top"><a name="id2551415"></a><a name="id2551416"></a><p><b>5.16.</b></p></td><td align="left" valign="top"><p>ScummVM runs, but sound is stuttering and/or garbled!</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		This problem has been reported to happen under Windows in some cases. Check
		that you have the latest drivers for your sound card. If that does not help,
		try setting the <code class="envar">SDL_AUDIODRIVER</code> environment variable to "waveout"
		and try again.
		</p></td></tr><tr class="question"><td align="left" valign="top"><a name="id2551436"></a><a name="id2551437"></a><p><b>5.17.</b></p></td><td align="left" valign="top"><p>How do I set an environment variable?</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		That depends on what operating system and/or command shell you are using.
		Under Windows, you could try creating a file called
		<span class="command"><strong>scummvm.bat</strong></span> in the same folder as
		<span class="command"><strong>scummvm.exe</strong></span>. Open this file in your favorite text
		editor and put something like this in it:
		</p><div class="blockquote"><blockquote class="blockquote"><pre class="programlisting">@echo off
set SDL_VIDEODRIVER=windib
set SDL_AUDIODRIVER=waveout
scummvm.exe %1 %2 %3 %4 %5 %6 %7 %8 %9</pre></blockquote></div><p>
		You should now be able to run ScummVM by double-clicking on this batch file,
		instead of the ScummVM executable.
		</p><p>
		On more recent versions of Windows, you can also set an environment variable
		permanently, and for all applications, through the control panel.
		</p></td></tr><tr class="question"><td align="left" valign="top"><a name="id2551488"></a><a name="id2551489"></a><p><b>5.18.</b></p></td><td align="left" valign="top"><p>ScummVM starts somewhere in the middle of my two Xinerama monitors in fullscreen mode. Help!</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		In fact, this is SDL problem. SDL does by default has xinerama support
		enabled. Set the <code class="envar">SDL_VIDEO_FULLSCREEN_HEAD</code>
		environment variable to "1" to start ScummVM (and other SDL applications) in
		fullscreen on only one monitor. If this does not work make sure your SDL
		library does have Xinerama support compiled in.
		</p></td></tr><tr class="qandadiv"><td align="left" valign="top" colspan="2"><h3 class="title"><a name="id2551513"></a>6. Features</h3></td></tr><tr class="toc"><td align="left" valign="top" colspan="2"><dl><dt>6.1. <a href="#id2551517">Will you add support for zip archives?</a></dt></dl></td></tr><tr class="question"><td align="left" valign="top"><a name="id2551517"></a><a name="id2551518"></a><p><b>6.1.</b></p></td><td align="left" valign="top"><p>Will you add support for zip archives?</p></td></tr><tr class="answer"><td align="left" valign="top"></td><td align="left" valign="top"><p>
		We will not do it. There are two main reasons for that. First, we believe that it
		would ease illegal distribution of games. Second, we already support compression
		of sound &amp; speech in most larger titles, and use specially designed algorithms
		like MP3, Ogg and FLAC, so you can already reduce the size of the data files.
		</p><p>
		We as a team already discussed that question. We can't absolutely exclude
		the possibility of changing our mind one day in the future, but for now, we
		have no intentions to do so, hence please don't ask us about it!
		</p></td></tr></tbody></table></div>
