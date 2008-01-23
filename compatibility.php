<?

/*
 * ScummVM Compatibility Page
 *
 */

// set this for position of this file relative
$file_root = ".";

// load libraries
require($file_root."/include/"."incl.php");

// Load the compatibility information for the requested version
if (isset($_GET['version'])) {
	// Filter very long versions and strange characters
	$version = substr($_GET['version'], 0, 10);
	$version = preg_replace('/[^a-z0-9\.]/i', "", $version);

	// Test whether the file exists
	if (!file_exists($file_root."/compat-".$version.".inc"))
		$version = "SVN";
} else {
	$version = "SVN";
}
include($file_root."/compat-".$version.".inc");

// start of html
html_page_header('ScummVM :: Compatibility - '.$version);

html_content_begin($version.' Compatibility');

if (isset($_GET['details'])) {
	$details = $_GET['details'];
}

?>
  <div class="par-item">

<?php

if ($details) {

  echo '<div class="par-content">';

}
else {
?>
    <div class="par-intro">
<br>
	  This page lists the progress of ScummVM as it relates to individual game compatibility.
	  Please note this list applies to the English versions of games. We attempt to test many versions of games, however there are occasionally problems with other languages.<br><br>
	  Click on the game name to view the complete notes of a game.<br><br>
<?

// Get the available versions of compatibility information
$versions = array();
if ($dir = opendir($file_root)) {
	while (($compatfile = readdir($dir)) !== false) {
		if (substr($compatfile, 0, 7) == "compat-" && substr($compatfile, -4) == ".inc") {
			$ver = substr($compatfile, 7, strlen($compatfile) - 11);
			if ($ver != "SVN")
				$versions[] = $ver;
		}
	}
	closedir($dir);
}

// Sort by version number
natsort($versions);

// Latest version first
$versions = array_reverse($versions);

if ($version == "SVN") {
?>
	  This is the compatibility of the current WIP SVN version, <B>not of a stable release</B>
	  (Please see one of the following for the Compatibility charts of the stable releases:
<?

foreach ($versions as $ver)
	echo " <a href=\"compatibility.php?version=".$ver."\">".$ver."</a>";

?>).<br><br>
	  As this is the status of the Work In Progress version, occasional temporary bugs
	  may be introduced with new changes, thus this list refects the 'best case' scenario. 
	  It is highly recommended to use the latest stable release, where possible.
<?
} else {
?>
	  Also, this is the compatibility of the <? echo $version; ?> stable release, <B>not
	  of SVN snapshots/daily builds</B>. The status of these can be found on the <a href="compatibility.php">SVN Compatibility</A> chart.<br>
	  You can also see the Compatibility chart for these releases:
<?

foreach ($versions as $ver)
	if ($ver != $version)
		echo " <a href=\"compatibility.php?version=".$ver."\">".$ver."</a>";

}
?>
	  <br><br>
	  <small>Last Updated: <? echo date("F d, Y",filemtime($file_root."/compat-".$version.".inc")); ?></small>
<br>
<br>
    </div>
<br>
    <div class="par-content">

<?
	// Display the Color Key Table
	echo html_frame_start("Color Key","85%",1,1,"color4");
	$pcts = array(0,5,10,15,20,25,30,35,40,45,50,55,60,65,70,75,80,85,90,95,100);
	while (list($key,$num) = each($pcts))
	{
		$keyTD .= html_frame_td($num,'align=center class="pct'.$num.'"');
	}
	echo html_frame_tr($keyTD);
	echo html_frame_end(),html_br();
}

// render the compatibility chart

if ($details) {
	// 'Details' mode -- information about a specific game
	echo html_frame_start("Game Compatibility Chart","90%",2,1,"color4");
	echo html_frame_tr(
			   html_frame_td("Game Full Name").
			   html_frame_td("Game Short Name").
			   html_frame_td("% Completed"),
			   "color4"
	
			  );

	$arrayt = array();
	foreach($gamesCompanies as $ar) {
		$arrayt = array_merge($arrayt, $ar);
	}
	while (list($name,$array) = each($arrayt))
	{

		if ($array[0] == $details) {
			$color = "color0";
			echo html_frame_tr(
				html_frame_td($name).
			    	html_frame_td($array[0]).
		 	    	html_frame_td($array[1]."%", 'align="center" class="pct'.($array[1] - ($array[1]%5)).'"'),
		  	        $color
	  		);
			echo html_frame_tr(html_frame_td(
							 html_br().
							 html_blockquote($notes{$details}).
							 html_br(),
							 "colspan=4")
							);
		}
	}
} else {
	// List mode -- show all games
	function displayGameList($title, $games) {
		global $version;

		echo html_frame_start("$title Game Compatibility Chart","95%",2,1,"color4");
		echo html_frame_tr(
			   html_frame_td("Game Full Name").
			   html_frame_td("Game Short Name").
			   html_frame_td("% Completed"),
			   "color4"
			  );
		$c = 0;
		while (list($name,$array) = each($games))
		{	
			if ($c % 2 == 0) { $color = "color2"; } else { $color = "color0"; }
			echo html_frame_tr(
						html_frame_td(html_ahref($name, $PHP_SELF."?version=".$version."&amp;details=".$array[0])).
						html_frame_td($array[0]).
						html_frame_td($array[1]."%", 'align="center" class="pct'.($array[1] - ($array[1]%5)).'"'),
						$color
			);
			$c++;
		}		  
	}
	
	$i = 0;
	while (list($name,$games) = each($gamesCompanies))
	{
		if ($i != 0) {
			echo html_frame_end("&nbsp;");
			echo html_p();
		}

		displayGameList($name, $games);

		$i++;
	}

}

echo html_frame_end("&nbsp;");

if ($details)
  echo '<p class="bottom-link"><a href="javascript:history.back(1)">&lt;&lt;Back</a></p>'."\n";

echo " <br>";
echo "  </div>\n";
echo "</div>\n";

html_content_end();
html_page_footer();

?>
