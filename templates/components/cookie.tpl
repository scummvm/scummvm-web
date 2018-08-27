<div class="cookie-consent">
	<div class="middle">
	 <span class="text">{#cookieText#}</span>
	 <span class="buttons"><a class="accept" onclick="cookie_consent(true)">{#cookieAccept#}</a><a onclick="cookie_consent(false)">{#cookieDecline#}</a></span>
	</div>
</div>

<script>
	function cookie_consent(allowCookies) {
		document.cookie = "cookie_consent=" + allowCookies + "; expires=Fri, 31 Dec 9999 23:59:59 GMT";
		document.querySelector('.cookie-consent').style.display = "none";
	}
</script>
