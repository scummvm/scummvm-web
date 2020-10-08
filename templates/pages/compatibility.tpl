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
        <small>{#compatiblityLastUpdated#} {$last_updated|date_localized}</small>
    </p>

<script>
    document.querySelector('.version-select').addEventListener('change', (select) => {
        location.href = select.target.value;
    });
</script>
<script src='/js/tablesort.min.js'></script>
{/capture}

{capture "content"}
<table class="chart color4 colorKeyTable">
    <caption>{#compatibilityLegendTitle#}</caption>
    <tbody>
        <tr class="color2">
            {foreach from=$support_level_header key=level item=desc}
            <td class={$support_level_class.$level} align='center'>{$desc}</td>
            {/foreach}
            <td class='updated' align='center'>Updated</td>
        </tr>
    </tbody>
</table>

<table class="chart color4" id="compatibilityTable">
    <caption>{#compatibilitySectionTitle#}</caption>
    <thead>
        <tr class="color4">
            <th class="gameFullName" data-sort-default>{#compatibilityDetailsChartCol1#}</th>
            <th class="gameShortName">{#compatibilityDetailsChartCol2#}</th>
            <th class="gameCompany">{#compatibilityDetailsChartColCompany#}</th>
            <th class="gameDatafiles">{#compatibilityDetailsChartCol3#}</th>
            <th class="gameSupportLevel">{#compatibilityDetailsChartCol4#}</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$compat_data key=company item=games name=compat_loop}
            {foreach from=$games item=game}
            {assign var="x" value=$game->getSupportLevel()}
            {assign var="pct_class" value=$support_level_class.$x}
            {assign var="support_level" value=$support_level_header.$x}
            <tr class="color2">
                <td class="gameFullName"><a href="{'/compatibility/'|lang}{$version}/{$game->getGame()->getId()}/">{$game->getGame()->getName()}</a></td>
                <td class="gameShortName">{$game->getGame()->getId()}</td>
                <td class="gameCompany">{$game->getGame()->getCompany()->getName()}</td>
                <td class="gameDatafiles">
                    {if $game->getDatafiles()}
                    <a href="{$game->getDatafiles()}">{#compatabilityDetailsDetails#}</a></td>
                {else}
                ---
                {/if}
                <td class="gameSupportLevel {($game->getVersion() == $version) ? ' updated' : $pct_class}">{$support_level}</td>
            </tr>
            {/foreach}
        {/foreach}
    </tbody>
</table>
<script>
  // From tablesort.min.js
  new Tablesort(document.getElementById('compatibilityTable'));
</script>
{/capture}

{include file="components/box.tpl" head=$content_title intro=$smarty.capture.intro content=$smarty.capture.content}