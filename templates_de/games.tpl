{foreach from=$downloads item=dsection name=downloads_loop}
	{if $dsection->getAnchor() != ''}
		<a name="{$dsection->getAnchor()}"></a>
	{/if}
	<div class="box">
		<div class="head">{eval var=$dsection->getTitle()}</div>

		{if $smarty.foreach.downloads_loop.first}
		<div class="intro">
			<div class="navigation">
				<h2>Navigation</h2>
				<ul>
				{foreach from=$sections item=arr}
					<li><a href="games/#{$arr.anchor}">{eval var=$arr.title}</a></li>
				{/foreach}
				</ul>
			</div>
			<div class="text">
				<ul>
					<li>
						Hier findest du die <a href="games/#games">Spiele-Downloads</a>. Darunter
						sind derzeit auf die f&uuml;nf Freeware-Spiele 'Beneath a Steel Sky', 
						'Flight of the Amazon Queen', 'Lure of the Temptress', 'Drascula: The Vampire Strikes Back'
						und 'Soltys' enthalten.
					</li>
					<li>
						Hier findest du auch Pakete mit Zwischensequenzen, die empfohlen werden, wenn du die 
						Spiele der 'Broken Sword'-Reihe oder 'Feeble Files (dt: Floyd - Es gibt noch Helden)'
						in ScummVM spielen willst.
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
