<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="Content-Script-Type" content="text/javascript">
	<meta http-equiv="Content-Style-Type" content="text/css">
	<base href="{$baseurl}">
	<style type="text/css">
		{* General CSS rules. *}
		@import url("{$baseurl}css/layout.css");
		@import url("{$baseurl}css/menu.css");
		@import url("{$baseurl}css/lang-menu.css");
		{* Page specific, or other extra CSS rules. *}
		{foreach from=$css_files item=filename}
		@import url("{$baseurl}css/{$filename}");
		{/foreach}
	</style>
	<!--[if IE 6]>
	<style type="text/css">
		@import url("{$baseurl}css/ie6.css");
	</style>
	<![endif]-->
	<link rel="alternate" type="application/atom+xml" title="{#indexAtomFeed#}" href="{$baseurl}feeds/atom/">
	<link rel="alternate" type="application/rss+xml" title="{#indexRSSFeed#}" href="{$baseurl}feeds/rss/">
	<link rel="apple-touch-icon" href="/images/scummvm.png">
	<title>ScummVM :: {$title}</title>
</head>
<body>

	{* Header. *}
	<div id="header">
		<a href="{$baseurl}">
			<img src="/images/scummvm_logo.jpg" width="287" height="118" alt="{#indexLogo#}" class="float_left">
		</a>

		{include file='lang_menu.tpl'}
		<span>
			<img src="/images/heroes{$heroes_num|rand:0}.png" alt="{#indexCharacters#}" width="483" height="89">
			<img src="/images/scummvm-caption.png" alt="Script creation utility for Maniac Mansion Virtual Machine" width="483" height="29">
		</span>
	</div>

	<div id="container">
		{* Menu. *}
		<div id="menu">
			{foreach from=$menus item=menu}
				{include file='menu_group.tpl' menu=$menu}
			{/foreach}
			<div>
				<img src="/images/hangmonk.gif" alt="monkey" width="55" height="57" class="monkey float_right">
			</div>
			<div id="menu_banners">
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="U6E6SLL7E8MAS">
					<input type="image" src="/images/ppdonate.png" style="width: 88px; height: 35px; border: 0 none;" name="submit" alt="{#indexSupport#}">
					<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>
				<br>
				<a href="http://combobreaker.com/">
					<img src="/images/scummvm_cb.png" width="88" height="32" alt="{#indexCombobreaker#}">
				</a>
				<br>
				<a href="http://www.easyname.com/">
					<img src="/images/easyname-logo-big.png" width="88" height="32" alt="{#indexEasyname#}">
				</a>
				<br>
				<a href="https://www.gog.com/?pp=22d200f8670dbdb3e253a90eee5098477c95c23d">
					<img src="/images/GOG_button_small.png" width="88" height="32" alt="{#indexGOG#}">
				</a>
				<a href="https://github.com/scummvm">
					<img src="/images/github-logo.png" alt="{#indexGithub#}" width="88" height="32">
 				</a>
				<br>
				<a href="http://www.facebook.com/pages/ScummVM/7328341409">
					<img src="/images/facebook.png" width="88" height="32" alt="{#indexFacebook#}">
				</a>
				<br>
				<a href="http://www.twitter.com/ScummVM">
					<img src="/images/twitter.png" width="88" height="32" alt="{#indexTwitter#}">
				</a>
			</div>
		</div>

		{* Content *}
		<div id="content">
			{* Introduction text and screenshot viewer. *}
			{if isset($show_intro) && $show_intro}
				{include file='intro_header.tpl'}
			{/if}

			{* The actual content. *}
			<div class="rbroundbox">
				<div class="rbtop">
					<div>
						<p>
							{include file='shadowed_text.tpl' text=$content_title shadowcolor='#fff' textcolor='#821d06'}
						</p>
					</div>
				</div>
				<div class="rbcontent">
					<div class="rbwrapper">
						{$content}
					</div>
				</div>
				<div class="rbbot"><div><p>&nbsp;</p></div></div>
			</div>
		</div>

		{strip}
		<div id="footer">
			<a href="https://www.gog.com/?pp=22d200f8670dbdb3e253a90eee5098477c95c23d">
				<img src="/images/GOG_button_small.png" alt="{#indexGOG#}" width="88" height="32">
			</a>
			<a href="http://easyname.com">
				<img src="/images/easyname-logo-big.png" width="88" height="32" alt="{#indexEasyname#}">
			</a>
			<a href="https://validator.w3.org/check/referer">
				<img src="https://www.w3.org/Icons/valid-html401" width="88" height="31" alt="Valid HTML 4.01!">
			</a>
			<a href="https://jigsaw.w3.org/css-validator/check/referer">
				<img src="https://jigsaw.w3.org/css-validator/images/vcss" width="88" height="31" alt="Valid CSS!">
			</a>
		</div>
		{/strip}
		<img src="/images/tentacle.png" alt="Tentacle" width="163" height="296" class="float_right tentacle">
	</div>
	<div class="float_clear_left"></div>

	<div id="legal">
		<p>
			{#indexLegal#}
		</p>
	</div>

{foreach from=$js_files item=script}
	<script type="text/javascript" src="/javascripts/{$script}"></script>
{/foreach}
{* Google analytics javascript. *}
	<script src="https://www.google-analytics.com/urchin.js" type="text/javascript"></script>
	<script type="text/javascript">
		_uacct = "UA-1455743-1";
		_udn = "scummvm.org";
		urchinTracker();
	</script>
{* End Google analytics javascript. *}
</body>
</html>
