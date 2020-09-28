<dl>
    <input type="checkbox" autocomplete="off" id="menu-lang" class="menu-trigger" />
    <dt>
        <label for="menu-lang">Language</label>
    </dt>
    <dd>
        <span class="bullet"></span><a href="{$pageurl}">English</a>
    </dd>
    {foreach from=$available_languages key=key item=item}
    <dd>
        <span class="bullet"></span><a href="{$key}{$pageurl}">{$item}</a>
    </dd>
    {/foreach}
</dl>
