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
html_header("ScummVM :: Compatibility - CVS");
sidebar_start();

//display welcome table
echo html_round_frame_start("Compatibility","");


?>
	<h1>Compatibility</h1>
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
          This is the compatibility of the current WIP CVS version, <B>not of the
	  0.6.0 stable release</B> (Please see the  <a href="compatibility_stable.php">Stable Compatibility</A> chart for this version).
          <br><br>
          As this is the status of the Work In Progress version, occasional temporary bugs
	  may be introduced with new changes, thus this list refects the 'best case' scenario. 
	  It is highly recommended to use the latest stable release, where possible.
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
		'Maniac Mansion (original)'				=> array('1','maniac','90'),
		'Maniac Mansion (enhanced)'				=> array('2','maniac','95'),
		'Zak McKracken and the Alien Mindbenders (original)'	=> array('1','zak','85'),
		'Zak McKracken and the Alien Mindbenders (enhanced)'	=> array('2','zak','90'),
		'Zak McKracken and the Alien Mindbenders (256 - FmTowns)' => array('3','zaktowns','90'),
		'Indiana Jones and the Last Crusade'			=> array('3','indy3ega','90'),
		'Indiana Jones and the Last Crusade (256)'		=> array('3','indy3','90'),
		'Indiana Jones and the Last Crusade (256 - FmTowns)'	=> array('3','indy3towns','90'),
		'Loom'							=> array('3','loom','95'),
		'Loom (256 - FmTowns)'					=> array('3','loomtowns','75'),
		'The Secret of Monkey Island (EGA)'			=> array('4','monkeyega','95'),
		'Passport to Adventure (Indy3, Monkey and Loom demos)'  => array('4','pass','95'),
		'Loom (256 color CD version)'                           => array('5','loomcd','95'),
		'The Secret of Monkey Island (VGA Floppy)'		=> array('5','monkeyvga','95'),
		'The Secret of Monkey Island (VGA CD)'			=> array('5','monkey','95'),
		'The Secret of Monkey Island (Alternative VGA CD)'	=> array('5','monkey1','95'),
		'The Secret of Monkey Island (Sega CD)'			=> array('5','game','85'),
		'Monkey Island 2: LeChuck\'s revenge'			=> array('5','monkey2','95'),
		'Monkey Island 2: LeChuck\'s revenge (DOS Demo)'	=> array('5','mi2demo','10'),
		'Indiana Jones 4 and the Fate of Atlantis'		=> array('5','atlantis','95'),
		'Indiana Jones 4 and the Fate of Atlantis (Demo)'	=> array('5','playfate','95'),
		'Putt-Putt Joins The Parade (DOS Demo)'			=> array('6','puttdemo','75'),
		'Putt-Putt Joins The Parade (DOS)'			=> array('6','puttputt','80'),
		'Putt-Putt Goes To The Moon (DOS Demo)'			=> array('6','moondemo','60'),
		'Putt-Putt Goes To The Moon (DOS)'			=> array('6','puttmoon','20'),
		'Putt-Putts Fun Pack'					=> array('6','funpack','50'),
		'Fatty Bears Birthday Surprise (DOS Demo)'		=> array('6','fbdemo','95'),
		'Fatty Bears Birthday Surprise (DOS)'			=> array('6','fbear','70'),
		'Fatty Bears Fun Pack'					=> array('6','fbpack','50'),
		'Day Of The Tentacle'					=> array('6','tentacle','95'),
		'Day Of The Tentacle (Demo)'				=> array('6','dottdemo','95'),
		'Sam & Max'                                             => array('6','samnmax','95'),
		'Sam & Max (Demo)'					=> array('6','samdemo','95'),
		'Full Throttle'						=> array('7','ft','80'),
		'The Dig'                                               => array('7','dig','85'),
		'Curse of Monkey Island'				=> array('8','comi','80'),
		'Beneath a Steel Sky'			       		=> array('n/a','sky','90'),
		'Broken Sword I'			       		=> array('n/a','sword1','85'),
		'Broken Sword II'			       		=> array('n/a','sword2','90'),
		'Flight of the Amazon Queen'			       	=> array('n/a','queen','90'),
 		'Simon The Sorcerer 1 Talkie (Win)'			=> array('n/a','simon1win','95'),
		'Simon The Sorcerer 1 Talkie (DOS)'       		=> array('n/a','simon1talkie','93'),
		'Simon The Sorcerer 1 Talkie (Amiga CD32)'     		=> array('n/a','simon1cd32','8'),
 		'Simon The Sorcerer 1 Talkie (Acorn)'			=> array('n/a','simon1acorn','93'),
		'Simon The Sorcerer 1 (DOS)'           			=> array('n/a','simon1dos','93'),
		'Simon The Sorcerer 1 (Amiga)'          		=> array('n/a','simon1amiga','5'),
		'Simon The Sorcerer 1 (Demo)'          			=> array('n/a','simon1demo','93'),
		'Simon The Sorcerer 2 Talkie (Win)'       		=> array('n/a','simon2win','95'),
		'Simon The Sorcerer 2 Talkie (DOS)'       		=> array('n/a','simon2talkie','95'),
		'Simon The Sorcerer 2 Talkie (Amiga or Mac)'       	=> array('n/a','simon2mac','95'),
		'Simon The Sorcerer 2 (DOS)'           			=> array('n/a','simon2dos','95')
	      );

$notes = array(
"maniac"	=> "No known issues, game is completable.".
		   "<br>- Minor graphical glitches with actors in classic version".
		   "<br>- Amiga, Atari ST, Mac and PC versions supported by this target",
"zak"		=> "No known issues, game is completable.".
		   "<br>- Minor graphical glitches with actors in classic version".
		   "<br>- Amiga, Atari ST and PC versions supported by this target",
"indy3ega"	=> "Game is completable".
		   "<br>- Amiga, Atari ST, Mac and PC versions supported by this target".
		   "<br>- Indiana may be able to walk in odd places, in some rooms".
		   "<br>- No inventory in Mac version".
		   "<br>- Atari ST and Mac versions require pcjr or pcspk music driver",
"indy3"         => "No known issues, game is completable.",
"indy3towns"    => "No known issues, game is completable." .
                   "<br>- Kanji version isn't supported",
"zaktowns"      => "No known issues, game is completable.".
                   "<br>- Kanji version isn't supported",
"loom"		=> "No known issues, game is completable.".
		   "<br>- Amiga, Atari ST, Mac and PC versions supported by this target".
		   "<br>- No music or sound effects with Mac version".
		   "<br>- Atari ST and Mac versions require pcjr or pcspk music driver".
		   "<br>- MIDI support requires the Roland update from LucasArts",
"loomtowns"	=> "Game is completable".
		   "<br>- Fades are seemingly different to other versions in some cases".
		   "<br>- Text palette sometimes incorrect".
		   "<br>- Distaff occasionally pink...".
		   "<br>- Difficulty select is via boot param:".

		   "<ul><li>0 practice (default)".
		       "<li>1 standard".
		       "<li>2 expert</ul>".
                   "<br>- Kanji version isn't supported",
"monkeyega"	=> "No known issues, game is completable.".
		   "<br>- Atari ST version requires pcjr or pcspk music driver".
		   "<br>- MIDI support requires the Roland update from LucasArts",
"pass"		=> "All three demos are completable.",
"loomcd"        => "No known issues, game is completable.",
"monkeyvga"	=> "Game is completable.".
		   "<br>- Both Amiga and PC versions supported by this target".
		   "<br>- No music with Amiga version",
"monkey"	=> "No known issues, game is completable.",
"monkey1"	=> "No known issues, game is completable.".
		   "<br>- Both Mac and PC versions supported by this target",
"game"		=> "No known issues, game is completable.".
		   "<br>- Dialogue choices can be selected with 6 (up) 7 (down) or mousewheel, with mouse button or number to select",
"monkey2"	=> "No known issues, game is completable.".
		   "<br>- Amiga, FM Towns, Mac and PC versions supported by this target".
		   "<br>- Various graphical glitches with Amiga version".
                   "<br>- Kanji version requires the FM Towns Font ROM",
"mi2demo"	=> "Often crashes due to missing resources, since it was never meant to be playable".
		   "<br>- No support for playing back the recorded file of gameplay",
"atlantis"	=> "No known issues, game is completable.".
		   "<br>- Amiga, FM Towns, Mac and PC versions supported by this target".
		   "<br>- Both disk and cd PC versions are supported by this target".
		   "<br>- Music loud on some systems, run with -m30 to lower music volume.".
		   "<br>- Various graphical glitches with Amiga version".
                   "<br>- Kanji version requires the FM Towns Font ROM",
"playfate"	=> "No known issues, game is completable.",
"puttdemo"	=> "No known issues, game is completable.".
		   "<br>- Some sound effects missing",
"puttputt"	=> "No known issues, game is completable.".
                   "<br>- Minor graphical glitches when cars come out of their garages on streets",
"puttmoon"	=> "Fails an AKOS related assertion shortly after starting".
		   "<br>- scummvm: scumm/akos.cpp:267: virtual byte AkosRenderer::drawLimb(const CostumeData&, int): Assertion `(code & 0xFFF) * 6 < READ_BE_UINT32((byte *)akof - 4) - 8' failed.",
"moondemo"	=> "Completable if you don't trigger one fatal animation".
		   "<br>- Creature behind garage door disappears",
"funpack"	=> "Starts but mini games seem to have various problems".
		   "<br>- Checkers: The checkers have some graphical glitches (actorOps case 218)".
		   "<br>- Cheese King: Triggers an assertion".
		   "<br>- Pinball/Remember/Tic-Tac-Toe/Puzzle blocks: Works",
"fbdemo"	=> "Should be playable to the end",
"fbear"		=> "Game should be completable, with several glitches".
		   "<br>- Piano sounds aren't correct pitch and several sound effects are missing",
"fbpack"	=> "Game starts but various minigames have different problems".
		   "<br>- Graphical glitches in all games due to o6_actorOps: case 218".
		   "<br>- Coloring: Some paint options are difficult to select",
"tentacle"	=> "No known issues, game is completable.".
		   "<br>- Both Mac and PC versions supported by this target".
		   "<br>- Both disk and cd versions are supported by this target".
		   "<br>- Maniac Mansion isn't playable on Ed's computer. To play the included copy, use 'Add Game' from the main ScummVM launcher and select the MANIAC directory inside the DOTT game directory",
"dottdemo"	=> "No known issues, game is completable.",
"samnmax"	=> "No known issues, game is completable.".
		   "<br>- Both Mac and PC versions supported by this target".
		   "<br>- Both disk and cd versions are supported by this target".
                   "<br>- Highway subgame doesn't behave correctly",
"samdemo"	=> "No known problems - should be playable to the end",
"ft"		=> "Game is completable, with several glitches".
		   "<br>- Both Mac and PC versions supported by this target".
	 	   "<br>- Music is not continuous, and may pause, restart, and otherwise act oddly".
		   "<br>- SMUSH audio (movie cutscenes) is a lot quieter than in-game voice, which is abnormally loud",
"dig"		=> "Game is completable, with some minor sound issues".
		   "<br>- Both Mac and PC versions supported by this target",
"comi"		=> "Game is completable, with some minor glitches.",
"sky"	 	=> "No known issues, game is completable.".
		   "<br>- Floppy demos are unsupported".
		   "<br>- Amiga versions aren't supported and probably never will be".
		   "<br>".
		   "<br>There are also bugs which were already present in the original game and which we can't fix:".
		   "<br>- The voice files for some sentences are missing.".
		   "<br>&nbsp;&nbsp;&nbsp;&nbsp;This is especially noticeable in the court- and Mrs. Piermont sequence.".
		   "<br>- The fonts for the LINC terminal are partially incorrect and the text sometimes passes the screen borders".
		   "<br>- Special characters for french and italian subtitles are incorrect sometimes",
"sword1"	=> "No known issues, game is completable.".
		   "<br>- Czech support is untested. If you have a czech version, please contact us.".
		   "<br>- Only the PC version has been tested. We don't have any other versions, so we can't make any promises about them.",
"sword2"	=> "No known issues, game is completable.".
		   "<br>- Only the PC version has been tested. We don't have any other versions, so we can't make any promises about them.",
"queen"		=> "No known issues, game is completable.".
		   "<br>- Some versions may require the <a href=\"http://0x.7fc1.org/fotaq/queen.tbl\">queen.tbl</a> resource file to be placed in the game directory. This is not required for the freeware releases",
"simon1win" 	=> "No known issues, game is completable.",
"simon1talkie" 	=> "No known issues, game is completable.",
"simon1cd32" 	=> "Game is completable, with major graphics glitches".
                   "<br>- Character and background graphics are decoded incorrectly".
                   "<br>- No music",
"simon1acorn" 	=> "No known issues, game is completable.",
"simon1dos" 	=> "No known issues, game is completable.",
"simon1amiga" 	=> "Game works a bit but can't see anything".
                   "<br>- Character and background graphics are decoded incorrectly".
                   "<br>- No music",
"simon1demo" 	=> "No known issues, game demo is completable.",
"simon2win"     => "No known issues, game is completable.",
"simon2talkie"  => "No known issues, game is completable.",
"simon2dos"     => "No known issues, game is completable.",
"simon2mac"     => "No known issues, game is completable.".
                   "<br>- Only default language (English) in data files is supported".
                   "<br>- F10 key animation is different"
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
sidebar_end();
html_footer();

?>
