<dl>
	<dt>{$menu->getName()}</dt>
	{foreach from=$menu->getEntries() key=text item=url}
		<dd><a href="{eval var=$url}">{$text}</a></dd>
	{/foreach}	
</dl>