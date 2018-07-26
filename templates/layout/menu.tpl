<nav>
  {foreach from=$menus item=menu}
    {include file='components/menu_group.tpl' menu=$menu}
  {/foreach}

  {include file=components/'lang_menu.tpl'}
</nav>

<div class="monkey hide-small">
  <img src="/images/hangmonk.gif" alt="monkey" width="55" height="57" class="float_right">
  {include file='components/banners.tpl'}
</div>
