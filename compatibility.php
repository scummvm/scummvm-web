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
		'Maniac Mansion (C64)'					=> array('1','maniacc64','0'),
		'Zak McKracken and the Alien Mindbenders (C64)'		=> array('1','zakc64','0'),
		'Maniac Mansion'					=> array('2','maniac','5'),
		'Zak McKracken and the Alien Mindbenders'		=> array('2','zak','5'),
		'Indiana Jones and the Last Crusade'			=> array('3','indy3ega','80'),
		'Indiana Jones and the Last Crusade (256)'		=> array('3','indy3','80'),
		'Zak McKracken and the Alien Mindbenders (256 - FmTowns)' => array('3','zak256','85'),
		'Loom'							=> array('3','loom','80'),
		'The Secret of Monkey Island (EGA)'			=> array('4','monkeyega','80'),
		'Passport to Adventure (Indy3, Monkey and Loom demos)'  => array('4','pass','50'),
		'Loom (256 color CD version)'                           => array('5','loomcd','90'),
		'The Secret of Monkey Island (VGA Floppy)'		=> array('5','monkeyvga','90'),
		'The Secret of Monkey Island (VGA CD)'			=> array('5','monkey','95'),
		'Monkey Island 2: LeChuck\'s revenge'			=> array('5','monkey2','95'),
		'Indiana Jones 4 and the Fate of Atlantis'		=> array('5','atlantis','95'),
		'Indiana Jones 4 and the Fate of Atlantis (Demo)'	=> array('5','playfate','95'),
		'Putt-Putt Joins The Parade (DOS Demo)'			=> array('6','puttdemo','70'),
		'Putt-Putt Joins The Parade (DOS)'			=> array('6','puttputt','20'),
		'Putt-Putt Goes To The Moon (DOS Demo)'			=> array('6','moondemo','20'),
		'Putt-Putt Goes To The Moon (DOS)'			=> array('6','puttmoon','20'),
		'Putt-Putts Fun Pack'					=> array('6','funpack','20'),
		'Fatty Bears Birthday Surprise (DOS Demo)'		=> array('6','fbdemo','20'),
		'Fatty Bears Birthday Surprise (DOS)'			=> array('6','fbear','20'),
		'Fatty Bears Fun Pack'					=> array('6','fbpack','20'),
		'Day Of The Tentacle'					=> array('6','tentacle','95'),
		'Day Of The Tentacle (Demo)'				=> array('6','dottdemo','95'),
		'Sam & Max'                                             => array('6','samnmax','93'),
		'Sam & Max (Demo)'					=> array('6','samdemo','95'),
		'Full Throttle'						=> array('7','ft','75'),
		'The Dig'                                               => array('7','dig','85'),
		'Curse of Monkey Island'				=> array('8','comi','80'),
		'Beneath a Steel Sky'			       		=> array('n/a','sky','5'),
		'Simon The Sorcerer 1 Talkie (Win)'       		=> array('n/a','simon1win','85'),
		'Simon The Sorcerer 1 Talkie (DOS)'       		=> array('n/a','simon1talkie','85'),
		'Simon The Sorcerer 1 Talkie (Amiga CD32)'     		=> array('n/a','simon1cd32','5'),
		'Simon The Sorcerer 1 (DOS)'           			=> array('n/a','simon1dos','80'),
		'Simon The Sorcerer 1 (Amiga)'          		=> array('n/a','simon1amiga','0'),
		'Simon The Sorcerer 1 (Demo)'          			=> array('n/a','simon1demo','80'),
		'Simon The Sorcerer 2 Talkie (Win)'       		=> array('n/a','simon2win','80'),
		'Simon The Sorcerer 2 Talkie (DOS)'       		=> array('n/a','simon2talkie','80'),
		'Simon The Sorcerer 2 Talkie (Amiga or Mac)'       	=> array('n/a','simon2mac','80'),
		'Simon The Sorcerer 2 (DOS)'           			=> array('n/a','simon2dos','80')
	      );

$notes = array(
"maniacc64" 	=> "Not at all implemented yet - ScummVM doesn't understand the non-blocked LFL format",
"zakc64"	=> "Not at all implemented yet - ScummVM doesn't understand the non-blocked LFL format. Try Zak256 version",
"maniac"	=> "Introduction screen is shown with Enchanced version but is distorted, can't advance any further".
                   "<br>ScummVM doesn't completely understand the non-blocked LFL format".
                   "<br>SCUMM v2 opcodes not completely implemented yet",
"zak"		=> "LucasArts logo screen is shown with Enchanced version, can't advance any further".
                   "<br>ScummVM doesn't completely understand the non-blocked LFL format".
                   "<br>SCUMM v2 opcodes not completely implemented yet",
"indy3ega"	=> "Game is completable".
                   "<br>- No music or sound effects",
"indy3"         => "Game is completable" .
                   "<br>- No sound effects",
"zak256"        => "Game is completable." .
                   "<br>- No sound effect looping" ,
"loom"		=> "Game is completable".
                   "<br>- No music or sound effects",
"monkeyega"	=> "Game is completable".
                   "<br>- No sound effects",
"pass"		=> "At least partly playable".
                   "<br>- No subtitles in indy3 demo".
                   "<br>- No sound effects",
"loomcd"        => "Game is completable." .
                   "<br>- Various minor graphical glitches",
"monkeyvga"	=> "Game is completable.".
                   "<br>- No sound effects",
"monkey"	=> "No known problems - should be playable to the end",
"monkey2"	=> "No known problems - should be playable to the end",
"atlantis"	=> "No known problems - should be playable to the end".
		   "<br>- Both disk and cd versions are supported by this target".
		   "<br>- Music loud on some systems, run with -m30 to lower music volume.",
"playfate"	=> "No known problems - should be playable to the end",
"puttdemo"	=> "Should be playable to the end".
		   "<br>- talkie data not synced/properly implemented",
"puttputt"	=> "Fails to start after looking for seemingly non existent object (1)".
		   "<br>- Adding a hack for objects < 17 seems to hack around it, not in CVS though as would prefer a proper fix".
		   "<br>- talkie data not synced/properly implemented",
"puttmoon"	=> "Fails an AKOS related assertion shortly after starting".
		   "<br>- scummvm: scumm/akos.cpp:267: virtual byte AkosRenderer::drawLimb(const CostumeData&, int): Assertion `(code & 0xFFF) * 6 < READ_BE_UINT32((byte *)akof - 4) - 8' failed.".
		   "<br>- talkie data not synced/properly implemented",
"moondemo"	=> "Finishable if you don't trigger one or two fatal animations".
		   "<br>- cursor doesn't turn to arrow on the right hand side of the screen in the first room".
		   "<br>- talkie data not synced/properly implemented",
"funpack"	=> "Starts but mini games seem to have various problems".
		   "<br>- Tic-Tac-Toe: can't win or lose a game only draw".
		   "<br>- Checkers: o6_actorOps: default case 218".
		   "<br>- Puzzle blocks/Pinball/Remember/Cheese King/Tic-Tac-Toe: Works but colour isn't set properly so game is black and white".
		   "<br>- talkie data not synced/properly implemented",
"fbdemo"	=> "Fails assertion at the end of the intro".
		   "<br>- scumm/resource.cpp:1222: void Scumm::nukeResource(int, int): Assertion `idx >= 0 && idx < res.num[type]' failed.",
		   "<br>- talkie data not synced/properly implemented",
"fbear"		=> "Errors out when entering some rooms ie kitchen".
		   "<br>- Error(18:44:0x57): Value -32768 is out of bounds (0,255) in script 10002 (State -32768 out of range in putState)!",
		   "<br>- talkie data not synced/properly implemented",
"fbpack"	=> "Game starts but various minigames have different problems".
		   "<br>- Reversi/Go Fish/Lines and Boxes: o6_actorOps: default case 218".
		   "<br>- Coloring/Tangrams: Error(6:209:0x40D5): Invalid opcode 'db' (readFile)".
		   "<br>- talkie data not synced/properly implemented",
"tentacle"	=> "No known problems - should be playable to the end".
		   "<br>- Both disk and cd versions are supported by this target".
		   "<br>- Maniac Mansion isn't playable on eds computer",
"dottdemo"	=> "No known problems - should be playable to the end",
"samnmax"	=> "No major problems - should be playable to the end".
		   "<br>- Both disk and cd versions are supported by this target".
                   "<br>- Highway subgame doesn't behave correctly",
"samdemo"	=> "No known problems - should be playable to the end",
"ft"		=> "Game is completable to the end, but missing action sequences".
                   "<br>- Lack of INSANE subsystem prevents action sequences, which skips a substantial portion of the game".
		   "<br>- Derby scene is only properly controllable using the mouse",
"dig"		=> "Game is fully completable, with some minor sound issues",
"comi"		=> "Game is fully completable, although ship-to-ship is broken and several graphical glitches are present",
"sky"	 	=> "Only the introduction works so far.",
"simon1win" 	=> "Game is completable.".
                   "<br>- Minor graphical glitches when using ring".
                   "<br>- Minor graphical glitch with Sordid statue after leaving room",
"simon1talkie" 	=> "Game is completable.".
                   "<br>- Minor graphical glitches when using ring".
                   "<br>- Minor graphical glitch with Sordid statue after leaving room".
                   "<br>- No inventory scrolling arrows shown, can still move around inventory though",
"simon1cd32" 	=> "Game works a bit but can't see anything".
                   "<br>- All graphics are decoded incorrectly".
                   "<br>- pkd compression format is unknown".
                   "<br>- No music, sound effects or speech",
"simon1dos" 	=> "Game is completable.".
                   "<br>- Freezes briefly when Swampling leaves his house".
                   "<br>- Freezes briefly when talking to demons in Sordid's Tower".
                   "<br>- Minor graphical glitches when using ring".
                   "<br>- Minor graphical glitch with Sordid statue after leaving room".
                   "<br>- No inventory scrolling arrows shown, can still move around inventory though",
"simon1amiga" 	=> "Not at all implemented yet".
                   "<br>- pkd compression format is unknown".
                   "<br>- Music format unknown",
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
                   "<br>- Text in Copy Protection screen is only shown for short time".
                   "<br>- No music".
                   "<br>- Minor graphical glitch when giving items to baby",
"simon2mac"     => "Game is completable.".
                   "<br>- Only default language in data files is supported".
                   "<br>- F10 key animation is different".
                   "<br>- Minor graphical glitch when giving items to baby"
);
		
// render the compatibility chart
echo html_frame_start("Game Compatibility Chart","90%",2,1,"color4");
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
