{capture "intro"}
  <div class="row">
    <div class="navigation col-1-2">
      <h4 class="subhead">{#gamesHeader#}</h4>
      <ul>
      {foreach from=$sections item=arr}
        <li><a href="/games/#{$arr.anchor}">{eval var=$arr.title}</a></li>
      {/foreach}
      </ul>
    </div>
    <div class="text col-1-2">
      <ul>
        <li>{#gamesContentP1#}</li>
        <li>{#gamesContentP2#}</li>
      </ul>
    </div>
  </div>
{/capture}

{foreach from=$downloads item=dsection name=downloads_loop}

  {capture "content"}
   {foreach from=$dsection->getSubSections() item=dsubsection}
			{if $dsubsection->getTitle() != ''}
				<div class="subhead" id="{if $dsubsection->getAnchor() != ''}{$dsubsection->getAnchor()}{/if}">{eval var=$dsubsection->getTitle()}</div>
			{/if}

			<div class="subhead-content">
				{if $dsubsection->getNotes() != ''}
					{eval var=$dsubsection->getNotes()}
				{/if}

				{include file='components/list_items.tpl' list=$dsubsection->getItems() type='games'}
			</div>
		{/foreach}
  {/capture}

  {if $smarty.foreach.downloads_loop.first}
    {include
      file="components/box.tpl"
      head={eval var=$dsection->getTitle()}
      intro=$smarty.capture.intro
      id=$dsection->getAnchor()
      content=$smarty.capture.content
    }
  {else}
    {include
      file="components/box.tpl"
      head={eval var=$dsection->getTitle()}
      id=$dsection->getAnchor()
      content=$smarty.capture.content
    }
  {/if}

{/foreach}
