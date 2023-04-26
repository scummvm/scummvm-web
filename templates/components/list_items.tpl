{if is_array($list) && $list|@count > 0}
    <ul class="downloads">
        {foreach from=$list item=item key=key}
            {if $item instanceof ScummVM\Objects\File}
                {assign var='data' value=$item->getExtraInfo()}
                <li class="file">
                    <span class="sprite-{$type}-{$item->getCategoryIcon()} sprite"></span>
                    <a href="{eval var=$item->getURL()|release|download}">{eval var=$item->getName()}</a>
                    {strip}
                        <span class="download-extras">
                            {if is_array($data) && !empty($data)}
                                (
                                {if isset($data.size)}{$data.size}{/if} {if isset($data.ext)}{$data.ext}{/if}{if isset($data.date)}{#listItemsDate#} {$data.date}{/if}
                                {if isset($data.sha256)}, <span class="sha256-toggle" onclick="this.nextSibling.classList.toggle('hidden')">sha256</span><span class="sha256-text hidden"> <a href="{{eval var=$item->getURL()}|release|download}.sha256">{$data.sha256}</a></span>{/if}
                                ){if $item->getNotes() != ''}&nbsp;{/if}
                            {/if}
                            {$item->getNotes()}
                        </span>
                    {/strip}
                </li>
            {elseif $item instanceof ScummVM\Objects\WebLink}
                <li class="link">
                    <a href="{$item->getURL()}">{$item->getName()}</a>: {$item->getNotes()}
                </li>
            {elseif $type === 'screenshot_categories'}
                <li class="file">
                    {* Strip engine prefix for sprite, if it exists *}
                    <span class="sprite-games-{(str_contains($key, ':') == True) ? substr($key, strpos($key, ':') + 1) : $key} sprite"></span>
                    <a href="{'/screenshots/'|lang}{$screenshot.category}/{$key}/">{$item.name}</a>
                    <span class="download-extras">({$item.count} shots)</span>
                </li>
            {/if}
        {/foreach}
    </ul>
{/if}
