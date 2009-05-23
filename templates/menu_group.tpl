<div class="menugroup">
	<h1 class="{$menu->getClass()}">{$menu->getName()}</h1>
	<ul>
	{foreach from=$menu->getEntries() key=text item=url}
		<li><a href="{eval var=$url}">{$text}</a></li>
	{/foreach}
	</ul>
</div>
