<section class="round-box">
  {if $header}
  <header class="header">
    {$header}
  </header>
  {/if}
  <section class="content{if $class} {$class}{/if}">
    {$content}
  </section>  
</section>
