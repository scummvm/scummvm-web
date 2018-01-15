<dl>
    <input type="checkbox" autocomplete="off" id="menu-lang" class="menu-trigger" />
    <dt>
        <label for="menu-lang">Website Language</label>
    </dt>
    {foreach from=$available_languages key=key item=item}
    <dd>
        <a href="{$pageurl}?lang={$key}">{$item|escape}</a>
    </dd>
    {/foreach}
</dl>
