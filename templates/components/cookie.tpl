<div class="cookie-consent">
   <div class="text">This website uses third-party cookies to collect traffic information. By continuing to use the site you are providing consent to do so.</div>
   <div class="buttons"><a onclick="cookie_consent(false)">Decline</a><a class="accept" onclick="cookie_consent(true)">Got it!</a></div>   
</div>

<script>
	if (window.localStorage.getItem('COOKIE_CONSENT')) {
			document.querySelector('.cookie-consent').hidden = true;
		}

	function cookie_consent(allowCookies) {
		window.localStorage.setItem('COOKIE_CONSENT', allowCookies)
		document.querySelector('.cookie-consent').hidden = true;
	}
</script>
