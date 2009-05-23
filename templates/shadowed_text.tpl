{strip}
{if !isset($textclass)}
	{assign var='textclass' value='shadow-text'}
{/if}

<span style="color: {$shadowcolor};">
	<span class="shadow-container">
		{$text}
		<span class="{$textclass}" style="color: {$textcolor};">{$text}</span>
	</span>
</span>
{/strip}