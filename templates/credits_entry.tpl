{if is_array($groups) && $groups|@count > 0}
	{foreach from=$groups item=group}
	<table class="credits">
		{if $group.name != null}
		<caption>{$group.name}:</caption>
		{/if}
		<tbody>
		{foreach from=$group.persons item=person}
			<tr>
				<td class="name">{$person->getName()}</td>
				<td class="alias news-author">{$person->getAlias()}</td>
				<td>{$person->getDescription()}</td>
			</tr>
		{/foreach}
		</tbody>
	</table>
	{/foreach}
{/if}

{if is_array($paragraphs) && $paragraphs|@count > 0}
	{foreach from=$paragraphs item=paragraph}
	<p class="credits">{$paragraph}</p>
	{/foreach}
{/if}
