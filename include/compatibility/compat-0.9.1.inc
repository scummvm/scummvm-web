<?

// This array defines the games and their ratings, etc.
$gamesLucas = array(
	'Maniac Mansion'                                        => array('maniac','90'),
	'Zak McKracken and the Alien Mindbenders'               => array('zak','90'),
	'Indiana Jones and the Last Crusade'                    => array('indy3','90'),
	'Loom'                                                  => array('loom','95'),
	'Passport to Adventure'                                 => array('pass','95'),
	'The Secret of Monkey Island'                           => array('monkey','95'),
	'Monkey Island 2: LeChuck\'s Revenge'                   => array('monkey2','95'),
	'Indiana Jones and the Fate of Atlantis'                => array('atlantis','95'),
	'Day of the Tentacle'                                   => array('tentacle','95'),
	'Sam &amp; Max Hit the Road'                            => array('samnmax','95'),
	'Full Throttle'                                         => array('ft','90'),
	'The Dig'                                               => array('dig','90'),
	'The Curse of Monkey Island'                            => array('comi','90'),
	);

$gamesHE = array(
	'Backyard Baseball'                                                => array('baseball','20'),
	'Backyard Football'                                                => array('football','80'),
	'Backyard Soccer'                                                  => array('soccer','20'),
	'Big Thinkers First Grade'                                         => array('thinker1','85'),
	'Big Thinkers Kindergarten'                                        => array('thinkerk','90'),
	'Blue\'s ABC Time'                                                 => array('BluesABCTime','50'),
	'Blue\'s Birthday Adventure'                                       => array('BluesBirthday','50'),
	'Fatty Bear\'s Birthday Surprise'                                  => array('fbear','93'),
	'Fatty Bear\'s Fun Pack'                                           => array('fbpack','95'),
	'Freddi Fish 1: The Case of the Missing Kelp Seeds'                => array('freddi','90'),
	'Freddi Fish 2: The Case of the Haunted Schoolhouse'               => array('freddi2','90'),
	'Freddi Fish 3: The Case of the Stolen Conch Shell'                => array('freddi3','90'),
	'Freddi Fish 4: The Case of the Hogfish Rustlers of Briny Gulch'   => array('freddi4','90'),
	'Freddi Fish and Luther\'s Maze Madness'                           => array('maze','90'),
	'Freddi Fish and Luther\'s Water Worries'                          => array('water','90'),
	'Let\'s Explore the Airport with Buzzy'                            => array('airport','90'),
	'Let\'s Explore the Farm with Buzzy'                               => array('farm','90'),
	'Let\'s Explore the Jungle with Buzzy'                             => array('jungle','90'),
	'Pajama Sam 1: No Need to Hide When It\'s Dark Outside'            => array('pajama','90'),
	'Pajama Sam 2: Thunder and Lightning Aren\'t so Frightening'       => array('pajama2','90'),
	'Pajama Sam 3: You Are What You Eat From Your Head to Your Feet'   => array('pajama3','90'),
	'Pajama Sam\'s Lost &amp; Found'                                   => array('lost','85'),
	'Pajama Sam\'s Sock Works'                                         => array('socks','90'),
	'Putt-Putt Enters the Race'                                        => array('puttrace','90'),
	'Putt-Putt Goes to the Moon'                                       => array('puttmoon','95'),
	'Putt-Putt Joins the Circus'                                       => array('puttcircus','90'),
	'Putt-Putt Joins the Parade'                                       => array('puttputt','95'),
	'Putt-Putt Saves the Zoo'                                          => array('puttzoo','90'),
	'Putt-Putt Travels Through Time'                                   => array('putttime','90'),
	'Putt-Putt and Pep\'s Balloon-O-Rama'                              => array('balloon','90'),
	'Putt-Putt and Pep\'s Dog on a Stick'                              => array('dog','90'),
	'Putt-Putt &amp; Fatty Bear\'s Activity Pack'                      => array('activity','95'),
	'Putt-Putt\'s Fun Pack'                                            => array('funpack','95'),
	'SPY Fox 1: Dry Cereal'                                            => array('spyfox','90'),
	'SPY Fox 2: Some Assembly Required'                                => array('spyfox2','90'),
	'SPY Fox 3: Operation Ozone'                                       => array('spyozon','70'),
	'SPY Fox in Cheese Chase'                                          => array('chase','90'),
	'SPY Fox in Hold the Mustard'                                      => array('mustard','85'),
	);

$gamesOther = array(
	'Beneath a Steel Sky'                                   => array('sky','98'),
	'Broken Sword 1: The Shadow of the Templars'            => array('sword1','98'),
	'Broken Sword 2: The Smoking Mirror'                    => array('sword2','98'),
	'Flight of the Amazon Queen'                            => array('queen','98'),
	'Gobliiins'                                             => array('gob1', '95'),
	'Inherit the Earth: Quest for the Orb'                  => array('ite', '87'),
	'Simon the Sorcerer 1'                                  => array('simon1','93'),
	'Simon the Sorcerer 2'                                  => array('simon2','95'),
	'The Feeble Files'                                      => array('feeble','90'),
	'The Legend of Kyrandia'                                => array('kyra1', '80'),
	);

$gamesCompanies = array(
	"LucasArts"                  => $gamesLucas,
	"Other"                      => $gamesOther,
	"Humongous Entertainment"    => $gamesHE,
	);

$notes = array(
"maniac"	=> "No known issues, game is completable.".
		   "<br>- Amiga, Atari ST, Commodore 64, Macintosh, NES and PC versions supported by this target".
		   "<br>- Major problems with Commodore 64 version",
		   "<br>- Minor graphical glitches in NES version",
"zak"		=> "No known issues, game is completable.".
		   "<br>- Amiga, Atari ST, Commodore 64, FM-TOWNS and PC versions supported by this target".
		   "<br>- Several sound effects buggy or missing in Amiga version".
		   "<br>- No music or sound effects in the Commodore 64 version".
		   "<br>- Kanji version requires the FM-TOWNS Font ROM",
"indy3" 	=> "Game is completable".
		   "<br>- Amiga, Atari ST, FM-TOWNS, Macintosh and PC versions supported by this target".
		   "<br>- There is no support for the Macintosh interface".
		   "<br>- Kanji version requires the FM-TOWNS Font ROM",
"loom"		=> "No known issues, game is completable.".
		   "<br>- Amiga, Atari ST, FM-TOWNS, Macintosh and PC versions supported by this target".
		   "<br>- The Roland update from LucasArts is required for MIDI support in the EGA version".
		   "<br>- No music or sound effects in the Macintosh version".
		   "<br>- There is no support for the Macintosh interface".
		   "<br>- Fades are seemingly different in the FM-TOWNS version".
		   "<br>- Text palette sometimes incorrect in the FM-TOWNS version".
		   "<br>- Distaff occasionally pink in the FM-TOWNS version".
		   "<br>- Use boot parameter to choose difficulty in the FM-TOWNS version:".
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
		   "<br>- Demo version often crashes due to missing resources, since it was never meant to be playable".
		   "<br>- No support for playing back the recorded file of gameplay in demo version".
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
"football"	=> "Game is completable, with minor glitches".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- Freezes when computer chooses a player, when selecting teams".
		   "<br>- Minor graphical glitches",
"soccer"	=> "Game isn't playable".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- PlayStation 1 version doesn't use SCUMM, so will never be supported.".
		   "<br>- Players on field are stuck in upper left corner and can't be controlled".
		   "<br>- Minor graphical glitches",
"thinker1"	=> "Game is playable, with minor glitches".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- Need to use ESC when car is stuck in the smart star challenge",
"thinkerk"	=> "No known issues, game is completable.".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"BluesABCTime" => "Game is playable".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"BluesBirthday" => "Game is playable".
		   "<br>- Only Windows version is supported by this target",
"fbear"		=> "Game should be completable, with several glitches".
		   "<br>- 3DO, DOS, Macintosh and Windows versions supported by this target".
		   "<br>- Piano sounds aren't the correct pitch in DOS version",
"fbpack"	=> "No known issues, game is completable.".
		   "<br>- Both 3DO and DOS versions supported by this target",
"activity"	=> "No known issues, game is completable.".
		   "<br>- DOS, Macintosh and Windows versions supported by this target",
"freddi"	=> "No known issues, game is completable.".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"freddi2"	=> "No known issues, game is completable.".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"freddi3"	=> "No known issues, game is completable.".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"freddi4"	=> "No known issues, game is completable.".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"maze"		=> "No known issues, game is completable.".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"water"		=> "No known issues, game is completable.".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"airport"	=> "No known issues, game is playable".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"farm"		=> "No known issues, game is playable".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"jungle"	=> "No known issues, game is playable".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"pajama"	=> "No known issues, game is completable".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"pajama2"	=> "No known issues, game is completable".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"pajama3"	=> "Game is completable, with minor glitches".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- PlayStation 1 version doesn't use SCUMM, so will never be supported.".
		   "<br>- Minor graphical glitches with dancing can in stomach",
"lost"		=> "Game is completable, with minor glitches".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- Minor graphical glitches",
"socks"		=> "No known issues, game is completable.".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"puttrace"	=> "Game is completable, with minor glitches".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- Minor graphical glitches",
"puttmoon"	=> "No known issues, game is completable.".
		   "<br>- 3DO, DOS, Macintosh and Windows versions supported by this target",
"puttcircus"	=> "No known issues, game is completable.".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"puttputt"	=> "No known issues, game is completable.".
		   "<br>- 3DO, DOS, Macintosh and Windows versions supported by this target",
"puttzoo"	=> "Game is completable".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- Minor graphical glitches when meeting Kenya in HE72 version",
"putttime"	=> "Game is completable".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- Minor graphical glitches when talking in HE80 version",
"balloon"	=> "No known issues, game is completable.".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"dog"		=> "No known issues, game is completable.".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"funpack"	=> "No known issues, game is completable.".
		   "<br>- Both 3DO and DOS versions supported by this target",
"spyfox"	=> "No known issues, game is completable.".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"spyfox2"	=> "No known issues, game is completable.".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"spyozon"	=> "Game is completable, with glitches".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- Need to guess the correct colors of Poodles's fingernails".
		   "<br>- Various palette glitches",
"chase"		=> "No known issues, game is completable.".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"mustard"	=> "Game is completable, with minor glitches".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- Minor graphical glitches with clouds",

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
		   "<br>- Amiga versions aren't supported.",
"gob1"		=> "No known issues. Game is completable.".
		   "<br>- Amiga, Atari, DOS and Macintosh versions are supported by this target".
		   "<br>- Problems with music in the Macintosh version",
"ite"		=> "Game is completable.".
		   "<br>- DOS, Linux, Macintosh, MacOS X and Windows versions are supported by this target".
		   "<br>- Amiga versions aren't supported".
		   "<br>- Occasional graphical glitches",
"simon1" 	=> "No known issues, game is completable.".
		   "<br>- Acorn (CD), DOS and Windows versions supported by this target",
"simon2"	=> "No known issues, game is completable.".
		   "<br>- Amiga, DOS, Macintosh and Windows versions supported by this target".
		   "<br>- Only the default language (English) in Amiga &amp; Macintosh versions is supported".
		   "<br>- F10 key animation is different in Amiga &amp; Macintosh versions",
"feeble"	=> "Game is completable".
		   "<br>- Amiga, Macintosh and Windows versions supported by this target".
		   "<br>- Minor graphical glitches",
"kyra1"		=> "Game is completable.".
		   "<br>- Requires the KYRA.DAT resource file to be placed in the game directory.".
		   "<br>- DOS Floppy and CD versions are supported by this target.".
		   "<br>- Amiga versions aren't supported.".
		   "<br>- FM-Towns version isn't supported.".
		   "<br>".
		   "<br>- Occasional graphics glitches.".
		   "<br>- MT-32 music and sfx do not work properly."
);
		
?>
