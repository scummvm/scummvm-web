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
					{include file='shadowed_text.tpl' text='Bildschirmfotos' shadowcolor='#fff' textcolor='#356a02'}
				</p>
			</div>
		</div>
		<div class="rbcontent">
			<a href="screenshots/{$random_shot.category}/{$random_shot.screenshot->getCategory()}/{$rand_pos+1}" id="screenshots_random">
				<img src="{$smarty.const.DIR_SCREENSHOTS}/{$rand_file.filename}.jpg" width="128" height="96" title="F&uuml;r Vollbild bitte Bild anklicken" alt="Zuf&auml;lliges Bildschirmfoto">
			</a>
		</div>
		<div class="rbbot">
			<div>
				<p>
					<a href="screenshots/" id="screenshots_prev">&laquo; vorheriges</a>
					<a href="screenshots/" id="screenshots_next">n&auml;chstes &raquo;</a>
				</p>
			</div>
		</div>
	</div>

	{* Introduction text. *}
	<div class="rbroundbox intro">
		<div class="rbtop">
			<div>
				<p>
					{include file='shadowed_text.tpl' text='Was ist ScummVM?' shadowcolor='#fff' textcolor='#356a02'}
				</p>
			</div>
		</div>
		<div class="rbcontent">
			<div class="rbwrapper">
				<p>
					ScummVM ist ein Programm, welches dir erm&ouml;glicht, bestimmte klassische
					Grafik-Adventures (Point-and-Click-Adventures) auszuf&uuml;hren, vorausgesetzt,
					du bist im Besitz der passenden Spieldateien.
					ScummVM ersetzt dabei die ausf&uuml;hrbaren Programmdateien,
					die urspr&uuml;nglich mit dem Spiel mitgeliefert wurden. Dadurch k&ouml;nnen diese Spiele
					auf Systemen gespielt werden, f&uuml;r welche sie nie entwickelt wurden!
				</p>
				<p>
					ScummVM unterst&uuml;tzt viele Adventures, einschlie&szlig;lich der SCUMM-
					Spiele von LucasArts (beispielsweise <i>Monkey Island</i> 1-3,
					<i>Day of the Tentacle</i>, <i>Sam &amp; Max</i>, ...),
					viele AGI- und SCI-Spiele von Sierra (wie <i>King's Quest</i> 1-6,
					<i>Space Quest</i> 1-5, ...),
					<i>Discworld</i> 1 und 2, <i>Simon the Sorcerer</i> 1 und 2,
					<i>Beneath a Steel Sky</i>,
					<i>Lure of the Temptress</i>, <i>Broken Sword (dt: Baphomets Fluch)</i> 1 und 2,
					<i>Flight of the Amazon Queen </i>, <i>Gobliiins</i> 1-3,
					<i>The Legend of Kyrandia</i> 1-3, viele der SCUMM-Spiele f&uuml;r Kinder
					von Humongous Entertainment (einschlie&szlig;lich der <i>Freddi-Fisch-</i>
					und der <i>T&ouml;ff-T&ouml;ff-</i>Spiele) und noch vielen weiteren mehr.
				</p>
				<p>
					Du findest eine komplette Liste mit allen Informationen dar&uuml;ber,
					welche Spiele wie gut unterst&uuml;tzt werden auf der <a href="compatibility/">
					Kompatibilit&auml;tsseite</a>.
					Da ScummVM laufend verbessert wird, lohnt es sich, h&auml;ufiger vorbeizuschauen.
					Unter den Systemen, auf welchen Du diese Spiele spielen kannst, sind Windows, Linux, Mac OS X,
					Dreamcast, PocketPC, PalmOS, AmigaOS, BeOS, OS/2, PSP, PS2, SymbianOS und viele mehr.
				</p>
				<p>
					Offizielle Anlaufstellen f&uuml;r Kommentare und Vorschl&auml;ge sind das <a href="http://forums.scummvm.org">
					(englischsprachige) Forum</a> und der <a href="irc://irc.freenode.net/scummvm"> (ebenfalls englischsprachige) IRC-Channel #scummvm </a>
					im IRC-Netzwerk freenode.net. Die Kommunikation in Forum und IRC sollte ausschlie&szlig;lich auf Englisch erfolgen.
					
					Bitte lies unsere <a href="faq/">h&auml;ufig gestellten Fragen (FAQ)</a>, bevor du einen Eintrag dort verfasst.
				</p>
			</div>
		</div>
		<div class="rbbot"><div><p>&nbsp;</p></div></div>
	</div>
</div>
