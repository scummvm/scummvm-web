{capture "intro"}
<div class="row">
  <div class="navigation col-1-1">
    <h4 class="subhead">{#screenshotsNavigation#}</h4>
    <ul>
      {foreach from=$credits item=csection}      
        {if $csection->getSubsections()|@count > 0}
          {foreach from=$csection->getSubsections() item=subcsection}
          <li><a href="/credits/#{$subcsection->getAnchor()}">{$subcsection->getTitle()}</a></li>
          {/foreach}   
        {else}
          <li><a href="/credits/#{$csection->getAnchor()}">{$csection->getTitle()}</a></li>
        {/if}   
      {/foreach}    
    </ul>
  </div>  
</div>  
{/capture}

{foreach from=$credits item=csection name=credits}
  {capture "content"}
    {if $csection->getSubsections()|@count > 0}
      {foreach from=$csection->getSubsections() item=subcsection}
        <div class="subhead" id="{$subcsection->getAnchor()}">{$subcsection->getTitle()}</div>
        <div class="subhead-content">
          {include
            file='components/credits_entry.tpl'
            groups=$subcsection->getGroups()
            paragraphs=$subcsection->getParagraphs()
          }
        </div>
      {/foreach}
      {* If the section itself has paragraphs, we must process them here. *}
      {include
        file='components/credits_entry.tpl'
        paragraphs=$csection->getParagraphs()
      }
    {else}
      {include
        file='components/credits_entry.tpl'
        groups=$csection->getGroups()
        paragraphs=$csection->getParagraphs()
      }
    {/if}
  {/capture}

  {if $smarty.foreach.credits.first}
    {include file="components/box.tpl" head=$csection->getTitle() id=$csection->getAnchor() intro=$smarty.capture.intro content=$smarty.capture.content}
  {else}
    {include file="components/box.tpl" head=$csection->getTitle() id=$csection->getAnchor() content=$smarty.capture.content}
  {/if}
  
{/foreach}
