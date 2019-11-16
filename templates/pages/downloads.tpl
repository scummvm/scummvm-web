{capture "intro"}
<div class="row">
	<div class="navigation col-1-2">
		<h4 class="subhead">{#downloadsHeader#}</h4>
		<ul>
			{foreach from=$sections item=arr}
			<li><a href="/downloads/#{$arr.anchor}">{eval var=$arr.title}</a></li>
			{/foreach}
		</ul>
	</div>
	<div class="text col-1-2">
		<p>{'/\x7brelease\x7d/'|preg_replace:$release:#downloadsContentP1#}</p>
		<ul>
			<li>{'/\x7brelease\x7d/'|preg_replace:$release:#downloadsContentP2#}</li>
			<li>{#downloadsContentP3#}</li>
			<li>{#downloadsContentP4#}</li>
		</ul>
	</div>
</div>
{/capture}

{foreach from=$downloads item=dsection name=downloads_loop}

  {capture "content"}
    {if $smarty.foreach.downloads_loop.first}
      {include
        file="components/recommended_download.tpl"
        recommendedDownload=$recommendedDownload
      }
    {/if}

    {foreach from=$dsection->getSubSections() item=dsubsection}
    {if $dsubsection->getTitle() != ''}
      <div class="subhead" id="{if $dsubsection->getAnchor() != ''}{$dsubsection->getAnchor()}{/if}">{eval var=$dsubsection->getTitle()}</div>
    {/if}

      <div class="subhead-content">
        {if $dsubsection->getNotes() != ''} {'/\x7brelease\x7d/'|preg_replace:$release:{eval var=$dsubsection->getNotes()}} {/if} {include file='components/list_items.tpl' list=$dsubsection->getItems() type='platforms'}
      </div>
    {/foreach}
  {/capture}

  {if $smarty.foreach.downloads_loop.first}
    {include
      file="components/box.tpl"
      head={eval var=$dsection->getTitle()}
      intro=$smarty.capture.intro
      id=$dsection->getAnchor()
      content=$smarty.capture.content
    }
  {else}
    {include
      file="components/box.tpl"
      head={eval var=$dsection->getTitle()}
      content=$smarty.capture.content
      id=$dsection->getAnchor()
    }
  {/if}
{/foreach}
