
function openWin(fileToOpen,nameOfWindow,width,height) {
	myWindow = window.open("",nameOfWindow,"menubar=no,scrollbars=yes,status=no,width="+width+",height="+height);
	myWindow.document.open();
	myWindow.document.write('<HTML><HEAD><TITLE>ScreenShot Viewer</TITLE>')
	myWindow.document.write('<BODY BGCOLOR="#FFFFFF" TEXT="#000000" topmargin="0" leftmargin="0" marginwidth="0" marginheight="0">');
	myWindow.document.write('<a href="javascript:self.close();"><img src="'+ fileToOpen +'" border=0></a>');
	myWindow.document.write('</BODY></HTML>');
	myWindow.document.close();
}

var i_jn = 0;
function scrshot_jn(x,n) {
	if (n) i_jn++; else i_jn--;
	if (i_jn > x) i_jn = 0;
	if (i_jn < 0) i_jn = x;
	document['img_jn'].src = "./screenshots/scummvm_" + i_jn + ".png";
}

