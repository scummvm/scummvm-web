{capture "content"}
{foreach from=$documents item=document}
<p>
  <a href="{eval var=$document->getURL()}">{eval var=$document->getName()}</a><br>
  {eval var=$document->getDescription()}
</p>
{/foreach}
{/capture}

{include file="components/box.tpl" head=$content_title intro=#documentationIntro# content=$smarty.capture.content}
