<?xml version='1.0' encoding='UTF-8' ?>
<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom">
	<channel>
		<title>{#feedRSSTitle#}</title>
		<link>{$baseurl|lang}</link>
		<atom:link rel="self" type="application/rss+xml" href="{$baseurl|lang}feeds/rss/" />
		<description>{#feedRSSDescription#}</description>
		<language>{$lang}</language>
		{foreach from=$news item=n}
		{assign var='news_filename' value=$n->getFilename()|substr:'0':'-4'}
		<item>
			<title>{htmlspecialchars($n->getTitle())}</title>
			<description>{htmlspecialchars($n->getContent())}></description>
			<pubDate>{$n->getDate()|date_format:'r'}</pubDate>
			{if $n->getAuthor() != ''}
			<author>nospam@scummvm.org ({$n->getAuthor()})</author>
			{/if}
			<guid isPermaLink='true'>{$baseurl|lang}news/archive/#{$n->getDate()|date_format:'Y-m-d'}{if $news_filename|strlen == 9}{$news_filename|substr:'-1'}{/if}</guid>
			<link>{$n->getLink()|lang}/</link>
		</item>
		{/foreach}
	</channel>
</rss>
