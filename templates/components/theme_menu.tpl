<dl>
    <input type="checkbox" autocomplete="off" id="menu-theme" class="menu-trigger" />
    <dt>
        <label for="menu-theme">Theme</label>
    </dt>
    {foreach from=$themes key=key item=item}
        <dd>
            <span class="bullet"></span><a href="#{$key}" class="theme-link">{$item}</a>
        </dd>
    {/foreach}
</dl>
