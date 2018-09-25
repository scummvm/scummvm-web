{* List all screenshots for an entry or category. *}
{capture "content"}  
  {foreach from=$screenshots.games item=g name=cat_loop}
    {if $game and $game != $g->getCategory()}
      {continue}
    {/if}
    <div class="gallery">
      <h3 class="subhead"><a href="/screenshots/{$category}/{$g->getCategory()}/">{$g->getName()}</a></h3>
      {foreach from=$g->getFiles() item=fdata name=game_loop}
        <div class="screenshot">
          <a href="{$smarty.const.DIR_SCREENSHOTS}/{$fdata.filename}-full.png" title="{$fdata.caption}">
            <img src="{$smarty.const.DIR_SCREENSHOTS}/{$fdata.filename}.jpg" alt="{$g->getName()} screenshot #{$smarty.foreach.cat_loop.iteration}">
          </a>
          <div class="caption">{$fdata.caption}</div>
        </div>
      {/foreach}
    </div>
    {if $game and $game == $g->getCategory()}      
      {break}
    {/if}
  {/foreach}
{/capture}

{include file="components/box.tpl" head=#screenshotsCategoryHeading# content=$smarty.capture.content}

{if $game}
  <a href="/screenshots/{$category}/">{#screenshotsCategoryBack#}</a>
{else}
  <a href="/screenshots/">{#screenshotsCategoryBack#}</a>
{/if}

{
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			baguetteBox.run('.gallery');
		});
	</script>
}
