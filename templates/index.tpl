<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<base href="{$baseurl}">
	<link rel="stylesheet" href="{$baseurl}css/menu.css">
	<link rel="stylesheet" href="{$baseurl}css/layout.css">
	{* Page specific, or other extra CSS rules. *}
	{foreach from=$css_files item=filename}
	<link rel="stylesheet" href="{$baseurl}css/{$filename}">
	{/foreach}
	<link rel="alternate" type="application/atom+xml" title="{#indexAtomFeed#}" href="{$baseurl}feeds/atom/">
	<link rel="alternate" type="application/rss+xml" title="{#indexRSSFeed#}" href="{$baseurl}feeds/rss/">
	<link rel="apple-touch-icon" href="/images/scummvm.png">
	<title>ScummVM :: {$title}</title>
</head>
<body>
	<input type="checkbox" autocomplete="off" id="nav-trigger" class="nav-trigger" />
	<label for="nav-trigger"></label>

	<div class="site-wrap">
		{* Header. *}
		<header>
			<div class="row hide-small">
				<div class="col-1-1 top">
					<img class="header-image" src="/images/heroes{$heroes_num|rand:0}.png" alt="{#indexCharacters#}">
				</div>
			</div>
			<div class="row topper">
				<div class="col-1-2">
					<img class="logo maniac hide-small" src="/images/maniac-half.png" alt="Maniac Mansion kids">
					<a href="{$baseurl}"><img class="logo" src="/images/scummvm_logo.svg" alt="{#indexLogo#}"></a>
				</div>
				<div class="col-1-2 hide-small float_right">
					<span class="scummvm float_right">Script Creation Utility for Maniac Mansion Virtual Machine</span>
				</div>
			</div>
		</header>

		{* Content *}
		<div class="container row">
			<div class="col-4-5">
                <div class="content">
					{* Introduction text and screenshot viewer. *}
					{if isset($show_intro) && $show_intro}
						{include file='intro_header.tpl'}
					{/if}

					{* The actual content. *}
					<div class="round-box">
						<div class="round-box-header">
							{$content_title}
						</div>
						<div class="round-box-content">
							{$content}
						</div>

						{include file='banners.tpl'}
					</div>
				</div>
			</div>

			{* Menu. *}
			<div class="col-1-5">
				<nav>
					{foreach from=$menus item=menu}
						{include file='menu_group.tpl' menu=$menu}
					{/foreach}

					{include file='lang_menu.tpl'}
				</nav>

				<div class="monkey hide-small">
					<img src="/images/hangmonk.gif" alt="monkey" width="55" height="57" class="float_right">
				</div>

			</div>
		</div>
		<footer class="row">
			<div class="col-4-5">
				{#indexLegal#}
			</div>
			<div class="col-1-5 hide-small">
				<div class="tentacle">
					<img src="/images/tentacle.svg" alt="Tentacle">
				</div>
			</div>
		</footer>
	</div>

{foreach from=$js_files item=script}
	<script src="/javascripts/{$script}"></script>
{/foreach}

</body>
</html>
