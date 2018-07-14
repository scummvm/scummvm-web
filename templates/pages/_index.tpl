<div class="content">
  {* Introduction text and screenshot viewer. *}
  {if isset($show_intro) && $show_intro}
    {include file='intro_header.tpl'}
  {/if}

  {* The actual content. *}
  <div class="round-box">
    <div class="round-box-header">
      {$content_title}
    </div>
    <div class="round-box-content">
      {$content}
    </div>

    {include file='banners.tpl'}
  </div>
</div>
