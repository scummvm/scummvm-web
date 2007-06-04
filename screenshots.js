function openWin(fileToOpen,nameOfWindow,width,height) {
	myWindow = window.open("",nameOfWindow,"menubar=no,scrollbars=no,status=no,width="+width+",height="+height);
	myWindow.document.open();
	myWindow.document.write('<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">\n')
	myWindow.document.write('<html><head><title>'+ nameOfWindow +'</title><link rel="stylesheet" href="style.css" type="text/css"></head>')
	myWindow.document.write('<body onClick="javascript:self.close();"><img src="'+ fileToOpen +'"></body></html>');
	myWindow.document.close();
}
