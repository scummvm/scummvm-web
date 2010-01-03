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
					<a href="http://scummvm.svn.sourceforge.net/svnroot/scummvm/scummvm/tags/{$release_tag}/README">README</a>
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
						are doing), please see the <a href="downloads/#SVN">Subversion Builds</a>
						section, near the end of this page.
					</li>

					<li>
						Also below are the <a href="downloads/#extras">Extras</a>. These currently
						include three freeware games 'Beneath a Steel Sky', 'Flight of the Amazon Queen'
						and 'Lure of the Temptress', along with cutscene packs recommended for use when
						playing any of the Broken Sword games or Feeble Files under ScummVM.
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
