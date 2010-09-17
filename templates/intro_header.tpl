{* Random screenshot. *}
{assign var='rand_files' value=$random_shot.screenshot->getFiles()}
{assign var='rand_max' value=$rand_files|@count}
{assign var='rand_pos' value=0|rand:$rand_max-1}
{assign var='rand_file' value=$rand_files[$rand_pos]}

{* Introduction header, included from index.tpl *}
<div id="intro_header">
	{* Screenshots. *}
	<div class="sshots">
		<div class="rbtop">
			<div>
				<p>
					{include file='shadowed_text.tpl' text='Screenshots' shadowcolor='#fff' textcolor='#356a02'}
				</p>
			</div>
		</div>
		<div class="rbcontent">
			<a href="screenshots/{$random_shot.category}/{$random_shot.screenshot->getCategory()}/{$rand_pos+1}" id="screenshots_random">
				<img src="{$smarty.const.DIR_SCREENSHOTS}/{$rand_file.filename}.jpg" width="128" height="96" title="Click to view Full Size" alt="Random screenshot">
			</a>
		</div>
		<div class="rbbot">
			<div>
				<p>
					<a href="screenshots/" id="screenshots_prev">&laquo; previous</a>
					<a href="screenshots/" id="screenshots_next">next &raquo;</a>
				</p>
			</div>
		</div>
	</div>

	{* Introduction text. *}
	<div class="rbroundbox intro">
		<div class="rbtop">
			<div>
				<p>
					{include file='shadowed_text.tpl' text='What Is ScummVM?' shadowcolor='#fff' textcolor='#356a02'}
				</p>
			</div>
		</div>
		<div class="rbcontent">
			<div class="rbwrapper">
				<p>
					ScummVM is a program which allows you to run certain classic graphical
					point-and-click adventure games, provided you already have their data files.
					The clever part about this: ScummVM just replaces the executables shipped
					with the games, allowing you to play them on systems for which they were
					never designed!
				</p>
				<p>
					ScummVM supports many adventure games, including LucasArts
					SCUMM games (such as <i>Monkey Island</i> 1-3,
					<i>Day of the Tentacle</i>, <i>Sam &amp; Max</i>, ...),
					Sierra's AGI games (such as
					<i>King's Quest</i> 1-3, <i>Space Quest</i> 1-2, ...),
					<i>Discworld</i> 1 and 2, <i>Simon the Sorcerer</i>
					1 and 2, <i>Beneath A Steel Sky</i>,
					<i>Lure of the Temptress</i>, <i>Broken Sword</i> 1 and 2,
					<i>Flight of the Amazon Queen</i>, <i>Gobliiins</i> 1-3,
					<i>The Legend of Kyrandia</i> 1-3, many of
					Humongous Entertainment's children's SCUMM games
					(including <i>Freddi Fish</i> and <i>Putt Putt</i> games)
					and many more.
				<p>
					You can find a full list with details on which games are
					supported and how well on the
					<a href="compatibility/">compatibility page</a>.
					ScummVM is continually improving, so check back often.
					Among the systems on which you can play those games are Windows, Linux, Mac OS X,
					Dreamcast, PocketPC, PalmOS, AmigaOS, BeOS, OS/2, PSP, PS2, SymbianOS and many more...
				</p>
				<p>
					Our forum and IRC channel, <a href="irc://irc.freenode.net/scummvm"> #scummvm on
					irc.freenode.net</a>, are open for comments and suggestions. Please read our
					<a href="faq/">FAQ</a> before posting.
				</p>
			</div>
		</div>
		<div class="rbbot"><div><p>&nbsp;</p></div></div>
	</div>
</div>
