<?

/*
 * Screenshots Page
 *
 */

// set this for position of this file relative
$file_root = ".";

// load libraries
require($file_root."/include/"."incl.php");

// start of html
html_header("ScummVM :: Screenshots");
sidebar_start();

//display welcome table
echo html_round_frame_start("Screenshots","98%","",20);

?>
	<p>
	  <big><b>Screenshots</b></big><br>
	  <? echo html_line(); ?>
	</p>	

<?


// if in single view
if ($view)
{
	echo html_frame_start("Screenshot Viewer","540",2,0,"color0"),
	     html_frame_tr(
	     		   html_frame_td(
			   		 '<img src="'.$file_root.'/screenshots/'.$view.'.png" '.
				         'border=0 vspace=2 hspace=2 width=640 height=400 '.
				         'alt="'.$view.'">',
					 'align=center class="color0"'
					)
	                  ),
	     html_frame_tr(
	     		   html_frame_td(
			   		 html_ahref("&nbsp; &lt;&lt; Back",$PHP_SELF."?x=".$x,"class=menuItem"),
					 'align=left class="color4"'
			   		)
	     		  ),		  
	     html_frame_end();	
}
else
{

	// Grab list of images from screenshot dir
	// and loop through them and add to $shots array
	$shots = array();
	$images = get_files($file_root."/screenshots","png");
	while (list($key,$image) = each($images))
	{
		if (ereg("big",$image))
		  continue;
		array_push($shots,$image);
	}

	// counter vars
	$total = count($shots);
	$num = 0;
	$where = 0;

	echo html_frame_start("Screenshot Gallery","540",2,0,"color0")."<tr>";

	// loop and display images
	while (list($c,$image) = each($shots))
	{
		// do not show images less than current pos
		if ($x > $c)
		  continue;

		// display image
		echo html_frame_td(
				   '<a href="'.$PHP_SELF."?view=big_scummvm_".$c.'&x='.$x.'">'.
				   '<img src="'.$file_root.'/screenshots/scummvm_'.$c.'.png" '.
				   'border=0 vspace=10 hspace=10 width=256 height=160 '.
				   'alt="'.$image.'"></a>',
				   'align=center class="color0"'
				  );

		// count number of images displayed.
		$num++;

		// end row at 2
		if (($num % 2 == 0) && ($num != 1))
		{
			echo "</tr><tr>\n";
		}

		// end at 4
		if ($num == 4)
		{
			$where = $c;
			break;
		}
	}

	echo "</tr>";

	$nextLink = "&nbsp;";
	$nextLink = "&nbsp;";

	// display prev link
	if ($x)
	{
		$prev = $x - 4;
		$prevLink = html_ahref("&lt;&lt; Prev 4 Images",$PHP_SELF."?x=".$prev,"class=menuItem");

	}

	// display next link
	if (($x + 4) < $total)
	{
		$next = $where + 1;
		$nextLink = html_ahref("Next 4 Images &gt;&gt;",$PHP_SELF."?x=".$next,"class=menuItem");
	}

	echo html_frame_tr(
			    html_frame_td("&nbsp; ".$prevLink,"align=left").
			    html_frame_td($nextLink." &nbsp;","align=right"),
			    "color4"
			  );
	echo html_frame_end();
	
//end view
}

// close table
echo html_p();		  
echo html_round_frame_end("&nbsp;");

// end of html
echo html_p();
sidebar_end();
html_footer();

// end
?>
