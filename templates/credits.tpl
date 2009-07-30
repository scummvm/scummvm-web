{foreach from=$credits item=csection}
<div class="box">
	<div class="head">{$csection->getTitle()}</div>
	<div class="content">
		{if $csection->getSubsections()|@count > 0}
			{foreach from=$csection->getSubsections() item=subcsection}
				<div class="subhead">{$subcsection->getTitle()}</div>
				<div class="subhead-content">
					{include
						file='credits_entry.tpl'
						groups=$subcsection->getGroups()
						paragraphs=$subcsection->getParagraphs()
					}
				</div>
			{/foreach}
			{* If the section itself has paragraphs, we must process them here. *}
			{include
				file='credits_entry.tpl'
				paragraphs=$csection->getParagraphs()
			}
		{else}
			{include
				file='credits_entry.tpl'
				groups=$csection->getGroups()
				paragraphs=$csection->getParagraphs()
			}
		{/if}
	</div>
</div>
{/foreach}
