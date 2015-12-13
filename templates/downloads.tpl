{foreach from=$downloads item=dsection name=downloads_loop}
	{if $dsection->getAnchor() != ''}
		<a name="{$dsection->getAnchor()}"></a>
	{/if}
	<div class="box">
		<div class="head">{eval var=$dsection->getTitle()}</div>

		{if $smarty.foreach.downloads_loop.first}
		<div class="intro">
			<div class="navigation">
				<h2>{#downloadsHeader#}</h2>
				<ul>
				{foreach from=$sections item=arr}
					<li><a href="downloads/#{$arr.anchor}">{eval var=$arr.title}</a></li>
				{/foreach}
				</ul>
			</div>
			<div class="text">
				<p>
					{#downloadsContentP1#}
				</p>

				<ul>
					<li>
						{#downloadsContentP2#}
					</li>

					<li>
						{#downloadsContentP3#}
					</li>

					<li>
						{#downloadsContentP4#}
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

		<div class="subhead" id="recommendedDownloadHeader" style="display:none">{#downloadsBadge#}</div>
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
