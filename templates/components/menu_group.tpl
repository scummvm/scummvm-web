<dl>
    <input type="checkbox" autocomplete="off" id="{$menu->getClass()}" class="menu-trigger" />
    <dt>
        <label for="{$menu->getClass()}">{eval var=$menu->getName()}</label>
    </dt>
    {foreach from=$menu->getEntries() key=text item=url}
        {eval var=$url assign='url'}
        <dd><span class="bullet"></span><a href="{$url|lang}">{eval var=$text}</a></dd>
    {/foreach}
</dl>
