{capture "intro"}
  <img src="/images/scummvm-link.png" width="88" height="31" alt="ScummVM">
  {#linksIntro#}
{/capture}

{capture "content"}
  {foreach from=$links item=group}
    <div class="subhead">{$group.name}</div>
    <div class="subhead-content">
      <p>{$group.description}</p>
      <div class="linklist">
        {foreach from=$group.links item=link}
          <div class="linkentry">
            <div class="linkhead">
              <a href="{$link->getURL()}">{$link->getName()}</a>
            </div>
            <div class="linkbody">{$link->getDescription()}</div>
          </div>
        {/foreach}
      </div>
    </div>
  {/foreach}
{/capture}

{include file="components/box.tpl" head=#linksHeading# intro=$smarty.capture.intro content=$smarty.capture.content}
