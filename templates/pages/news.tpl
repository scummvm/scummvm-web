{foreach from=$news_items item=news}
	{$news_filename = $news->getFilename()|substr:'0':'-4'}
	{$id = "{$news->getDate()|date_format:"%Y-%m-%d"}{if $news_filename|strlen == 9}{$news_filename|substr:'-1'}{/if}"}
	{capture "head"}
		<a href="{$news->getLink()|lang}/">
			<span class="news-date">{$news->getDate()|date_localized}</span>:
			{$news->getTitle()}
		</a>
	{/capture}
	{capture "content"}
		<div class="news-author">
        {#newsPostedBy#} {$news->getAuthor()}
    </div>
    {$news->getContent()}
	{/capture}
	{include "components/box.tpl" id=$id head=$smarty.capture.head content=$smarty.capture.content article="true"}
{/foreach}

{* Only show the 'more news' link if we're on the main page *}
{if is_bool($news_archive_link) && $news_archive_link}
<p class="bottom-link">
	<span class="feeds float_left">
		<a href="{'/feeds/atom/'|lang}">Atom</a> |
		<a href="{'/feeds/rss/'|lang}">RSS</a>
	</span>
	<a href="{'/news/archive/'|lang}" class="float_right">{#newsMoreNews#}</a>
</p>
{/if}
