{assign var="x" value=$game->getSupport()}
{assign var="pct_class" value=$support_level_class.$x}
{assign var="support_level" value=$support_level_header.$x}
{assign var="support_description" value=$support_level_description.$x}

{capture "content"}
<table class="chart color4">
    <caption>{#compatibilityDetailsChartTitle#}</caption>
    <thead>
        <tr class="color4">
            <th>{#compatibilityDetailsChartColGameFullName#}</th>
            <th>{#compatibilityDetailsChartColScummVmId#}</th>
            <th>{#compatibilityDetailsChartColSupportLevel#}</th>
        </tr>
    </thead>
    <tbody>
        <tr class="color0">
            <td class="gameFullName">{$game->getGame()->getName()}</td>
            <td class="gameScummVmId">{$game->getScummVmId($version)}</td>
            <td class="gameSupportLevel {$pct_class}">{$support_level}</td>
        </tr>
        <tr class="color2">
            <td colspan="3" class="details">
                {$game->getNotes()|replace:"[[support_description]]":$support_description}
            </td>
        </tr>
    </tbody>
</table>
<p class="bottom-link">
    <a href="{'/compatibility/'|lang}{$version}/">{#compatibilityDetailsBack#}</a>
</p>
{/capture}

{include "components/box.tpl" head={#compatibilityDetailsInto#} content=$smarty.capture.content}
