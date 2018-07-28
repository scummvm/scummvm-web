{foreach from=$downloads item=dsection name=downloads_loop}
	<div class="box" id="{if $dsection->getAnchor() != ''}{$dsection->getAnchor()}{/if}">
		<div class="head">{eval var=$dsection->getTitle()}</div>

		{if $smarty.foreach.downloads_loop.first}
		<div class="intro row">
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
		<div class="content">
		{else}
		<div class="content">
		{/if}

		{foreach from=$dsection->getSubSections() item=dsubsection}
			{if $dsubsection->getTitle() != ''}
				<div class="subhead" id="{if $dsubsection->getAnchor() != ''}{$dsubsection->getAnchor()}{/if}">{eval var=$dsubsection->getTitle()}</div>
			{/if}

			<div class="subhead-content">
				{if $dsubsection->getNotes() != ''}
					{eval var=$dsubsection->getNotes()}
				{/if}

				{include file='components/list_items.tpl' list=$dsubsection->getItems() type='games'}
				{if !is_null($dsubsection->getFooter())}
					<p>{$dsubsection->getFooter()}</p>
				{/if}
			</div>
		{/foreach}
		</div>
	</div>
{/foreach}
