<{if $article}article{else}section{/if} class="box" {if $id}id="{$id}"{/if}>
	{if $head}
	<header class="head">
		{$head}
	</header>
	{/if}
	{if $intro}
	<section class="intro">		
		{$intro}
	</section>
	{/if}
	<section class="content">
		{$content}
	</section>
</{if $article}article{else}section{/if}>
