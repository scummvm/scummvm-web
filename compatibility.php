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
          <br><br>Please note this list applies to the English versions of games, we attempt to test many versions of games, however there are occasionally problems with other languages, expecially German translations.
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
		'Indiana Jones and the Last Crusade (256)'		=> array('3','indy3','30'),
		'Zak McKracken and the Alien Mindbenders (256 - FmTowns)' => array('3','zak256','30'),
		'LOOM'							=> array('3','loom','0'),
		'The Secret of Monkey Island (EGA)'			=> array('4','monkeyega','5'),
                'LOOM (256 color CD version)'                           => array('5','loomcd','90'),
		'The Secret of Monkey Island (VGA Floppy)'		=> array('5','monkeyvga','40'),
		'The Secret of Monkey Island (VGA CD)'			=> array('5','monkey','90'),
		'Monkey Island 2: LeChuck\'s revenge'			=> array('5','monkey2','90'),
		'Indiana Jones 4 and the Fate of Atlantis'		=> array('5','atlantis','95'),
		'Indiana Jones 4 and the Fate of Atlantis (DEMO)'	=> array('5','playfate','95'),
		'Day Of The Tentacle'					=> array('6','tentacle','95'),
		'Day Of The Tentacle (DEMO)'				=> array('6','dottdemo','95'),
		'Sam & Max'						=> array('6','samnmax','90'),
		'Sam & Max (DEMO)'					=> array('6','samdemo','95'),
		'Full Thottle'						=> array('7','ft','40'),
		'The DIG'						=> array('7','dig','40'),
		'Curse of Monkey Island'				=> array('8','curse','5'),
		'Simon The Sorcerer'            			=> array('n/a','simon1win','95')
	      );

$notes = array(
"maniacc64" 	=> "Not at all implemented yet - ScummVM doesn't understand the non-blocked LFL format",
"zakc64"	=> "Not at all implemented yet - ScummVM doesn't understand the non-blocked LFL format. Try Zak256 version",
"maniacega"	=> "Not at all implemented yet - ScummVM doesn't understand the non-blocked LFL format",
"zakega"	=> "Not at all implemented yet - ScummVM doesn't understand the non-blocked LFL format. Try Zak256 version",
"indy3ega"	=> "Not at all implemented yet - ScummVM doesn't understand the non-blocked LFL format. Try Indy3-256 version",
"indy3"         => "Game will start, but is not completely playable." .
                   "<br>- Inventory scrolling not implemented, making it impossible to carry more than 4 objects at once" .
                   "<br>- Missing/Incorrect SCUMM opcodes cause occasional crashes",
"zak256"        => "Game will start, but is not completely playable." .
                   "<br>- Inventory scrolling not implemented, making it impossible to carry more than 4 objects at once" .
		   "<br>- Taking Blue Crystal causes game crash", 
"loom"		=> "Not at all implemented yet - ScummVM doesn't understand the non-blocked LFL format. Try Loom CD version",
"monkeyega"	=> "Copy protection screen will show, but game crashes shortly afterwards.<BR>Graphics decoders and SCUMM opcodes not implimented yet.",
"loomcd"        => "Game is completable." .
                   "<br>- CD music and voices are not always in perfect sync with cutscenes",
"monkey"	=> "No known problems - should be playable to the end",
"monkey2"	=> "No known problems - should be playable to the end",
"atlantis"	=> "Game is completable.".                        
		   "<br>- Music loud on some systems, run with -m30 to lower music volume.",
"playfate"	=> "No known problems - should be playable to the end",
"tentacle"	=> "No known problems - should be playable to the end",
"dottdemo"	=> "No known problems - should be playable to the end",
"samnmax"	=> "Game is completable.".
                   "<br>- Subgames do not work" . 
                   "<br>- Wak-A-Mole may appear to freeze. Hit escape and wait." . 
                   "<br>- Intro Credits will freeze of Mad Doctor cutscene is allowed to play" .
                   "<br>- Script race in Mystery Vortex will cause hang if you wait around",
"samdemo"	=> "No known problems - should be playable to the end",
"ft"		=> "Game crashes at various points, due to missing SCUMM opcods. Not playable to the end".
		   "<br>- some palette glitches during movie playback, and missing movie sound".
		   "<br>- not all sounds and animations playing correctly",
"dig"		=> "Game crashes at various points, due to missing SCUMM opcods. Not playable to the end".
                   "<br>- missing movie audio".
		   "<br>- no music and not all animations playing correctly" .
                   "<br>- crashes when pressing metal plates",
"curse"		=> "Not fully implemented yet.<br>ScummVM doesn't understand the various CMI subsystems",
"simon1win" => "No known problems - should be playable to the end"
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
			    	html_frame_td($array[1]).
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
