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
<div class="chart-wrapper"><span>{$group.name}</span>
    <table class="chart color4 gameDemos" id="{$group.href}">
        <thead>
            <tr class="color4">
                <th>{#gamesDemosH1#}</th>
                <th class="gameTarget">{#gamesDemosH2#}</th>
            </tr>
        </thead>
        <tbody>
            {foreach $group.demos as $i => $demo}
            <tr class="{cycle values="color2, color0"}">
                <td>
                    <a href="{$demo->getURL()|download}">{$demo->getName()}</a>
                </td>
                <td class="gameTarget">{$demo->getId()}</td>
            </tr>
            {/foreach}
        </tbody>
    </table>
</div>
{/foreach}
{/capture}

{include file="components/box.tpl" head=$content_title intro=$smarty.capture.intro content=$smarty.capture.content}
