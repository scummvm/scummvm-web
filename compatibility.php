<?

/*
 * ScummVM Compatibility Page
 *
 */

// set this for position of this file relative
$file_root = ".";

// load libraries
require($file_root."/include/"."incl.php");

// start of html
html_header("ScummVM :: Compatibility");
sidebar_start();

//display welcome table
echo html_round_frame_start("Compatibility","98%","",20);


?>
	<p>
	  <big><b>Compatibility</b></big><br>
	  <? echo html_line(); ?>
	</p>
<?
if ($details)
{

}
else
{
?>
	<p>
	  This page lists the progress of ScummVM as it relates to individual game compatibility.<br>
	  Click on the game name to view the complete notes of a game.
	  <br><br>
	  <small>Last Updated: <? echo date("F d, Y",getlastmod()); ?></small>
	</p>

<?
	// Display the Color Key Table
	echo html_frame_start("Color Key","50%",1,1,"color4");
	$pcts = array(0,5,10,15,20,25,30,35,40,45,50,55,60,65,70,75,80,85,90,95,100);
	while (list($key,$num) = each($pcts))
	{
		$keyTD .= html_frame_td($num,'align=center class="pct'.$num.'"');
	}
	echo html_frame_tr($keyTD);
	echo html_frame_end(),html_br();
}

// This Array Defines the games and thier ratings, etc.
$games = array(
		'Maniac Mansion (c64)'					=> array('1','maniacc64','0'),
		'Zak McKracken and the Alien Mindbenders (C64)'		=> array('1','zakc64','0'),
		'Maniac Mansion'					=> array('2','maniacega','0'),
		'Zak McKracken and the Alien Mindbenders'		=> array('2','zakega','0'),
		'Indiana Jones and the Last Crusade'			=> array('2','indy3ega','0'),
		'Indiana Jones and the Last Crusade (256)'		=> array('3','indy3','20'),
		'Zak McKracken and the Alien Mindbenders (256)'		=> array('3','zak256','20'),
		'LOOM'							=> array('3','loom','0'),
		'The Secret of Monkey Island (EGA)'			=> array('4','monkeyega','5'),
		'LOOM (256 color CD version)'				=> array('5','loomcd','30'),
		'The Secret of Monkey Island (VGA CD)'			=> array('5','monkey','95'),
		'Monkey Island 2: LeChuck\'s revenge'			=> array('5','monkey2','90'),
		'Indiana Jones 4 and the Fate of Atlantis'		=> array('5','atlantis','90'),
		'Indiana Jones 4 and the Fate of Atlantis (DEMO)'	=> array('5','playfate','95'),
		'Day Of The Tentacle'					=> array('6','tentacle','90'),
		'Day Of The Tentacle (DEMO)'				=> array('6','dottdemo','95'),
		'Sam & Max'						=> array('6','samnmax','80'),
		'Sam & Max (DEMO)'					=> array('6','samdemo','95'),
		'Full Thottle'						=> array('7','ft','25'),
		'The DIG'						=> array('7','dig','25'),
		'Curse of Monkey Island'				=> array('8','curse','5')
	      );

$notes = array(
"maniacc64" 	=> "Not at all implemented yet - ScummVM doesn't understand the file format",
"zakc64"	=> "Not at all implemented yet - ScummVM doesn't understand the file format",
"maniacega"	=> "Not at all implemented yet - ScummVM doesn't understand the file format",
"zakega"	=> "Not at all implemented yet - ScummVM doesn't understand the file format",
"indy3ega"	=> "Not at all implemented yet - ScummVM doesn't understand the file format",
"indy3"		=> "Game will start, but is not playable.<BR>The intro freezes on the LucasArts logo - hit escape to proceed.<BR>".
                   "Main bugs: Actors not visible, and an error with walkboxes makes it impossible to walk to anything.",
"zak256"	=> "Game will start, but is not playable.<BR>The intro freezes on the LucasArts logo - hit escape to proceed.<BR>".
                   "Main bugs: Actors not visible, and an error with walkboxes makes it impossible to walk to anything.",
"loom"		=> "Not at all implemented yet - ScummVM doesn't understand the file format",
"monkeyega"	=> "Copy protection screen will show, but game crashes shortly afterwards.<BR>Graphics decoders and opcodes not implimented yet.",
"loomcd"	=> "Game is almost playable, but may crash with invalid opcodes and have graphics problems.<BR>Intro will crash ScummVM at the ".
                   "end, so hit escape to bypass it.",
"monkey"	=> "No known problems - should be playable to the end",
"monkey2"	=> "No known problems - should be playable to the end",
"atlantis"	=> "Game is completable.".
		   "<br>- Music loud on some systems, run with -m30 to lower music volume.",
"playfate"	=> "No known problems - should be playable to the end",
"tentacle"	=> "No known problems - should be playable to the end",
"dottdemo"	=> "No known problems - should be playable to the end",
"samnmax"	=> "Game is completable.".
		   "<br>- Graphic glitches during intro".
                   "<br>- MIDI music currently broken.",
"samdemo"	=> "No known problems - should be playable to the end",
"ft"		=> "Game crashes at various points, not playable to the end".
		   "<br>- some graphic glitches during movie playback".
		   "<br>- hitting F5 to save/load will crash the game".
		   "<br>- not all sounds and animations playing correctly",
"dig"		=> "Game crashes at various points, not playable to the end".
		   "<br>- some graphic glitches during movie playback".
		   "<br>- hitting F5 to save/load will crash the game".
		   "<br>- not all sounds and animations playing correctly",
"curse"		=> "Not fully implemented yet.<br>ScummVM doesn't understand new-style MAXS block, among other things"
);
		
// render the compatibilty chart
echo html_frame_start("Scumm Games Compatabilty Chart","90%",2,1,"color4");
echo html_frame_tr(
		   html_frame_td("Game Full Name").
		   html_frame_td("Scumm Ver.").
		   html_frame_td("Game Short Name").
		   html_frame_td("% Completed"),
		   "color4"

		  );
$c = 0;
// Ender - Added this
if ($details) {
	while (list($name,$array) = each($games))
	{	

		if ($array[1] == $details) {
			$color = "color0";
			echo html_frame_tr(
				html_frame_td($name).
			  	html_frame_td($array[0]).
			    	html_frame_td("/".$array[1]).
		 	    	html_frame_td($array[2]."%", 'align="center" class="pct'.$array[2].'"'),
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
	while (list($name,$array) = each($games))
	{	
		if ($c % 2 == 0) { $color = "color2"; } else { $color = "color0"; }
		echo html_frame_tr(
				    html_frame_td(html_ahref($name, $PHP_SELF."?details=".$array[1])).
     				    html_frame_td($array[0]).
				    html_frame_td($array[1]).
			 	    html_frame_td($array[2]."%", 'align="center" class="pct'.$array[2].'"'),
 			  	    $color
		);
		$c++;
	}		  
}

echo html_frame_end("&nbsp;");
  
if ($details)
    echo html_p(),html_back_link(1,$PHP_SELF);

echo html_p();
echo html_round_frame_end("&nbsp;");


// end of html
echo html_p();
sidebar_end();
html_footer();

?>
