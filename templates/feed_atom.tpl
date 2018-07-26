{* Published date. *}
{assign var='timezone_offset' value=$news[0]->getDate()|date_f:'Z'}
{assign var='updated' value=$news[0]->getDate()-$timezone_offset}
<?xml version="1.0" encoding="UTF-8" ?>
<feed xml:lang="en" xmlns="http://www.w3.org/2005/Atom">
	<id>{$baseurl}</id>
	<link rel="alternate" type="text/html" href="http://www.scummvm.org" />
	<link rel="self" type="application/atom+xml" href="{$baseurl}feeds/atom/" />
	<title type="text">{#feedAtomTitle#}</title>
	<subtitle type="html"><![CDATA[{#feedAtomDescription#}]]></subtitle>
	<icon>{$baseurl}favicon.ico</icon>
	<author>
		<name>ScummVM team</name>
		<uri>http://www.scummvm.org/</uri>
	</author>
	<updated>{$updated|date_f:'Y-m-d\Th:i:s\Z'}</updated>
	{foreach from=$news item=n}
		{assign var='timezone_offset' value=$n->getDate()|date_f:'Z'}
		{assign var='updated' value=$n->getDate()-$timezone_offset}
		{assign var='news_filename' value=$n->getFilename()|substr:'0':'-4'}

		<entry xml:lang="en">
			<id>{$baseurl}news/archive/#{$n->getDate()|date_f:'Y-m-d'}{if $news_filename|strlen == 9}{$news_filename|substr:'-1'}{/if}</id>
			<link rel="alternate" href="{$news->getLink()}" />
			<updated>{$updated|date_f:'Y-m-d\Th:i:s\Z'}</updated>
			<published>{$updated|date_f:'Y-m-d\Th:i:s\Z'}</published>
			<title type="html">{$n->getTitle()}</title>
			<content type="html" xml:base="http://www.scummvm.org"><![CDATA[{$n->getContent()}]]></content>
			{if $n->getAuthor() != ''}
			<author><name>{$n->getAuthor()}</name></author>
			{/if}
		</entry>
	{/foreach}
</feed>
