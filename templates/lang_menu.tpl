<div id="lang-wrapper">
    <div id="drop-down">
        <ul id="langmenu">
            <li><a href=""><img src="/images/lang-icon.png" width="16" height="16" alt="Language">&nbsp;&nbsp;Language</a>
                <ul>
                    {foreach from=$available_languages key=key item=item}
                    <li><a href="{$pageurl}?lang={$key}"><code class="text-badge">{$key|strtoupper}</code>{$item|escape}</a></li>
                    {/foreach}
                </ul>
            </li>
        </ul>
    </div>
</div>
