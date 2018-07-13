{foreach from=$news_items item=news}
  {$news_filename=$news->getFilename()|substr:'0':'-4'}
  <div class="box">
    <div class="head" id="{$news->getDate()|date_format:"%Y-%m-%d"}{if $news_filename|strlen == 9}{$news_filename|substr:'-1'}{/if}">
      <a href="{$news->getLink()}/">
        <span class="news-date">{$news->getDate()|date_localized:#dateformat#}</span>:
        {$news->getTitle()}
      </a>
    </div>
    <div class="news content">
      <div class="news-author">
        {#newsPostedBy#} {$news->getAuthor()}
      </div>
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
