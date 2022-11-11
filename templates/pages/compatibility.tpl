{capture "intro"}
    <p>
        {#compatibilityIntro#}
    </p>
    <p>
        {#compatibilityIntroExplanation#}
    </p>
    {if $version == 'DEV'}
        <p>
            {#compatibilityDevContent#}
            <select name="versions" class="version-select">
                {foreach from=$versions item=ver}
                    <option {($version==$ver) ? 'selected' : '' } value="{'/compatibility/'|lang}{$ver}/">{$ver}</option>
                {/foreach}
            </select>)
        </p>
        <p>
            {#compatibilityDevDisclaimer#}
        </p>
    {else}
        <p>
            {'/\x7bversion\x7d/'|preg_replace:$version:#compatibilityStableContent#}
        </p>
        <p>
            {#compatibilityStableReleases#}
            <select name="versions" class="version-select">
                {foreach from=$versions item=ver}
                    <option {($version==$ver) ? 'selected' : '' } value="/compatibility/{$ver}/">{$ver}</option>
                {/foreach}
            </select>
        </p>
    {/if}
    <p>
        {#compatibilityGameDisclaimer#}
    </p>
    <p>
        <small>{#compatibilityLastUpdated#} {$last_updated|date_localized}</small>
    </p>

<script>
    document.querySelector('.version-select').addEventListener('change', (select) => {
        location.href = select.target.value;
    });
</script>
{/capture}

{capture "content"}
<table class="chart color4 colorKeyTable">
    <caption>{#compatibilityLegendTitle#}</caption>
    <tbody>
        <tr class="color2">
            {foreach from=$support_level_header key=level item=desc}
            <td class={$support_level_class.$level} align='center' title="{$support_level_description.$level}">{$desc}</td>
            {/foreach}
        </tr>
    </tbody>
</table>

{foreach from=$compat_data key=company item=games name=compat_loop}
<table class="chart color4">
    <caption>{'/\x7bcompany\x7d/'|preg_replace:$company:#compatibilitySectionTitle#}</caption>
    <thead>
        <tr class="color4">
            <th class="gameFullName">{#compatibilityDetailsChartColGameFullName#}</th>
            <th class="gameScummVmId">{#compatibilityDetailsChartColScummVmId#}</th>
            <th class="gameSupportLevel">{#compatibilityDetailsChartColSupportLevel#}</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$games item=game}
        {assign var="x" value=$game->getSupport()}
        {assign var="pct_class" value=$support_level_class.$x}
        {assign var="support_level" value=$support_level_header.$x}
        {assign var="support_level_desc" value=$support_level_description.$x}
        <tr class="color{cycle values='2,0'}">
            <td class="gameFullName"><a href="{'/compatibility/'|lang}{$version}/{$game->getGame()->getNewId()}/">{$game->getGame()->getName()}</a></td>
            <td class="gameScummVmId">{$game->getScummVmId($version)}</td>
            <td class="gameSupportLevel {$pct_class}" title="{$support_level_desc}">{$support_level}</td>
        </tr>
        {/foreach}
    </tbody>
</table>
{/foreach}
{/capture}

{include file="components/box.tpl" head=$content_title intro=$smarty.capture.intro content=$smarty.capture.content}
