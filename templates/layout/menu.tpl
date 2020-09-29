<nav>
    {foreach from=$menus item=menu}
        {include file='components/menu_group.tpl' menu=$menu}
    {/foreach}

    {include file='components/lang_menu.tpl'}
</nav>

<div class="menu-bottom hide-small">
    <img src="/images/hangmonk.gif" alt="monkey" class="monkey float_right">
    {include file='components/banners.tpl'}
</div>