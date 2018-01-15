<dl>
	<input type="checkbox" autocomplete="off" id="{$menu->getClass()}" class="menu-trigger" />
	<dt>
		<label for="{$menu->getClass()}">{$menu->getName()}</label>
	</dt>
	{foreach from=$menu->getEntries() key=text item=url}
		<dd><a href="{eval var=$url}">{$text}</a></dd>
	{/foreach}
</dl>
