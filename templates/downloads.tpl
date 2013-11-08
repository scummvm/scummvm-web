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
					Downloads are mostly hosted with SourceForge.net. If you have one of the supported systems, you can directly
					download the appropriate binary distribution. If you have another system, download the source and read the
					<a href="http://github.com/scummvm/scummvm/blob/v{$release}/README">README</a>
					file for directions on how to build ScummVM.
					If you have successfully ported ScummVM to a platform not listed, please drop us a note, telling which OS, etc.
					you used.
				</p>

				<ul>
					<li>
						The latest STABLE release of ScummVM is {$release}, and can be downloaded below
						under '<a href="downloads/#stable">Release Binaries</a>'. If you run Windows
						and are confused, download the 'Windows Installer'.
					</li>

					<li>
						For UNSTABLE experimental versions of ScummVM (for people who know what they
						are doing), please see the <a href="downloads/#daily">Daily Builds</a>
						section, near the end of this page.
					</li>

					<li>
						Also below are the <a href="downloads/#extras">Extras</a>. These currently
						include five freeware games 'Beneath a Steel Sky', 'Flight of the Amazon Queen',
						'Lure of the Temptress', 'Drascula: The Vampire Strikes Back' and 'Soltys.', 
						along with cutscene packs recommended for use when playing any of the Broken 
						Sword games or Feeble Files under ScummVM.
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
		
		<div class="subhead">Recommended download for your system</div>
		<div class="subhead-content">
			<div id="downloadContainer">
				<a id="downloadButton" href="http://prdownloads.sourceforge.net/scummvm/scummvm-{$release}-win32.exe?download">
					 <img style="position: absolute; top: 8px; left: 14px;" src="images/scummvm.png" alt="Download ScummVM icon">
					 <span class="downloadText">Download ScummVM</span>
					 <span id="downloadDetails" style="font-size: 12px; color: white;">Version {$release} &nbsp;•&nbsp; Windows &nbsp;•&nbsp; 6.6&nbsp;MB</span>
				</a>
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
