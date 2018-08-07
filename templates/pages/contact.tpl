{capture "content"}
  <div class="subhead">{#contactIRCHeader#}</div>
  <div class="subhead-content">
    {#contactIRC#}
  </div>

  <div class="subhead">{#contactForumsHeader#}</div>
  <div class="subhead-content">
    {#contactForums#}
  </div>

  <div class="subhead">{#contactTrackersHeader#}</div>
  <div class="subhead-content">
    {#contactTrackers#}
  </div>

  <div class="subhead">{#contactListsHeader#}</div>
  <div class="subhead-content">
    {#contactLists#}
  </div>
{/capture}
{include file="components/box.tpl" head=$content_title intro=#contactIntro# content=$smarty.capture.content}
