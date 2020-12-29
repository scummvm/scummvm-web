{capture "intro"}
    <div class="row">
        <div class="navigation col-1-2 col-md-1">
            <h4 class="subhead">{#screenshotsNavigation#}</h4>
            <ul>
                {foreach from=$screenshots item=screenshot}
                    <li><a href="{'/screenshots/'|lang}#{$screenshot.category}">{eval var=$screenshot.title}</a></li>
                {/foreach}
            </ul>
        </div>
        <div class="text col-1-2 col-md-1">
            {include file='components/random_screenshot.tpl'}
        </div>
    </div>
{/capture}

{capture "content"}
{foreach from=$screenshots item=screenshot}
<div class="subhead" id="{$screenshot.category}">
    <a href="{'/screenshots/'|lang}{$screenshot.category}/">{$screenshot.title}</a>
</div>
<div class="scr-content scr-content-{$screenshot.category}">
    {include file='components/list_items.tpl' list=$screenshot.games type='screenshot_categories'}
</div>
{/foreach}
{/capture}

{include file="components/box.tpl" head=#screenshotsHeading# intro=$smarty.capture.intro content=$smarty.capture.content}
