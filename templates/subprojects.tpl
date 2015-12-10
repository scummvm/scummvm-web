<div class="box">
	<div class="intro">
		<p>
			{#subprojectsIntroP1#}
		</p>
		<p>
			{#subprojectsIntroP2#}
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
