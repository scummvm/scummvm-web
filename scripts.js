
function openWin(fileToOpen,nameOfWindow,width,height) {
	myWindow = window.open("",nameOfWindow,"menubar=no,scrollbars=yes,status=no,width="+width+",height="+height);
	myWindow.document.open();
	myWindow.document.write('<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">\n')
	myWindow.document.write('<html><head><title>ScreenShot Viewer</title></head>')
	myWindow.document.write('<body topmargin="0" leftmargin="0" marginwidth="0" marginheight="0">');
	myWindow.document.write('<a href="javascript:self.close();"><img src="'+ fileToOpen +'"></a>');
	myWindow.document.write('</body></html>');
	myWindow.document.close();
}

var i_jn = 0;
function scrshot_jn(x,n) {
	if (n) i_jn++; else i_jn--;
	if (i_jn > x) i_jn = 0;
	if (i_jn < 0) i_jn = x;
	document['img_jn'].src = "./screenshots/scummvm_" + i_jn + ".png";
}

