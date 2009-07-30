{if is_array($list) && $list|@count > 0}
	<ul class="downloads">
	{foreach from=$list item=item}
		{if $item instanceof File}
			{assign var='data' value=$item->getExtraInfo()}
			<li class="file">
				<img src="images/{$item->getCategoryIcon()}" alt="" class="category">
				<a href="{eval var=$item->getURL()}">{$item->getName()}</a>
				{strip}
				<span class="download-extras">
					{if is_array($data)}
						(
							{if $item->getType() == 'svn'}build from Subversion, {/if} 
							{$data.size}K {if $data.ext == 'exe'}Win32 {/if}{$data.ext} file, last update: {$data.date}
						)
					{else}
						{if $item->getType() != 'svn'}
							{eval var=$data|default:'&nbsp;'}
						{/if}
					{/if}
				</span>
				{if $item->getType() == 'svn'}
					<span class="svn_provider">
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
		{/if}
	{/foreach}
	</ul>
{/if}
