<div class="box">
	<div class="head">ScummVM press coverage</div>
	<div class="content">
		<small>(If you wish to contact us in regards to media articles, please e-mail press (@) scummvm.org)</small>
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
