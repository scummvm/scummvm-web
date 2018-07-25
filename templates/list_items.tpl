{if is_array($list) && $list|@count > 0}
	<ul class="downloads">  
  {foreach from=$list item=item}  
    {if $item instanceof File}        
			{assign var='data' value=$item->getExtraInfo()}
			<li class="file">
				<span class="sprite-{$type}-{$item->getCategoryIcon()} sprite"></span>
				<a href="{eval var=$item->getURL()}">{$item->getName()}</a>
				{strip}
				<span class="download-extras">
					{if is_array($data)}
						(
							{if $item->getType() == 'daily'}{#listItemsBuildFromRepo#} {/if}
							{$data.size} {if $data.ext == '.exe'}Win32 {/if}{$data.ext}{if $data.date != ""}{#listItemsDate#} {$data.date}{/if}
						)  {if $data.msg != ""}{$data.msg}{/if}
					{else}
						{if $item->getType() != 'daily'}
							{eval var=$data|default:'&nbsp;'}
						{/if}
					{/if}
				</span>
				{if $item->getType() == 'daily'}
					<span class="daily_provider">
						{if is_array($data)}
							{$data.info}
						{else}
							{$data}
						{/if}
					</span>
				{/if}
				{/strip}
			</li>
		{elseif $item instanceof WebLink}
			<li class="link">
				<a href="{$item->getURL()}">{$item->getName()}</a>{$item->getDescription()}
      </li>
    {elseif $item instanceof Screenshot}
      <li class="file">
        <span class="sprite-games-{$item->getCategory()} sprite"></span>
				<a href="/screenshots/{$arr.category}/{$item->getCategory()}/">{$item->getName()}</a>
        <span class="green">({$item->getFiles()|@count} shots)</span>
      </li>
    {/if}
	{/foreach}
	</ul>
{/if}
