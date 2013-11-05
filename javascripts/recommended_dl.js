$(document).ready(function () {
	var OS = "Windows"; //Default
	var baseUrl = "http://prdownloads.sourceforge.net/scummvm/";
	
	var versions = {
		// Magic keys:
		// - [release]: the current release
		// - [version]: replaced with the value of 'ver'
		// User-agent OS strings can be found at http://user-agent-string.info/list-of-ua/os
		// Note: The 'Windows CE' version needs to be above the 'Windows' one, as it's more specific
		'Windows CE': { 'os': 'Windows CE',            'ver': '1.5.0',     'desc': '17.3M .zip',        'file': 'scummvm-1.5.0-wince.zip?download'},
		'Windows':    { 'os': 'Windows',               'ver': '[release]', 'desc': '6.6M Win32 .exe',   'file': 'scummvm-[version]-win32.exe?download'},
		'MacOS':      { 'os': 'Mac OS X',              'ver': '[release]', 'desc': '18.2M disk image',  'file': 'scummvm-[version]-macosx.dmg?download'},
		'Fedora':     { 'os': 'Fedora 8-17',           'ver': '[release]', 'desc': '9.7M RPM',          'file': 'scummvm-[version]-1.x86_64.rpm?download'},
		'Red Hat':    { 'os': 'Fedora 8-17',           'ver': '[release]', 'desc': '9.7M RPM',          'file': 'scummvm-[version]-1.x86_64.rpm?download'},
		'Debian':     { 'os': 'Debian 7.0 (wheezy)',   'ver': '[release]', 'desc': '9.8M .deb',         'file': 'scummvm_[version]-wheezy.1_amd64.deb?download'},
		'Ubuntu':     { 'os': 'Ubuntu 13.04 (raring)', 'ver': '[release]', 'desc': '9.9M .deb',         'file': 'scummvm_[version]-raring.1_amd64.deb?download'},
		'Slackware':  { 'os': 'Slackware',             'ver': '[release]', 'desc': '9.4M .txz',         'file': 'scummvm-[version]_slack-x86_64-1.txz?download'},
		'Amiga':      { 'os': 'AmigaOS 4',             'ver': '[release]', 'desc': '13.9M .lha',        'file': 'scummvm-[version]-amigaos4.lha?download'},
		'SunOS':      { 'os': 'iSolaris 10 x86',       'ver': '[release]', 'desc': '24.5M .pkg.7z',     'file': 'scummvm-[version]-solaris10-x86.pkg.7z?download'},
		'SymbOS':     { 'os': 'Symbian S60 version 3', 'ver': '[release]', 'desc': '22.8M .zip',        'file': 'scummvm-[version]-s60v3.zip?download'},
		'MorphOS':    { 'os': 'MorphOS',               'ver': '1.5.0',     'desc': '13.9M .lha',        'file': 'scummvm-[version]-morphos.lha?download'},
		'iPhone':     { 'os': 'iOS',                   'ver': '1.5.0',     'desc': '10.7M .deb',        'file': 'scummvm-[version]-iphone.deb?download'},
		'iPad':       { 'os': 'iOS',                   'ver': '1.5.0',     'desc': '10.7M .deb',        'file': 'scummvm-[version]-iphone.deb?download'},
		'OS/2':       { 'os': 'OS/2',                  'ver': '1.4.1',     'desc': '8.9M .zip',         'file': 'scummvm-[version]-os2.zip?download'},
		'Haiku':      { 'os': 'Haiku',                 'ver': '1.4.0',     'desc': '8.2M .tgz',         'file': 'scummvm-[version]-gcc4-haiku.tgz?download'},
		'Android':    { 'os': 'Android',               'ver': '[release]', 'desc': 'Google Play Store', 'file': '', 'url': 'https://play.google.com/store/apps/details?id=org.scummvm.scummvm'},
	};
   
	var userAgent = navigator.appVersion;
	
	for (var version in versions) {
		if (userAgent.indexOf(version) != -1) {
			OS = version;
			break;
		}
	}

	var ver  = versions[OS]['ver'].replace('[release]', release);
	var url  = (versions[OS]['file'] != '') ? baseUrl + versions[OS]['file'].replace('[version]', ver) : versions[OS]['url'].replace('[version]', ver);
	var img  = versions[OS]['img'];
	var desc = versions[OS]['desc'];
	var platform = versions[OS]['os'];
	$('#downloadDetails').html("Version " + ver + " &nbsp;&#8226;&nbsp; " + platform + " &nbsp;&#8226;&nbsp; " + desc);
	$('#downloadButton').attr('href', url)
});