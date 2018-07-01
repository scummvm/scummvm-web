<div class="box">
	<div class="head">
		{#faqHeading#}
	</div>
	<div class="content">
	<div class="news-author">{#faqLastUpdated#} {$modified}</div>
		<dl>
			{foreach from=$contents item=section name='toc_loop'}
				{assign var='toc_num' value=$smarty.foreach.toc_loop.iteration}
				<dt>{$toc_num}. <a href="/faq/#{$toc_num}">{$section->getTitle()}</a></dt>
				<dd>
					<dl>
					{foreach from=$section->getTOC() key=href item=name name='toc_section_loop'}
						{assign var='toc_section_num' value=$smarty.foreach.toc_section_loop.iteration}
						<dt>{$toc_num}.{$toc_section_num}. <a href="/faq/#{$toc_num}_{$toc_section_num}">{$name}</a></dt>
					{/foreach}
					</dl>
				</dd>
			{/foreach}
		</dl>

		{foreach from=$contents item=section name='section_loop'}
			{assign var='section_num' value=$smarty.foreach.section_loop.iteration}
			<div class="section">
				<h3 class="title" id="{$section_num}">{$section_num}. {$section->getTitle()}</h3>
				<dl>
					{foreach from=$section->getTOC() key=href item=name name='question_loop'}
						{assign var='question_num' value=$smarty.foreach.question_loop.iteration}
						<dt>{$section_num}.{$question_num}. <a href="/faq/#{$section_num}_{$question_num}">{$name}</a></dt>
					{/foreach}
				</dl>
				{foreach from=$section->getEntries() item=entry name='entry_loop'}
					{assign var='entry_num' value=$smarty.foreach.entry_loop.iteration}
					<div class="question" id="{$section_num}_{$entry_num}">{$section_num}.{$entry_num}.
						{$entry->getQuestion()}</div>
					<div class="answer">{$entry->getAnswer()}</div>
				{/foreach}
			</div>
		{/foreach}
	</div>
</div>
