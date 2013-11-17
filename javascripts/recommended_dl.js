$(document).ready(function () {
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
		$("#downloadContainer").hide();
		$("#downloadContainer").parent(".subhead-content").hide();	// hide recommended download section
		$("#recommendedDownloadHeader").hide();
		return;
	} else {
		// User-agent matched - show the recommended download button and section
		$("#downloadContainer").show();
		$("#downloadContainer").parent(".subhead-content").show();	// show recommended download section
		$("#recommendedDownloadHeader").show();
		
		$("#downloadContainer").html(
			"<a id=\"downloadButton\" href=\"\">" +
				 "<img style=\"position: absolute; top: 8px; left: 14px;\" src=\"images/scummvm.png\" alt=\"Download ScummVM icon\">" +
				 "<span class=\"downloadText\">Download ScummVM</span>" +
				 "<span id=\"downloadDetails\" style=\"font-size: 12px; color: white;\"></span>" +
			"</a>"
		);
	}
	
	var ver  = versions[OS]['ver'];
	var url  = versions[OS]['url'];
	var img  = versions[OS]['img'];
	var desc = versions[OS]['desc'];
	var platform = versions[OS]['os'];
	$('#downloadButton').attr('href', url)
	$('#downloadDetails').html("Version " + ver + " &nbsp;&#8226;&nbsp; " + platform + " &nbsp;&#8226;&nbsp; " + desc);
});