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
			<img src="images/scummvm_logo.jpg" width="287" height="118" alt="ScummVM-Logo" class="float_left">
		</a>

		<span>
			<img src="images/heroes{$heroes_num|rand:0}.png" alt="Charaktere" width="483" height="89">
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
				<a href="http://sourceforge.net/p/scummvm/donate/">
					<img src="http://images.sourceforge.net/images/project-support.jpg" width="88" height="32" alt="Support This Project">
				</a>
				<br>
				<a href="http://combobreaker.com/">
					<img src="images/scummvm_cb.png" width="88" height="32" alt="Combobreaker.com T-Shirts">
				</a>
				<br>
				<a href="http://www.easyname.at/">
					<img src="images/easyname-logo-big.png" width="88" height="32" alt="easyname hosting">
				</a>
				<br>
				<a href="http://www.gog.com/?pp=22d200f8670dbdb3e253a90eee5098477c95c23d">
					<img src="images/GOG_button_small.png" width="88" height="32" alt="GOG.com games">
				</a>
				<a href="https://github.com/scummvm">
					<img src="images/github-logo.png" alt="ScummVM on GitHub" width="88" height="32">
 				</a>
				<br>
				<a href="http://www.facebook.com/pages/ScummVM/7328341409">
					<img src="images/facebook.png" width="88" height="32" alt="Join us on Facebook">
				</a>
				<br>
				<a href="http://www.twitter.com/ScummVM">
					<img src="images/twitter.png" width="88" height="32" alt="Follow us on Twitter">
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
			<a href="http://sourceforge.net/p/scummvm/donate/">
				<img src="http://images.sourceforge.net/images/project-support.jpg" width="88" height="32" alt="Support This Project">
			</a>
			<a href="http://www.gog.com/?pp=22d200f8670dbdb3e253a90eee5098477c95c23d">
				<img src="images/GOG_button_small.png" alt="Buy with GOG.com" width="88" height="32">
			</a>
			<a href="http://easyname.at">
				<img src="images/easyname-logo-big.png" width="88" height="32" alt="easyname hosting">
			</a>
			<a href="http://validator.w3.org/check/referer">
				<img src="http://www.w3.org/Icons/valid-html401" width="88" height="31" alt="Valid HTML 4.01!">
			</a>
			<a href="http://jigsaw.w3.org/css-validator/check/referer">
				<img src="http://jigsaw.w3.org/css-validator/images/vcss" width="88" height="31" alt="Valid CSS!">
			</a>
		</div>
		{/strip}
		<img src="images/tentacle.png" alt="Tentacle" width="163" height="296" class="float_right tentacle">
	</div>
	<div class="float_clear_left"></div>

	<div id="legal">
		<p>
			LucasArts, Monkey Island, Maniac Mansion, Full Throttle, The Dig, LOOM, und wahrscheinlich noch viele Dinge mehr sind eingetragene Warenzeichen von <a href="http://www.lucasarts.com/">LucasArts, Inc.</a>. Alle anderen Marken und eingetragenen Warenzeichen sind Eigentum der entsprechenden Firmen. ScummVM ist in keiner Weise mit LucasArts, Inc. verbunden.
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
{* End Google analytics javascript. *}
{* Piwik javascript. *}
{literal}
	<script type="text/javascript">
	var pkBaseURL = (("https:" == document.location.protocol) ? "https://sourceforge.net/apps/piwik/scummvm/" : "http://sourceforge.net/apps/piwik/scummvm/");
	document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
	</script><script type="text/javascript">
	try {
	var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 3);
	piwikTracker.trackPageView();
	piwikTracker.enableLinkTracking();
	} catch( err ) {}
	</script><noscript><p><img src="http://sourceforge.net/apps/piwik/scummvm/piwik.php?idsite=3" style="border:0" alt=""/></p></noscript>
{/literal}
{* End Piwik javascript. *}
</body>
</html>
