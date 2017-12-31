<div class="box">
	<div class="intro">
		<p>{#documentationIntro#}</p>
	</div>
	<div class="content">
		<!-- Ohloh badge with project metrics -->
		<div class="openhub stats">
			<script type="text/javascript" src="https://www.openhub.net/p/scummvm/widgets/project_basic_stats?format=js"></script>
		</div>
		<div class="openhub languages">
			<script type='text/javascript' src='https://www.openhub.net/p/scummvm/widgets/project_languages?format=js'></script>
		</div>
		{foreach from=$documents item=document}
		<p>
			<a href="{eval var=$document->getURL()}">{eval var=$document->getName()}</a><br>
			{eval var=$document->getDescription()}
		</p>
		{/foreach}
	</div>
</div>
