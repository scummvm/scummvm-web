{* List all screenshots for an entry. *}

{* A single game (target) was selected. *}
{if !empty($game)}
	<div class="box">
		<div class="head">Gallerie</div>
		{foreach from=$screenshots.games item=g name=cat_loop}
			{if $game == $g->getCategory()}
				<h3 class="subhead">{$g->getName()}</h3>
				{foreach from=$g->getFiles() item=fdata name=game_loop}
					<div class="screenshot">
						<a href="screenshots/{$category}/{$g->getCategory()}/{$smarty.foreach.game_loop.iteration}/" rel="lightbox-{$g->getCategory()}" title="{$fdata.caption}">
							<img src="{$smarty.const.DIR_SCREENSHOTS}/{$fdata.filename}.jpg" alt="{$g->getName()} screenshot #{$smarty.foreach.cat_loop.iteration}" height="192" width="256">
						</a>
						<div class="caption">{$fdata.caption}</div>
					</div>
				{/foreach}
			{/if}
		{/foreach}
		<div class="spacing"></div>
	</div>
	<a href="screenshots/{$category}/">Back</a>

{else}

	{* No game selected, but the complete category. *}
	<div class="box">
		<div class="head">Gallerie</div>
		{foreach from=$screenshots.games item=g name=cat_loop}
			<div>
				<h3 class="subhead"><a href="screenshots/{$category}/{$g->getCategory()}/">{$g->getName()}</a></h3>
				{foreach from=$g->getFiles() item=fdata name=game_loop}
					<div class="screenshot">
						<a href="screenshots/{$category}/{$g->getCategory()}/{$smarty.foreach.game_loop.iteration}/" rel="lightbox-{$g->getCategory()}" title="{$fdata.caption}">
							<img src="{$smarty.const.DIR_SCREENSHOTS}/{$fdata.filename}.jpg" alt="{$g->getName()} screenshot #{$smarty.foreach.cat_loop.iteration}" height="192" width="256">
						</a>
						<div class="caption">{$fdata.caption}</div>
					</div>
				{/foreach}
			</div>
			<div class="spacing"></div>
		{/foreach}
	</div>
	<a href="screenshots/">Back</a>
{/if}
