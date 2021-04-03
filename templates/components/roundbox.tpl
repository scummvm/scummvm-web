<section class="round-box">
    {if isset($header)}
        <header class="header">
            {$header}
        </header>
    {/if}
    <section class="content{if isset($class)} {$class}{/if}">
        {$content}
    </section>
</section>
