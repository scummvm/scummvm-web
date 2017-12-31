<div class="box">
	<div class="intro">
		<p>
			{#subprojectsIntroP1#}
		</p>
		<p>
			{#subprojectsIntroP2#}
		</p>
	</div>

	<div class="content">
		{foreach from=$subprojects item=project}
		{include file='subhead.tpl' subhead=$project->getName()}
		<div class="subhead-content">
			{$project->getInfo()}
			{include file='list_items.tpl' list=$project->getDownloads()}
		</div>
		{/foreach}
	</div>
</div>
