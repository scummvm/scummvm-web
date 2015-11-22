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
			Details zur Kompatibilit&auml;t
		</p>
	</div>
	<div class="content">
		<table class="chart color4">
			<caption>Kompatibilit&auml;tsliste</caption>
			<thead>
				<tr class="color4">
					<th>Kompletter Name des Spiels</th>
					<th>Kurzer Name des Spiels</th>
					{if $old_layout == 'no'}
						<th>Grad der Unterst&uuml;tzung</th>
					{else}
						<th>% vollst&auml;ndig</th>
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
			<a href="compatibility/{$version}/">&laquo; Back</a>
		</p>
	</div>
</div>
