<dl>
	<dt>Website Language</dt>
	{foreach from=$available_languages key=key item=item}
		<dd><a href="{$pageurl}?lang={$key}">{$item|escape}</a></dd>
	{/foreach}	
</dl>