var OS = "";
var userAgent = navigator.appVersion;

for (var version in versions) {
	if (userAgent.indexOf(version) != -1) {
		OS = version;
		break;
	}
}

if (OS != "") {
	var ver = versions[OS]['ver'];
	var url = versions[OS]['url'];
	var img = versions[OS]['img'];
	var desc = versions[OS]['desc'];
	var platform = versions[OS]['os'];
	document.querySelector('#downloadButton').href = url;
	document.querySelector('#downloadDetails').innerHTML = "Version " + ver + " &nbsp;&#8226;&nbsp; " + platform + " &nbsp;&#8226;&nbsp; " + desc;

	document.querySelector("#recommended-download").className = "visible"
}
