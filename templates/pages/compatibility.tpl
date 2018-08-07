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
      {foreach from=$versions item=ver name=versions_loop}
        {if $smarty.foreach.versions_loop.last}
          {assign var='last' value=')'}
        {/if}
        <a href="/compatibility/{$ver}/">{$ver}</a>{$last}
      {/foreach}
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
    {foreach from=$versions item=ver}
      <a href="/compatibility/{$ver}/">{$ver}</a>
    {/foreach}
    </p>
  {/if}
  <p>
    <small>{#compatiblityLastUpdated#} {$last_updated}</small>
  </p>
{/capture}

{capture "content"}
  <table class="chart color4 colorKeyTable">
    <caption>{#compatibilityLegendTitle#}</caption>
    <tbody>
      <tr class="color2">
        {if $old_layout == 'no'}
          {foreach from=$support_level_desc key=level item=desc}
            <td class={$support_level_class.$level} align='center'>{$desc}</td>
          {/foreach}
        {else}
          {for $pct=0 to 20}
            <td class="pct{$pct*5}">{$pct*5}</td>
          {/for}
        {/if}
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
          {if $old_layout == 'no'}
            <th class="gameSupportLevel">{#compatibilityDetailsChartCol3a#}</th>
          {else}
            <th class="gameSupportLevel">{#compatibilityDetailsChartCol3b#}</th>
          {/if}
        </tr>
      </thead>
      <tbody>
      {foreach from=$games item=game}
        {if $old_layout == 'no'}
          {assign var="x" value=$game->getSupportLevel()}
          {assign var="pct_class" value=$support_level_class.$x}
          {assign var="support_level" value=$support_level_desc.$x}
        {else}
          {math equation="x - (x % 5)" x=$game->getSupportLevel() assign='pct_class'}
          {assign var="pct_class" value="pct"|cat:$pct_class}
          {assign var="support_level" value=$game->getSupportLevel()|cat:"%"}
        {/if}
        <tr class="color{cycle values='2,0'}">
          <td class="gameFullName"><a href="/compatibility/{$version}/{$game->getTarget()}/">{$game->getName()}</a></td>
          <td class="gameShortName">{$game->getTarget()}</td>
          <td class="gameSupportLevel {$pct_class}">{$support_level}</td>
        </tr>
      {/foreach}
      </tbody>
    </table>
  {/foreach}
{/capture}

{include file="components/box.tpl" head=$content_title intro=$smarty.capture.intro content=$smarty.capture.content}
