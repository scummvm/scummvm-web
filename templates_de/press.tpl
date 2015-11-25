<div class="box">
	<div class="head">ScummVM in der Presse</div>
	<div class="content">
		<small>(Wenn du bez&uuml;glich Medienberichten mit uns in Kontakt treten willst, schreibe bitte eine e-Mail an press (@) scummvm.org)</small>
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
