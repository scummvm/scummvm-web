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
html_page_header('ScummVM :: Compatibility - SVN');

html_content_begin('SVN Compatibility');

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
	  This page lists the progress of ScummVM as it relates to individual game compatibility.<br>
	  Click on the game name to view the complete notes of a game.

	  <br><br>Please note this list applies to the English versions of games, we attempt to test many versions of games, however there are occasionally problems with other languages.
	  This is the compatibility of the current WIP SVN version, <B>not of the
	  0.10.0 stable release</B> (Please see the  <a href="compatibility_stable.php">Stable Compatibility</A> chart for this version).
	  <br><br>
	  As this is the status of the Work In Progress version, occasional temporary bugs
	  may be introduced with new changes, thus this list refects the 'best case' scenario. 
	  It is highly recommended to use the latest stable release, where possible.
	  <br><br>
	  <small>Last Updated: <? echo date("F d, Y",getlastmod()); ?></small>
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
	'Bear Stormin\''                   			           => array('brstorm','95'),
	'Big Thinkers First Grade'                                         => array('thinker1','90'),
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

$gamesAGOS = array(
	'Elvira - Mistress of the Dark'                         => array('elvira1','90'),
	'Elvira II - The Jaws of Cerberus'                      => array('elvira2','50'),
	'Simon the Sorcerer 1'                                  => array('simon1','95'),
	'Simon the Sorcerer 2'                                  => array('simon2','95'),
	'Simon the Sorcerer\'s Puzzle Pack - D.I.M.P.'          => array('dimp','70'),
	'Simon the Sorcerer\'s Puzzle Pack - Jumble'            => array('jumble','70'),
	'Simon the Sorcerer\'s Puzzle Pack - NoPatience'        => array('puzzle','70'),
	'Simon the Sorcerer\'s Puzzle Pack - Swampy Adventures' => array('swampy','70'),
	'The Feeble Files'                                      => array('feeble','95'),
	);

$gamesGOB = array(
	'Bargon Attack'                                         => array('bargon','95'),
	'Gobliiins'                                             => array('gob1', '95'),
	'Gobliins 2'                                            => array('gob2', '95'),
	'Goblins 3'                                             => array('gob3', '90'),
	'Ween: The Prophecy'                                    => array('ween','95'),
	);

$gamesOther = array(
	'Beneath a Steel Sky'                                   => array('sky','98'),
	'Broken Sword 1: The Shadow of the Templars'            => array('sword1','98'),
	'Broken Sword 2: The Smoking Mirror'                    => array('sword2','98'),
	'Flight of the Amazon Queen'                            => array('queen','98'),
	'Future Wars'                                           => array('fw','80'),
	'I Have No Mouth, and I Must Scream'                    => array('ihnm', '80'),
	'Inherit the Earth: Quest for the Orb'                  => array('ite', '95'),
	'Nippon Safes Inc.'                                     => array('nippon', '70'),
	'The Legend of Kyrandia'                                => array('kyra1', '80'),
	'Touche: The Adventures of the Fifth Musketeer'         => array('touche','75'),
	);

$gamesAGI = array(

	'The Black Cauldron'                                         => array('bc','90'),
	'Gold Rush!'                                                 => array('goldrush','90'),
	'King\'s Quest I'                                            => array('kq1','90'),
	'King\'s Quest II'                                           => array('kq2','90'),
	'King\'s Quest III'                                          => array('kq3','90'),
	'King\'s Quest IV'                                           => array('kq4','90'),
	'Leisure Suit Larry in the Land of the Lounge Lizards'       => array('lsl1','90'),
	'Mixed-Up Mother Goose'                                      => array('mixedup', '90'),
	'Manhunter 1: New York'                                      => array('mh1', '90'),
	'Manhunter 2: San Francisco'                                 => array('mh2', '90'),
	'Police Quest I: In Pursuit of the Death Angel'              => array('pq1', '90'),
	'Space Quest I: The Sarien Encounter' 			     => array('sq1', '90'),
	'Space Quest II: Vohaul\'s Revenge'                          => array('sq2', '90'),
	'Fanmade Games' 		                             => array('agi-fanmade', '80'),
	'Troll\'s Tale'                                              => array('troll', '80'),
	);

$notes = array(
"maniac"	=> "No known issues, game is completable.".
		   "<br>- Amiga, Apple II, Atari ST, Commodore 64, Macintosh, NES and PC versions supported by this target".
		   "<br>- Apple II and Commodore 64 versions aren't completable".
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
		   "<br>- Dialogue choices in the SegaCD version can be selected with mousewheel or keyboard arrow keys",

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
"thinker1"	=> "No known issues, game is completable.".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"thinkerk"	=> "No known issues, game is completable.".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"BluesABCTime" => "Game is playable".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"BluesBirthday" => "Game is playable".
		   "<br>- Both Macintosh and Windows versions supported by this target",
"brstorm"	=> "Game is playable",
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
"pajama3"	=> "No known issues, game is completable".
		   "<br>- Both Macintosh and Windows versions supported by this target".
		   "<br>- PlayStation 1 version doesn't use SCUMM, so will never be supported.",
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
"putttime"	=> "No known issues, game is completable.".
		   "<br>- Both Macintosh and Windows versions supported by this target",
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
		   "<br>- Only the Windows version is supported by this target".
		   "<br>- The Macintosh version isn't supported, due to map data using a custom format",

"sky"	 	=> "No known issues, game is completable.".
		   "<br>- Requires the <a href=\"https://svn.sourceforge.net/svnroot/scummvm/engine-data/trunk/sky.cpt\">sky.cpt</a> resource file to be placed in the game directory".
		   "<br>- Floppy demos aren't supported".
		   "<br>- Amiga versions aren't supported".
		   "<br>".
		   "<br>The following bugs are present in the original game and can't be fixed:".
		   "<br>- The voice files for some sentences are missing.".
		   "<br>&nbsp;&nbsp;&nbsp;&nbsp;This is especially noticeable in the court- and Mrs. Piermont sequence.".
		   "<br>- The fonts for the LINC terminal are partially incorrect and the text sometimes passes the screen borders".
		   "<br>- Special characters for french and italian subtitles are incorrect sometimes",
"sword1"	=> "No known issues, game is completable.".
		   "<br>- DOS and Macintosh versions are supported by this target".
		   "<br>- PlayStation 1 version isn't supported.",
"sword2"	=> "No known issues, game is completable.".
		   "<br>- PlayStation 1 version isn't supported.",
"elvira1"	=> "No known issues, game is completable.".
		   "<br>- Amiga and Atari ST and DOS versions are supported by this target".
		   "<br>- Commodore 64 version doesn't use AGOS, so will never be supported.".
		   "<br>- No music in the Atari ST version.".
		   "<br>- No text descriptions in the Atari ST version.",
"elvira2"	=> "No known issues, game is playable.".
		   "<br>- Amiga and Atari ST and DOS versions are supported by this target".
		   "<br>- Commodore 64 version doesn't use AGOS, so will never be supported.".
		   "<br>- No music in the Atari ST version.".
		   "<br>- No sound effects in the DOS version.".
		   "<br>- Palette issues in the Atari ST version.",
"queen"		=> "No known issues, game is completable.".
		   "<br>- Some versions may require the <a href=\"https://scummvm.svn.sourceforge.net/svnroot/scummvm/engine-data/trunk/queen.tbl\">queen.tbl</a> resource file to be placed in the game directory. This is not required for the freeware releases.".
		   "<br>- Amiga and DOS versions supported by this target.",
"gob1"		=> "No known issues. Game is completable.".
		   "<br>- Amiga, Atari, DOS and Macintosh versions are supported by this target".
		   "<br>- Problem with one music piece in the Macintosh version",
"gob2"		=> "Game is completable".
		   "<br>- Amiga, Atari, DOS and Macintosh versions are supported by this target".
		   "<br>- A few wrong instruments during music playback",
"gob3"		=> "Game is completable".
		   "<br>- Amiga, Atari, DOS and Macintosh versions are supported by this target".
		   "<br>- Issues with the mouse cursor visibility".
		   "<br>- No support for original font and music files in Macintosh version".
		   "<br>- The number of used jokers isn't saved correctly. You'll always have 5 to spend again after loading",
"ihnm"		=> "Game is completable.".
		   "<br>- Occasional minor glitches",
"ite"		=> "No known issues, game is completable.".
		   "<br>- DOS, Linux, Macintosh, MacOS X and Windows versions are supported by this target".
		   "<br>- Amiga versions aren't supported",
"simon1" 	=> "No known issues, game is completable.".
		   "<br>- Acorn, Amiga, DOS and Windows versions supported by this target".
		   "<br>- Minor palette glitches in Amiga versions".
		   "<br>- No music in Acorn disk version",
"simon2"	=> "No known issues, game is completable.".
		   "<br>- Amiga, DOS, Macintosh and Windows versions supported by this target".
		   "<br>- Only the default language (English) in Amiga &amp; Macintosh versions is supported".
		   "<br>- F10 key animation is different in Amiga &amp; Macintosh versions",
"dimp" 		=> "Game is completable".
		   "<br>- Demon takes longer to die, compared to original",
"jumble" 	=> "Game is completable".
		   "<br>- No support for displaying, entering, loading and saving high scores",
"puzzle" 	=> "Game is completable".
		   "<br>- No support for displaying, entering, loading and saving high scores",
"swampy" 	=> "Game is completable".
		   "<br>- No support for displaying explanation, when clicking on items".
		   "<br>- No support for displaying, entering, loading and saving high scores",
"feeble"	=> "No known issues, game is completable.".
		   "<br>- Amiga, Macintosh and Windows versions supported by this target",
"kyra1"		=> "Game is completable".
		   "<br>- Requires the <a href=\"https://svn.sourceforge.net/svnroot/scummvm/engine-data/trunk/kyra.dat\">kyra.dat</a> resource file to be placed in the game directory".
		   "<br>- DOS, FM-TOWNS, Macintosh and PC-9821 versions are supported".
		   "<br>- Amiga versions aren't supported".
		   "<br>".
		   "<br>- Occasional graphics glitches".
		   "<br>- MT-32 music and sfx do not work properly".
		   "<br>- No music or sound effects in the Macintosh version".
		   "<br>- PC-9821 version lacks support for PC-98 music and sound effects",
"fw"		=> "Game is completable".
		   "<br>- Occasional graphical glitches".
		   "<br>- DOS, Amiga and Atari versions are supported",
"touche"	=> "Game is completable".
		   "<br>- Occasional graphical glitches",
"ween"  	=> "Game is completable".
		   "<br>- Amiga, Atari and DOS versions are supported by this target".
		   "<br>- Issues with the mouse cursor visibility",
"bargon"  	=> "Game is completable".
		   "<br>- Amiga, Atari and DOS versions are supported by this target".
		   "<br>- Issues with the mouse cursor visibility",
"nippon"  	=> "Game is completable".
		   "<br>- Only DOS version is supported by this target".
		   "<br>- Occasional minor graphical glitches",
"bc"		=> "Game is completable".
		   "<br>- DOS, Amiga, Atari ST, Apple IIgs versions are supported by this target".
		   "<br>- Apple IIgs version has no sound",
"goldrush"	=> "Game is completable".
		   "<br>- DOS, Amiga, Atari ST, Apple IIgs versions are supported by this target".
		   "<br>- Apple IIgs version has no sound",
"kq1"		=> "Game is completable".
		   "<br>- DOS, Mac, Amiga, Atari ST, Apple IIgs versions are supported by this target".
		   "<br>- Apple IIgs version has no sound",
"kq2"		=> "Game is completable".
		   "<br>- DOS, Mac, Amiga, Atari ST, Apple IIgs versions are supported by this target".
		   "<br>- Apple IIgs version has no sound",
"kq3"		=> "Game is completable".
		   "<br>- DOS, Mac, Amiga, Atari ST, Apple IIgs versions are supported by this target".
		   "<br>- Apple IIgs version has no sound",
"kq4"		=> "Game is completable".
		   "<br>- DOS, Apple IIgs versions are supported by this target".
		   "<br>- Apple IIgs version has no sound",
"lsl1"		=> "Game is completable".
		   "<br>- DOS, Mac, Amiga, Atari ST, Apple IIgs versions are supported by this target".
		   "<br>- Apple IIgs version has no sound",
"mixedup"	=> "Game is completable".
		   "<br>- DOS, Amiga, Apple IIgs versions are supported by this target".
		   "<br>- Apple IIgs version has no sound",
"mh1"		=> "Game is completable".
		   "<br>- DOS, Amiga, Atari ST, Apple IIgs versions are supported by this target".
		   "<br>- Apple IIgs version has no sound",
"mh2"		=> "Game is completable".
		   "<br>- DOS, Amiga, Atari ST versions are supported by this target",
"pq1"		=> "Game is completable".
		   "<br>- DOS, Mac, Amiga, Apple IIgs versions are supported by this target".
		   "<br>- Apple IIgs version has no sound",
"sq1"		=> "Game is completable".
		   "<br>- DOS, Mac, Amiga, Atari ST, Apple IIgs versions are supported by this target".
		   "<br>- Apple IIgs version has no sound",
"sq2"		=> "Game is completable".
		   "<br>- DOS, Mac, Amiga, Apple IIgs versions are supported by this target".
		   "<br>- Apple IIgs version has no sound",
"agi-fanmade"   => "Most games are completable".
		   "<br>- AGIMOUSE, AGIPAL, AGI256 and AGI256-2 hacks are also supported by this target".
		   "<br>- Occasional graphics glitches",
"troll"		=> "Game is completable".
		   "<br>- Only DOS booter version is supported by this target".
		   "<br>- Game lacks sound"
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

	$arrayt = array_merge($gamesLucas, $gamesHE, $gamesAGOS, $gamesGOB, $gamesAGI, $gamesOther);
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

	displayGameList("Adventuresoft/Horrorsoft", $gamesAGOS);

	echo html_frame_end("&nbsp;");
	echo html_p();

	displayGameList("Coktel Vision", $gamesGOB);

	echo html_frame_end("&nbsp;");
	echo html_p();

	displayGameList("Sierra AGI", $gamesAGI);

	echo html_frame_end("&nbsp;");
	echo html_p();

	displayGameList("Other", $gamesOther);

	echo html_frame_end("&nbsp;");
	echo html_p();

	displayGameList("Humongous Entertainment", $gamesHE);
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
