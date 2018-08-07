{assign var='rand_files' value=$random_shot.screenshot->getFiles()}
{assign var='rand_max' value=$rand_files|@count}
{assign var='rand_pos' value=0|rand:($rand_max-1)}
{assign var='rand_file' value=$rand_files[$rand_pos]}

{capture "content"}
<a href="{$smarty.const.DIR_SCREENSHOTS}/{$rand_file.filename}-full.png" title="{$rand_file.caption}">
  <img class="random-screenshot" src="{$smarty.const.DIR_SCREENSHOTS}/{$rand_file.filename}-full.png" alt="{$rand_file.caption}">
</a>
{/capture}
{include file='components/roundbox.tpl' class="gallery" content=$smarty.capture.content}

<script>
	window.addEventListener('DOMContentLoaded', function() {
		baguetteBox.run('.gallery');
	});
</script>
