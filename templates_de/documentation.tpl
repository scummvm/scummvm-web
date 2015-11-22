<div class="box">
	<div class="intro">
		<p>Klicke auf den Titel der Dokumentation, die Du lesen m&ouml;chtest.</p>
	</div>
	<div class="content">
		<!-- Ohloh badge with project metrics -->
		<script type="text/javascript" src="http://www.ohloh.net/projects/113;badge_js"></script>
		{foreach from=$documents item=document}
		<p>
			<a href="{eval var=$document->getURL()}">{eval var=$document->getName()}</a><br>
			{eval var=$document->getDescription()}
		</p>
		{/foreach}
	</div>
</div>
