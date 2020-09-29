<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<base href="{$baseurl|lang}">
	<link rel="stylesheet" href="/css/main.css">
	<link rel="alternate" type="application/atom+xml" title="{#indexAtomFeed#}" href="{$baseurl|lang}feeds/atom/">
	<link rel="alternate" type="application/rss+xml" title="{#indexRSSFeed#}" href="{$baseurl|lang}feeds/rss/">
	<link rel="apple-touch-icon" href="/images/scummvm.png">
	<title>ScummVM :: {block name=title}{/block}</title>
</head>
<body>
	<input type="checkbox" autocomplete="off" id="nav-trigger" class="nav-trigger" />
	<label for="nav-trigger"></label>

	<div class="site-wrap">

    {block name=header}{/block}

		<div class="container row">
			<div class="col-4-5 col-sm-1">
        {block name=content}{/block}
			</div>

			<div class="col-1-5 col-sm-1">
        {block name=menu}{/block}
			</div>
		</div>

    {block name=footer}{/block}
	</div>

{foreach from=$js_files item=script}
	<script src="/js/{$script}"></script>
{/foreach}
{
	<script>
		document.querySelector('.nav-trigger').addEventListener('change', function() {
			if (this.checked)
				document.body.classList.add('no-scroll');
			else
				document.body.classList.remove('no-scroll');
		});
	</script>
}
</body>
</html>
