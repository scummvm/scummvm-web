<?php

/*
 * Contact Page for ScummVM
 * by Jeremy Newman <jnewman@dracowulf.com>
 *
 */

// set this for position of this file relative
$file_root = ".";

// load libraries
require($file_root."/include/"."incl.php");

function html_headline ($str)
{
	return do_indent("<b>$str</b><br>\n".html_line());
}

// start of html
html_header("ScummVM :: Status");
sidebar_start();

//display welcome table
echo html_round_frame_start("State of the SCUMM","");

?>
	<h1>State of the SCUMM - 17th October 2002</h1>
	<h3 align="center"><a href="http://sourceforge.net/mailarchive/forum.php?thread_id=1199086&forum_id=7223">
Link to the e-mail thread archive</a></h3>

<p>This is a summary of the current state of ScummVM, to help prepare for our
next release.. which hopefully should be coming up very shortly.</p>

<p>First, a some of this content is targeted at developers, which
is why this is being posted to the development mailing list. However, I
will also be posting a link to this on the main news page shortly.</p>

<p>I'm going to break this status report down into several sections -
involving both our recent progress and several items that still need work,
beginning with the most specific and important issues... I'd like to hear
feedback on any of this, as well as any volunteers who want to help work
on the 'rough spots'</p>

<br><? echo html_headline("PORTS"); ?>
<p>Currently we have official in-cvs ports for:</p>
<table cellspacing="3" cellpadding="3">
	<tr><td align="right">SDL: </td><td>We might as well say 'Me'</td></tr>
	<tr><td align="right">Dreamcast: </td><td>Marcus Comstedt</td></tr>
	<tr><td align="right">MorphOS: </td><td>Ruediger Hanke</td></tr>
	<tr><td align="right">WinCE: </td><td>Nicolas Bacca</td></tr>
	<tr><td align="right">Mac Carbon: </td><td>Unowned</td></tr>
	<tr><td align="right">X11: </td><td>Uncertain, possibly unowned. Lionel?</td></tr>
</table>
<p>Could all of the maintainers for the above please reply to this email and
let me know if your port still compiles with the latest CVS tree - I'm
fairly certain some of you still haven't implemented Overlay support, which
is required by the OSystem interface for NewGUI. If you need assistance
with implementing Overlays, either take a look at the SDL implementation,
or just post here and someone will help.</p>

<p>If you are no longer interested in maintaining your port, or if you are
interested in picking up one of the unowned/abandoned ports, let everyone
know. If you already maintain a port and don't reply to this e-mail within
a week or so, I'll assume you have abandoned that port.</p>

<p>Of course, new ports are welcome, if you have ported ScummVM to some new
exotic bit of hardware :)</p>

<br><? echo html_headline("LEGAL"); ?>

<p> We are still in negotiations with LucasArts over this, although both of
us are hoping to reach some kind of closure very very soon. Obviously,
this is a key element to being able to do a new release. The main issue at
the moment is their requirement for a 'non-profit' clause. We need to push
this clause to prevent any -direct- profit from being made by selling
ScummVM itself (seriously, who would want to anyway? geez :)... but try
and convince LucasArts to still let commercial distribution in a package
of other software, such as a Linux distribution. This is required to
ensure we are at least DFSG and OSD compliant.</p>

<p>Hopefully I can knock some sense into them, and convince them that there's
nothing wrong with this, otherwise this whole negotiation period - and
it's being going on for months - will be pretty pointless. Basically, we
need to have their permission to use an Artistic-license style clause. If
we're not DFSG/OSD compliant, it's going to cause a -lot- of headaches for
us in the future, and be quite unreasonable considering various
re-licensing issues we're going to have to deal with.</p>

<p>Other than that, IF we manage to resolve the legal situation in a way that
can maintain a compatible license, we only have a few other steps left:</p>

<ul>
<li><p>Ensure all ports, makefiles and code are modified for proper separation
of the LGPL'ed code into statically linked library(s). "The New License"
will only apply to the 'scumm' directory in CVS, so if there is anything
contained within that you think has more generic use... please move it
into 'common' or some other suitable place. One we relicense it to "The
New License", going back won't be easy :). Max Horn has already spent
considerable time and effort splitting out the more generic functionality,
and restructuring the code to allow for library separation... but we're not
completely done yet.</p></li>

<li><p>Negotiate with LucasArts regarding the use of trademarks, yadda yadda,
on the webpage. Our current negotiations only involve the code itself, we
still need to get permission (apparantly) to use the words "Monkey Island"
anywhere on the site</p></li>
</ul>


<p>Those are the two most important issues holding us back from a release. So
with those in mind, let's look onto a far more interesting subject... game
compatibility!</p>

<p>As usual, most of the outstanding bugs are related to Simon The Sorcerer,
several months old, and filed by madshi. Unfortunately nobody on the team
currently has any particular interest in maintaining the Simon module, and
none of us know how it works anyway. If you want to volunteer to take over
this part of the code, your welcome to it. As always, our main focus is on
providing support for LucasArts SCUMM games.</p>

<p>Mostly, all we have right now is a number of Zak256 bugs, and some small
graphical glitches in LoomCD. We do need volunteers to go through with
latest CVS versions and replay older games, to ensure there are no
regression bugs.</p>


<br><? echo html_headline("PROGRESS"); ?>

<p>Now on to the good news for progress in the last few weeks/months:</p>

<p>Jamieson Christian has done absolutely brilliant work with iMuse,
correcting the majority of the musical problems that plagued Sam and Max
in 0.2.0... this has led to -some- regression in earlier games, but we're
sure that is temporary and will be fixed shortly. Thanks also to Mike
Nordell, who done the initial reverse engineering of Sam and Max's iMuse
and wrote some very useful notes on what he discovered.</p>

<p>Torbj&ouml;rn Andersson has been invaluable over the last few months in fixing
many other annoying glitches, and I think people will be very pleased with
the huge amount of progress we've made since 0.2.0.</p>

<p>We've also made some significant progress in The Dig and Full Throttle,
with at least The Dig known to be completable (albite in a very rough
stage). Pawel Kolodziejski has done a good job with the implementation of
a digital iMuse mixer for these two games, and merging/cleaning up the new
SMUSH player written by Xavier Trochu.</p>

<p>Max Horn has implemented a 'New GUI' system, which looks far better then
the previous, as well as providing a much cleaner interface for changing
ScummVM settings. He's also currently working on an in-game 'Launcher' so
people won't have to commit all our obscure command-line parameters to
memory. The Launcher in particular is going to be a key point of our next
release, along with hopefully support for at least The Dig.</p>

<br><? echo html_headline("TO DO"); ?>

<p>So, what needs work?</p>

<p>We have several issues that need addressing.</p>

<p>In particular, we need a new save/load system. There are many changes we
would like to make, but haven't, because doing so would break save-game
compatibility. What we really want (preferably for the next release, so
it will be widly adopted... the next release should be fairly big, a
0.3.0).. is a new save system that has compatibility in it's very design.
So if we need to change the format AGAIN in a future release, save games
from 0.3.0 would still work. If you are interested in taking this on, talk
to Fingolfin on IRC.. he and ludde have worked out some design concepts.</p>

<p>Secondly, we launcher of course needs work, although Fingolfin seems to be
fairly happy to work on that himself. This will be a key point for our next
release.</p>

<p>The Dig has several main outstanding issues.
Firstly, akos codec 16 needs to be implemented. From the disassembly, this
seems to be a fairly simple codec.. however we do not currently have a
good reverse engineer on the project. Applications are welcome :)</p>

<p>Implementation of Akos16 will also fix many missing animations in Full
Throttle.</p>

<p>The Dig also has a very annoying bug regarding case 226 of o6_wait. This
wait case is supposed to trigger when the actor has finished being
redrawn. Unfortunately, whilst it works in most cases, it causes VM freezes
in certain specific situations.</p>

<p>There are a variety of room scrolling issues, in particular the Nexus has
some redraw issues when the room should 'wrap', and the room under the
Tomb is completely messed up.</p>

<p>There are some sound problems too, but the room and o6_wait issues are the
most important.</p>


<p>Full Throttle is actually quite complete and bug free, apart from needed
Akos16 implemented, and the missing INSANE subsystem.</p>

<p>Unfortunately the lack of INSANE prevents the game from being completable
without resorting to the debugger to manually skip to various rooms.
INSANE, however, seems to be a fairly simple hard-coded set of
instructions in Full Throttle, and would take a short period of time for a
decent RE'er to decypher.</p>

<p>Implementing INSANE will, however, require some modifications to the SMUSH
renderer, allowing the main SCUMM drawing functions (actor drawing, in
particular) access to the SMUSH display.</p>

<p>And that folks is about it.</p>

<p>Remember, porters please get back to me about your ports.</p>

<pre>
 - James 'Ender' Brown
   Project Leader,
   ScummVM
</pre>

<?

echo html_round_frame_end("&nbsp;");

// end of html
sidebar_end();
html_footer();

?>
