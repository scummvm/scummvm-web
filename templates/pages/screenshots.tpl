{capture "intro"}
  <div class="row">
    <div class="navigation col-1-2">
      <h4 class="subhead">{#screenshotsNavigation#}</h4>
      <ul>
      {foreach from=$screenshots item=arr}
        <li><a href="/screenshots/#{$arr.category}">{eval var=$arr.title}</a></li>
      {/foreach}
      </ul>
    </div>
    <div class="text col-1-2">
      {include file='components/random_screenshot.tpl'}
    </div>
  </div>
{/capture}

{capture "content"}  
  {foreach from=$screenshots item=arr}
    <div class="subhead" id="{$arr.category}">
      <a href="/screenshots/{$arr.category}/">{$arr.title}</a>
    </div>
    <div class="scr-content scr-content-{$arr.category}">
      {include file='components/list_items.tpl' list=$arr.games type='games'}
    </div>
  {/foreach}
{/capture}

{include file="components/box.tpl" head=#screenshotsHeading# intro=$smarty.capture.intro content=$smarty.capture.content}
