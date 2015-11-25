{* Screenshot viewer, link to next/prev screenshots if any. *}
{assign var='files' value=$screenshot->getFiles()}

<div class="box">
	<div class="head">Gallerie</div>
	<h3 class="subhead">{$screenshot->getName()} (#{$num+1} of {$files|@count})</h3>
	<div class="viewer">
		<div class="screenshot">
			<img src="{$smarty.const.DIR_SCREENSHOTS}/{$files[$num].filename}-full.png" alt="{$files[$num].caption}">
			<div class="caption">{$files[$num].caption}</div>
		</div>
		<div>
			{if $num > 0}
				<a href="screenshots/{$category}/{$screenshot->getCategory()}/{$num}/" class="float_left">
					Vorheriges
				</a>
			{/if}
			{if $num < ($files|@count) - 1}
				<a href="screenshots/{$category}/{$screenshot->getCategory()}/{$num+2}/" class="float_right">
					N&auml;chstes
				</a>
			{/if}
		</div>
		<div class="spacing"></div>
	</div>
	<a href="screenshots/{$category}/{$screenshot->getCategory()}/">Back</a>
</div>
