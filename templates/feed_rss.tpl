<?xml version='1.0' encoding='UTF-8' ?>
<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom">
	<channel>
		<title>ScummVM news</title>
		<link>http://www.scummvm.org/</link>
		<atom:link rel="self" type="application/rss+xml" href="{$baseurl}feeds/rss/" />
		<description>ScummVM is a cross-platform interpreter for several point-and-click adventure engines. This includes all SCUMM-based adventures by LucasArts, Simon the Sorcerer 1&amp;2 by AdventureSoft, Beneath a Steel Sky and Broken Sword 1&amp;2 by Revolution, and many more.</description>
		<language>en</language>
		{foreach from=$news item=n}
		<item>
			<title>{$n->getTitle()}</title>
			<description><![CDATA[{$n->getContent()}]]></description>
			<pubDate>{$n->getDate()|date_f:'r'}</pubDate>
			{if $n->getAuthor() != ''}
			<author>nospam@scummvm.org ({$n->getAuthor()})</author>
			{/if}
			<guid isPermaLink='true'>{$baseurl}news/archive/#{$n->getDate()|date_f:'Y-m-d'}</guid>
			<link>{$baseurl}news/#{$n->getDate()|date_f:'Y-m-d'}</link>
		</item>
		{/foreach}
	</channel>
</rss>
