{foreach from=$news_items item=news}
<div class="box">
	<a name="{$news->getDate()|date_format:"%Y-%m-%d"}"></a>
	<div class="head">
		<a href="{$baseurl}news/{$news->getDate()|date_format:"%Y%m%d"}/">
			<span class="news-date">{$news->getDate()|date_f:"M. jS, Y"}</span>:
			{$news->getTitle()}
		</a>
	</div>
	<div class="content">
		<div class="news-author">
			Posted by {$news->getAuthor()}
		</div>
		{if $news->getImage() != null}
  			{$news->getImage()}
  		{/if}
		{$news->getContent()}
		<div class="spacing"></div>
	</div>
</div>
{/foreach}

{* Only show the 'more news' link if we're on the main page *}
{if is_bool($news_archive_link) && $news_archive_link}
<p class="bottom-link">
	<span class="feeds float_left">
		<a href="feeds/atom/">Atom</a> |
		<a href="feeds/rss/">RSS</a>
	</span>
	<a href="news/archive/" class="float_right">More News...</a>
</p>
{/if}
