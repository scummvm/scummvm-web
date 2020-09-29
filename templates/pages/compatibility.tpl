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
          <option {($version==$ver) ? 'selected' : ''} value="{'/compatibility/'|lang}{$ver}/">{$ver}</option>
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
          <option {($version==$ver) ? 'selected' : ''} value="/compatibility/{$ver}/">{$ver}</option>
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

  {foreach from=$compat_data key=company item=games name=compat_loop}
    <table class="chart color4">
      <caption>{'/\x7bcompany\x7d/'|preg_replace:$company:#compatibilitySectionTitle#}</caption>
      <thead>
        <tr class="color4">
          <th class="gameFullName">{#compatibilityDetailsChartCol1#}</th>
          <th class="gameShortName">{#compatibilityDetailsChartCol2#}</th>
          <th class="gameDatafiles">{#compatibilityDetailsChartCol3#}</th>
          <th class="gameSupportLevel">{#compatibilityDetailsChartCol4#}</th>
        </tr>
      </thead>
      <tbody>
      {foreach from=$games item=game}
        {assign var="x" value=$game->getSupportLevel()}
        {assign var="pct_class" value=$support_level_class.$x}
        {assign var="support_level" value=$support_level_header.$x}
        <tr class="color{cycle values='2,0'}">
          <td class="gameFullName"><a href="{'/compatibility/'|lang}{$version}/{$game->getGame()->getId()}/">{$game->getGame()->getName()}</a></td>
          <td class="gameShortName">{$game->getGame()->getId()}</td>
          <td class="gameDatafiles">
          {if $game->getDatafiles()}
            <a href="https://wiki.scummvm.org/index.php?title=Datafiles#{$game->getDatafiles()}">{#compatabilityDetailsDetails#}</a></td>
          {else}
            ---
          {/if}
          <td class="gameSupportLevel {($game->getVersion() == $version) ? ' updated' : $pct_class}">{$support_level}</td>
        </tr>
      {/foreach}
      </tbody>
    </table>
  {/foreach}
{/capture}

{include file="components/box.tpl" head=$content_title intro=$smarty.capture.intro content=$smarty.capture.content}
