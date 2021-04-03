<{if isset($article)}article{else}section{/if} class="box" {if isset($id)}id="{$id}" {/if}>
    {if isset($head)}
        <header class="head">
            {$head}
        </header>
    {/if}
    {if isset($intro)}
        <section class="intro">
            {$intro}
        </section>
    {/if}
    <section class="content">
        {$content}
    </section>
</{if isset($article)}article{else}section{/if}>
