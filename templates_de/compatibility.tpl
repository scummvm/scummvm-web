<div class="box">
	<div class="intro">
		<p>
			Diese Seite zeigt den Fortschritt von ScummVM bez&uuml;glich der Kompatibilit&auml;t zu den einzelnen Spielen.
			Bitte beachte, dass diese Liste jeweils f&uuml;r die englische Spielversion gilt. Wir versuchen, viele Spieleversionen zu testen, trotzdem k&ouml;nnen vereinzelt Probleme mit anderen Sprachen auftreten.
		</p>
		<p>
			Klicke auf den Namen eines Spiels, um die vollst&auml;ndigen Notizen zu diesem Spiel anzusehen.
		</p>
		{if $version == 'DEV'}
			<p>
				Dies ist die Kompatibilit&auml;tsliste der aktuellen Entwicklerversion, <b>nicht die einer stabilen Version</b>
				(Bitte beachte die Kompatibilit&auml;tslisten der bisher vere&ouml;ffentlichten stabilen Versionen:
				{foreach from=$versions item=ver name=versions_loop}
					{if $smarty.foreach.versions_loop.last}
						{assign var='last' value=')'}
					{/if}
					<a href="compatibility/{$ver}/">{$ver}</a>{$last}
				{/foreach}
			</p>
			<p>
				Da dies den Status der aktuellen Entwicklerversion darstellt, k&ouml;nnen vereinzelt vor&uuml;bergehende
				Fehler durch neue &Auml;nderungen eingef&uuml;hrt werden, weshalb diese Liste den Optimalfall darstellt.
			    Wenn m&ouml;glich, empfehlen wir dringend die Verwendung der jeweils aktuellen stabilen Version.
			</p>
		{else}
			<p>
				Dies ist die Kompatibilit&auml;tsliste f&uuml;r die aktuelle stabile Version {$version}, <b>nicht die der aktuellen Entwicklerversion</b>.
				Der Status der Entwicklerversion kann der <a href="compatibility/"> Kompatibilit&auml;tsliste f&uuml;r Entwicklerversionen</a> entnommen werden.
			</p>
			<p>
			Hier kannst Du die Kompatibilit&auml;tslisten der fr&uuml;heren Versionen einsehen:
			{foreach from=$versions item=ver}
				<a href="compatibility/{$ver}/">{$ver}</a>
			{/foreach}
			</p>
		{/if}
		<p>
			<small>zuletzt aktualisiert: {$last_updated}</small>
		</p>
	</div>
	<div class="content">
		<table class="chart color4 colorKeyTable">
			<caption>Legende</caption>
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
				<caption>Kompatibilit&auml;tsliste f&uuml;r Spiele von {$company}</caption>
				<thead>
					<tr class="color4">
						<th class="gameFullName">Kompletter Name des Spiels</th>
						<th class="gameShortName">Kurzer Name des Spiels</th>
						{if $old_layout == 'no'}
							<th class="gameSupportLevel">Grad der Unterst&uuml;tzung</th>
						{else}
							<th class="gameSupportLevel">% vollst&auml;ndig</th>
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
