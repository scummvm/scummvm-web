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
		<div class="subhead">{$project->getName()}</div>
		<div class="subhead-content">
			{$project->getInfo()}
			{include file='components/list_items.tpl' list=$project->getDownloads() type='platforms'}
		</div>
		{/foreach}
	</div>
</div>
