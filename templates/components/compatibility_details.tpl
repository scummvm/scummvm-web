{assign var="x" value=$game->getSupportLevel()}
{assign var="pct_class" value=$support_level_class.$x}
{assign var="support_level" value=$support_level_header.$x}
{assign var="support_description" value=$support_level_description.$x}

{capture "content"}
	<table class="chart color4">
		<caption>{#compatibilityDetailsChartTitle#}</caption>
		<thead>
			<tr class="color4">
				<th>{#compatibilityDetailsChartCol1#}</th>
				<th>{#compatibilityDetailsChartCol2#}</th>
				<th>{#compatibilityDetailsChartCol4#}</th>
			</tr>
		</thead>
		<tbody>
			<tr class="color0">
				<td>{$game->getGame()->getName()}</td>
				<td>{$game->getGame()->getId()}</td>
				<td align="center" class="{$pct_class}">{$support_level}</td>
			</tr>
			<tr class="color2">
				<td colspan="3" class="details">
					{$game->getNotes()|regex_replace:"/%.+%/":$support_description}
				</td>
			</tr>
		</tbody>
	</table>
	<p class="bottom-link">
		<a href="{'/compatibility/'|lang}{$version}/">{#compatibilityDetailsBack#}</a>
	</p>
{/capture}

{include "components/box.tpl" head={#compatibilityDetailsInto#} content=$smarty.capture.content}
