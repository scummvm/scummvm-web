<script type="text/javascript" src="/javascripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="/javascripts/game_demos.js"></script>

<div class="box">
	<div class="intro">
		<div class="navigation">
			<h2>{#gamesDemosHeading#}</h2>
			<ul>
			{foreach from=$demos item=group}
				<li><a href="/demos/#{$group.href}">{$group.name}</a></li>
			{/foreach}
			</ul>
		</div>
		<div class="text">
			<p>
				{#gamesDemosContentP1#}
			</p>
			<p>
				{#gamesDemosContentP2#}
			</p>
		</div>
		<div class="spacing">&nbsp;</div>
	</div>
	<div class="content">
		{foreach from=$demos item=group}
		<a name="{$group.href}"></a>
		<table class="chart color4 gameDemos">
			<caption>{$group.name}</caption>
			<thead>
				<tr class="color4">
					<th>{#gamesDemosH1#}</th>
					<th class="gameTarget">{#gamesDemosH2#}</th>
				</tr>
			</thead>
			<tbody>
			{foreach from=$group.demos item=demo}
				<tr class="{cycle values="color2, color0"}">
					<td>
						<img src="/images/cat-{$demo->getCategory()}.png" class="downloadImage" alt="">
						<a href="{$demo->getURL()}">{$demo->getName()}</a>
					</td>
					<td class="gameTarget">{$demo->getTarget()}</td>
				</tr>
			{/foreach}
			</tbody>
		</table>
		{/foreach}
	</div>
</div>
