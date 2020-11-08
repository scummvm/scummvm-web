<script type="text/javascript" src="/js/game_demos.js"></script>

{capture "intro"}
<div class="row">
    <div class="navigation col-1-2 col-md-1">
        <h4 class="subhead">{#gamesDemosHeading#}</h4>
        <ul>
            {foreach $demos $group}
            <li><a href="{'/demos/'|lang}#{$group.href}">{$group.name}</a></li>
            {/foreach}
        </ul>
    </div>
    <div class="text col-1-2 col-md-1">
        <p>
            {#gamesDemosContentP1#}
        </p>
        <p>
            {#gamesDemosContentP2#}
        </p>
    </div>
</div>
{/capture}

{capture "content"}
{foreach $demos as $group}
<table class="chart color4 gameDemos" id="{$group.href}">
    <caption>{$group.name}</caption>
    <thead>
        <tr class="color4">
            <th>{#gamesDemosH1#}</th>
            <th class="gameTarget">{#gamesDemosH2#}</th>
        </tr>
    </thead>
    <tbody>
        {foreach $group.demos as $i => $demo}
        {if $demo@first}
        {$collapse = ''}
        {elseif $group.demos[$i]->getId() == $group.demos[$i-1]->getId()}
        {$collapse = 'collapse'}
        {else}
        {$collapse = ''}
        {/if}
        <tr class="{if $collapse}{$collapse}{else}{cycle values="color2, color0"}{/if}">
            <td>
                <a href="{$demo->getURL()|download}">{$demo->getName()}</a>
            </td>
            <td class="gameTarget">{$demo->getId()}</td>
        </tr>
        {/foreach}
    </tbody>
</table>
{/foreach}
{/capture}

{include file="components/box.tpl" head=$content_title intro=$smarty.capture.intro content=$smarty.capture.content}
