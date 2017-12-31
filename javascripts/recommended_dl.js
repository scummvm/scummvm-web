window.addEventListener('load', function() {
	var OS = "";
	var userAgent = navigator.appVersion;
	
	for (var version in versions) {
		if (userAgent.indexOf(version) != -1) {
			OS = version;
			break;
		}
	}

	if (OS == "") {
		// User-agent string couldn't be matched - hide the recommended download button and section
		document.querySelector("#downloadContainer").style.display = "none";
		document.querySelector("#downloadContainer").parentNode.style.display = "none";	// hide recommended download section
		document.querySelector("#recommendedDownloadHeader").style.display = "none";
		return;
	} else {
		// User-agent matched - show the recommended download button and section
		document.querySelector("#downloadContainer").style.display = "block";
		document.querySelector("#downloadContainer").parentNode.style.display = "block";	// show recommended download section
		document.querySelector("#recommendedDownloadHeader").style.display = "block";
		
		document.querySelector("#downloadContainer").innerHTML =
			"<a id=\"downloadButton\" href=\"\">" +
				 "<img style=\"position: absolute; top: 8px; left: 14px;\" src=\"images/scummvm.png\" alt=\"Download ScummVM icon\">" +
				 "<span class=\"downloadText\">Download ScummVM</span>" +
				 "<span id=\"downloadDetails\" style=\"font-size: 12px; color: white;\"></span>" +
			"</a>";		
	}
	
	var ver  = versions[OS]['ver'];
	var url  = versions[OS]['url'];
	var img  = versions[OS]['img'];
	var desc = versions[OS]['desc'];
	var platform = versions[OS]['os'];
	document.querySelector('#downloadButton').setAttribute('href', url)
	document.querySelector('#downloadDetails').innerHTML = "Version " + ver + " &nbsp;&#8226;&nbsp; " + platform + " &nbsp;&#8226;&nbsp; " + desc;
});