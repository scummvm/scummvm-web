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
					{include file='shadowed_text.tpl' text='Скриншоты' shadowcolor='#fff' textcolor='#356a02'}
				</p>
			</div>
		</div>
		<div class="rbcontent">
			<a href="screenshots/{$random_shot.category}/{$random_shot.screenshot->getCategory()}/{$rand_pos+1}" id="screenshots_random">
				<img src="{$smarty.const.DIR_SCREENSHOTS}/{$rand_file.filename}.jpg" width="128" height="96" title="Кликните, чтобы увидеть в полном размере" alt="Случайный скриншот">
			</a>
		</div>
		<div class="rbbot">
			<div>
				<p>
					<a href="screenshots/" id="screenshots_prev">&laquo; пред.</a>
					<a href="screenshots/" id="screenshots_next">след. &raquo;</a>
				</p>
			</div>
		</div>
	</div>

	{* Introduction text. *}
	<div class="rbroundbox intro">
		<div class="rbtop">
			<div>
				<p>
					{include file='shadowed_text.tpl' text='Что такое ScummVM?' shadowcolor='#fff' textcolor='#356a02'}
				</p>
			</div>
		</div>
		<div class="rbcontent">
			<div class="rbwrapper">
				<p>
					ScummVM &mdash; это программа, которая позвояет вам запускать некоторые
					классические адвенчуры и квесты при наличии у вас файлов данных от этих игр.
					Суть в том, что ScummVM заменяет исполняемые файлы игры, тем самым позволяя
					играть на тех системах, которые даже не существовали во время их создания!
				</p>
				<p>
					ScummVM поддерживает множество квестов и адвенчур, в том числе:
					игры на SCUMM от LucasArts (такие как <i>Monkey Island</i> 1-3,
					<i>Day of the Tentacle</i>, <i>Sam &amp; Max</i>, ...),
					многие AGI и SCI игры от Sierra (такие как
					<i>King's Quest</i> 1-6, <i>Space Quest</i> 1-5, ...),
					<i>Discworld</i> 1 и 2, <i>Simon the Sorcerer</i>
					1 и 2, <i>Beneath A Steel Sky</i>,
					<i>Lure of the Temptress</i>, <i>Broken Sword</i> 1 and 2,
					<i>Flight of the Amazon Queen</i>, <i>Gobliiins</i> 1-3,
					<i>The Legend of Kyrandia</i> 1-3, множество детских игр от
					Humongous Entertainment
					(в том числе игры про <i>Pыбку Фредди</i> и <i>Бип-бипа</i>),
					а также множество других игр.
				<p>
					Вы можете найти полный список всех поддерживаемых игр и насколько
					хорошо работает каждая их них, на
					<a href="compatibility/">странице совместимости</a>.
					ScummVM активно развивается, так что заглядывайте почаще.
					Среди систем, на которых теперь можно поиграть в эти игры, находятся: Windows, Linux, Mac OS X,
					Dreamcast, PocketPC, PalmOS, AmigaOS, BeOS, OS/2, PSP, PS2, SymbianOS и многие другие...
				</p>
				<p>
					Наш форум и канал IRC, <a href="irc://irc.freenode.net/scummvm"> #scummvm на
					irc.freenode.net</a>, открыты для ваших комментариев и пожеланий. Пожалуйста, прочитайте
					<a href="faq/">ЧаВо</a> перед тем, как задавать вопросы.
				</p>
			</div>
		</div>
		<div class="rbbot"><div><p>&nbsp;</p></div></div>
	</div>
</div>
