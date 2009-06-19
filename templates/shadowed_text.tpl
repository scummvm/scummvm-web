{strip}
{if !isset($textclass)}
	{assign var='textclass' value='shadow-text'}
{/if}

{assign var="agent" value=$smarty.server.HTTP_USER_AGENT}

{if strpos($agent, 'KHTML') !== false || strpos($agent, 'Opera') !== False}
	<span class="shadow-container" style="color: {$textcolor};">
		<span style="text-shadow: 0.1em 0.1em {$shadowcolor}">{$text}</span>
	</span>
{else}
		<span class="shadow-container" style="color: {$shadowcolor};">
			{$text}
			<span class="{$textclass}" style="color: {$textcolor};">{$text}</span>
		</span>
{/if}
{/strip}