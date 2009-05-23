<div class="box">
	<div class="head">SCUMM Data File MD5 Checksums</div>
	<div class="content">
		<div class="intro">
			<p>
				All the MD5 checksums listed below are computed for the canonic "first" file of each game.
				This is usually a file like "00.lfl", "000.lfl", "*.000", "*.la0", "*.he0" etc.
			</p>
			<p>
				If you have data files not listed here, or if the MD5 of your data files
				differs from the values listed here, please drop us a note so we can update
				the table. Email us at <i>scummvm-devel AT lists DOT sourceforge DOT net</i>.
			</p>
			<p>
				Note: If a game appears here, this does <b>not</b> imply that it is officially supported by ScummVM or
				even playable. If you want to find out whether a game is supported, please consult the
				<a href="compatibility/">compatibility page</a>.
			</p>
		</div>

		<div class="document-time">
			Last updated: {$last_modified|date_format:"%B %e, %Y, %I:%M %p"}
		</div>
		<br><br>

		{foreach from=$games key=gameid item=game name=games_loop}
			<table class="md5-table">
				<caption>{$game.description} ({$gameid})</caption>
				<thead>
					<tr>
						<th>MD5</th>
						<th>Extra information</th>
						<th>Platform</th>
						<th>Language</th>
						<th>Source</th>
					</tr>
				</thead>
				<tbody>
					{foreach from=$game.md5sums item=data}
					<tr class="{cycle values='odd,even'}">
						<td class="md5">{$data.md5}</td>
						<td>
							{if $data.description != '-'}
								{$data.description}
							{/if}
							{if $data.extra_description != '-'}
								({$data.extra_description})
							{/if}
						</td>
						<td>{$data.platform}</td>
						<td>
							<img src="images/fl-{$data.language}.png" alt="{$data.language}">
							{$data.language}
						</td>
						<td>{$data.source}</td>
					</tr>
					{/foreach}
				</tbody>
			</table>
		{/foreach}
	</div>
</div>
