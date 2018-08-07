{capture "content"}
	<img src="/images/three-headed-monkey.png" alt="{#exceptionAlt#}" class="float_right" style="margin-bottom: 5px;">
	<h3>{#exceptionContent#}</h3>
	<p>{$exception->getMessage()|nl2br:false}</p>
{/capture}
{include "components/box.tpl" head=#exceptionHeading# intro="<h2>{#exceptionIntro#}</h2>" content=$smarty.capture.content}
