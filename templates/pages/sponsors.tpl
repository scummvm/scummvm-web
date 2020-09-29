{capture "intro"}
    <p>{#sponsorsIntro#}</p>
{/capture}

{capture "content"}
<div class="gallery">
    <div class="row">
        {foreach from=$sponsors item=sponsor}
        <div class="col-1-3 col-md-1">
            <div class="sponsor card">
                <div class="image">
                    <a href="{$sponsor->getLink()}" title="{$sponsor->getName()}">
                        <img src="{$sponsor->getImage()}" alt="{$sponsor->getName()}">
                    </a>
                </div>
                <div class="caption">{$sponsor->getDescription()}</div>
            </div>
        </div>
        {/foreach}
    </div>
</div>
{/capture}

{include file="components/box.tpl" head=#sponsorsHeading# intro=$smarty.capture.intro content=$smarty.capture.content}