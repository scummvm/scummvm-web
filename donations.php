<?php

/*
 * Documentation Page for ScummVM
 * by Jeremy Newman <jnewman@dracowulf.com>
 *
 */

// set this for position of this file relative
$file_root = ".";

// load libraries
require($file_root."/include/"."incl.php");

// start of html
html_header("ScummVM");
sidebar_start();

//display donations
echo html_round_frame_start("ScummVM Donations","");

?>
<h1>Donations</h1>
<small>Donation status last updated: <?php echo date("F d, Y",getlastmod());?></small><br>
<p>ScummVM gladly accepts donations to help us with various expenses.
In the interest of public disclosure, this page keeps a running tally of donations and
expenses incurred by the project. For privacy and logistic reasons, individual contributors
names and amounts are usually not listed.</p>

<p>If you wish to donate money, you may do so using the PayPal service by clicking the button
underneath the left menu. We also welcome other forms of donations - if you have something
you wish to contribute then please feel free to contact us via e-mail (donate @ scummvm dit
org). All amounts are expressed in USD.
</p>

 <U>Donations:</U><BR>
 &nbsp;&nbsp; Prior to page: $80, carried over from previous donations<BR>
 &nbsp;&nbsp; August 2003: $166 in 12 donations<BR>
 <BR>
 <U>Recent Expenses:</U><BR>
 <table cellpadding=2>
 <tr><td>Amount</td><td>Spender</td><td>Description</td></tr>
 <tr><td colspan=3><hr></td></tr>
 <tr><td>$100</td><td>Ender</td><td>FmTowns Zak, partial auction cost + shipping from Japan</td></tr>
 <tr><td>$25</td><td>Ender</td><td>Copy of Broken Sword 1/2</td></tr>
 <tr><td>$25</td><td>Ender</td><td>Hosting for skunkworks sub-projects 'Shadow' and 'Residual'</td></tr>
 <tr><td>$18</td><td>khalek</td><td>FmTowns Loom, shipping from Japan</td></tr>
 <tr><td>$12.30</td><td>&nbsp;</td><td>Paypal banking costs</td></tr>
 </table>
 <BR>
 <U>Current Balance:</U> <B>$65.70</B>
 <?php
echo html_round_frame_end("&nbsp;");
//end of donations display

// end of html
sidebar_end();
html_footer();

?>
