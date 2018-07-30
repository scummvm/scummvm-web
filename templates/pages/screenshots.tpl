{* Random screenshot. *}
{assign var='rand_files' value=$random_shot.screenshot->getFiles()}
{assign var='rand_max' value=$rand_files|@count}
{assign var='rand_pos' value=0|rand:($rand_max-1)}
{assign var='rand_file' value=$rand_files[$rand_pos]}

{* List the available categories. *}
<div class="box">
	<div class="head">{#screenshotsHeading#}</div>
	<div class="intro row">
		<div class="navigation col-1-2">
			<h4 class="subhead">{#screenshotsNavigation#}</h4>
			<ul>
			{foreach from=$screenshots item=arr}
				<li><a href="/screenshots/#{$arr.category}">{eval var=$arr.title}</a></li>
			{/foreach}
			</ul>
		</div>
		<div class="text col-1-2">
			<div class="round-box">
				<div class="content gallery">
					<a href="{$smarty.const.DIR_SCREENSHOTS}/{$rand_file.filename}-full.png" title="{$rand_file.caption}">
						<img class="random-screenshot" src="{$smarty.const.DIR_SCREENSHOTS}/{$rand_file.filename}-full.png" alt="{$rand_file.caption}">
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="content">
		{foreach from=$screenshots item=arr}
		<div class="subhead" id="{$arr.category}">
			<a href="/screenshots/{$arr.category}/">{$arr.title}</a>
		</div>
		<div class="scr-content scr-content-{$arr.category}">
      {include file='components/list_items.tpl' list=$arr.games type='games'}
		</div>
		{/foreach}
	</div>
</div>

{literal}
<script>
	window.addEventListener('DOMContentLoaded', function() {
		baguetteBox.run('.gallery');
	});
</script>
{/literal}
