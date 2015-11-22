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
					<li><a href="downloads/#{$arr.anchor}">{eval var=$arr.title}</a></li>
				{/foreach}
				</ul>
			</div>
			<div class="text">
				<p>
					Die meisten Downloads werden &uuml;ber SourceForge.net zum Download angeboten. Wenn Du eines der unterst&uuml;tzten Systeme
					besitzt, kannst Du direkt die passende Programmdatei herunterladen. Wenn Du ein anderes System besitzt, dann lade
					dir den Quellcode herunter und lies die <a href="http://github.com/scummvm/scummvm/blob/v{$release}/doc/de/Liesmich">Liesmich-Datei</a>
					f&uuml;r Informationen dar&uuml;ber, wie ScummVM aus dem Quellcode gebaut (kompiliert) wird.
					Solltest Du ScummVM erfolgreich auf eine andere Plattform portiert haben, hinterlasse uns bitte eine Nachricht
					und nenne uns das Betriebssystem, welches Du verwendet hast.
				</p>

				<ul>
					<li>
						Die aktuelle STABILE Version von ScummVM ist {$release} und kann unter
						'<a href="downloads/#stable">Programmdateien</a>' heruntergeladen werden.
						Windows-Nutzern, die unsicher sind, welche Version sie w&auml;hlen sollen, empfehlen
						wir, den 'Windows Installer' herunterzuladen.
					</li>

					<li>
						F&uuml;r INSTABILE, experimentelle Versionen von ScummVM (f&uuml;r diejenigen, die wissen,
						was sie tun), lies den Abschnitt &uuml;ber die <a href="downloads/#daily">t&auml;glich erstellten Versionen</a>
						am Ende dieser Seite.
					</li>

					<li>
						Weiter unten findest Du noch die <a href="downloads/#extras">Extras</a>.
						Darin enthalten sind zur Zeit f&uuml;nf Spiele, die als Freeware freigegeben wurden:
						'Beneath a Steel Sky', 'Flight of the Amazon Queen', 'Lure of the Temptress',
						'Drascula: The Vampire Strikes Back' und 'Soltys'.
						Zus&auml;tzlich findest Du dort auch Pakete mit Zwischenszenen, die empfohlen werden,
						wenn Du die 'Broken Sword (Baphomets Fluch)'-Spiele oder 'Feeble Files (Floyd: Es gibt noch Helden)'
						unter ScummVM spielen m&ouml;chtest.
					</li>
				</ul>
			</div>
			<div class="spacing"></div>
		</div>

		<!-- Recommended download - start -->
		<script type="text/javascript">
			{$recommendedDownloadsJS}
		</script>
		<script type="text/javascript" src="javascripts/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="javascripts/recommended_dl.js"></script>
		
		<div class="subhead" id="recommendedDownloadHeader" style="display:none">Empfohlener Download f&uuml;r Dein System:</div>
		<div class="subhead-content" style="display:none">
			<div id="downloadContainer" style="display:none">
			</div>
		</div>
			
		<br>
		<!-- Recommended download - end -->

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
