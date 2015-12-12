{if $old_layout == 'no'}
	{assign var="x" value=$game->getSupportLevel()}
	{assign var="pct_class" value=$support_level_class.$x}
	{assign var="support_level" value=$support_level_desc.$x}
{else}
	{math equation="x - (x % 5)" x=$game->getSupportLevel() assign='pct_class'}
	{assign var="pct_class" value="pct"|cat:$pct_class}
	{assign var="support_level" value=$game->getSupportLevel()|cat:"%"}
{/if}

<div class="box">
	<div class="intro">
		<p>
			{#compatibilityDetailsInto#}
		</p>
	</div>
	<div class="content">
		<table class="chart color4">
			<caption>{#compatibilityDetailsChartTitle#}</caption>
			<thead>
				<tr class="color4">
					<th>{#compatibilityDetailsChartCol1#}</th>
					<th>{#compatibilityDetailsChartCol2#}</th>
					{if $old_layout == 'no'}
						<th>{#compatibilityDetailsChartCol3a#}</th>
					{else}
						<th>{#compatibilityDetailsChartCol3b#}</th>
					{/if}
				</tr>
			</thead>
			<tbody>
				<tr class="color0">
					<td>{$game->getName()}</td>
					<td>{$game->getTarget()}</td>
					<td align="center" class="{$pct_class}">{$support_level}</td>
				</tr>
				<tr class="color2">
					<td colspan="3" class="details">
						{$game->getNotes()}
					</td>
				</tr>
			</tbody>
		</table>
		<p class="bottom-link">
			<a href="compatibility/{$version}/">{#compatibilityDetailsBack#}</a>
		</p>
	</div>
</div>
