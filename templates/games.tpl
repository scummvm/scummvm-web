{foreach from=$downloads item=dsection name=downloads_loop}
	{if $dsection->getAnchor() != ''}
		<a name="{$dsection->getAnchor()}"></a>
	{/if}
	<div class="box">
		<div class="head">{eval var=$dsection->getTitle()}</div>

		{if $smarty.foreach.downloads_loop.first}
		<div class="intro">
			<div class="navigation">
				<h2>{#gamesHeader#}</h2>
				<ul>
				{foreach from=$sections item=arr}
					<li><a href="games/#{$arr.anchor}">{eval var=$arr.title}</a></li>
				{/foreach}
				</ul>
			</div>
			<div class="text">
				<ul>
					<li>
						{#gamesContentP1#}
					</li>
					<li>
						{#gamesContentP2#}
					</li>
				</ul>
			</div>
			<div class="spacing"></div>
		</div>
		{/if}

		{foreach from=$dsection->getSubSections() item=dsubsection}
			{if $dsubsection->getAnchor() != ''}
				<a name="{$dsubsection->getAnchor()}"></a>
			{/if}
			{if $dsubsection->getTitle() != ''}
				<div class="subhead">{eval var=$dsubsection->getTitle()}</div>
			{/if}

			<div class="subhead-content">
				{if $dsubsection->getNotes() != ''}
					{eval var=$dsubsection->getNotes()}
				{/if}

				{include file='list_items.tpl' list=$dsubsection->getItems()}
				{if !is_null($dsubsection->getFooter())}
					<p>{$dsubsection->getFooter()}</p>
				{/if}
			</div>
		{/foreach}
	</div>
{/foreach}
