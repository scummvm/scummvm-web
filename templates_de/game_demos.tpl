<script type="text/javascript" src="javascripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="javascripts/game_demos.js"></script>

<div class="box">
	<div class="intro">
		<div class="navigation">
			<h2>Navigation</h2>
			<ul>
			{foreach from=$demos item=group}
				<li><a href="demos/#{$group.href}">{$group.name}</a></li>
			{/foreach}
			</ul>
		</div>
		<div class="text">
			<p>
				Diese Seite listet Demo-Versionen von verschiedenen Spielen auf. Bitte kontaktiere uns, wenn du eine Demo-Version besitzt, die hier nicht aufgef&uuml;hrt ist.
			</p>
			<p>
				Aus technischen Gr&uuml;nden werden Demo-Versionen von Beneath a Steel Sky nicht unterst&uuml;tzt.
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
					<th>Demo-Name / Download-Link</th>
					<th class="gameTarget">Game Target</th>
				</tr>
			</thead>
			<tbody>
			{foreach from=$group.demos item=demo}
				<tr class="{cycle values="color2, color0"}">
					<td>
						<img src="images/cat-{$demo->getCategory()}.png" class="downloadImage">
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
