{foreach from=$downloads item=dsection name=downloads_loop}
<div class="box" id="{if $dsection->getAnchor() != 'a'}{$dsection->getAnchor()}{/if}">
	<div class="head">{eval var=$dsection->getTitle()}</div>
	{if $smarty.foreach.downloads_loop.first}
	<div class="intro row">
		<div class="navigation col-1-2">
			<h4>{#downloadsHeader#}</h4>
			<ul>
				{foreach from=$sections item=arr}
				<li>
					<a href="/downloads/#{$arr.anchor}">{eval var=$arr.title}</a>
				</li>
				{/foreach}
			</ul>
		</div>
		<div class="text col-1-2">
			<p>{'/\x7brelease\x7d/'|preg_replace:$release:#downloadsContentP1#}</p>
			<ul>
				<li>{'/\x7brelease\x7d/'|preg_replace:$release:#downloadsContentP2#}</li>
				<li>{#downloadsContentP3#}</li>
				<li>{#downloadsContentP4#}</li>
			</ul>
		</div>
	</div>

	<div class="content">
		<!-- Recommended download - start -->
		<div id="recommended-download" class="hidden">
			<div class="subhead">{#downloadsBadge#}</div>
			<div class="subhead-content">
				<div id="downloadContainer"></div>
			</div>
		</div>
		<br>

		<script>{$recommendedDownloadsJS}</script>
		<script src="/javascripts/recommended_dl.js"></script>
		<!-- Recommended download - end -->
	{else}
	<div class="content">
	{/if}

	{foreach from=$dsection->getSubSections() item=dsubsection} {if $dsubsection->getAnchor() != ''}
		<a name="{$dsubsection->getAnchor()}"></a>
		{/if} {if $dsubsection->getTitle() != ''}
		<div class="subhead">{eval var=$dsubsection->getTitle()}</div>
		{/if}

		<div class="subhead-content">
			{if $dsubsection->getNotes() != ''} {eval var=$dsubsection->getNotes()} {/if} {include file='list_items.tpl' list=$dsubsection->getItems()}
			{if !is_null($dsubsection->getFooter())}
			<p>{$dsubsection->getFooter()}</p>
			{/if}
		</div>
	{/foreach}
	</div>
</div>
{/foreach}
