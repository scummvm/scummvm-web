<?

/*
 * Contact Page for ScummVM
 * by Jeremy Newman <jnewman@dracowulf.com>
 *
 */

// set this for position of this file relative
$file_root = ".";

// load libraries
require($file_root."/include/"."incl.php");

// start of html
html_header("ScummVM :: Contact");
sidebar_start();

//display welcome table
echo html_round_frame_start("Contact","98%","",20);

?>
	<p>
	  <big><b>Contact the ScummVM Team</b></big><br>
	  <? echo html_line(); ?>
	</p>

	<blockquote>
	<table border=0 cellpadding=10 cellspacing=0>
	  
	  <tr>
	    <td><a href="http://sourceforge.net/sendmessage.php?touser=2715" target="_blank">James Brown</a></td>
	    <td>[ endy ]</td>
	    <td>- Developer, Current Project Admin</td>
	  </tr>
	  
	  <tr>
	    <td><a href="http://sourceforge.net/sendmessage.php?touser=345958" target="_blank">Vincent Hamm</a></td>
	    <td>[ yazoo ]</td>
	    <td>- Developer</td>
	  </tr>
	  
	  <tr>
	    <td><a href="http://sourceforge.net/sendmessage.php?touser=339357" target="_blank">Jeremy Newman</a></td>
	    <td>[ laxdragon ]</td>
	    <td>- Webmaster</td>	  
	  </tr>

	  <tr>
	    <td>Ludvig Strigeus</td>
	    <td>[ strigeus ]</td>
	    <td>- Original ScummVM author, Former Project Admin</td>
	  </tr>
	  
	  <tr>
	    <td colspan=3><a href="http://sourceforge.net/project/memberlist.php?group_id=37116">Everybody else...</a></td>
	  </tr>

	</table>
	</blockquote>

<?

echo html_round_frame_end("&nbsp;");

// end of html
echo html_p();
sidebar_end();
html_footer();

?>
