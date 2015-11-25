<div class="box">
	<div class="head">
		Links
	</div>
	<div class="intro">
		<img src="images/scummvm-link.png" width="88" height="31" alt="ScummVM">
		<b>Link to us:</b>
		Bitte verwende dieses Bild, wenn du einen Link zu uns auf deine Website setzen willst.
	</div>
	<div class="content">
		{foreach from=$links item=group}
		{include file='subhead.tpl' subhead=$group.name}
		<div class="subhead-content">
			<p>{$group.description}</p>
			<div class="linklist">
				{foreach from=$group.links item=link}
				<div class="linkentry">
					<div class="linkhead">
						<a href="{$link->getURL()}">{$link->getName()}</a>
					</div>
					<div class="linkbody">
						{$link->getDescription()}
					</div>
				</div>
				{/foreach}
			</div>
		</div>
    	{/foreach}
	</div>
</div>
