<?

$file_root = "../..";
// load libs
require($file_root."/include/"."incl.php");
require($file_root."/docs/specs/"."sidebar_specs.php");

// start of html
html_header("The inComplete SCUMM Reference Guide");
sidebar_specs_start();

// add 

//display welcome table
echo html_round_frame_start("The inComplete SCUMM Reference Guide","98%","",20);

?>
        <p>
          <big><b>The inComplete SCUMM Reference Guide</b></big><br>
          <? echo html_line(); ?>
        </p>

        <p>

	<i>being a Partially Complete and Mostly Accurate guide to the SCUMM Engine data file Format for Versions Five and Six (and above)</i>


<HR><P STYLE="font-size: smaller; text-align: center">
All material &copy; 2000-2002 David Given, unless where stated otherwise.
</P>

<?
echo html_round_frame_end("&nbsp;");

// end of html
echo html_p();
sidebar_end();
html_footer();
?>
