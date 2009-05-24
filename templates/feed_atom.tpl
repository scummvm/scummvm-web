{* Published date. *}
{assign var='timezone_offset' value=$news[0]->getDate()|date_f:'Z'}
{assign var='updated' value=$news[0]->getDate()-$timezone_offset}
<?xml version="1.0" encoding="UTF-8" ?>
<feed xml:lang="en" xmlns="http://www.w3.org/2005/Atom">
	<id>{$baseurl}</id>
	<link rel="alternate" type="text/html" href="http://www.scummvm.org" />
	<link rel="self" type="application/atom+xml" href="{$baseurl}" />
	<title type="text">ScummVM news</title>
	<subtitle type="html"><![CDATA[ScummVM is a cross-platform interpreter for several point-and-click adventure engines. This includes all SCUMM-based adventures by LucasArts, Simon the Sorcerer 1&2 by AdventureSoft, Beneath a Steel Sky and Broken Sword 1&2 by Revolution, and many more.]]></subtitle>
	<author>
		<name>ScummVM team</name>
		<uri>http://www.scummvm.org/</uri>
	</author>
	<updated>{$updated|date_f:'Y-m-d\Th:i:s\Z'}</updated>
	{foreach from=$news item=n}
		{assign var='timezone_offset' value=$n->getDate()|date_f:'Z'}
		{assign var='updated' value=$n->getDate()-$timezone_offset}
		<entry xml:lang="en">
			<id>{$baseurl}news/archive/#{$n->getDate()|date_f:'Y-m-d'}</id>
			<link rel="alternate" href="{$baseurl}news/#{$n->getDate()|date_f:'Y-m-d'}" />
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
