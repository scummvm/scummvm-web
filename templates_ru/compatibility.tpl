<div class="box">
	<div class="intro">
		<p>
			На этой странице представлено отображение прогресса разработки ScummVM по отдельным играм.
			Пожалуйста, примите во внимание, что представленные данные касаются версий игр на английском языке.
			Мы стараемся протестировать много разных версий, однако с локализованными играми иногда бывают проблемы.
		</p>
		<p>
			Кликните по названию игры, чтобы посмотреть все заметки по её совместимости.
		</p>
		{if $version == 'DEV'}
			<p>
				Это таблица совместимости текущей версии в разработке, а <b>не стабильных релизов</b>
				(Смотрите соответствующую страницу совместимости стабильных версий:
				{foreach from=$versions item=ver name=versions_loop}
					{if $smarty.foreach.versions_loop.last}
						{assign var='last' value=')'}
					{/if}
					<a href="compatibility/{$ver}/">{$ver}</a>{$last}
				{/foreach}
			</p>
			<p>
				Так как здесь представлено состояние версии в разработке, иногда изменения
				могут привнести новые ошибки. Этот список отображает "оптимистичную" совместимость.
				Настоятельно рекомендуется при возможности использоать стабильную версию.
			</p>
		{else}
			<p>
				Это таблица совместимости стабильной версии {$version}, а <b>не текущей версии в разработке/дневных сборок</b>.
				Состояние текущей версии можно найти на странице <a href="compatibility/">таблицы совместимости версии в разработке</a>.
			</p>
			<p>
			Вы также можете посмотреть таблицы совместимости следующих версий:
			{foreach from=$versions item=ver}
				<a href="compatibility/{$ver}/">{$ver}</a>
			{/foreach}
			</p>
		{/if}
		<p>
			<small>Последнее обновление: {$last_updated}</small>
		</p>
	</div>
	<div class="content">
		<table class="chart color4 colorKeyTable">
			<caption>Цветовая шкала</caption>
			<tbody>
				<tr class="color2">
					{if $old_layout == 'no'}
						{foreach from=$support_level_desc key=level item=desc}
							<td class={$support_level_class.$level} align='center'>{$desc}</td>
						{/foreach}
					{else}
						<td class="pct0">&nbsp;0</td>
						<td class="pct5">&nbsp;5</td>
						<td class="pct10">10</td>
						<td class="pct15">15</td>
						<td class="pct20">20</td>
						<td class="pct25">25</td>
						<td class="pct30">30</td>
						<td class="pct35">35</td>
						<td class="pct40">40</td>
						<td class="pct45">45</td>
						<td class="pct50">50</td>
						<td class="pct55">55</td>
						<td class="pct60">60</td>
						<td class="pct65">65</td>
						<td class="pct70">70</td>
						<td class="pct75">75</td>
						<td class="pct80">80</td>
						<td class="pct85">85</td>
						<td class="pct90">90</td>
						<td class="pct95">95</td>
						<td class="pct100">100</td>
					{/if}
				</tr>
			</tbody>
		</table>

		{foreach from=$compat_data key=company item=games name=compat_loop}
			<table class="chart color4">
				<caption>Таблица совместимости игр {$company}</caption>
				<thead>
					<tr class="color4">
						<th class="gameFullName">Полное название игры</th>
						<th class="gameShortName">Краткое название игры</th>
						{if $old_layout == 'no'}
							<th class="gameSupportLevel">Уровень поддержки</th>
						{else}
							<th class="gameSupportLevel">Завершено, %</th>
						{/if}
					</tr>
				</thead>
				<tbody>
				{foreach from=$games item=game}
					{if $old_layout == 'no'}
						{assign var="x" value=$game->getSupportLevel()}
						{assign var="pct_class" value=$support_level_class.$x}
						{assign var="support_level" value=$support_level_desc.$x}
					{else}
						{math equation="x - (x % 5)" x=$game->getSupportLevel() assign='pct_class'}
						{assign var="pct_class" value="pct"|cat:$pct_class}
						{assign var="support_level" value=$game->getSupportLevel()|cat:"%"}
					{/if}
					<tr class="color{cycle values='2,0'}">
						<td class="gameFullName"><a href="compatibility/{$version}/{$game->getTarget()}/">{$game->getName()}</a></td>
						<td class="gameShortName">{$game->getTarget()}</td>
						<td class="gameSupportLevel {$pct_class}">{$support_level}</td>
					</tr>
				{/foreach}
				</tbody>
			</table>
		{/foreach}
	</div>
</div>
