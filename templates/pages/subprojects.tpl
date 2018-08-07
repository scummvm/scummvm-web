{capture "intro"}
  <p>
    {#subprojectsIntroP1#}
  </p>
  <p>
    {#subprojectsIntroP2#}
  </p>
{/capture}

{capture "content"}
  {foreach from=$subprojects item=project}
  <div class="subhead">{$project->getName()}</div>
  <div class="subhead-content">
    {$project->getInfo()}
    {include file='components/list_items.tpl' list=$project->getDownloads() type='platforms'}
  </div>
  {/foreach}
{/capture}

{include file="components/box.tpl" head=$content_title intro=$smarty.capture.intro content=$smarty.capture.content}
