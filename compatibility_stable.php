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
html_header("ScummVM :: Compatibility - 0.7.1");
sidebar_start();

//display welcome table
echo html_round_frame_start("Compatibility","");

if (isset($_GET['details'])) {
	$details = $_GET['details'];
}

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
	  Also, this is the compatability of the 0.7.1 stable release, <B>not of CVS
	  snapshots/daily builds</B>. The status of these can be found on the <a
	  href="compatibility.php">CVS Compatibility</A> chart.
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

// This array defines the games and their ratings, etc.
$gamesLucas = array(
		'Maniac Mansion (original)'				=> array('maniac','90'),
		'Maniac Mansion (enhanced)'				=> array('maniac','95'),
		'Zak McKracken and the Alien Mindbenders (original)'	=> array('zak','85'),
		'Zak McKracken and the Alien Mindbenders (enhanced)'	=> array('zak','90'),
		'Zak McKracken and the Alien Mindbenders (FM-TOWNS)'	=> array('zaktowns','90'),
		'Indiana Jones and the Last Crusade'			=> array('indy3ega','90'),
		'Indiana Jones and the Last Crusade (256)'		=> array('indy3','90'),
		'Indiana Jones and the Last Crusade (FM-TOWNS)'		=> array('indy3towns','90'),
		'Loom'							=> array('loom','95'),
		'Loom (FM-TOWNS)'					=> array('loomtowns','75'),
		'The Secret of Monkey Island (EGA)'			=> array('monkeyega','95'),
		'Passport to Adventure (Indy3, Monkey and Loom demos)'  => array('pass','95'),
		'Loom (256 color CD version)'                           => array('loomcd','95'),
		'The Secret of Monkey Island (VGA Floppy)'		=> array('monkeyvga','95'),
		'The Secret of Monkey Island (VGA CD)'			=> array('monkey','95'),
		'The Secret of Monkey Island (Alternative VGA CD)'	=> array('monkey1','95'),
		'The Secret of Monkey Island (Sega CD)'			=> array('game','85'),
		'Monkey Island 2: LeChuck\'s revenge'			=> array('monkey2','95'),
		'Monkey Island 2: LeChuck\'s revenge (DOS Demo)'	=> array('mi2demo','10'),
		'Indiana Jones 4 and the Fate of Atlantis'		=> array('atlantis','95'),
		'Indiana Jones 4 and the Fate of Atlantis (FM-TOWNS)'	=> array('indy4','95'),
		'Indiana Jones 4 and the Fate of Atlantis (Demo)'	=> array('playfate','95'),
		'Day Of The Tentacle'					=> array('tentacle','95'),
		'Day Of The Tentacle (Demo)'				=> array('dottdemo','95'),
		'Sam & Max'                                             => array('samnmax','95'),
		'Sam & Max (Demo)'					=> array('samdemo','95'),
		'Full Throttle'						=> array('ft','85'),
		'The Dig'                                               => array('dig','90'),
		'Curse of Monkey Island'				=> array('comi','85'),
	      );

$gamesHE = array(
		'Backyard Baseball 2001 (Demo)'						=> array('bb2demo','5'),
		'Backyard Football 2002 (Demo)'						=> array('footdemo','5'),
		'Blue\'s ABC Time (Demo)'						=> array('BluesABCTimeDemo','90'),
		'Big Thinkers First Grade (Demo)'					=> array('1grademo','10'),
		'Big Thinkers Kindergarten (Demo)'					=> array('kinddemo','50'),
		'Big Thinkers Kindergarten'						=> array('thinkerk','10'),
		'Fatty Bears Birthday Surprise (Demo)'					=> array('fbdemo','95'),
		'Fatty Bears Birthday Surprise'						=> array('fbear','93'),
		'Fatty Bears Fun Pack'							=> array('fbpack','95'),
		'Freddi Fish 1: The Case of the Missing Kelp Seeds (Demo)'		=> array('freddemo','90'),
		'Freddi Fish 1: The Case of the Missing Kelp Seeds'			=> array('freddi','80'),
		'Freddi Fish 2: The Case of the Haunted Schoolhouse (Demo)'		=> array('ff2-demo','70'),
		'Freddi Fish 2: The Case of the Haunted Schoolhouse'			=> array('freddi2','70'),
		'Freddi Fish 3: The Case of the Stolen Conch Shell (Demo)'		=> array('f3-mdemo','70'),
		'Freddi Fish 3: The Case of the Stolen Conch Shell'			=> array('freddi3','70'),
		'Freddi Fish 4: The Case of the Hogfish Rustlers of Briny Gulch (Demo)'	=> array('f4-demo','10'),
		'Freddi Fish 4: The Case of the Hogfish Rustlers of Briny Gulch'	=> array('freddi4','10'),
		'Freddi Fish 5: The Case of the Creature of Coral Cave (Demo)'		=> array('ff5demo','10'),
		'Freddi Fish 5: The Case of the Creature of Coral Cave'			=> array('freddicove','10'),
		'Freddi Fish and Luther\'s Maze Madness'				=> array('maze','50'),
		'Freddi Fish and Luther\'s Water Worries'				=> array('water','50'),
		'Let\'s Explore the Airport with Buzzy (Demo)'				=> array('airdemo','50'),
		'Let\'s Explore the Airport with Buzzy'					=> array('airport','50'),
		'Let\'s Explore the Farm with Buzzy (Demo)'				=> array('farmdemo','50'),
		'Let\'s Explore the Farm with Buzzy'					=> array('farm','50'),
		'Let\'s Explore the Jungle with Buzzy'					=> array('jungle','50'),
		'Pajama Sam 1: No Need to Hide When It\'s Dark Outside (Demo)'		=> array('pjs-demo','90'),
		'Pajama Sam 1: No Need to Hide When It\'s Dark Outside'			=> array('pajama','80'),
		'Pajama Sam 2: Thunder and Lightning Aren\'t so Frightening (Demo)'	=> array('pj2demo','90'),
		'Pajama Sam 2: Thunder and Lightning Aren\'t so Frightening'		=> array('pajama2','70'),
		'Pajama Sam 3: You Are What You Eat From Your Head to Your Feet (Demo)'	=> array('pj3-demo','70'),
		'Pajama Sam 3: You Are What You Eat From Your Head to Your Feet'	=> array('pajama3','20'),
		'Pajama Sam\'s Lost & Found (Demo)'					=> array('smaller','5'),
		'Pajama Sam\'s Lost & Found'						=> array('lost','5'),
		'Pajama Sam\'s Sock Works'						=> array('socks','50'),
		'Putt-Putt Enters the Race (Demo)'					=> array('racedemo','10'),
		'Putt-Putt Enters the Race'						=> array('puttrace','10'),
		'Putt-Putt Goes To The Moon (Demo)'					=> array('moondemo','95'),
		'Putt-Putt Goes To The Moon'						=> array('puttmoon','95'),
		'Putt-Putt Joins the Circus (Demo)'					=> array('circdemo','10'),
		'Putt-Putt Joins the Circus'						=> array('puttcircus','10'),
		'Putt-Putt Joins the Parade (Demo)'					=> array('puttdemo','95'),
		'Putt-Putt Joins the Parade'						=> array('puttputt','95'),
		'Putt-Putt Saves the Zoo (Demo)'					=> array('zoodemo','70'),
		'Putt-Putt Saves the Zoo'						=> array('puttzoo','70'),
		'Putt-Putt Travels Through Time (Demo)'					=> array('timedemo','70'),
		'Putt-Putt Travels Through Time'					=> array('putttime','70'),
		'Putt-Putt and Pep\'s Balloon-O-Rama'					=> array('balloon','50'),
		'Putt-Putt and Pep\'s Dog on a Stick'					=> array('dog','50'),
		'Putt-Putts Fun Pack'							=> array('funpack','95'),
		'Spyfox 1: Dry Cereal (Demo)'						=> array('foxdemo','10'),
		'Spyfox 1: Dry Cereal (Alternative Demo)'				=> array('spydemo','10'),
		'Spyfox 1: Dry Cereal'							=> array('spyfox','10'),
		'Spyfox 2: Some Assembly Required (Demo)'				=> array('sf2-demo','10'),
		'Spyfox 2: Some Assembly Required'					=> array('spyfox2','10'),
		'Spyfox 3: Operation Ozone (Demo)'					=> array('sf3-demo','10'),
		'Spyfox 3: Operation Ozone'						=> array('spyozon','10'),
		'Spy Fox in Cheese Chase Game'						=> array('chase','10'),
		'Spy Fox in Hold the Mustard'						=> array('mustard','10'),
	      );

$gamesOther = array(

		'Beneath a Steel Sky'			       		=> array('sky','98'),
		'Broken Sword I'			       		=> array('sword1','98'),
		'Broken Sword II'			       		=> array('sword2','98'),
		'Flight of the Amazon Queen'			       	=> array('queen','98'),
		'Simon The Sorcerer 1 Talkie'       			=> array('simon1talkie','93'),
		'Simon The Sorcerer 1 Talkie (Amiga CD32)'     		=> array('simon1cd32','8'),
 		'Simon The Sorcerer 1 Talkie (Acorn)'			=> array('simon1acorn','93'),
		'Simon The Sorcerer 1 (DOS)'           			=> array('simon1dos','93'),
		'Simon The Sorcerer 1 (Amiga)'          		=> array('simon1amiga','5'),
		'Simon The Sorcerer 1 (Demo)'          			=> array('simon1demo','93'),
		'Simon The Sorcerer 2 Talkie'       			=> array('simon2talkie','95'),
		'Simon The Sorcerer 2 (DOS)'           			=> array('simon2dos','95')
	      );

$notes = array(
"maniac"	=> "No known issues, game is completable.".
		   "<br>- Amiga, Atari ST, Mac and PC versions supported by this target",
"zak"		=> "No known issues, game is completable.".
		   "<br>- Amiga, Atari ST and PC versions supported by this target".
		   "<br>- Some sound effects buggy or missing in Amiga version",
"indy3ega"	=> "Game is completable".
		   "<br>- Amiga, Atari ST, Mac and PC versions supported by this target".
		   "<br>- Indiana may be able to walk in odd places, in some rooms".
		   "<br>- no inventory controls in Mac version".
		   "<br>- Atari ST and Mac versions require pcjr or pcspk music driver",
"indy3"         => "No known issues, game is completable.",
"indy3towns"    => "No known issues, game is completable.".
                   "<br>- Kanji version requires the FM-TOWNS Font ROM",
"zaktowns"      => "No known issues, game is completable.".
                   "<br>- Kanji version requires the FM-TOWNS Font ROM",
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
                   "<br>- Kanji version requires the FM-TOWNS Font ROM",
"monkeyega"	=> "No known issues, game is completable.".
		   "<br>- Atari ST version requires pcjr or pcspk music driver".
		   "<br>- MIDI support requires the Roland update from LucasArts",
"pass"		=> "All three demos are completable.",
"loomcd"        => "No known issues, game is completable.",
"monkeyvga"	=> "Game is completable.".
		   "<br>- Both Amiga and PC versions supported by this target".
		   "<br>- No music or sound effects with Amiga version",
"monkey"	=> "No known issues, game is completable.",
"monkey1"	=> "No known issues, game is completable.".
		   "<br>- Both Mac and PC versions supported by this target",
"game"		=> "No known issues, game is completable.".
		   "<br>- Dialogue choices can be selected with 6 (up) 7 (down) or mousewheel, with mouse button or number to select",
"monkey2"	=> "No known issues, game is completable.".
		   "<br>- Amiga, FM-TOWNS, Mac and PC versions supported by this target".
                   "<br>- Kanji version requires the FM-TOWNS Font ROM",
"mi2demo"	=> "Often crashes due to missing resources, since it was never meant to be playable".
		   "<br>- No support for playing back the recorded file of gameplay",
"atlantis"	=> "No known issues, game is completable.".
		   "<br>- Amiga, Mac and PC versions supported by this target".
		   "<br>- Both disk and cd PC versions are supported by this target".
		   "<br>- Music loud on some systems, run with -m30 to lower music volume.",
"indy4"		=> "No known issues, game is completable.".
		   "<br>- Music loud on some systems, run with -m30 to lower music volume.".
                   "<br>- Kanji version requires the FM-TOWNS Font ROM",
"playfate"	=> "No known issues, game is completable.",
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
"ft"		=> "Game is completable, with minor glitches".
		   "<br>- Both Mac and PC versions supported by this target",
"dig"		=> "Game is completable, with minor glitches".
		   "<br>- Both Mac and PC versions supported by this target",
"comi"		=> "Game is completable, with minor glitches.",

"bb2demo"	=> "Only shows introduction",
"footdemo"	=> "Only shows introduction",
"BluesABCTimeDemo" => "Game is playable",
"1grademo"	=> "Game is playable, but objects in mini games aren't drawn",
"kinddemo"	=> "Game is playable, but settings aren't saved".
		   "<br>- Various issues",
"thinkerk"	=> "Game is playable, but settings aren't saved".
		   "<br>- Various issues",
"fbdemo"	=> "Should be playable to the end".
		   "<br>- Both DOS and Windows versions supported by this target".
		   "<br>- Cursors aren't scaled correctly in Windows version",
"fbear"		=> "Game should be completable, with several glitches".
		   "<br>- 3DO, DOS and Windows versions supported by this target".
		   "<br>- Piano sounds aren't correct pitch in DOS version".
		   "<br>- Cursors aren't scaled correctly",
"fbpack"	=> "No known issues, game is completable.".
		   "<br>- Both 3DO and DOS versions supported by this target",
"freddemo"	=> "Game is completable, with minor glitches".
		   "<br>- Inventory bubbles don't pop in older demo",
"freddi"	=> "Game is completable, with minor glitches".
		   "<br>- Sometimes double speech when using objects",
"ff2-demo"	=> "Game is completable, with minor glitches".
		   "<br>- No songs",
"freddi2"	=> "Game is completable, with minor glitches".
		   "<br>- No songs",
"f3-mdemo"	=> "Game is completable, with minor glitches",
"freddi3"	=> "Game is completable, with minor glitches",
"f4-demo"	=> "Not completable, no inventory controls".
		   "<br>- Various issues",
"freddi4"	=> "Not completable, no inventory controls".
		   "<br>- Various issues",
"ff5demo"	=> "Not completable, no inventory controls".
		   "<br>- Various issues",
"freddicove"	=> "Not completable, no inventory controls".
		   "<br>- Various issues",
"maze"		=> "Game is playable, but settings aren't saved".
		   "<br>- Various issues",
"water"		=> "Game is playable, but settings aren't saved".
		   "<br>- Various issues",
"airdemo"	=> "Game is playable".
		   "<br>- Various issues",
"airport"	=> "Game is playable".
		   "<br>- Various issues",
"farmdemo"	=> "Game is playable".
		   "<br>- Various issues",
"farm"		=> "Game is playable".
		   "<br>- Various issues",
"jungle"	=> "Game is playable".
		   "<br>- Various issues",
"pjs-demo"	=> "No known issues, game is completable",
"pajama"	=> "Game is completable, with minor glitches".
		   "<br>- No songs",
"pj2demo"	=> "No known issues, game is completable",
"pajama2"	=> "Game is completable, with minor glitches".
		   "<br>- Actor limbs sometimes aren't visible",
"pj3-demo"	=> "Game is completable, with minor glitches".
		   "<br>- Various issues",
"pajama3"	=> "Game is playable but not completable".
		   "<br>- Various issues",
"smaller"	=> "Only shows introduction",
"lost"		=> "Only shows introduction",
"socks"		=> "Game is playable, but settings aren't saved".
		   "<br>- Various issues",
"racedemo"	=> "Not completable, no inventory controls".
		   "<br>- Various issues",
"puttrace"	=> "Not completable, no inventory controls".
		   "<br>- Various issues",
"moondemo"	=> "No known issues, game is completable.".
		   "<br>- Both DOS and Windows versions supported by this target".
		   "<br>- Cursors aren't scaled correctly in Windows version",
"puttmoon"	=> "No known issues, game is completable.".
		   "<br>- 3DO, DOS and Windows versions supported by this target".
		   "<br>- Cursors aren't scaled correctly in Windows version",
"circdemo"	=> "Not completable, no inventory controls".
		   "<br>- Various issues",
"puttcircus"	=> "Not completable, no inventory controls".
		   "<br>- Various issues",
"puttdemo"	=> "No known issues, game is completable.".
		   "<br>- Both DOS and Windows versions supported by this target".
		   "<br>- Cursors aren't scaled correctly in Windows version",
"puttputt"	=> "No known issues, game is completable.".
		   "<br>- 3DO, DOS and Windows versions supported by this target".
		   "<br>- Cursors aren't scaled correctly in Windows version",
"puttzoo"	=> "Game is completable, with minor glitches".
		   "<br>- Inventory background and items are often not redrawn",
"zoodemo"	=> "Game is completable, with minor glitches".
		   "<br>- Inventory background and items are often not redrawn",
"putttime"	=> "Game is completable, with minor glitches".
		   "<br>- Inventory background and items are often not redrawn".
		   "<br>- No songs",
"timedemo"	=> "Game is completable, with minor glitches".
		   "<br>- Inventory background and items are often not redrawn",
"balloon"	=> "Game is playable, but settings aren't saved".
		   "<br>- Various issues",
"dog"		=> "Game is playable, but settings aren't saved".
		   "<br>- Various issues",
"funpack"	=> "No known issues, game is completable.".
		   "<br>- Both 3DO and DOS versions supported by this target",
"spydemo"	=> "Not completable, no inventory controls".
		   "<br>- Various issues",
"foxdemo"	=> "Not completable, no inventory controls".
		   "<br>- Various issues",
"spyfox"	=> "Not completable, no inventory controls".
		   "<br>- Various issues",
"sf2-demo"	=> "Not completable, no inventory controls".
		   "<br>- Various issues",
"spyfox2"	=> "Not completable, no inventory controls".
		   "<br>- Various issues",
"sf3-demo"	=> "Not completable, no inventory controls".
		   "<br>- Various issues",
"spyozon"	=> "Not completable, no inventory controls".
		   "<br>- Various issues",
"chase"		=> "Only shows introduction",
"mustard"	=> "Only shows introduction",

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
		   "<br>- Only the PC version has been tested. We don't have any other versions, so we can't make any promises about them.",
"sword2"	=> "No known issues, game is completable.".
		   "<br>- Only the PC version has been tested. We don't have any other versions, so we can't make any promises about them.",
"queen"		=> "No known issues, game is completable.".
		   "<br>- Some versions may require the <a href=\"http://0x.7fc1.org/fotaq/queen.tbl\">queen.tbl</a> resource file to be placed in the game directory. This is not required for the freeware releases",
"simon1talkie" 	=> "No known issues, game is completable.".
		   "<br>- Both DOS and Windows versions supported by this target",
"simon1cd32" 	=> "Game is completable, with major graphics glitches".
                   "<br>- Character and background graphics are decoded incorrectly".
                   "<br>- No music",
"simon1acorn" 	=> "No known issues, game is completable.",
"simon1dos" 	=> "No known issues, game is completable.",
"simon1amiga" 	=> "Game works a bit but can't see anything".
                   "<br>- Character and background graphics are decoded incorrectly".
                   "<br>- No music",
"simon1demo" 	=> "No known issues, game demo is completable.",
"simon2talkie"  => "No known issues, game is completable.".
		   "<br>- Amiga, DOS, Macintosh and Windows versions supported by this target".
                   "<br>- Only the default language (English) in Amiga & Mactinosh versions is supported".
                   "<br>- F10 key animation is different in Amiga & Macintosh versions",
"simon2dos"     => "No known issues, game is completable."
);
		
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

	$arrayt = array_merge($gamesLucas, $gamesHE, $gamesOther);
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
		echo html_frame_start("$title Game Compatibility Chart","90%",2,1,"color4");
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
						html_frame_td(html_ahref($name, $PHP_SELF."?details=".$array[0])).
						html_frame_td($array[0]).
						html_frame_td($array[1]."%", 'align="center" class="pct'.($array[1] - ($array[1]%5)).'"'),
						$color
			);
			$c++;
		}		  
	}
	
	displayGameList("LucasArts", $gamesLucas);

	echo html_frame_end("&nbsp;");
	echo html_p();

	displayGameList("Other", $gamesOther);

	echo html_frame_end("&nbsp;");
	echo html_p();

	displayGameList("Humongous Entertainment", $gamesHE);
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
