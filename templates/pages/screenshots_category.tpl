{* List all screenshots for an entry or category. *}
{capture "content"}
    {foreach from=$screenshots.games item=g name=cat_loop}
        <h3 class="subhead"><a href="{'/screenshots/'|lang}{$category}/{$g->getCategory()}/">{$g->getName()}</a></h3>
        <div class="gallery">
            {foreach from=$g->getFiles() item=fdata name=game_loop}
                <div class="card">
                    <div class="image">
                        <a href="{$smarty.const.DIR_SCREENSHOTS}/{$fdata.filename}_full.png" title="{$fdata.caption}">
                            <img class="pixelated" src="{$smarty.const.DIR_SCREENSHOTS}/{$fdata.filename}.jpg" alt="{$g->getName()} screenshot #{$smarty.foreach.cat_loop.iteration}">
                        </a>
                    </div>
                    <div class="caption">{$fdata.caption}</div>
                </div>
            {/foreach}
        </div>
    {/foreach}
{/capture}

{include file="components/box.tpl" head=#screenshotsCategoryHeading# content=$smarty.capture.content}

{if $game}
<a href="{'/screenshots/'|lang}{$category}/">{#screenshotsCategoryBack#}</a>
{else}
<a href="{'/screenshots/'|lang}">{#screenshotsCategoryBack#}</a>
{/if}

<script>
    document.addEventListener('DOMContentLoaded', function() {
        baguetteBox.run('.gallery');
    });
</script>
