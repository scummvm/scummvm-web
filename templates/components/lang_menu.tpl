<dl>
    <input type="checkbox" autocomplete="off" id="menu-lang" class="menu-trigger" />
    <dt>
        <label for="menu-lang">Language</label>
    </dt>
    {foreach from=$available_languages key=key item=item}
    {if $key != $lang}
    <dd>
        {if $key == $smarty.const.DEFAULT_LOCALE}
        <span class="bullet"></span><a href="{$pageurl}">{$item}</a>
        {else}
        <span class="bullet"></span><a href="/{$key}{$pageurl}">{$item}</a>
        {/if}
    </dd>
    {/if}
    {/foreach}
</dl>
