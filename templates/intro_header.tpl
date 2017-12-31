{* Random screenshot. *}
{assign var='rand_files' value=$random_shot.screenshot->getFiles()}
{assign var='rand_max' value=$rand_files|@count}
{assign var='rand_pos' value=0|rand:$rand_max-1}
{assign var='rand_file' value=$rand_files[$rand_pos]}

{* Introduction header, included from index.tpl *}
<div id="intro_header">	
	{* Introduction text. *}
	<div class="round-box">
		<div class="round-box-header">
			{#introHeaderWhatIs#}
		</div>
		<div class="round-box-content">
			<p>{#introHeaderContentP1#}</p>
			<p>{#introHeaderContentP2#}</p>
			<p>{#introHeaderContentP3#}</p>
			<p>{#introHeaderContentP4#}</p>
			<form id="donate-header" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="U6E6SLL7E8MAS">
				<input type="image" src="/images/ppdonate.png" style="width: 63px; height: 25px; border: 0 none;" align="right" name="submit" alt="{#indexSupport#}">
				<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</form>
			<p>{#introHeaderContentP5#}</p>
		</div>		
	</div>

	{* Screenshots.
	<div class="sshots">
		<div class="round-box">
			<div class="round-box-header">
				{#introHeaderScreenshots#}
			</div>
			<div class="round-box-content">	
				<a href="/screenshots/{$random_shot.category}/{$random_shot.screenshot->getCategory()}/{$rand_pos+1}" id="screenshots_random">
					<img src="{$smarty.const.DIR_SCREENSHOTS}/{$rand_file.filename}.jpg" width="128" height="96" title="{#introHeaderFullsize#}" alt="{#introHeaderRandom#}">
				</a>
			</div>
		</div>				
	</div>
	 *}
</div>
