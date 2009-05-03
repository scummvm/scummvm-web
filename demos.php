<?php

/*
 * Links to Demo downloads
 *
 */

// set this for position of this file relative
$file_root = ".";

// load libraries
require($file_root."/include/"."incl.php");

// start of html
html_page_header('ScummVM :: Game Demos');

html_content_begin('Game Demos');

?>
<div class="par-item">
  <div class="par-intro">
  <br>
       <table border=0>
	  <tr><td width="35%">

    <div class="navigation">
       Navigation

       <div class="nav-dots">
	  &nbsp;
       </div>

<table border=0>

<?php
  html_nav_item("#lec", "LucasArts Demos");
  html_nav_item("#he", "Humongous Entertainment Demos");
  html_nav_item("#agos", "Adventuresoft/Horrorsoft Demos");
  html_nav_item("#gob", "Coktel Vision Demos");
  html_nav_item("#sierra", "Sierra Demos");
  html_nav_item("#other", "Miscellaneous Demos");
?>

</table>
    </div>
</td>
<td>
  This page lists links to demos of various games, please contact us if you have a copy of any demo not listed here,<br><br>
  Beneath A Steel Sky floppy demos aren't going to be supported for technical reasons.<br><br>
</td></tr>
</table>

  <br>

</div>

  <br>
  <br>

  <div class="par-content">

<?php

$LEC_demos = array(
	'Day of the Tentacle (DOS demo - Non interactive)'
		=> array('http://demos.robertmegone.com/scumm/dott-dos-ni-demo-en.zip', 'tentacle'),
	'Day of the Tentacle (DOS French demo - Non interactive)'
		=> array('http://demos.robertmegone.com/scumm/dott-dos-ni-demo-fr.zip', 'tentacle'),
	'Day of the Tentacle (Macintosh demo - Non interactive)'
		=> array('http://demos.robertmegone.com/scumm/dott-mac-ni-demo-en.zip', 'tentacle'),
	'Full Throttle (DOS demo)'
		=> array('http://demos.robertmegone.com/scumm/ft-dos-demo-en.zip', 'ft'),
	'Full Throttle (Macintosh demo)'
		=> array('http://demos.robertmegone.com/scumm/ft-mac-demo-en.zip', 'ft'),
	'Indiana Jones and the Fate of Atlantis (DOS demo - Interactive)'
		=> array('http://demos.robertmegone.com/scumm/atlantis-dos-demo1-en.zip', 'atlantis'),
	'Indiana Jones and the Fate of Atlantis (DOS Alternative demo - Interactive)'
		=> array('http://demos.robertmegone.com/scumm/atlantis-dos-demo2-en.zip', 'atlantis'),
	'Indiana Jones and the Fate of Atlantis (DOS demo - Non interactive)'
		=> array('http://demos.robertmegone.com/scumm/atlantis-dos-ni-demo-en.zip', 'atlantis'),
	'Indiana Jones and the Fate of Atlantis (FM Towns demo - Non interactive)'
		=> array('http://demos.robertmegone.com/scumm/atlantis-fmtowns-ni-demo-jp.zip', 'atlantis'),
	'Indiana Jones and the Last Crusade (DOS EGA - Non interactive)'	
		=> array('http://demos.robertmegone.com/scumm/indy3-ega-ni-demo-en.zip', 'indy3'),
	'Indiana Jones and the Last Crusade & Loom (FM Towns demo - Non interactive)'
		=> array('http://demos.robertmegone.com/scumm/zak-fmtowns-indyloom-ni-demo.zip', 'zak'),
	'Indiana Jones and the Last Crusade & Zak McKracken (FM Towns demo - Non interactive)'
		=>array('http://demos.robertmegone.com/scumm/zak-fmtowns-indyzak-ni-demo.zip', 'zak'),
	'Loom (DOS EGA - Short Non interactive)'
		=> array('http://demos.robertmegone.com/scumm/loom-dos-short-demo-en.zip', 'loom'),
	'Loom (DOS EGA - Long Non interactive)'
		=> array('http://demos.robertmegone.com/scumm/loom-dos-long-demo-en.zip', 'loom'),
	'Maniac Mansion (v1 DOS demo - Non interactive)'
		=> array('http://demos.robertmegone.com/scumm/maniac-dos-v1-ni-demo-en.zip', 'maniac'),
	'Maniac Mansion (v2 DOS demo - Non interactive)'
		=> array('http://demos.robertmegone.com/scumm/maniac-dos-v2-ni-demo-en.zip', 'maniac'),
	'Monkey Island 2 (DOS demo - not supported by ScummVM)'
		=> array('http://demos.robertmegone.com/scumm/monkey2-dos-ni-demo-en.zip', 'monkey2'),
	'Passport to Adventure (DOS EGA demos of Indiana Jones and the Last Crusade, The Secret of Monkey Island, Loom)'
		=> array('http://demos.robertmegone.com/scumm/pass-dos-en.zip', 'pass'),
	'Sam &amp; Max Hit the Road (DOS demo - Interactive)'
		=> array('http://demos.robertmegone.com/scumm/samnmax-dos-demo-en.zip', 'samnmax'),
	'Sam &amp; Max Hit the Road (DOS demo - Non interactive)'
		=> array('http://demos.robertmegone.com/scumm/samnmax-dos-ni-demo-en.zip', 'samnmax'),
	'Sam &amp; Max Hit the Road (DOS German demo - Interactive)'
		=> array('http://demos.robertmegone.com/scumm/samnmax-dos-demo-de.zip', 'samnmax'),
	'Sam &amp; Max Hit the Road (DOS WIP demo - Interactive)'
		=> array('http://demos.robertmegone.com/scumm/samnmax-dos-wip-demo-en.zip', 'samnmax'),
	'Sam &amp; Max Hit the Road (DOS CD demo - Interactive)'
		=> array('http://demos.robertmegone.com/scumm/samnmax-dos-cd-demo-en.zip', 'samnmax'),
	'Sam &amp; Max Hit the Road (Macintosh demo - Interactive)'
		=> array('http://demos.robertmegone.com/scumm/samnmax-mac-demo-en.zip', 'samnmax'),
	'The Curse of Monkey Island (Windows small demo)'
		=> array('http://demos.robertmegone.com/scumm/comi-win-small-demo-en.zip', 'comi'),
	'The Curse of Monkey Island (Windows large demo)'
		=> array('http://demos.robertmegone.com/scumm/comi-win-large-demo-en.zip', 'comi'),
	'The Dig (Macintosh demo)'
		=> array('http://demos.robertmegone.com/scumm/dig-mac-demo-en.zip', 'dig'),
	'The Dig (DOS demo)'
		=> array('http://demos.robertmegone.com/scumm/dig-dos-demo-en.zip', 'dig'),
	'The Secret of Monkey Island (Amiga demo)'	
		=> array('http://demos.robertmegone.com/scumm/monkey1-amiga-demo-en.zip', 'monkey'),
	'The Secret of Monkey Island (DOS EGA demo)'	
		=> array('http://demos.robertmegone.com/scumm/monkey1-dos-ega-demo-en.zip', 'monkey'),
	'The Secret of Monkey Island (DOS EGA German demo)'	
		=> array('http://demos.robertmegone.com/scumm/monkey1-dos-ega-demo-de.zip', 'monkey'),
	'Zak McKracken and the Alien Mindbenders (Atari ST demo - Non interactive)'
		=> array('http://demos.robertmegone.com/scumm/zak-atari-ni-demo.zip', 'zak'),
	'Zak McKracken & Loom (FM Towns demo - Non interactive)'
		=>array('http://demos.robertmegone.com/scumm/zak-fmtowns-zakloom-ni-demo.zip', 'zak')
	);

$HE_demos = array(
	'Backyard Baseball (Windows Preview)'
		=> array('http://demos.robertmegone.com/scumm/he/baseball-win-preview1-us.zip', 'baseball'),
	'Backyard Baseball (Windows Alternative Preview)'
		=> array('http://demos.robertmegone.com/scumm/he/baseball-win-preview2-us.zip', 'baseball'),
	'Backyard Baseball 2001 (Windows Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/baseball2001-win-demo-us.zip', 'baseball2001'),
	'Backyard Football (Windows Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/football-win-demo-us.zip', 'football'),
	'Big Thinkers Kindergarten (Windows Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/thinker1-win-demo-us.zip', 'thinkerk'),
	'Big Thinkers First Grade (Windows Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/thinkerk-win-demo-us.zip', 'thinker1'),
	'Blue\'s ABC Time (Windows Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/BluesABCTime-win-demo1-us.zip', 'BluesABCTime'),
	'Blue\'s ABC Time (Windows Alternative Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/BluesABCTime-win-demo2-us.zip', 'BluesABCTime'),
	'Blue\'s ABC Time (Windows Preview)'
		=> array('http://demos.robertmegone.com/scumm/he/BluesABCTime-win-preview-us.zip', 'BluesABCTime'),
	'Blue\'s Birthday Adventure (Windows Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/BluesBirthday-win-demo1-us.zip', 'BluesBirthday'),
	'Blue\'s Birthday Adventure (Windows Alternative Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/BluesBirthday-win-demo2-us.zip', 'BluesBirthday'),
	'Blue\'s Birthday Adventure (Windows Preview)'
		=> array('http://demos.robertmegone.com/scumm/he/BluesBirthday-win-preview-us.zip', 'BluesBirthday'),
	'Fatty Bear\'s Birthday Surprise (DOS demo)'
		=> array('http://demos.robertmegone.com/scumm/he/fbear-dos-demo-us.zip', 'fbear'),
	'Fatty Bear\'s Birthday Surprise (Windows demo)'
		=> array('http://demos.robertmegone.com/scumm/he/fbear-win-demo-us.zip', 'fbear'),
	'Freddi Fish 1: The Case of the Missing Kelp Seeds (Macintosh Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/freddi-mac-demo_us.zip', 'freddi'),
	'Freddi Fish 1: The Case of the Missing Kelp Seeds (Windows Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/freddi-win-demo-us.zip', 'freddi'),
	'Freddi Fish 1: The Case of the Missing Kelp Seeds (Windows Updated Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/freddi-win-updated-demo-us.zip', 'freddi'),
	'Freddi Fish 1: The Case of the Missing Kelp Seeds (Windows French Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/freddi-win-demo-fr.zip', 'freddi'),
	'Freddi Fish 1: The Case of the Missing Kelp Seeds (Windows German demo)'
		=> array('http://demos.robertmegone.com/scumm/he/freddi-win-demo-de.zip', 'freddi'),
	'Freddi Fish 2: The Case of the Haunted Schoolhouse (Windows Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/freddi2-win-demo-us.zip', 'freddi2'),
	'Freddi Fish 2: The Case of the Haunted Schoolhouse (Windows Updated Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/freddi2-win-updated-demo-us.zip', 'freddi2'),
	'Freddi Fish 3: The Case of the Stolen Conch Shell (Windows Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/freddi3-win-demo-us.zip', 'freddi3'),
	'Freddi Fish 3: The Case of the Stolen Conch Shell (Windows French Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/freddi3-win-demo-fr.zip', 'freddi3'),
	'Freddi Fish 4: The Case of the Hogfish Rustlers of Briny Gulch (Windows Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/freddi4-win-demo-us.zip', 'freddi4'),
	'Freddi Fish 4: The Case of the Hogfish Rustlers of Briny Gulch (Windows Updated Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/freddi4-win-updated-demo-us.zip', 'freddi4'),
	'Freddi Fish 4: The Case of the Hogfish Rustlers of Briny Gulch (Windows Dutch Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/freddi4-win-demo-nl.zip', 'freddi4'),
	'Freddi Fish 4: The Case of the Hogfish Rustlers of Briny Gulch (Windows German Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/freddi4-win-demo-de.zip', 'freddi4'),
	'Freddi Fish 4: The Case of the Hogfish Rustlers of Briny Gulch (Windows UK Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/freddi4-win-demo-uk.zip', 'freddi4'),
	'Humongous Catalog demo (Windows Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/catalog-win-demo-en.zip', 'catalog'),
	'Humongous Catalog demo (Windows German Preview)'
		=> array('http://demos.robertmegone.com/scumm/he/catalog-win-preview-de.zip', 'catalog'),
	'Let\'s Explore the Airport with Buzzy (Macintosh Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/airport-mac-demo-us.zip', 'airport'),
	'Let\'s Explore the Airport with Buzzy (Windows Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/airport-win-demo-us.zip', 'airport'),
	'Let\'s Explore the Airport with Buzzy (Windows Updated Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/airport-win-updated-demo1-us.zip', 'airport'),
	'Let\'s Explore the Airport with Buzzy (Windows Updated Alternative Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/airport-win-updated-demo2-us.zip', 'airport'),
	'Let\'s Explore the Farm with Buzzy (Windows Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/farm-win-demo-us.zip', 'farm'),
	'Pajama Sam 1: No Need to Hide When It\'s Dark Outside (Windows Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/pajama-win-demo-us.zip', 'pajama'),
	'Pajama Sam 1: No Need to Hide When It\'s Dark Outside (Windows Updated Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/pajama-win-updated-demo-us.zip', 'pajama'),
	'Pajama Sam 1: No Need to Hide When It\'s Dark Outside (Windows Dutch Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/pajama2-win-demo-nl.zip', 'pajama'),
	'Pajama Sam 1: No Need to Hide When It\'s Dark Outside (Windows French Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/pajama-win-demo-fr.zip', 'pajama'),
	'Pajama Sam 2: Thunder and Lightning Aren\'t so Frightening (Windows Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/pajama2-win-demo-us.zip', 'pajama2'),
	'Pajama Sam 2: Thunder and Lightning Aren\'t so Frightening (Windows Dutch Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/pajama2-win-demo-nl.zip', 'pajama2'),
	'Pajama Sam 3: You Are What You Eat From Your Head to Your Feet (Windows Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/pajama3-win-demo-us.zip', 'pajama3'),
	'Pajama Sam 3: You Are What You Eat From Your Head to Your Feet (Windows Dutch Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/pajama3-win-demo-nl.zip', 'pajama3'),
	'Pajama Sam 3: You Are What You Eat From Your Head to Your Feet (Windows German Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/pajama3-win-demo-de.zip', 'pajama3'),
	'Pajama Sam 3: You Are What You Eat From Your Head to Your Feet (Windows UK Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/pajama3-win-demo-uk.zip', 'pajama3'),
	'Pajama Sam\'s Lost & Found (Windows Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/lost-win-demo-us.zip', 'lost'),
	'Putt-Putt Enters the Race (Windows Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/puttrace-win-demo-us.zip', 'puttrace'),
	'Putt-Putt Enters the Race (Windows Preview)'
		=> array('http://demos.robertmegone.com/scumm/he/puttrace-win-preview-us.zip', 'puttrace'),
	'Putt-Putt Enters the Race (Windows Dutch Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/puttrace-win-demo-nl.zip', 'puttrace'),
	'Putt-Putt Enters the Race (Windows Updated Dutch Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/puttrace-win-updated-demo-nl.zip', 'puttrace'),
	'Putt-Putt Enters the Race (Windows German Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/puttrace-win-demo-de.zip', 'puttrace'),
	'Putt-Putt Enters the Race (Windows UK Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/puttrace-win-demo-uk.zip', 'puttrace'),
	'Putt-Putt Goes to the Moon (DOS demo)'
		=> array('http://demos.robertmegone.com/scumm/he/puttmoon-dos-demo-us.zip', 'puttmoon'),
	'Putt-Putt Goes to the Moon (Window demo)'
		=> array('http://demos.robertmegone.com/scumm/he/puttmoon-win-demo-us.zip', 'puttmoon'),
	'Putt-Putt Joins the Circus (Windows Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/puttcircus-win-demo-us.zip', 'puttcircus'),
	'Putt-Putt Joins the Parade (DOS demo)'
		=> array('http://demos.robertmegone.com/scumm/he/puttputt-dos-demo-us.zip', 'puttputt'),
	'Putt-Putt Joins the Parade (Windows demo)'
		=> array('http://demos.robertmegone.com/scumm/he/puttputt-win-demo-us.zip', 'puttputt'),
	'Putt-Putt Saves the Zoo (Macintosh Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/puttzoo-mac-demo-us.zip', 'puttzoo'),
	'Putt-Putt Saves the Zoo (Windows Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/puttzoo-win-demo-us.zip', 'puttzoo'),
	'Putt-Putt Saves the Zoo (Windows Updated Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/puttzoo-win-updated-demo-us.zip', 'puttzoo'),
	'Putt-Putt Saves the Zoo (Windows German Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/puttzoo-win-demo-de.zip', 'puttzoo'),
	'Putt-Putt Travels Through Time (Windows Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/putttime-win-demo-us.zip', 'putttime'),
	'Putt-Putt Travels Through Time (Windows Updated Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/putttime-win-updated-demo-us.zip', 'putttime'),
	'Putt-Putt Travels Through Time (Windows French Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/putttime-win-demo-fr.zip', 'putttime'),
	'SPY Fox 1: Dry Cereal (Windows Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/spyfox-win-demo1-us.zip', 'spyfox'),
	'SPY Fox 1: Dry Cereal (Windows Alternative Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/spyfox-win-demo2-us.zip', 'spyfox'),
	'SPY Fox 1: Dry Cereal (Windows Updated Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/spyfox-win-updated-demo-us.zip', 'spyfox'),
	'SPY Fox 1: Dry Cereal (Windows Dutch Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/spyfox-win-demo-nl.zip', 'spyfox'),
	'SPY Fox 1: Dry Cereal (Windows French Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/spyfox-win-demo-fr.zip', 'spyfox'),
	'SPY Fox 2: Some Assembly Required (Windows Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/spyfox2-win-demo-us.zip', 'spyfox2'),
	'SPY Fox 2: Some Assembly Required (Windows Preview)'
		=> array('http://demos.robertmegone.com/scumm/he/spyfox2-win-preview-us.zip', 'spyfox2'),
	'SPY Fox 2: Some Assembly Required (Windows Dutch Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/spyfox2-win-demo-nl.zip', 'spyfox2'),
	'SPY Fox 2: Some Assembly Required (Windows German Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/spyfox2-win-demo-de.zip', 'spyfox2'),
	'SPY Fox 2: Some Assembly Required (Windows UK Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/spyfox2-win-demo-uk.zip', 'spyfox2'),
	'SPY Fox 3: Operation Ozone (Windows Demo)'
		=> array('http://demos.robertmegone.com/scumm/he/spyozon-win-demo-us.zip', 'spyozon'),
	'SPY Fox 3: Operation Ozone (Windows Preview)'
		=> array('http://demos.robertmegone.com/scumm/he/spyozon-win-preview-us.zip', 'spyozon')
	);

$AGOS_demos = array(
	'Elvira - Mistress of Darkness (Amiga demo - Non interactive)'
		=> array('http://demos.robertmegone.com/agos/elvira1-amiga-ni-demo-en.zip', 'elvira1'),
	'Elvira - Mistress of Darkness (Atari ST demo - Non interactive)'
		=> array('http://demos.robertmegone.com/agos/elvira1-atari-ni-demo-en.zip', 'elvira1'),
	'Elvira - Mistress of Darkness (DOS demo - Non interactive)'
		=> array('http://demos.robertmegone.com/agos/elvira1-dos-ni-demo-en.zip', 'elvira1'),
	'Personal Nightmare (Atari ST demo - Non-interactive) - Requires ScummVM 0.14.0svn'
		=> array('http://demos.robertmegone.com/agos/pn-atari-ni-demo-en.zip', 'pn'),
	'Simon the Sorcerer 1 (Amiga demo)'
		=> array('http://demos.robertmegone.com/agos/simon1-amiga-floppy-demo-en.zip', 'simon1'),
	'Simon the Sorcerer 1 (DOS demo)'
		=> array('http://demos.robertmegone.com/agos/simon1-dos-floppy-demo-en.zip', 'simon1'),
	'Simon the Sorcerer 1 (Acorn CD demo)'
		=> array('http://demos.robertmegone.com/agos/simon1-acorn-cd-demo-en.zip', 'simon1'),
	'Simon the Sorcerer 2 (DOS CD demo)'
		=> array('http://demos.robertmegone.com/agos/simon2-dos-cd-demo-en.zip', 'simon2'),
	'Simon the Sorcerer 2 (DOS CD German demo)'
		=> array('http://demos.robertmegone.com/agos/simon2-dos-cd-demo-de.zip', 'simon2'),
	'Simon the Sorcerer 2 (DOS CD German demo - Non interactive) - Requires ScummVM 0.14.0svn'
		=> array('http://demos.robertmegone.com/agos/simon2-dos-cd-ni-demo-de.zip', 'simon2'),
	'Waxworks (DOS demo - Non interactive)'
		=> array('http://demos.robertmegone.com/agos/waxworks-dos-ni-demo-en.zip', 'waxworks')
	);

$GOB_demos = array(
	'Gobliiins (Amiga demo)'
		=> array('http://demos.robertmegone.com/gob/gob1-amiga_demo_en.zip', 'gob'),
	'Gobliiins (DOS demo)'
		=> array('http://demos.robertmegone.com/gob/gob1-dos-demo1-en.zip', 'gob'),
	'Gobliiins (DOS Alternative demo)'
		=> array('http://demos.robertmegone.com/gob/gob1-dos-demo2-en.zip', 'gob'),
	'Gobliins 2 (Amiga demo)'
		=> array('http://demos.robertmegone.com/gob/gob2-amiga-demo-en.zip', 'gob'),
	'Gobliins 2 (DOS demo)'
		=> array('http://demos.robertmegone.com/gob/gob2-dos-demo-en.zip', 'gob'),
	'Gobliins 2 (DOS demo - Non interactive)'
		=> array('http://demos.robertmegone.com/gob/gob2-dos-ni-demo-en.zip', 'gob'),
	'Goblins Quest 3 (DOS demo)'
		=> array('http://demos.robertmegone.com/gob/gob3-dos-demo-en.zip', 'gob'),
	'Goblins Quest 3 (DOS demo - Non interactive)'
		=> array('http://demos.robertmegone.com/gob/gob3-dos-ni-demo-en.zip', 'gob'),
	'Goblins Quest 3 (DOS French demo)'
		=> array('http://demos.robertmegone.com/gob/gob3-dos-demo1-fr.zip', 'gob'),
	'Goblins Quest 3 (DOS French Alternative demo)'
		=> array('http://demos.robertmegone.com/gob/gob3-dos-demo2-fr.zip', 'gob'),
	'Inca II: Wiracocha (DOS demo - Non-interactive) - Requires ScummVM 0.14.0svn'
		=> array('http://demos.robertmegone.com/gob/inca2-dos-ni-demo-en.zip', 'gob'),
	'Lost in Time (DOS demo - Non interactive)'
		=> array('http://demos.robertmegone.com/gob/lostintime-dos-ni-demo-en.zip', 'gob'),
	'Playtoon 1 - Uncle Archibald (DOS demo - Non-interactive) - Requires ScummVM 0.14.0svn'
		=> array('http://demos.robertmegone.com/gob/archibald-dos-ni-demo1-en.zip', 'gob'),
	'Playtoon 1 - Uncle Archibald (DOS demo - Alternative Non-interactive) - Requires ScummVM 0.14.0svn'
		=> array('http://demos.robertmegone.com/gob/archibald-dos-ni-demo2-en.zip', 'gob'),
	'Playtoon 1 - Uncle Archibald (DOS Italian demo - Non-interactive) - Requires ScummVM 0.14.0svn'
		=> array('http://demos.robertmegone.com/gob/archibald-dos-ni-demo-it.zip', 'gob'),
	'Playtoon 1 - Uncle Archibald (DOS Spanish demo - Non-interactive) - Requires ScummVM 0.14.0svn'
		=> array('http://demos.robertmegone.com/gob/archibald-dos-ni-demo-sp.zip', 'gob'),
	'The Bizarre Adventures of Woodruff and the Schnibble (DOS demo - Non-interactive) - Requires ScummVM 0.14.0svn'
		=> array('http://demos.robertmegone.com/gob/woodruff-dos-ni-demo-en.zip', 'gob'),
	'The Last Dynasty (DOS demo - Non interactive) - Requires ScummVM 0.14.0svn'
		=> array('http://demos.robertmegone.com/gob/dynasty-win-ni-demo-en.zip', 'gob'),
	'Urban Runner (DOS demo - Non-interactive) - Requires ScummVM 0.14.0svn'
		=> array('http://demos.robertmegone.com/gob/urban-win-ni-demo-en.zip', 'gob'),
	'Ween: The Prophecy (DOS demo)'
		=> array('http://demos.robertmegone.com/gob/ween-dos-demo-en.zip', 'gob')
	);

$SIERRA_demos = array(
	'AGI Demo Pack 1 (DOS demos of 3-D Helicopter Sim, Police Quest, Thexder, Space Quest 2, Mixed-up Mother Goose, Leisure Suit Larry)'
		=> array('http://demos.robertmegone.com/agi/agi-dos-pack1-demo-en.zip', 'agidemo'),
	'AGI Demo Pack 2 (DOS demos of 3-D Helicopter Sim, Space Quest 2, Thexder, King\'s Quest 3, Mixed- up Mother Goose, King\'s Quest 2, Police Quest, Leisure Suit Larry, Space Quest)'
		=> array('http://demos.robertmegone.com/agi/agi-dos-pack2-demo-en.zip', 'agidemo'),
	'AGI Demo Pack 3 (DOS demos of 3-D Helicopter Sim, Space Quest 2, Police Quest, King\'s Quest 3, Mixed-up Mother Goose, Leisure Suit Larry)'
		=> array('http://demos.robertmegone.com/agi/agi-dos-pack3-demo-en.zip', 'agidemo'),
	'AGI Demo Pack 4 (DOS demos of Gold Rush!, Manhunter: NewYork, Mixed-up Mother Goose, Police Quest, Space Quest 2, Leisure Suit Larry)'
		=> array('http://demos.robertmegone.com/agi/agi-dos-pack4-demo-en.zip', 'agidemo'),
	'AGI Demo Pack 5 (DOS demos of Space Quest, Donald Duck\'s Playground, King\'s Quest 3, Leisure Suit Larry)'
		=> array('http://demos.robertmegone.com/agi/agi-dos-pack5-demo-en.zip', 'agidemo'),
	'Conquests of Camelot: King Arthur, Quest for the Grail (DOS demo - Non-interactive) - Requires ScummVM 0.14.0svn'
		=> array('http://demos.robertmegone.com/sci/camelot-dos-ni-demo-en.zip', 'camelot'),
	'King\'s Quest IV: The Perils of Rosella (DOS demo - Non-interactive)'
		=> array('http://demos.robertmegone.com/agi/kq4-dos-ni-demo-en.zip', 'kq4'),
	'Leisure Suit Larry 2: Goes Looking for Love (in Several Wrong Places) (DOS demo - Non-interactive) - Requires ScummVM 0.14.0svn'
		=> array('http://demos.robertmegone.com/sci/lsl2-dos-ni-demo-en.zip', 'lsl2'),
	'Space Quest III: The Pirates of Pestulon (DOS demo - Non-interactive) - Requires ScummVM 0.14.0svn'
		=> array('http://demos.robertmegone.com/sci/sq3-dos-ni-demo-en.zip', 'sq3'),
	'Xmas Card (DOS demo)'
		=> array('http://demos.robertmegone.com/agi/xmascard-dos-en.zip', 'xmascard')
	);

$MISC_demos = array(
	'Beneath a Steel Sky (DOS CD Demo)'
		=> array('http://demos.robertmegone.com/sky/sky-dos-v0365-cd-demo-en.zip', 'sky'),
	'Broken Sword 1: The Shadow of the Templars (Macintosh Demo)'
		=> array('http://demos.robertmegone.com/sword1/sword1-mac-demo-en.zip', 'sword1demo'),
	'Broken Sword 1: The Shadow of the Templars (Windows Demo)'
		=> array('http://demos.robertmegone.com/sword1/sword1-win-demo-en.zip', 'sword1demo'),
	'Broken Sword 2: The Smoking Mirror (Windows Demo)'
		=> array('http://demos.robertmegone.com/sword2/sword2-win-demo-en.zip', 'sword2demo'),
	'Bud Tucker in Double Trouble (DOS Demo)'
		=> array('http://demos.robertmegone.com/tucker/tucker-dos-demo.zip', 'tucker'),
	'Bud Tucker in Double Trouble (DOS demo - Non-interactive)'
		=> array('http://demos.robertmegone.com/tucker/tucker-dos-ni-demo.zip', 'tucker'),
	'Flight of the Amazon Queen (Amiga demo)'
		=> array('http://demos.robertmegone.com/queen/queen-amiga-demo-en.zip', 'queen'),
	'Flight of the Amazon Queen (Amiga interview demo)'
		=> array('http://demos.robertmegone.com/queen/queen-amiga-interview-en.zip', 'queen'),
	'Flight of the Amazon Queen (DOS demo)'
		=> array('http://demos.robertmegone.com/queen/queen-dos-demo-en.zip', 'queen'),
	'Flight of the Amazon Queen (DOS PCGAMES demo)'
		=> array('http://demos.robertmegone.com/queen/queen-dos-pcgames-demo-en.zip', 'queen'),
	'Flight of the Amazon Queen (DOS interview demo)'
		=> array('http://demos.robertmegone.com/queen/queen-dos-interview-en.zip', 'queen'),
	'Future Wars (Amiga demo - Non interactive)'
		=> array('http://demos.robertmegone.com/cine/fw-amiga-demo-en.zip', 'fw'),
	'Igor: Objective Uikokahonia (DOS demo)'
		=> array('http://demos.robertmegone.com/igor/igor-dos-1.0-demo-en.zip', 'igor'),
	'Igor: Objective Uikokahonia 1.10 (DOS demo)'
		=> array('http://demos.robertmegone.com/igor/igor-dos-1.1-demo-en.zip', 'igor'),
	'I Have No Mouth And I Must Scream (DOS demo)'
		=> array('http://demos.robertmegone.com/saga/ihnm-dos-demo-en.zip', 'ihnm'),
	'Lands of Lore: The Throne of Chaos (DOS demo - Non-interactive) - Requires ScummVM 0.14.0svn'
		=> array('http://demos.robertmegone.com/kyra/lol-dos-ni-demo-en.zip', 'lol'),
	'Nippon Safes (Amiga demo)'
		=> array('http://demos.robertmegone.com/parallaction/nippon-amiga-demo-en.zip', 'nippon'),
	'Operation Stealth (Amiga demo - Non interactive)'
		=> array('http://demos.robertmegone.com/cine/op-amiga-demo-en.zip', 'os'),
	'The Legend of Kyrandia (DOS demo - Non-interactive)'
		=> array('http://demos.robertmegone.com/kyra/kyra1-dos-ni-demo-en.zip', 'kyra1'),
	'The Legend of Kyrandia: The Hand of Fate (DOS demo)'
		=> array('http://demos.robertmegone.com/kyra/kyra2-dos-cd-demo-en.zip', 'kyra2'),
	'The Legend of Kyrandia: The Hand of Fate (DOS demo - Non-interactive)'
		=> array('http://demos.robertmegone.com/kyra/kyra2-dos-ni-demo1-en.zip', 'kyra2'),
	'The Legend of Kyrandia: The Hand of Fate (DOS Alternative demo - Non-interactive)'
		=> array('http://demos.robertmegone.com/kyra/kyra2-dos-ni-demo2-en.zip', 'kyra2'),
	'Touche: The Adventures of the Fifth Musketeer (DOS Demo)'
		=> array('http://demos.robertmegone.com/touche/touche-dos-demo-en.zip', 'touche')
	);

function render_demos($title, $demos) {
// render the demo list
echo html_frame_start($title,"90%",2,1,"color4");
echo html_frame_tr(
		   html_frame_td("Demo Name / Download Link").
		   html_frame_td("Game Target"),
		   "color4"

		  );
	$c = 0;
	while (list($name,$array) = each($demos))
	{	
		if ($c % 2 == 0) { $color = "color2"; } else { $color = "color0"; }
		echo html_frame_tr(
			html_frame_td("<a href=\"$array[0]\">$name</a>").
		    	html_frame_td($array[1]),
	  	        $color
	 	);
		$c++;
	}

echo html_frame_end("&nbsp;");
echo "<p>&nbsp;</p>";
}

echo "<a name='lec'></a>\n";
render_demos("LucasArts Demos", $LEC_demos);
echo "<a name='he'></a>\n";
render_demos("Humongous Entertainment Demos", $HE_demos);
echo "<a name='agos'></a>\n";
render_demos("Adventuresoft/Horrorsoft Demos", $AGOS_demos);
echo "<a name='gob'></a>\n";
render_demos("Coktel Vision Demos", $GOB_demos);
echo "<a name='sierra'></a>\n";
render_demos("Sierra Demos", $SIERRA_demos);
echo "<a name='other'></a>\n";
render_demos("Miscellaneous Demos", $MISC_demos);

echo "  </div>\n";
echo "</div>\n";

html_content_end();
html_page_footer();

?>
