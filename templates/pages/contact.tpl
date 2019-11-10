{capture "content"}
  <div class="subhead">{#contactDiscordHeader#}</div>
  <div class="subhead-content">
    <p>{#contactDiscord#}</p>
  </div>

  <div class="subhead">{#contactIRCHeader#}</div>
  <div class="subhead-content">
    <p>{#contactIRC#}</p>
  </div>

  <div class="subhead">{#contactForumsHeader#}</div>
  <div class="subhead-content">
    <p>{#contactForums#}</p>
  </div>

  <div class="subhead">{#contactTrackersHeader#}</div>
  <div class="subhead-content">
    <p>{#contactTrackers#}</p>
  </div>

  <div class="subhead">{#contactListsHeader#}</div>
  <div class="subhead-content">
    <p>{#contactLists#}</p>
  </div>
{/capture}
{include file="components/box.tpl" head=$content_title intro=#contactIntro# content=$smarty.capture.content}
