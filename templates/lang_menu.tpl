{*
<div class="language-menu">    
    <div ontouchstart=""><img src="/images/lang-icon.png" alt="Language">Language</div>        
    <ul>        
        {foreach from=$available_languages key=key item=item}
        <li><a href="{$pageurl}?lang={$key}"><code class="text-badge">{$key|strtoupper}</code>{$item|escape}</a></li>
        {/foreach}            
        </li>
    </ul>    
</div>
*}

<dl>
	<dt>Website Language</dt>
	{foreach from=$available_languages key=key item=item}
		<dd><a href="{$pageurl}?lang={$key}">{$item|escape}</a></dd>
	{/foreach}	
</dl>