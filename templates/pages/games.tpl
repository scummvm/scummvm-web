{capture "intro"}
    <div class="row">
        <div class="navigation col-1-2 col-md-1">
            <h4 class="subhead">{#gamesHeader#}</h4>
            <ul>
                {foreach from=$downloads key=key item=section}
                    <li>
                        <a href="{'/games/'|lang}#{$section->getAnchor()}">{{eval var=$section->getTitle()}|release}</a>
                        {if $section->getSubSections() && $section->getSubSections()|@count > 1}
                            <ul>
                            {foreach from=$section->getSubSections() item=subsection}
                                <li>
                                    <a href="{'/games/'|lang}#{$key}-{$subsection->getAnchor()}">{{eval var=$subsection->getTitle()}|release}</a>
                                </li>
                            {/foreach}
                            </ul>
                        {/if}
                    </li>
                {/foreach}
            </ul>
        </div>
        <div class="text col-1-2 col-md-1">
            <ul>
                <li>{#gamesContentP1#}</li>
                <li>{#gamesContentP2#}</li>
            </ul>
        </div>
    </div>
{/capture}

{foreach from=$downloads key=key item=dsection name=downloads_loop}
{capture "content"}
{foreach from=$dsection->getSubSections() item=dsubsection}
{if $dsubsection->getTitle() != ''}
<div class="subhead" id="{if $dsubsection->getAnchor() != ''}{$key}-{$dsubsection->getAnchor()}{/if}">{eval var=$dsubsection->getTitle()}</div>
{/if}

<div class="subhead-content">
    {if $dsubsection->getNotes() != ''}
    <p>{eval var=$dsubsection->getNotes()}</p>
    {/if}

    {include file='components/list_items.tpl' list=$dsubsection->getItems() type='games'}
</div>
{/foreach}
{/capture}

{if $smarty.foreach.downloads_loop.first}
{include
file="components/box.tpl"
head={{eval var=$dsection->getTitle()}|release}
intro=$smarty.capture.intro
id=$dsection->getAnchor()
content=$smarty.capture.content
}
{else}
{include
file="components/box.tpl"
head={{eval var=$dsection->getTitle()}|release}
id=$dsection->getAnchor()
content=$smarty.capture.content
}
{/if}

{/foreach}
