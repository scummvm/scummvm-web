<?xml version='1.0' encoding='UTF-8' ?>
<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom">
	<channel>
		<title>ScummVM news</title>
		<link>http://www.scummvm.org/</link>
		<atom:link rel="self" type="application/rss+xml" href="{$baseurl}feeds/rss/" />
		<description>{#feedRSSDescription#}</description>
		<language>en</language>
		{foreach from=$news item=n}
		{assign var='news_filename' value=$n->getFilename()|substr:'0':'-4'}
		<item>
			<title>{$n->getTitle()}</title>
			<description><![CDATA[{$n->getContent()}]]></description>
			<pubDate>{$n->getDate()|date_f:'r'}</pubDate>
			{if $n->getAuthor() != ''}
			<author>nospam@scummvm.org ({$n->getAuthor()})</author>
			{/if}
			<guid isPermaLink='true'>{$baseurl}news/archive/#{$n->getDate()|date_f:'Y-m-d'}{if $news_filename|strlen == 9}{$news_filename|substr:'-1'}{/if}</guid>
			<link>{$baseurl}news/{$news_filename}/</link>
		</item>
		{/foreach}
	</channel>
</rss>
