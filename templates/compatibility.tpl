<div class="box">
	<div class="intro">
		<p>
			This page lists the progress of ScummVM as it relates to individual game compatibility.
			Please note this list applies to the English versions of games. We attempt to test many versions of games, however there are occasionally problems with other languages.
		</p>
		<p>
			Click on the game name to view the complete notes of a game.
		</p>
		{if $version == 'SVN'}
			<p>
				This is the compatibility of the current WIP SVN version, <b>not of a stable release</b>
				(Please see one of the following for the Compatibility charts of the stable releases:
				{foreach from=$versions item=ver name=versions_loop}
					{if $smarty.foreach.versions_loop.last}
						{assign var='last' value=')'}
					{/if}
					<a href="compatibility/{$ver}/">{$ver}</a>{$last}
				{/foreach}
			</p>
			<p>
				As this is the status of the Work In Progress version, occasional temporary bugs
				may be introduced with new changes, thus this list refects the 'best case' scenario.
				It is highly recommended to use the latest stable release, where possible.
			</p>
		{else}
			<p>
				Also, this is the compatibility of the {$version} stable release, <b>not of SVN snapshots/daily builds</b>.
				The status of these can be found on the <a href="compatibility/">SVN Compatibility</a> chart.
			</p>
			<p>
			You can also see the Compatibility chart for these releases:
			{foreach from=$versions item=ver}
				<a href="compatibility/{$ver}/">{$ver}</a>
			{/foreach}
			</p>
		{/if}
		<p>
			<small>Last Updated: {$last_updated}</small>
		</p>
	</div>
	<div class="content">
		<table class="chart color4">
			<caption>Color Key</caption>
			<tbody>
				<tr class="color2">
					<td class="pct0" align="center">&nbsp;0</td>
					<td class="pct5" align="center">&nbsp;5</td>
					<td class="pct10" align="center">10</td>
					<td class="pct15" align="center">15</td>
					<td class="pct20" align="center">20</td>
					<td class="pct25" align="center">25</td>
					<td class="pct30" align="center">30</td>
					<td class="pct35" align="center">35</td>
					<td class="pct40" align="center">40</td>
					<td class="pct45" align="center">45</td>
					<td class="pct50" align="center">50</td>
					<td class="pct55" align="center">55</td>
					<td class="pct60" align="center">60</td>
					<td class="pct65" align="center">65</td>
					<td class="pct70" align="center">70</td>
					<td class="pct75" align="center">75</td>
					<td class="pct80" align="center">80</td>
					<td class="pct85" align="center">85</td>
					<td class="pct90" align="center">90</td>
					<td class="pct95" align="center">95</td>
					<td class="pct100" align="center">100</td>
				</tr>
			</tbody>
		</table>

		{foreach from=$compat_data key=company item=games name=compat_loop}
			<table class="chart color4">
				<caption>{$company} Game Compatibility Chart</caption>
				<thead>
					<tr class="color4">
						<th>Game Full Name</th>
						<th>Game Short Name</th>
						<th>% Completed</th>
					</tr>
				</thead>
				<tbody>
				{foreach from=$games item=game}
					{math equation="x - (x % 5)" x=$game->getPercent() assign='pct_class'}
					<tr class="color{cycle values='2,0'}">
						<td><a href="compatibility/{$version}/{$game->getTarget()}/">{$game->getName()}</a></td>
						<td>{$game->getTarget()}</td>
						<td align="center" class="pct{$pct_class}">{$game->getPercent()}%</td>
					</tr>
				{/foreach}
				</tbody>
			</table>
		{/foreach}
	</div>
</div>
