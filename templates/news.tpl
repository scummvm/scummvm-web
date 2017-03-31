{foreach from=$news_items item=news}
{assign var='news_date' value=$news->getDate()|date_format:"%Y%m%d"}
{assign var='news_filename' value=$news->getFilename()|substr:'0':'-4'}
{if !empty($date) && ($date == 'archive' || strlen($date) == 8)}
	{if strlen($news_filename) == 9}
		{assign var='news_date' value=$news_filename|substr:'0':'-1'}
	{else}
		{assign var='news_date' value=$news_filename}
	{/if}
{/if}

<div class="box">
	<a name="{$news->getDate()|date_format:"%Y-%m-%d"}{if $news_filename|strlen == 9}{$news_filename|substr:'-1'}{/if}"></a>
	<div class="head">
		<a href="{$baseurl}news/{$news_date}/">
			<span class="news-date">{$news->getDate()|date_localized:#dateformat#}</span>:
			{$news->getTitle()}
		</a>
	</div>
	<div class="content">
		<div class="news-author">
			{#newsPostedBy#} {$news->getAuthor()}
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
		<a href="/feeds/atom/">Atom</a> |
		<a href="/feeds/rss/">RSS</a>
	</span>
	<a href="/news/archive/" class="float_right">{#newsMoreNews#}</a>
</p>
{/if}
