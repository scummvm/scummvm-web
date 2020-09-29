{* Published date. *}
{assign var='timezone_offset' value=$news[0]->getDate()|date_format:'Z'}
{assign var='updated' value=$news[0]->getDate()-$timezone_offset}
<?xml version="1.0" encoding="UTF-8" ?>
<feed xml:lang="{$lang}" xmlns="http://www.w3.org/2005/Atom">
	<id>{$baseurl|lang}</id>
	<link rel="alternate" type="text/html" href="{$baseurl|lang}" />
	<link rel="self" type="application/atom+xml" href="{$baseurl|lang}feeds/atom/" />
	<title type="text">{#feedAtomTitle#}</title>
	<subtitle type="html"><![CDATA[{#feedAtomDescription#}]]></subtitle>
	<icon>{$baseurl}favicon.ico</icon>
	<author>
		<name>ScummVM team</name>
		<uri>{$baseurl|lang}/</uri>
	</author>
	<updated>{$updated|date_format:'Y-m-d\TH:i:s\Z'}</updated>
	{foreach from=$news item=n}
		{assign var='timezone_offset' value=$n->getDate()|date_format:'Z'}
		{assign var='updated' value=$n->getDate()-$timezone_offset}
		{assign var='news_filename' value=$n->getFilename()|substr:'0':'-5'}
    {assign var='link' value=$n->getLink()}

		<entry xml:lang="{$lang}">
			<id>{$baseurl|lang}news/archive/#{$n->getDate()|date_format:'Y-m-d'}{if $news_filename|strlen == 9}{$news_filename|substr:'-1'}{/if}</id>
			<link rel="alternate" href="{$link|lang}" />
			<updated>{$updated|date_format:'Y-m-d\TH:i:s\Z'}</updated>
			<published>{$updated|date_format:'Y-m-d\TH:i:s\Z'}</published>
			<title type="html">{htmlspecialchars($n->getTitle())}</title>
			<content type="html" xml:base="{$baseurl|lang}">{htmlspecialchars($n->getContent())}</content>
			{if $n->getAuthor() != ''}
			<author><name>{$n->getAuthor()}</name></author>
			{/if}
		</entry>
	{/foreach}
</feed>
