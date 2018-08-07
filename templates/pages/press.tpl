{capture "intro"}
  <p>{#pressIntro#}</p>
{/capture}

{capture "content"}  
  {foreach from=$articles item=article}
  <p>
    {if $article->getLanguage() != null}
      <a href="{$article->getURL()}"><b>{$article->getName()}</b></a> ({$article->getLanguage()}), {$article->getPosted()}
    {else}
      <a href="{$article->getURL()}"><b>{$article->getName()}</b></a>, {$article->getPosted()}
    {/if}
  </p>
  {/foreach}
{/capture}

{include file="components/box.tpl" head=#pressHeading# intro=$smarty.capture.intro content=$smarty.capture.content}
