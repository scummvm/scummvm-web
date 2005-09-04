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
	  This is the compatibility of the current WIP CVS version, <B>not of the
	  0.7.1 stable release</B> (Please see the  <a href="compatibility_stable.php">Stable Compatibility</A> chart for this version).
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

// This array defines the games and their ratings, etc.
$gamesLucas = array(
		'Maniac Mansion'					=> array('maniac','90'),
		'Zak McKracken and the Alien Mindbenders'		=> array('zak','90'),
		'Indiana Jones and the Last Crusade'			=> array('indy3','90'),
		'Loom'							=> array('loom','95'),
		'Passport to Adventure' 				=> array('pass','95'),
		'The Secret of Monkey Island'				=> array('monkey','95'),
		'Monkey Island 2: LeChuck\'s revenge'			=> array('monkey2','95'),
		'Indiana Jones 4 and the Fate of Atlantis'		=> array('atlantis','95'),
		'Day Of The Tentacle'					=> array('tentacle','95'),
		'Sam & Max'                                             => array('samnmax','95'),
		'Full Throttle'						=> array('ft','90'),
		'The Dig'                                               => array('dig','90'),
		'Curse of Monkey Island'				=> array('comi','90'),
	      );

$gamesHE = array(
		'Backyard Baseball'							=> array('baseball','20'),
		'Backyard Football (Demo)'						=> array('footdemo','80'),
		'Backyard Football'							=> array('football','80'),
		'Backyard Soccer'							=> array('soccer','20'),
		'Blue\'s ABC Time (Demo)'						=> array('BluesABCTimeDemo','90'),
		'Big Thinkers First Grade (Demo)'					=> array('1grademo','80'),
		'Big Thinkers First Grade'						=> array('thinker1','70'),
		'Big Thinkers Kindergarten (Demo)'					=> array('kinddemo','80'),
		'Big Thinkers Kindergarten'						=> array('thinkerk','80'),
		'Fatty Bears Birthday Surprise (Demo)'					=> array('fbdemo','95'),
		'Fatty Bears Birthday Surprise'						=> array('fbear','93'),
		'Fatty Bears Fun Pack'							=> array('fbpack','95'),
		'Freddi Fish 1: The Case of the Missing Kelp Seeds (Demo)'		=> array('freddemo','90'),
		'Freddi Fish 1: The Case of the Missing Kelp Seeds'			=> array('freddi','80'),
		'Freddi Fish 2: The Case of the Haunted Schoolhouse (Demo)'		=> array('ff2-demo','70'),
		'Freddi Fish 2: The Case of the Haunted Schoolhouse'			=> array('freddi2','70'),
		'Freddi Fish 3: The Case of the Stolen Conch Shell (Demo)'		=> array('f3-mdemo','90'),
		'Freddi Fish 3: The Case of the Stolen Conch Shell'			=> array('freddi3','90'),
		'Freddi Fish 4: The Case of the Hogfish Rustlers of Briny Gulch (Demo)'	=> array('f4-demo','90'),
		'Freddi Fish 4: The Case of the Hogfish Rustlers of Briny Gulch'	=> array('freddi4','90'),
		'Freddi Fish and Luther\'s Maze Madness'				=> array('maze','85'),
		'Freddi Fish and Luther\'s Water Worries'				=> array('water','85'),
		'Let\'s Explore the Airport with Buzzy (Demo)'				=> array('airdemo','85'),
		'Let\'s Explore the Airport with Buzzy'					=> array('airport','85'),
		'Let\'s Explore the Farm with Buzzy (Demo)'				=> array('farmdemo','85'),
		'Let\'s Explore the Farm with Buzzy'					=> array('farm','85'),
		'Let\'s Explore the Jungle with Buzzy'					=> array('jungle','85'),
		'Pajama Sam 1: No Need to Hide When It\'s Dark Outside (Demo)'		=> array('pjs-demo','90'),
		'Pajama Sam 1: No Need to Hide When It\'s Dark Outside'			=> array('pajama','70'),
		'Pajama Sam 2: Thunder and Lightning Aren\'t so Frightening (Demo)'	=> array('pj2demo','90'),
		'Pajama Sam 2: Thunder and Lightning Aren\'t so Frightening'		=> array('pajama2','80'),
		'Pajama Sam 3: You Are What You Eat From Your Head to Your Feet (Demo)'	=> array('pj3-demo','80'),
		'Pajama Sam 3: You Are What You Eat From Your Head to Your Feet'	=> array('pajama3','50'),
		'Pajama Sam\'s Lost & Found (Demo)'					=> array('smaller','90'),
		'Pajama Sam\'s Lost & Found'						=> array('lost','50'),
		'Pajama Sam\'s Sock Works'						=> array('socks','85'),
		'Putt-Putt Enters the Race (Demo)'					=> array('racedemo','85'),
		'Putt-Putt Enters the Race'						=> array('puttrace','70'),
		'Putt-Putt Goes To The Moon (Demo)'					=> array('moondemo','95'),
		'Putt-Putt Goes To The Moon'						=> array('puttmoon','95'),
		'Putt-Putt Joins the Circus (Demo)'					=> array('circdemo','90'),
		'Putt-Putt Joins the Circus'						=> array('puttcircus','50'),
		'Putt-Putt Joins the Parade (Demo)'					=> array('puttdemo','95'),
		'Putt-Putt Joins the Parade'						=> array('puttputt','95'),
		'Putt-Putt Saves the Zoo (Demo)'					=> array('zoodemo','80'),
		'Putt-Putt Saves the Zoo'						=> array('puttzoo','80'),
		'Putt-Putt Travels Through Time (Demo)'					=> array('timedemo','80'),
		'Putt-Putt Travels Through Time'					=> array('putttime','80'),
		'Putt-Putt and Pep\'s Balloon-O-Rama'					=> array('balloon','85'),
		'Putt-Putt and Pep\'s Dog on a Stick'					=> array('dog','85'),
		'Putt-Putts Fun Pack'							=> array('funpack','95'),
		'Putt-Putt & Fatty Bear\'s Activity Pack'				=> array('activity','95'),
		'Spyfox 1: Dry Cereal (Demo)'						=> array('spydemo','90'),
		'Spyfox 1: Dry Cereal'							=> array('spyfox','85'),
		'Spyfox 2: Some Assembly Required (Demo)'				=> array('sf2-demo','90'),
		'Spyfox 2: Some Assembly Required'					=> array('spyfox2','90'),
		'Spyfox 3: Operation Ozone (Demo)'					=> array('sf3-demo','90'),
		'Spyfox 3: Operation Ozone'						=> array('spyozon','60'),
		'Spy Fox in Cheese Chase Game'						=> array('chase','20'),
		'Spy Fox in Hold the Mustard'						=> array('mustard','85'),
	      );

$gamesOther = array(

		'Beneath a Steel Sky'			       		=> array('sky','98'),
		'Broken Sword I'			       		=> array('sword1','98'),
		'Broken Sword II'			       		=> array('sword2','98'),
		'Flight of the Amazon Queen'			       	=> array('queen','98'),
		'Gobliiins'						=> array('gob1', '90'),
		'Inherit the Earth'					=> array( 'ite', '87'),
		'Simon The Sorcerer 1 Talkie'       			=> array('simon1talkie','93'),
 		'Simon The Sorcerer 1 Talkie (Acorn)'			=> array('simon1acorn','93'),
		'Simon The Sorcerer 1 (DOS)'           			=> array('simon1dos','93'),
		'Simon The Sorcerer 1 (Demo)'          			=> array('simon1demo','93'),
		'Simon The Sorcerer 2 Talkie'       			=> array('simon2talkie','95'),
		'Simon The Sorcerer 2 (DOS)'           			=> array('simon2dos','95')
	      );

$notes = array(
"maniac"	=> "No known issues, game is completable.".
		   "<br>- Amiga, Atari ST, Macintosh, NES and PC versions supported by this target".
		   "<br>- Minor graphical glitches in NES version",
"zak"		=> "No known issues, game is completable.".
		   "<br>- Amiga, Atari ST, FM-TOWNS and PC versions supported by this target".
		   "<br>- Several sound effects buggy or missing in Amiga version".
                   "<br>- Kanji version requires the FM-TOWNS Font ROM",
"indy3" 	=> "Game is completable".
		   "<br>- Amiga, Atari ST, FM-TOWNS, Macintosh and PC versions supported by this target".
		   "<br>- Macintosh version isn't completable, due to no inventory controls".
                   "<br>- Kanji version requires the FM-TOWNS Font ROM",
"loom"		=> "No known issues, game is completable.".
		   "<br>- Amiga, Atari ST, FM-TOWNS, Macintosh and PC versions supported by this target".
		   "<br>- The Roland update from LucasArts is required for MIDI support in the EGA version".
		   "<br>- No music or sound effects in the Macintosh version".

                   "<br><br>FM-TOWNS specific issues".
		   "<br>- Fades are seemingly different to other versions in some cases".
		   "<br>- Text palette sometimes incorrect".
		   "<br>- Distaff occasionally pink...".
		   "<br>- Difficulty select is via boot param:".

		   "<ul><li>0 practice (default)".
		       "<li>1 standard".
		       "<li>2 expert</ul>".
                   "<br>- Kanji version requires the FM-TOWNS Font ROM",
"monkey"	=> "No known issues, game is completable.".
		   "<br>- Amiga, Atari ST, FM-TOWNS, Macintosh, PC and SegaCD versions supported by this target".
		   "<br>- The Roland update from LucasArts is required for MIDI support in the EGA version".
		   "<br>- No music or sound effects in the Amiga version".
		   "<br>- Dialogue choices in the SegaCD version can be selected with 6 (up) 7 (down) or mousewheel, with mouse button or number to select",

"pass"		=> "No known issues, game is completable.",
"monkey2"	=> "No known issues, game is completable.".
		   "<br>- Amiga, FM-TOWNS, Macintosh and PC versions supported by this target".
                   "<br>- Kanji version requires the FM-TOWNS Font ROM",
"atlantis"	=> "No known issues, game is completable.".
		   "<br>- Amiga, FM-TOWNS, Macintosh and PC versions supported by this target".
                   "<br>- Kanji version requires the FM-TOWNS Font ROM",
"tentacle"	=> "No known issues, game is completable.".
		   "<br>- Both Macintosh and PC versions supported by this target".
		   "<br>- Maniac Mansion isn't playable on Ed's computer. To play the included copy, use 'Add Game' from the main ScummVM launcher and select the MANIAC directory inside the DOTT game directory",
"samnmax"	=> "No known issues, game is completable.".
		   "<br>- Both Macintosh and PC versions supported by this target",
"ft"		=> "No known issues, game is completable.".
		   "<br>- Both Macintosh and PC versions supported by this target",
"dig"		=> "No known issues, game is completable.".
		   "<br>- Both Macintosh and PC versions supported by this target",
"comi"		=> "No known issues, game is completable.",

"baseball"	=> "Game is playable, with glitches".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- Array out of bounds errors sometimes".
		   "<br>- Minor graphical glitches",
"footdemo"	=> "Game is completable, with minor glitches".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- Minor graphical glitches",
"football"	=> "Game is completable, with minor glitches".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- Minor graphical glitches",
"soccer"	=> "Game is playable, with minor glitches".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- PlayStation 1 version will never be supported.".
		   "<br>- Array out of bounds errors sometimes".
		   "<br>- Minor graphical glitches",
"BluesABCTimeDemo" => "Game is playable".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"1grademo"	=> "Game is completable, with minor glitches".
		   "<br>- Minor graphical glitches",
"thinker1"	=> "Game is playable, with minor glitches".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- Input issues when selecting locations on globe of world".
		   "<br>- Need to use ESC when car is stuck in the smart star challenge",
"kinddemo"	=> "Game is completable, with minor glitches".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- Minor graphical glitches",
"thinkerk"	=> "Game is playable, with minor glitches".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- Minor graphical glitches",
"fbdemo"	=> "No known issues, game is completable.".
		   "<br>- Both DOS and Windows versions supported by this target",
"fbear"		=> "Game should be completable, with several glitches".
		   "<br>- 3DO, DOS and Windows versions supported by this target".
		   "<br>- Piano sounds aren't correct pitch in DOS version",
"fbpack"	=> "No known issues, game is completable.".
		   "<br>- Both 3DO and DOS versions supported by this target",
"activity"	=> "No known issues, game is completable.",
"freddemo"	=> "Game is completable, with minor glitches".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- Inventory bubbles don't pop in older demo",
"freddi"	=> "Game is completable, with minor glitches".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- Sometimes double speech when using objects",
"ff2-demo"	=> "Game is completable, with minor glitches".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- Animation isn't synced during songs".
		   "<br>- Minor graphical glitches",
"freddi2"	=> "Game is completable, with minor glitches".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- Animation isn't synced during songs".
		   "<br>- Minor graphical glitches",
"f3-mdemo"	=> "No known issues, game is completable".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"freddi3"	=> "No known issues, game is completable".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"f4-demo"	=> "No known issues, game is completable".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"freddi4"	=> "No known issues, game is completable".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"maze"		=> "Game is completable, with minor glitches".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"water"		=> "Game is completable, with minor glitches".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"airdemo"	=> "Game is playable".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- Minor graphical glitches",
"airport"	=> "Game is playable".
		   "<br>- Minor graphical glitches",
"farmdemo"	=> "Game is playable".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- Minor graphical glitches",
"farm"		=> "Game is playable".
		   "<br>- Minor graphical glitches",
"jungle"	=> "Game is playable".
		   "<br>- Minor graphical glitches",
"pjs-demo"	=> "No known issues, game is completable".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"pajama"	=> "Game is completable, with minor glitches".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- No songs",
"pj2demo"	=> "No known issues, game is completable".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"pajama2"	=> "Game is completable, with minor glitches".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- Minor graphical glitches",
"pj3-demo"	=> "Game is completable, with minor glitches".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- Minor graphical glitches",
"pajama3"	=> "Game is playable but not completable".
		   "<br>- PlayStation 1 version will never be supported.".
		   "<br>- Sprites aren't displayed during Ski Ride".
		   "<br>- Minor graphical glitches",
"smaller"	=> "No known issues, game is completable",
"lost"		=> "Game is playable, with glitches".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- Asserts during bonus game selection, if not all bonus pieces were found. Use Esc to bypass issue".
		   "<br>- Minor graphical glitches",
"socks"		=> "Game is completable, with minor glitches".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"racedemo"	=> "Game is completable, with minor glitches".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- Minor graphical glitches",
"puttrace"	=> "Game is completable, with glitches".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- Can't move around in the field".
		   "<br>- Flashlight doesn't work correctly".
		   "<br>- Minor graphical glitches",
"moondemo"	=> "No known issues, game is completable.".
		   "<br>- Both DOS and Windows versions supported by this target",
"puttmoon"	=> "No known issues, game is completable.".
		   "<br>- 3DO, DOS and Windows versions supported by this target",
"circdemo"	=> "No known issues, game is completable.".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"puttcircus"	=> "Game is playable but not completable".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- Magnifying glass doesn't work".
		   "<br>- Runs out of array pointers".
		   "<br>- Graphical glitches",
"puttdemo"	=> "No known issues, game is completable.".
		   "<br>- Both DOS and Windows versions supported by this target",
"puttputt"	=> "No known issues, game is completable.".
		   "<br>- 3DO, DOS and Windows versions supported by this target",
"puttzoo"	=> "Game is completable, with minor glitches".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- Minor graphical glitches",
"zoodemo"	=> "Game is completable, with minor glitches".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- Minor graphical glitches",
"putttime"	=> "Game is completable, with minor glitches".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- Minor graphical glitches",
"timedemo"	=> "Game is completable, with minor glitches".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- Minor graphical glitches",
"balloon"	=> "Game is completable, with minor glitches".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"dog"		=> "Game is completable, with minor glitches".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"funpack"	=> "No known issues, game is completable.".
		   "<br>- Both 3DO and DOS versions supported by this target",
"spydemo"	=> "No known issues, game is completable.".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"spyfox"	=> "Game is completable, with minor glitches".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- Minor selection issues in with actor/items in two sections",
"sf2-demo"	=> "No known issues, game is completable.".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"spyfox2"	=> "No known issues, game is completable.".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"sf3-demo"	=> "No known issues, game is completable.".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"spyozon"	=> "Game is completable, depending on path".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- Asserts when looking at pearls",
		   "<br>- Need to guess the correct colors of Poodles's fingernails".
		   "<br>- Palette glitches",
"chase"		=> "Game is playable, with glitches".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- Spy Fox's scooter is scrolled off screen, as the screen scrolls vertically",
"mustard"	=> "No known issues, game is completable.".
		   "<br>- Both Macintosh and Windows versions supported by this target",

"sky"	 	=> "No known issues, game is completable.".
		   "<br>- Requires the <a href=\"SKY.CPT\">SKY.CPT</a> resource file to be placed in the game directory".
		   "<br>- Floppy demos aren't supported".
		   "<br>- Amiga versions aren't supported".
		   "<br>".
		   "<br>The following bugs are present in the original game and can't be fixed:".
		   "<br>- The voice files for some sentences are missing.".
		   "<br>&nbsp;&nbsp;&nbsp;&nbsp;This is especially noticeable in the court- and Mrs. Piermont sequence.".
		   "<br>- The fonts for the LINC terminal are partially incorrect and the text sometimes passes the screen borders".
		   "<br>- Special characters for french and italian subtitles are incorrect sometimes",
"sword1"	=> "No known issues, game is completable.".
		   "<br>- Macintosh and PlayStation 1 version aren't supported.",
"sword2"	=> "No known issues, game is completable.".
		   "<br>- PlayStation 1 version isn't supported.",
"queen"		=> "No known issues, game is completable.".
		   "<br>- Some versions may require the <a href=\"http://0x.7fc1.org/fotaq/queen.tbl\">queen.tbl</a> resource file to be placed in the game directory. This is not required for the freeware releases.".
		   "<br>- Amiga version isn't supported.",
"gob1"		=> "No known issues. Game is completable.".
		   "<br>- DOS, CD, Amiga, Atari and Macintosh versions are supported by this target".
		   "<br>- Macintosh version lacks music",
"ite"		=> "Game is completable.".
		   "<br>- DOS Floppy, DOS CD, Win32, old Macintosh, MacOS X and Linux versions are supported by this target".
		   "<br>- Amiga CD isn't supported".
		   "<br>- Occasional gfx glitches",
"simon1talkie" 	=> "No known issues, game is completable.".
		   "<br>- Both DOS and Windows versions supported by this target",
"simon1acorn" 	=> "No known issues, game is completable.",
"simon1dos" 	=> "No known issues, game is completable.",
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
