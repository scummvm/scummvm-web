{* Random screenshot. *}
{assign var='rand_files' value=$random_shot.screenshot->getFiles()}
{assign var='rand_max' value=$rand_files|@count}
{assign var='rand_pos' value=0|rand:$rand_max-1}
{assign var='rand_file' value=$rand_files[$rand_pos]}

{* List the available categories. *}
<div class="box">
	<div class="head">Bildschirmfotos</div>
	<div class="intro">
		<div class="navigation">
			<h2>Navigation</h2>
			<ul>
			{foreach from=$screenshots item=arr}
				<li><a href="screenshots/#{$arr.category}">{eval var=$arr.title}</a></li>
			{/foreach}
			</ul>
		</div>

		<div class="text">
			<div class="random-screenshot float_right">
				<a href="screenshots/{$random_shot.category}/{$random_shot.screenshot->getCategory()}/{$rand_pos+1}/" title="{$rand_file.caption}" rel="lightbox">
					<img src="{$smarty.const.DIR_SCREENSHOTS}/{$rand_file.filename}.jpg" alt="{$rand_file.caption}">
				</a>
			</div>
		</div>
		<div class="spacing"></div>
	</div>

	{foreach from=$screenshots item=arr}
		<div class="subhead">
			<a name="{$arr.category}"></a>
			<a href="screenshots/{$arr.category}/">{$arr.title}</a>
		</div>
		<div class="scr-content scr-content-{$arr.category}">
			<table>
			{foreach from=$arr.games item=game}
				<tr>
					<td><img src="images/cat-{$game->getCategory()}.png" alt=""></td>
					<td><a href="screenshots/{$arr.category}/{$game->getCategory()}/">{$game->getName()}</a>
					<span class="green">({$game->getFiles()|@count} shots)</span></td>
				</tr>
			{/foreach}
			</table>
		</div>
	{/foreach}
</div>
