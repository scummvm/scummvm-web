{math equation="x - (x % 5)" x=$game->getPercent() assign='pct_class'}

<div class="box">
	<div class="intro">
		<p>
			Game compatibility details
		</p>
	</div>
	<div class="content">
		<table class="chart color4">
			<caption>Game Compatibility Chart</caption>
			<thead>
				<tr class="color4">
					<th>Game Full Name</th>
					<th>Game Short Name</th>
					<th>% Completed</th>
				</tr>
			</thead>
			<tbody>
				<tr class="color0">
					<td>{$game->getName()}</td>
					<td>{$game->getTarget()}</td>
					<td align="center" class="pct{$pct_class}">{$game->getPercent()}%</td>
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
