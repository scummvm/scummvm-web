<?

$file_root = "../..";
// load libs
require($file_root."/include/"."incl.php");

// start of html
html_header("SCUMM Reference Guide :: Introduction");
sidebar_start(true);

//display welcome table
echo html_round_frame_start("Introduction","");

?>

        <p>
          <big><b>Introduction</b></big><br>
          <? echo html_line(); ?>
        </p>

<H2>Changes</h2>

<dl>
<dt>
2002-09-14:
<dd>Imported into ScummVM CVS as David feels he doesn't have time to maintain this anymore.

<dt>
2002-04-10:
<dd>Added James 'Ender' Brown's information (the engines, the resource tree introduction).

<dt>
2002-03-23:
<dd>Rewrote it in HTML for the new Cowlark web server. LaTeX is good but for an
on-line reference HTML is better.

<dt>
2002-01-30:
<DD>Added Arrays, deciphered a lot of the threading and VM stuff and documented
it, added a bunch of opcodes, assorted tidying.

<DT>2002-01-18:
<DD>Initial version
</dl>

<h2>What is SCUMM?</h2>

SCUMM, the <B>S</B>cript <B>C</B>reation <B>U</B>tility for
<B><EM>M</EM></B><EM>aniac</EM> <B><EM>M</EM></B><EM>ansion</EM>, is an engine
for creating graphics adventure games.

<p>It is well known that the best way to perform some very complex task is to
start out by building a tool to help you with that task. In the same way, two
programmers at LucasArts back in 1988 decided that rather than write a single,
complicated program for their new graphic adventure game, they should instead
build an generic engine that would play any graphic adventure game, if given
the proper data files; this would let them concentrate on the game design,
rather than the details of the programming.

<p>It worked. And so SCUMM was born.

<p>The way the SCUMM engine works is that there is a single executable program,
called the interpreter, that operates on some data files.  The data files
contain images, dialogue, details of object behaviour, and so on. The
interpreter then brings all this to life and handles the details of drawing it
all, animating the characters, processing user input, and all the other details
that a graphic adventure game needs dealt with in order to work properly.
Because the data files contain no executable code, it turns out to be trivial
to port the game to a new platform: just port the interpreter, and use the same
data files. You will get exactly the same game on the new system.

<p class=footnote>A lesson many people have learnt. Infocom, creators of
possibly the finest text adventure games of all time, did a very similar trick
with their Z-machine; you can now get Z-machine interpreters for everything
from a Cray Supercomputer to a Game Boy, all of which will play Infocom's
games, encoded in the data files. See <a href="http://brasslantern.org">Brass
Lentern</a> for more information.

<p>Aric Wilmunder and Ron Gilbert's original SCUMM has been expanded
a bit since 1988, of course. Every time a game required some feature
that SCUMM had not previously supported, the interpreter was extended
and the data file format expanded. The whole system was redesigned
from scratch twice. Even now that LucasArts has finally retired SCUMM
for their latest games, such as <EM>Grim Fandango</EM>, the
interpreter/data file philosophy is still in use and you can see SCUMM
design decisions in the data file format.

<p>This document attempts to document the SCUMM data file format. With
reasonably complete documentation, it becomes possible to do all sorts
of exiting things: like write a free, portable interpreter that will
play and SCUMM game on any platform (such as <a href="http://www.scummvm.org">ScummVM</a>, written by Ludvig Strigeus and the ScummVM team),
or to create your own SCUMM games from scratch.

<p>The information obtained here was almost all obtained by other people.  All
I have done is to collate it into one place. Among the many who have been
working on the SCUMM file format, Ludvig Strigeus, Jimmi Thøgerson and Peter
Kelly have performed incredible tasks of reverse-engineering, and I am indebted
to them.

<P class=footnote>Jimmi Thøgerson and Peter Kelly have developed their own
SCUMM file browsing and analysis tool called <a href="http://scummrev.mixnmojo.com">SCUMM
Revisited</a>. If you are at all interested in SCUMM files, this is an
essential tool.

<H2>What versions of SCUMM are there available?</H2>

<p>Many.

<p>SCUMM is a LucasArts in-house standard. The format was never designed
to be public and so would change unpredictably from game to game to
suit the task at hand.

<p>The first LucasArts adventure games used an unknown format that is
now lost with time. We will ignore it because it wasn't really SCUMM
as we know it know, wasn't very good, anyway, and only worked on the
Commodore 64. The first PC versions started with V2 and a variation
of the V1 format.

<p>With <EM>Indiana Jones and the Last Crusade</EM>, LucasArts developed
a modular file format based loosely on the standard IFF format. This
was used several times in various forms until <EM>The Secret of
Monkey Island</EM>, where the SCUMM engine and file format was redesigned
from scratch. The new format was used from then on, and vestiges of
It are still visible in the latest LucasArts games such as <EM>Grim
Fandango</EM>.

<p>The full list of games and versions follows.

<?

$games = array(
		'Maniac Mansion (c64)'                                  => array('1'),
		'Zak McKracken and the Alien Mindbenders (C64)'		=> array('1'),
                'Maniac Mansion'                                        => array('2'),
                'Zak McKracken and the Alien Mindbenders'               => array('2'),
                'Indiana Jones and the Last Crusade'                    => array('3'),
                'Zak McKracken and the Alien Mindbenders (256 - FmTowns)' => array('3'),
                'Indiana Jones and the Last Crusade (256)'              => array('3.0.22'),
                'Loom'                                                  => array('3.5.37'),
                'Loom (alt. version)'                                   => array('3.5.40'),
                'The Secret of Monkey Island (EGA)'                     => array('4.0.67'),
                'The Secret of Monkey Island (VGA Floppy)'              => array('5.0.19'),
                'LOOM (256 color CD version)'                           => array('5.1.42'),
                'Monkey Island 2: LeChuck\'s revenge'                   => array('5.2.2'),
                'The Secret of Monkey Island (VGA CD)'                  => array('5.3.06'),
                'Indiana Jones 4 and the Fate of Atlantis (DEMO)'       => array('5.5.2'),
                'Indiana Jones 4 and the Fate of Atlantis'              => array('5.5.20'),
                'Sam & Max (DEMO)'                                      => array('6.3.0'),
                'Day Of The Tentacle (DEMO)'                            => array('6.3.9'),
                'Day Of The Tentacle'                                   => array('6.4.2'),
                'Sam & Max'                                             => array('6.5.0'),
                'Full Thottle'                                          => array('7.3.5'),
                'The DIG'                                               => array('7.5.0'),
                'Curse of Monkey Island'                                => array('8.1.0')
              );

echo html_frame_start("Game versions","60%",2,1,"color4");
echo html_frame_tr(
                   html_frame_td("Version").
                   html_frame_td("Game", 'align="center"'),
                   "color4"
  
                  );
	$c = 0;
        while (list($name,$array) = each($games))
        {
                if ($c % 2 == 0) { $color = "color2"; } else { $color = "color0"; }
                echo html_frame_tr(
                                    html_frame_td($array[0]).
                                    html_frame_td($name, 'align="center" class="pct'.$array[2].'"'),
                                    $color
                );
                $c++;
        }


echo html_frame_end("&nbsp;");
?>
<p>This document will only concern itself with SCUMM versions 5-8.

<h2>Engines</h2>

<p>The SCUMM virtual machine is made up of a number of sub engines working together. Strictly, the term SCUMM only refers to the scripting language itself. The official term for the virtual machine as a whole is SPUTM --- but getting people to change is probably a lost cause.

<p>Here are all the engines used by the SCUMM virtual machine.

<p><dl>
<dt>SPUTM
<dd>The 'real' name for the engine.

<dt>SCUMM
<dd>The actual scripting language.

<dt>IMUSE
<dd>The MIDI control system, allowing dynamic music.

<dt>SMUSH
<dd>A movie compression format and player.

<dt>INSANE
<dd>The event management system used in V7+ games.

<dt>MMUCAS
<dd>The memory allocation system used in <i>The Curse of Monkey Island</i>. V8 only.
</dl>

<HR><P STYLE="font-size: smaller; text-align: center">
All material &copy; 2000-2002 David Given, unless where stated otherwise.
</P>

<?
echo html_round_frame_end("&nbsp;");
          
// end of html
sidebar_end();
html_footer();
?>

