{* Introduction header, included from index.tpl *}
{capture "content"}
<div class="col-2-3 col-md-1">
  <p>{#introHeaderContentP1#}</p>
  <p>{#introHeaderContentP2#}</p>
  <p>{#introHeaderContentP3#}</p>
  <p>{#introHeaderContentP4#}</p>
  <form class="float_right" id="donate-header" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" name="hosted_button_id" value="U6E6SLL7E8MAS">
    <input type="image" src="/images/ppdonate.png" style="width: 63px; height: 25px; border: 0 none;" align="right" name="submit" alt="{#indexSupport#}">
    <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
  </form>
  <p>{#introHeaderContentP5#}</p>
</div>
<div class="col-1-3 col-md-1">
  {include file='components/random_screenshot.tpl'}    
</div>
{/capture}

<div id="intro_header">	
  {include file='components/roundbox.tpl' header=#introHeaderWhatIs# class="text row" content=$smarty.capture.content}	
</div>
