<div class="box">
	<div class="intro">
		<p>
			The ScummVM team occasionally works on various subprojects, separate from
			the main ScummVM program. These projects are generally reasonably stagnant
			and not given a high priority. Regardless, this page is here to inform you
			of them, in the vague hope of attracting more developers to help maintain
			these side-programs.
		</p>
		<p>
			Please do not ask where you can obtain binaries of these programs.
			Currently both subprojects are still in a state only suitable for
			developers... so if you can't compile the code yourself, then these are
			not really ready for you.
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
