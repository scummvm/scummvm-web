{if !isset($section) || $section == ''}
<div class="par-item">
	<div class="par-head">The inComplete SCUMM Reference Guide</div>
	<div class="par-content">
		<p>
			<i>being a Partially Complete and Mostly Accurate guide to the SCUMM Engine data file Format for Versions Five and Six (and above)</i>
		</p>
		<ul>
			<li><a href="?p=documentation&amp;d=specs&amp;s=introduction">Introduction</a></li>
			<li><a href="?p=documentation&amp;d=specs&amp;s=char">CHAR</a></li>
			<li><a href="?p=documentation&amp;d=specs&amp;s=aary">AARY</a></li>
			<li><a href="?p=documentation&amp;d=specs&amp;s=scrp">SCRP</a></li>
			<li><a href="?p=documentation&amp;d=specs&amp;s=scrp-v5">V5 opcode list</a></li>
			<li><a href="?p=documentation&amp;d=specs&amp;s=scrp-v6">V6 opcode list</a></li>
			<li><a href="?p=documentation&amp;d=specs&amp;s=glossary">Glossary</a></li>
		</ul>
		<hr>
		<p style="font-size: smaller; text-align: center">
			All material &copy; 2000-2002 David Given, unless where stated otherwise.
		</p>
	</div>
</div>

{elseif $section == 'introduction'}
	{include file='documentation_specs_introduction.tpl'}
{elseif $section == 'char'}
	{include file='documentation_specs_char.tpl'}
{elseif $section == 'aary'}
	{include file='documentation_specs_aary.tpl'}
{elseif $section == 'scrp'}
	{include file='documentation_specs_scrp.tpl'}
{elseif $section == 'scrp-v5'}
	{include file='documentation_specs_scrp_v5.tpl'}
{elseif $section == 'scrp-v6'}
	{include file='documentation_specs_scrp_v6.tpl'}
{elseif $section == 'glossary'}
	{include file='documentation_specs_glossary.tpl'}
{/if}
