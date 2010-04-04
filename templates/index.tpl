<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<meta http-equiv="Content-Script-Type" content="text/javascript">
	<meta http-equiv="Content-Style-Type" content="text/css">
	<base href="{$baseurl}">
	<style type="text/css">
		{* General CSS rules. *}
		@import url("css/layout.css");
		@import url("css/menu.css");
		{* Page specific, or other extra CSS rules. *}
		{foreach from=$css_files item=filename}
		@import url("css/{$filename}");
		{/foreach}
	</style>
	<!--[if IE 6]>
	<style type="text/css">
		@import url("css/ie6.css");
	</style>
	<![endif]-->
	<link rel="alternate" type="application/atom+xml" title="ScummVM Atom news feed" href="{$baseurl}feeds/atom/">
	<link rel="alternate" type="application/rss+xml" title="ScummVM RSS news feed" href="{$baseurl}feeds/rss/">
	<title>ScummVM :: {$title}</title>
</head>
<body>

	{* Header. *}
	<div id="header">
		<a href="{$baseurl}">
			<img src="images/scummvm_logo.jpg" width="287" height="118" alt="ScummVM logo" class="float_left">
		</a>

		<span>
			<img src="images/heroes{$heroes_num|rand:0}.png" alt="Game characters" width="483" height="89">
			<img src="images/scummvm-caption.png" alt="Script creation utility for Maniac Mansion Virtual Machine" width="483" height="29">
		</span>
	</div>

	<div id="container">
		{* Menu. *}
		<div id="menu">
			{foreach from=$menus item=menu}
				{include file='menu_group.tpl' menu=$menu}
			{/foreach}
			<div>
				<img src="images/hangmonk.gif" alt="monkey" width="55" height="57" class="monkey float_right">
			</div>
			<div id="menu_banners">
				<a href="http://sourceforge.net/donate/index.php?group_id=37116">
					<img src="http://images.sourceforge.net/images/project-support.jpg" width="88" height="32" alt="Support This Project">
				</a>
				<br>
				<a href="http://combobreaker.com/">
					<img src="images/scummvm_cb.png" width="88" height="32" alt="Combobreaker.com T-Shirts">
				</a>
				<br>
				<a href="http://www.gog.com/en/frontpage/pp/22d200f8670dbdb3e253a90eee5098477c95c23d">
					<img src="images/GOG_button_small.png" width="88" height="32" alt="GOG.com games">
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
			<a href="http://sourceforge.net/donate/index.php?group_id=37116">
				<img src="http://images.sourceforge.net/images/project-support.jpg" width="88" height="32" alt="Support This Project">
			</a>
			<a href="http://www.gog.com/en/frontpage/pp/22d200f8670dbdb3e253a90eee5098477c95c23d">
				<img src="images/GOG_button_small.png" alt="Buy with GOG.com" width="88" height="32">
			</a>
			<a href="http://sourceforge.net/projects/scummvm">
				<img src="http://sflogo.sourceforge.net/sflogo.php?group_id=37116&amp;type=13" width="120" height="30" alt="Get ScummVM at SourceForge.net. Fast, secure and Free Open Source software downloads">
			</a>
			<a href="http://validator.w3.org/check/referer">
				<img src="http://www.w3.org/Icons/valid-html401" width="88" height="31" alt="Valid HTML 4.01!">
			</a>
			<a href="http://jigsaw.w3.org/css-validator/check/referer">
				<img src="http://jigsaw.w3.org/css-validator/images/vcss" width="88" height="31" alt="Valid CSS!">
			</a>
			<a href="http://www.validome.org/referer">
				<img src="http://www.validome.org/images/set2/valid_html_4_0_1.gif" width="88" height="31" alt="Valid HTML 4.01">
			</a>
		</div>
		{/strip}
		<img src="images/tentacle.png" alt="Tentacle" width="163" height="296" class="float_right tentacle">
	</div>
	<div class="float_clear_left"></div>

	<div id="legal">
		<p>
			LucasArts, Monkey Island, Maniac Mansion, Full Throttle, The Dig, LOOM, and probably lots of other things are registered trademarks of <a href="http://www.lucasarts.com/">LucasArts, Inc.</a>. All other trademarks and registered trademarks are owned by their respective companies. ScummVM is not affiliated in any way with LucasArts, Inc.
		</p>
	</div>

{foreach from=$js_files item=script}
	<script type="text/javascript" src="javascripts/{$script}"></script>
{/foreach}
{* Google analytics javascript. *}
	<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
	<script type="text/javascript">
		_uacct = "UA-1455743-1";
		_udn = "scummvm.org";
		urchinTracker();
	</script>
</body>
</html>
