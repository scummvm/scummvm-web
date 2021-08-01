{capture "intro"}
    <div class="row">
        <div class="navigation col-1-2 col-md-1">
            <h4 class="subhead">{#downloadsHeader#}</h4>
            <ul>
                {foreach from=$downloads item=section}
                    <li>
                        <a href="{'/downloads/'|lang}#{$section->getAnchor()}">{{eval var=$section->getTitle()}|release}</a>
                        {if $section->getSubSections() && $section->getSubSections()|@count > 1}
                            <ul>
                            {foreach from=$section->getSubSections() item=subsection}
                                <li>
                                    <a href="{'/downloads/'|lang}#{$subsection->getAnchor()}">{{eval var=$subsection->getTitle()}|release}</a>
                                </li>
                            {/foreach}
                            </ul>
                        {/if}
                    </li>
                {/foreach}
            </ul>
        </div>
        <div class="text col-1-2 col-md-1">
            <p>{#downloadsContentP1#|release}</p>
            <ul>
                <li>{#downloadsContentP2#|release}</li>
                <li>{#downloadsContentP3#}</li>
                <li>{#downloadsContentP4#}</li>
            </ul>
        </div>
    </div>
{/capture}

{capture "release"}
    {include file="components/recommended_download.tpl" recommendedDownload=$recommendedDownload}
{/capture}

{include file="components/box.tpl" head={#downloadsXMLTitle#} intro=$smarty.capture.intro id="downloads" content=$smarty.capture.release}

{* sections *}
{foreach from=$downloads item=section name=downloads_loop}
    {capture "content"}
        {foreach from=$section->getSubSections() item=subsection}
            {if $subsection->getTitle()}
            <div class="subhead" id="{if $subsection->getAnchor()}{$subsection->getAnchor()}{/if}">{{eval var=$subsection->getTitle()}|release}</div>
            {/if}

            <div class="subhead-content">
                {if $subsection->getNotes()}
                    {{eval var=$subsection->getNotes()}|release}
                {/if}
                {include file='components/list_items.tpl' list=$subsection->getItems() type='platforms'}
            </div>
        {/foreach}
    {/capture}

    {include
        file="components/box.tpl"
        head={{eval var=$section->getTitle()}|release}
        content=$smarty.capture.content
        id=$section->getAnchor()
    }
{/foreach}
