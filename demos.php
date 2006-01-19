<?

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
  <br />
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
  html_nav_item("#other", "Miscellaneous Demos");
?>

</table>
    </div>
</td>
<td>
  This page lists links to demos of various games, please contact us if you have a copy of any demo not listed here,<br><br>
  Beneath A Steel Sky demos aren't going to be supported for technical reasons.<br><br>
</td></tr>
</table>

  <br />

</div>

  <br />
  <br />

  <div class="par-content">

<?

$LEC_demos = array(
	'Day of the Tentacle (DOS demo - Non interactive)'
		=> array('ftp://ftp.lucasarts.com/demos/pc/Dottdemo.zip', 'tentacle'),
	'Day of the Tentacle (French DOS demo - Non interactive)'
		=> array('http://quick.mixnmojo.com/demos/dottdemo-fr.zip', 'tentacle'),
	'Day of the Tentacle (German DOS demo - Non interactive)'
		=> array('http://quick.mixnmojo.com/demos/dottdemo-de.zip', 'tentacle'),
	'Full Throttle (Macintosh demo)'
		=> array('http://quick.mixnmojo.com/demos/ftdemo_mac.zip', 'ft'),
	'Full Throttle (DOS demo)'
		=> array('http://quick.mixnmojo.com/demos/ftdemo.zip', 'ft'),
	'Indiana Jones and the Fate of Atlantis (DOS demo - Interactive)'
		=> array('ftp://ftp.lucasarts.com/demos/pc/Playfate.zip', 'atlantis'),
	'Indiana Jones and the Fate of Atlantis (DOS demo - Non interactive)'
		=> array('http://www.cowlark.com/scumm.dat/fate.zip', 'atlantis'),
	'Indiana Jones and the Fate of Atlantis (FM Towns demo - Non interactive)'
		=> array('http://www.cowlark.com/scumm.dat/indy4demo.zip', 'atlantis'),
	'Indiana Jones and the Last Crusade (16 colour - Non interactive)'	
		=> array('http://www.cowlark.com/scumm.dat/indy3ega-demo.zip', 'indy3'),
	'Indiana Jones and the Last Crusade & Loom (FM Towns demo - Non interactive)'
		=> array('http://www.cowlark.com/scumm.dat/indyloom.zip', 'zak'),
	'Indiana Jones and the Last Crusade & Zak McKracken (FM Towns demo - Non interactive)'
		=>array('http://www.cowlark.com/scumm.dat/indyzak.zip', 'zak'),
	'Loom (16 colour - Non interactive)'
		=> array('ftp://ftp.lucasarts.com/demos/pc/Loomdemo.zip', 'loom'),
	'Maniac Mansion (v1 DOS demo - Non interactive)'
		=> array('http://quick.mixnmojo.com/demos/maniac.rar', 'maniac'),
	'Maniac Mansion (v2 DOS demo - Non interactive)'
		=> array('http://quick.mixnmojo.com/demos/mmdemo2.zip', 'maniac'),
	'Monkey Island 2 (DOS demo)'
		=> array('http://www.cowlark.com/scumm.dat/mi2demo.zip', 'monkey2'),
	'Passport to Adventure (16 colour demos of mi, loom, indy3)'
		=> array('ftp://ftp.lucasarts.com/demos/pc/Sampler.zip', 'pass'),
	'Sam &amp; Max Hit the Road (DOS demo - Non interactive)'
		=> array('http://www.cowlark.com/scumm.dat/samdemo.zip', 'samnmax'),
	'Sam &amp; Max Hit the Road (Macintosh demo - Interactive)'
		=> array('http://quick.mixnmojo.com/demos/samdemo_mac.zip', 'samnmax'),
	'Sam &amp; Max Hit the Road (DOS demo - Interactive)'
		=> array('ftp://ftp.lucasarts.com/demos/pc/Snmdemo.zip', 'samnmax'),
	'Sam &amp; Max Hit the Road (German DOS demo - Interactive)'
		=> array('http://quick.mixnmojo.com/demos/sdemo-de.zip', 'samnmax'),
	'Sam &amp; Max Hit the Road WIP (DOS demo - Interactive)'
		=> array('http://www.cowlark.com/scumm.dat/snmidemo.zip', 'samnmax'),
	'The Curse of Monkey Island (Windows demo)'
		=> array('ftp://ftp.lucasarts.com/demos/pc/cursedemo.exe', 'comi'),
	'The Curse of Monkey Island (Windows demo with movies)'
		=> array('http://quick.mixnmojo.com/demos/CMICompleteDemo.rar', 'comi'),
	'The Dig (Macintosh demo)'
		=> array('http://quick.mixnmojo.com/demos/dig_demo_mac.zip', 'dig'),
	'The Dig (DOS demo)'
		=> array('http://quick.mixnmojo.com/demos/digdemo.zip', 'dig'),
	'The Secret of Monkey Island (16 colour demo)'	
		=> array('http://www.cowlark.com/scumm.dat/mi_demo2.zip', 'monkey'),
	'The Secret of Monkey Island (German 16 colour demo)'	
		=> array('http://quick.mixnmojo.com/demos/midemo-de.zip', 'monkey'),
	'The Secret of Monkey Island (Amiga demo)'	
		=> array('http://quick.mixnmojo.com/demos/mi1amigademo.zip', 'monkey'),
	'Zak McKracken and the Alien Mindbenders (Atari ST - Non interactive)'
		=> array('http://www.cowlark.com/scumm.dat/zakstdemo.zip', 'zak'),
	'Zak McKracken & Loom (FM Towns demo - Non interactive)'
		=>array('http://www.cowlark.com/scumm.dat/zakloom.zip', 'zak')
	);

$HE_demos = array(
	'Backyard Football (Demo)'
		=> array('http://quick.mixnmojo.com/demos/footdemo.zip', 'football'),
	'Big Thinkers Kindergarten (Demo)'
		=> array('ftp://ftp.humongous.com/humongous/BTK95d.EXE', 'thinkerk'),
	'Big Thinkers First Grade (Demo)'
		=> array('ftp://ftp.humongous.com/humongous/BTFG95d.EXE', 'thinker1'),
	'Fatty Bear\'s Birthday Surprise (DOS demo)'
		=> array('http://www.cowlark.com/scumm.dat/fatdemo.zip', 'fbear'),
	'Freddi Fish 1: The Case of the Missing Kelp Seeds (Demo)'
		=> array('ftp://ftp.humongous.com/humongous/freddi.zip', 'freddi'),
	'Freddi Fish 2: The Case of the Haunted Schoolhouse (Demo)'
		=> array('ftp://ftp.humongous.com/humongous/FF2-DEMO.ZIP', 'freddi2'),
	'Freddi Fish 3: The Case of the Stolen Conch Shell (Demo)'
		=> array('ftp://ftp.humongous.com/humongous/fred3-95.exe', 'freddi3'),
	'Freddi Fish 3: The Case of the Stolen Conch Shell (French Demo)'
		=> array('http://quick.mixnmojo.com/demos/mm3-demo-fr.zip', 'freddi3'),
	'Freddi Fish 4: The Case of the Hogfish Rustlers of Briny Gulch (Demo)'
		=> array('ftp://ftp.humongous.com/humongous/freddi4_demo/freddi4.exe', 'freddi4'),
	'Freddi Fish 4: The Case of the Hogfish Rustlers of Briny Gulch (German Demo)'
		=> array('http://quick.mixnmojo.com/demos/ff4demo-de.zip', 'freddi4'),
	'Freddi Fish 4: The Case of the Hogfish Rustlers of Briny Gulch (UK Demo)'
		=> array('http://quick.mixnmojo.com/demos/ff4demo-uk.zip', 'freddi4'),
	'Pajama Sam 1: No Need to Hide When It\'s Dark Outside (Demo)'
		=> array('ftp://ftp.humongous.com/humongous/pjs-demo.zip', 'pajama'),
	'Pajama Sam 1: No Need to Hide When It\'s Dark Outside (French Demo)'
		=> array('http://quick.mixnmojo.com/demos/samdemo-fr.zip', 'pajama'),
	'Pajama Sam 2: Thunder and Lightning Aren\'t so Frightening (Demo)'
		=> array('ftp://ftp.humongous.com/humongous/PJ2Demo.exe', 'pajama2'),
	'Pajama Sam 2: Thunder and Lightning Aren\'t so Frightening (Dutch Demo)'
		=> array('http://quick.mixnmojo.com/demos/pjs2demo-nl.zip', 'pajama2'),
	'Pajama Sam 3: You Are What You Eat From Your Head to Your Feet (Demo)'
		=> array('http://quick.mixnmojo.com/demos/pj3-demo.rar', 'pajama3'),
	'Pajama Sam 3: You Are What You Eat From Your Head to Your Feet (German Demo)'
		=> array('http://quick.mixnmojo.com/demos/gpj3demo_de.zip', 'pajama3'),
	'Pajama Sam 3: You Are What You Eat From Your Head to Your Feet (UK Demo)'
		=> array('http://quick.mixnmojo.com/demos/pj3demo-uk.zip', 'pajama3'),
	'Pajama Sam\'s Lost & Found (Demo)'
		=> array('ftp://ftp.humongous.com/humongous/losttest.zip', 'lost'),
	'Putt-Putt Enters the Race (Demo)'
		=> array('ftp://ftp.humongous.com/humongous/puttraceDemo/puttrace.exe', 'puttrace'),
	'Putt-Putt Enters the Race (Dutch Demo)'
		=> array('http://quick.mixnmojo.com/demos/500demo-nl.zip', 'puttrace'),
	'Putt-Putt Enters the Race (German Demo)'
		=> array('http://quick.mixnmojo.com/demos/rennen-de.zip', 'puttrace'),
	'Putt-Putt Enters the Race (UK Demo)'
		=> array('http://quick.mixnmojo.com/demos/racedemo-uk.zip', 'puttrace'),
	'Putt-Putt Goes to the Moon (DOS demo)'
		=> array('http://www.cowlark.com/scumm.dat/moondemo.zip', 'puttmoon'),
	'Putt-Putt Joins the Circus (Demo)'
		=> array('http://quick.mixnmojo.com/demos/circdemo.rar', 'puttcircus'),
	'Putt-Putt Joins the Parade (DOS demo)'
		=> array('http://www.cowlark.com/scumm.dat/puttpara.zip', 'puttdemo'),
	'Putt-Putt Saves the Zoo (Demo)'
		=> array('ftp://ftp.humongous.com/humongous/puttzoo.zip', 'puttzoo'),
	'Putt-Putt Travels Through Time (Demo)'
		=> array('ftp://ftp.humongous.com/humongous/putttime.zip', 'putttime'),
	'Putt-Putt Travels Through Time (French Demo)'
		=> array('http://quick.mixnmojo.com/demos/tempdemo-fr.zip', 'putttime'),
	'Spy Fox 1: Dry Cereal (Demo)'
		=> array('ftp://ftp.humongous.com/humongous/FOX95d.EXE', 'spyfox'),
	'Spy Fox 1: Dry Cereal (Alternative Demo)'
		=> array('ftp://ftp.humongous.com/humongous/spy95_98.zip', 'spyfox'),
	'Spy Fox 1: Dry Cereal (Dutch Demo)'
		=> array('http://quick.mixnmojo.com/demos/spydemo-nl.zip', 'spyfox'),
	'Spy Fox 1: Dry Cereal (French Demo)'
		=> array('http://quick.mixnmojo.com/demos/jamesdem-fr.zip', 'spyfox'),
	'Spy Fox 2: Some Assembly Required (Demo)'
		=> array('http://quick.mixnmojo.com/demos/sf2-demo.rar', 'spyfox2'),
	'Spy Fox 2: Some Assembly Required (German Demo)'
		=> array('http://quick.mixnmojo.com/demos/sf2demo-de.zip', 'spyfox2'),
	'Spy Fox 2: Some Assembly Required (UK Demo)'
		=> array('http://quick.mixnmojo.com/demos/sf2demo-uk.zip', 'spyfox2'),
	'Spy Fox 3: Operation Ozone (Demo)'
		=> array('http://quick.mixnmojo.com/demos/sf3-demo.rar', 'spyozon')
	);

$MISC_demos = array(
	'Broken Sword 1: The Shadow of the Templars'
		=> array('http://www.gamershell.com/download_4731.shtml', 'sword1demo'),
	'Broken Sword 2: The Smoking Mirror'
		=> array('http://ftp.se.kde.org/pub/pc/games/pcgameworld/demos/bs2-demo.zip', 'sword2demo'),
	'Flight of the Amazon Queen (Datafile only)'
		=> array('http://0x.7fc1.org/fotaq/fotaq_demo.zip', 'queen'),
	'Flight of the Amazon Queen (PCGAMES demo, Datafile only)'
		=> array('http://0x.7fc1.org/fotaq/fotaq_demo_pcgames.zip', 'queen'),
	'Gobliiins'
		=> array('http://minifiles.ag.ru/demos/448/gobliiins_demo.exe', 'gob1'),
	'Inherit the Earth: Quest for the Orb demos'
		=> array('http://www.wyrmkeep.com/ite/download.html', 'ite-demo'),
	'The Legend of Kyrandia (Non-interactive)'
		=> array('http://quick.mixnmojo.com/demos/kyra1demo.zip', 'kyra1'),
	'Simon the Sorcerer 1 (DOS demo)'
		=> array('http://www.cowlark.com/scumm.dat/simon1demo.zip', 'simon1'),
	'Simon the Sorcerer 1 Talkie (Acorn demo)'
		=> array('http://quick.mixnmojo.com/demos/simon1demo_acorn.rar', 'simon1'),
	'Simon the Sorcerer 2 Talkie (DOS demo)'
		=> array('http://www.cowlark.com/scumm.dat/simon2demo.zip', 'simon2')
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
echo "<a name='other'></a>\n";
render_demos("Miscellaneous Demos", $MISC_demos);

echo "  </div>\n";
echo "</div>\n";

html_content_end();
html_page_footer();

?>
