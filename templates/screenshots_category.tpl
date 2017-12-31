{* List all screenshots for an entry. *}

{* A single game (target) was selected. *}
{if !empty($game)}
	<div class="box">
		<div class="head">{#screenshotsCategoryHeading#}</div>
		<div class="content gallery">
			{foreach from=$screenshots.games item=g name=cat_loop}
				{if $game == $g->getCategory()}
					<h3 class="subhead">{$g->getName()}</h3>
					{foreach from=$g->getFiles() item=fdata name=game_loop}
						<div class="screenshot">
							<a href="{$smarty.const.DIR_SCREENSHOTS}/{$fdata.filename}-full.png" title="{$fdata.caption}">
								<img src="{$smarty.const.DIR_SCREENSHOTS}/{$fdata.filename}.jpg" alt="{$g->getName()} screenshot #{$smarty.foreach.cat_loop.iteration}">
							</a>
							<div class="caption">{$fdata.caption}</div>
						</div>
					{/foreach}
				{/if}
			{/foreach}
		</div>		
	</div>
	<a href="/screenshots/{$category}/">{#screenshotsCategoryBack#}</a>

{else}

	{* No game selected, but the complete category. *}
	<div class="box">
		<div class="head">{#screenshotsCategoryHeading#}</div>
		<div class="content">
		{foreach from=$screenshots.games item=g name=cat_loop}
			<div class="gallery">
				<h3 class="subhead"><a href="/screenshots/{$category}/{$g->getCategory()}/">{$g->getName()}</a></h3>
				{foreach from=$g->getFiles() item=fdata name=game_loop}
					<div class="screenshot">
						<a href="{$smarty.const.DIR_SCREENSHOTS}/{$fdata.filename}-full.png" title="{$fdata.caption}">
							<img src="{$smarty.const.DIR_SCREENSHOTS}/{$fdata.filename}.jpg" alt="{$g->getName()} screenshot #{$smarty.foreach.cat_loop.iteration}">
						</a>
						<div class="caption">{$fdata.caption}</div>
					</div>
				{/foreach}
			</div>		
		{/foreach}
		</div>
	</div>
	<a href="/screenshots/">{#screenshotsCategoryBack#}</a>
{/if}

{literal}
<script>
	window.addEventListener('load', function() {
		baguetteBox.run('.gallery');
	});
</script>
{/literal}