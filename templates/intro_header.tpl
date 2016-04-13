{* Random screenshot. *}
{assign var='rand_files' value=$random_shot.screenshot->getFiles()}
{assign var='rand_max' value=$rand_files|@count}
{assign var='rand_pos' value=0|rand:$rand_max-1}
{assign var='rand_file' value=$rand_files[$rand_pos]}

{* Introduction header, included from index.tpl *}
<div id="intro_header">
	{* Screenshots. *}
	<div class="sshots">
		<div class="rbtop">
			<div>
				<p>
					{include file='shadowed_text.tpl' text=#introHeaderScreenshots# shadowcolor='#fff' textcolor='#356a02'}
				</p>
			</div>
		</div>
		<div class="rbcontent">
			<a href="/screenshots/{$random_shot.category}/{$random_shot.screenshot->getCategory()}/{$rand_pos+1}" id="screenshots_random">
				<img src="{$smarty.const.DIR_SCREENSHOTS}/{$rand_file.filename}.jpg" width="128" height="96" title="{#introHeaderFullsize#}" alt="{#introHeaderRandom#}">
			</a>
		</div>
		<div class="rbbot">
			<div>
				<p>
					<a href="/screenshots/" id="screenshots_prev">{#introHeaderPrevShot#}</a>
					<a href="/screenshots/" id="screenshots_next">{#introHeaderNextShot#}</a>
				</p>
			</div>
		</div>
	</div>

	{* Introduction text. *}
	<div class="rbroundbox intro">
		<div class="rbtop">
			<div>
				<p>
					{include file='shadowed_text.tpl' text=#introHeaderWhatIs# shadowcolor='#fff' textcolor='#356a02'}
				</p>
			</div>
		</div>
		<div class="rbcontent">
			<div class="rbwrapper">
				<p>
					{#introHeaderContentP1#}
				</p>
				<p>
					{#introHeaderContentP2#}
				</p>
				<p>
					{#introHeaderContentP3#}
				</p>
				<p>
					{#introHeaderContentP4#}
				</p>
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="U6E6SLL7E8MAS">
					<input type="image" src="/images/ppdonate.png" style="width: 88px; height: 35px; border: 0 none;" align="right" name="submit" alt="{#indexSupport#}">
					<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>
				<p>
					{#introHeaderContentP5#}
				</p>
			</div>
		</div>
		<div class="rbbot"><div><p>&nbsp;</p></div></div>
	</div>
</div>
