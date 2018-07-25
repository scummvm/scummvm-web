<script type="text/javascript" src="/javascripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="/javascripts/game_demos.js"></script>

<div class="box">
	<div class="intro row">
		<div class="navigation col-1-2">
			<h4>{#gamesDemosHeading#}</h4>
			<ul>
			{foreach from=$demos item=group}
				<li><a href="/demos/#{$group.href}">{$group.name}</a></li>
			{/foreach}
			</ul>
		</div>
		<div class="text col-1-2">
			<p>
				{#gamesDemosContentP1#}
			</p>
			<p>
				{#gamesDemosContentP2#}
			</p>
		</div>
	</div>
	<div class="content">
		{foreach from=$demos item=group}
		<table class="chart color4 gameDemos" id="{$group.href}">
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
