function openWin(fileToOpen,nameOfWindow,width,height) {
	myWindow = window.open("",nameOfWindow,"menubar=no,scrollbars=no,status=no,width="+width+",height="+height);
	myWindow.document.open();
	myWindow.document.write('<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">\n')
	myWindow.document.write('<html><head><title>ScreenShot Viewer</title><link rel="stylesheet" href="styles.css" type="text/css"></head>')
	myWindow.document.write('<body><a href="javascript:self.close();"><img src="'+ fileToOpen +'"></a></body></html>');
	myWindow.document.close();
}

var i_jn = 0;
function scrshot_jn(x,n) {
	i_jn += n;
	if (i_jn >= x) i_jn = 0;
	if (i_jn < 0) i_jn = x-1;
	document['img_jn'].src = "./screenshots/scummvm_" + i_jn + ".jpg";
}
