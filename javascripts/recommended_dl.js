$(document).ready(function () {
	var OS = "Windows"; //Default
	var userAgent = navigator.appVersion;
	
	for (var version in versions) {
		if (userAgent.indexOf(version) != -1) {
			OS = version;
			break;
		}
	}

	var ver  = versions[OS]['ver'];
	var url  = versions[OS]['url'];
	var img  = versions[OS]['img'];
	var desc = versions[OS]['desc'];
	var platform = versions[OS]['os'];
	$('#downloadDetails').html("Version " + ver + " &nbsp;&#8226;&nbsp; " + platform + " &nbsp;&#8226;&nbsp; " + desc);
	$('#downloadButton').attr('href', url)
});