<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<base href="{$baseurl}">
	<link rel="stylesheet" href="{$baseurl}css/main.css">	
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
			<div class="row top hide-small">				
				<div class="col-1-1">
					<img src="/images/heroes{$heroes_num|rand:0}.png" alt="{#indexCharacters#}">
				</div>
			</div>
			<div class="row bottom">
				<div class="col-1-2">
					<div class="logo">
						<img class="maniac hide-small" src="/images/maniac-half.png" alt="Maniac Mansion kids">
						<a href="{$baseurl}">
							<img class="logo" src="/images/scummvm_logo.png" alt="{#indexLogo#}">
						</a>
					</div>
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
						{include file='components/intro_header.tpl'}
					{/if}

					{* The actual content. *}
					{include file='components/roundbox.tpl' header=$content_title content=$content}
				</div>
			</div>

			{* Menu. *}
			<div class="col-1-5">
				<nav>
					{foreach from=$menus item=menu}
						{include file='components/menu_group.tpl' menu=$menu}
					{/foreach}

					{include file='components/lang_menu.tpl'}
				</nav>

				<div class="monkey hide-small">
					<img src="/images/hangmonk.gif" alt="monkey" width="55" height="57" class="float_right">
					{include file='components/banners.tpl'}
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
{* Google analytics javascript. *}
	<script src="https://www.google-analytics.com/urchin.js" type="text/javascript"></script>
	<script type="text/javascript">
		_uacct = "UA-1455743-1";
		_udn = "scummvm.org";
		urchinTracker();
	</script>
{* End Google analytics javascript. *}
	<script>
		document.querySelector('.nav-trigger').addEventListener('change', function() {
			if (this.checked)
				document.body.classList.add('no-scroll');
			else
				document.body.classList.remove('no-scroll');
		});
	</script>
</body>
</html>
