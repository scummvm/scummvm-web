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
          <br><br>Please note this list applies to the English versions of games, we attempt to test many versions of games, however there are occasionally problems with other languages.
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
		'Indiana Jones and the Last Crusade (256)'		=> array('3','indy3','80'),
                'Zak McKracken and the Alien Mindbenders (256 - FmTowns)' => array('3','zak256','85'),
		'LOOM'							=> array('3','loom','0'),
		'The Secret of Monkey Island (EGA)'			=> array('4','monkeyega','5'),
                'LOOM (256 color CD version)'                           => array('5','loomcd','90'),
		'The Secret of Monkey Island (VGA Floppy)'		=> array('5','monkeyvga','90'),
		'The Secret of Monkey Island (VGA CD)'			=> array('5','monkey','95'),
		'Monkey Island 2: LeChuck\'s revenge'			=> array('5','monkey2','95'),
		'Indiana Jones 4 and the Fate of Atlantis'		=> array('5','atlantis','95'),
		'Indiana Jones 4 and the Fate of Atlantis (DEMO)'	=> array('5','playfate','95'),
		'Putt-Putt Joins The Parade (DOS Demo)'			=> array('6','puttdemo','70'),
		'Putt-Putt Joins The Parade (DOS)'			=> array('6','puttputt','20'),
		'Putt-Putt Goes To The Moon (DOS Demo)'			=> array('6','moondemo','20'),
		'Putt-Putt Goes To The Moon (DOS)'			=> array('6','puttmoon','20'),
		'Putt-Putts Fun Pack'					=> array('6','funpack','20'),
		'Fatty Bears Birthday Surprise (DOS Demo)'		=> array('6','fbdemo','20'),
		'Fatty Bears Birthday Surprise (DOS)'			=> array('6','fbear','20'),
		'Fatty Bears Fun Pack'					=> array('6','fbpack','20'),
		'Day Of The Tentacle'					=> array('6','tentacle','95'),
		'Day Of The Tentacle (DEMO)'				=> array('6','dottdemo','95'),
                'Sam & Max'                                             => array('6','samnmax','93'),
		'Sam & Max (DEMO)'					=> array('6','samdemo','95'),
		'Full Throttle'						=> array('7','ft','75'),
                'The DIG'                                               => array('7','dig','85'),
		'Curse of Monkey Island'				=> array('8','comi','80'),
		'Simon The Sorcerer 1 Talkie (Win)'       		=> array('n/a','simon1win','85'),
		'Simon The Sorcerer 1 Talkie (Dos)'       		=> array('n/a','simon1talkie','85'),
		'Simon The Sorcerer 1 Talkie (Amiga CD32)'     		=> array('n/a','simon1cd32','5'),
		'Simon The Sorcerer 1 (Dos)'           			=> array('n/a','simon1dos','80'),
		'Simon The Sorcerer 1 (Amiga)'          		=> array('n/a','simon1amiga','0'),
		'Simon The Sorcerer 1 (DEMO)'          			=> array('n/a','simon1demo','80'),
		'Simon The Sorcerer 2 Talkie (Win)'       		=> array('n/a','simon2win','80'),
		'Simon The Sorcerer 2 Talkie (Dos)'       		=> array('n/a','simon2talkie','80'),
		'Simon The Sorcerer 2 Talkie (Amiga)'       		=> array('n/a','simon2amiga','80'),
		'Simon The Sorcerer 2 Talkie (Mac)'       		=> array('n/a','simon2mac','80'),
		'Simon The Sorcerer 2 (Dos)'           			=> array('n/a','simon2dos','80'),
		'Simon The Sorcerer 2 (DEMO)'          			=> array('n/a','simon2demo','80')
	      );

$notes = array(
"maniacc64" 	=> "Not at all implemented yet - ScummVM doesn't understand the non-blocked LFL format",
"zakc64"	=> "Not at all implemented yet - ScummVM doesn't understand the non-blocked LFL format. Try Zak256 version",
"maniacega"	=> "Not at all implemented yet - ScummVM doesn't understand the non-blocked LFL format",
"zakega"	=> "Not at all implemented yet - ScummVM doesn't understand the non-blocked LFL format. Try Zak256 version",
"indy3ega"	=> "Not at all implemented yet - ScummVM doesn't understand the non-blocked LFL format. Try Indy3-256 version",
"indy3"         => "Game is completable" .
                   "<br>- Music and Sound effects are usually missing" .
		   "<br>- Various minor graphical glitches, including incorrect costume for Indy when talking to marcus in the intro". 
		   "<br>- Indy is not shown in the letter stepping room near the end of the game but it is still passable".
                   "<br>- Indy may occasionally be able to walk outside of walkboxes (Eg, up walls)",
"zak256"        => "Game is completable." .
                   "<br>- No sound effect looping" ,
"loom"		=> "Not at all implemented yet - ScummVM doesn't understand the non-blocked LFL format. Try Loom CD version",
"monkeyega"	=> "Copy protection screen will show, but game crashes shortly afterwards.<BR>Graphics decoders and SCUMM opcodes not implemented yet.",
"loomcd"        => "Game is completable." .
                   "<br>- Various minor graphical glitches",
"monkeyvga"	=> "Game is completable.".
                   "<br>- No sound effects".
                   "<br>- No music looping",
"monkey"	=> "No known problems - should be playable to the end",
"monkey2"	=> "No known problems - should be playable to the end",
"atlantis"	=> "No known problems - should be playable to the end".
		   "<br>- Both disk and cd versions are supported by this target".
		   "<br>- Music loud on some systems, run with -m30 to lower music volume.",
"playfate"	=> "No known problems - should be playable to the end",
"puttdemo"	=> "Should be playable to the end".
		   "<br>- Humongous talkie file format currently unknown".
		   "<br>- Sound format used for sound effects could use more work".
		   "<br>- Cursor is not placed at the right offset, so some of the hotspots are out a bit",
"puttputt"	=> "Fails to start after looking for seemingly non existent object (1)".
		   "<br>- Adding a hack for objects < 17 seems to hack around it, not in CVS though as would prefer a proper fix".
		   "<br>- Humongous talkie file format currently unknown",
"puttmoon"	=> "Fails an AKOS related assertion shortly after starting".
		   "<br>- scummvm: scumm/akos.cpp:267: virtual byte AkosRenderer::drawLimb(const CostumeData&, int): Assertion `(code & 0xFFF) * 6 < READ_BE_UINT32((byte *)akof - 4) - 8' failed.".
		   "<br>- Humongous talkie file format currently unknown",
"moondemo"	=> "Hard to leave the first room due to hotspots being incorrect, some problems include".
		   "<br>- Error: akos_increaseAnim: invalid code 9a00!".
		   "<br>- Error: akos_increaseAnim: invalid code d800!".
		   "<br>- Humongous talkie file format currently unknown",
"funpack"	=> "Start but mini games seem to have various problems and generally not run".
		   "<br>- Tic-Tac-Toe: Error(5:10:0xA8): Value 196 is out of bounds (0,31) in script 10 (Illegal palet slot 196)".
		   "<br>- Pinball/Checkers/Remember/Cheese King: Similiar to above but different scripts".
		   "<br>- Puzzle blocks: Works but colour isn't set properly so game is black and white".
		   "<br>- Humongous talkie file format currently unknown",
"fbdemo"	=> "Fails shortly after starting on Error: akos_increaseAnim: invalid code 8006!".
		   "<br>- Humongous talkie file format currently unknown",
"fbear"		=> "Fails during intro with error: akos_increaseAnim: invalid code e400!".
		   "<br>- Humongous talkie file format currently unknown",
"fbpack"	=> "Game starts but various minigames have different problems".
		   "<br>- Reversi/Go Fish: o6_actorOps: default case 218".
		   "<br>- Lines and Boxes: Error(4:203:0x4BFC): Value 88 is out of bounds (0,31) in script 203 (Illegal palet slot 88)".
		   "<br>- Coloring/Tangrams: Error(6:209:0x40D5): Invalid opcode 'db'".
		   "<br>- Humongous talkie file format currently unknown",
"tentacle"	=> "No known problems - should be playable to the end".
		   "<br>- Both disk and cd versions are supported by this target".
		   "<br>- Maniac Mansion isn't playable on eds computer",
"dottdemo"	=> "No known problems - should be playable to the end",
"samnmax"	=> "No major problems - should be playable to the end".
		   "<br>- Disk version needs to have the .sm0 and .sm1 files renamed to .000 and .001".
		   "<br>- Both disk and cd versions are supported by this target".
                   "<br>- Highway subgame doesn't behave correctly",
"samdemo"	=> "No known problems - should be playable to the end",
"ft"		=> "Game is completable to the end, but missing action sequences".
                   "<br>- Lack of INSANE subsystem prevents action sequences, which skips a substantial portion of the game".
		   "<br>- Derby scene is only properly controllable using the mouse",
"dig"		=> "Game is fully completable, with some minor sound issues",
"comi"		=> "Game is fully completable, although ship-to-ship is broken and several graphical glitches are present",
"simon1win" 	=> "Game is completable.".
                   "<br>- Minor graphical glitches when using ring and looking at Sordid statue",
"simon1talkie" 	=> "Game is completable.".
                   "<br>- Minor graphical glitches when using ring and looking at Sordid statue",
"simon1cd32" 	=> "Game works a bit but can't see anything".
                   "<br>- All graphics are decoded incorrectly".
                   "<br>- pkd format is unknown".
                   "<br>- Sound effects and speech formats are unknown".
                   "<br>- No Music",
"simon1dos" 	=> "Game is completable.".
                   "<br>- Freezes briefly when Swampling leaves his house".
                   "<br>- Freezes briefly when talking to demons in Sordid's Tower".
                   "<br>- Minor graphical glitches when using ring and looking at Sordid statue",
"simon1amiga" 	=> "Not at all implemented yet - ScummVM doesn't understand the pkd and music formats",
"simon1demo" 	=> "Game demo is completable".
                   "<br>- Freezes briefly when Swampling leaves his house".
                   "<br>- No music",
"simon2win"     => "Game is completable.".
                   "<br>- Some music is missing or wrong".
                   "<br>- Minor graphical glitch when giving items to baby",
"simon2talkie"  => "Game is completable.".
                   "<br>- No music".
                   "<br>- Minor graphical glitch when giving items to baby",
"simon2dos"     => "Game is completable.".
                   "<br>- No music".
                   "<br>- Minor graphical glitch when giving items to baby",
"simon2amiga"   => "Game is completable.".
                   "<br>- Only default language in data files is supported".
                   "<br>- No music".
                   "<br>- F10 key animation is different"
                   "<br>- Minor graphical glitch when giving items to baby",
"simon2mac"     => "Game is completable.".
                   "<br>- Only default language in data files is supported".
                   "<br>- No music".
                   "<br>- F10 key animation is different".
                   "<br>- Minor graphical glitch when giving items to baby",
"simon2demo" 	=> "Game demo is completable".
                   "<br>- No music"
);
		
// render the compatibility chart
echo html_frame_start("Scumm Games Compatibility Chart","90%",2,1,"color4");
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
		 	    	html_frame_td($array[2]."%", 'align="center" class="pct'.($array[2] - ($array[2]%5)).'"'),
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
			 	    html_frame_td($array[2]."%", 'align="center" class="pct'.($array[2] - ($array[2]%5)).'"'),
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
