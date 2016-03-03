<div class="box">
	<div class="intro">
		<p>
			{#compatibilityIntro#}
		</p>
		<p>
			{#compatibilityIntroExplanation#}
		</p>
		{if $version == 'DEV'}
			<p>
				{#compatibilityDevContent#}
				{foreach from=$versions item=ver name=versions_loop}
					{if $smarty.foreach.versions_loop.last}
						{assign var='last' value=')'}
					{/if}
					<a href="/compatibility/{$ver}/">{$ver}</a>{$last}
				{/foreach}
			</p>
			<p>
				{#compatibilityDevDisclaimer#}
			</p>
		{else}
			<p>
				{'/\x7bversion\x7d/'|preg_replace:$version:#compatibilityStableContent#}
			</p>
			<p>
				{#compatibilityStableReleases#}
			{foreach from=$versions item=ver}
				<a href="/compatibility/{$ver}/">{$ver}</a>
			{/foreach}
			</p>
		{/if}
		<p>
			<small>{#compatiblityLastUpdated#} {$last_updated}</small>
		</p>
	</div>
	<div class="content">
		<table class="chart color4 colorKeyTable">
			<caption>{#compatibilityLegendTitle#}</caption>
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
				<caption>{'/\x7bcompany\x7d/'|preg_replace:$company:#compatibilitySectionTitle#}</caption>
				<thead>
					<tr class="color4">
						<th class="gameFullName">{#compatibilityDetailsChartCol1#}</th>
						<th class="gameShortName">{#compatibilityDetailsChartCol2#}</th>
						{if $old_layout == 'no'}
							<th class="gameSupportLevel">{#compatibilityDetailsChartCol3a#}</th>
						{else}
							<th class="gameSupportLevel">{#compatibilityDetailsChartCol3b#}</th>
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
						<td class="gameFullName"><a href="/compatibility/{$version}/{$game->getTarget()}/">{$game->getName()}</a></td>
						<td class="gameShortName">{$game->getTarget()}</td>
						<td class="gameSupportLevel {$pct_class}">{$support_level}</td>
					</tr>
				{/foreach}
				</tbody>
			</table>
		{/foreach}
	</div>
</div>
