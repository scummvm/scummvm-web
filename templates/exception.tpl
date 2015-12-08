<div class="box">
	<div class="head">{#exceptionHeading#}</div>
	<div class="intro">
		<h2>{#exceptionIntro#}</h2>
	</div>
	<div class="content">
		<img src="images/three-headed-monkey.png" alt="{#exceptionAlt#}" class="float_right" style="margin-bottom: 5px;">
		<h3>{#exceptionContent#}</h3>
		<p>{$exception->getMessage()|nl2br:false}</p>
	</div>
	<div class="spacing">&nbsp;</div>
</div>
