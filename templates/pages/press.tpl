<div class="box">
	<div class="head">{#pressHeading#}</div>
	<div class="content">
		<small>{#pressIntro#}</small>
		{foreach from=$articles item=article}
		<p>
			{if $article->getLanguage() != null}
				<a href="{$article->getURL()}"><b>{$article->getName()}</b></a> ({$article->getLanguage()}), {$article->getPosted()}
			{else}
				<a href="{$article->getURL()}"><b>{$article->getName()}</b></a>, {$article->getPosted()}
			{/if}
		</p>
		{/foreach}
	</div>
</div>
