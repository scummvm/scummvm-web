<div class="box">
	<div class="intro">
		<p>
			Gelegentlich arbeitet das ScummVM-Team an verschiedenen Unterprojekten,
			die nicht direkt etwas mit ScummVM selbst zu tun haben. Diese Projekte
			stagnieren häufig und genie&szlig;en keine besonders hohe Priorit&auml;t.
			Trotzdem soll diese Seite &uuml;ber diese Projekte informieren, in der vagen
			Hoffnung, weitere Entwickler f&uuml;r diese Nebenprojekte zu gewinnen.
		</p>
		<p>
			Bitte frage nicht danach, wo du die Bin&auml;rdateien f&uuml;r diese
			Programme beziehen kannst. Beide Nebenprojekte sind derzeit nur f&uuml;r
			Entwickler geeignet... Wenn du den Code nicht selbst kompilieren kannst,
			dann sind diese Programme nicht wirklich f&uuml;r dich geeignet.
		</p>
	</div>

	{foreach from=$subprojects item=project}
	{include file='subhead.tpl' subhead=$project->getName()}
	<div class="subhead-content">
		{$project->getInfo()}
		{include file='list_items.tpl' list=$project->getDownloads()}
	</div>
	{/foreach}
</div>
