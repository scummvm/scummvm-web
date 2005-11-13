<?php

function html_page_header($title, $extra = "") {
  global $file_root;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<link rel="stylesheet" href="./style.css" type="text/css">
<?php
  echo "<title>$title</title>\n";
  echo "$extra\n";
?>
	</head>
	<body>

        <!-- HTML/CSS coding by Yaroslav Fedevych jaroslaw@nospam.kiev.ua -->

	<table class="main-container" width="90%" cellspacing="0" cellpadding="0" align="center">
		<tr>
			<td colspan="2"><table cellspacing="0" cellpadding="0" style="width:100%;">
					<tr><td rowspan="2" width="287"><img alt="ScummVM logo" src="images/scummvm_logo.png" width="287" height="118" border="0" /></td>
					<td rowspan="2" style="background:url('images/bg-upper.gif')">&nbsp;</td>
					<td width="483">

<?php

$heroes = get_files($file_root."/images", null, "(heroes.+\\.png)");

$randImg = rand(0, count($heroes) - 1);

echo '<img alt="Game characters" src="images/'.$heroes[$randImg].'" height="89" />';

?>
</td>
					</tr>
					<tr><td width="483"><img alt="Script creation utility for Maniac Mansion Virtual Machine" src="images/scummvm-caption.png" height="29" /></td>
					<td width="24">&nbsp;</td></tr>
				</table>
			</td>
		</tr>
		<tr>
			<td class="content" valign="top" rowspan="2" style="padding-right:1px;">

<?php
    }


function html_content_begin($title) {
?>

<table style="margin:0px;margin-top:0px;width:100%;" cellspacing="0" cellpadding="0">
<tr><td style="padding-left:8px;padding-right:8px;">
	<table width="100%" cellspacing="0" cellpadding="0">
		<tr>
		<td width="8" style="background:url('images/header-left-corner.gif');height:28px;">&nbsp;</td>
		<td style="background:url('images/header-background.gif')"><h2 style="margin:0px;color:#356a02;font-weigth:bold;padding-left:1em;
			font-family:Trebuchet MS,Verdana,Tahoma;font-size:18px;color:#821d06">
<?php
shadowed_text($title, '#821d06', '#ffffff');
?>

</h2></td>
		<td width="8" style="background:url('images/header-right-corner.gif');height:28px;">&nbsp;</td>
	</tr></table>
</td></tr>
<tr><td style="padding-left:8px;padding-right:8px;"><table width="100%" cellspacing="0"><tr><td style="border-left:1px solid #ebb716;border-right:1px solid #ebb716;padding:12px;background:#fff;">
<?php
}

function html_content_end() {
?>
	</td></tr></table></td>
<tr>
	<td style="padding-left:8px;padding-right:8px;"><table width="100%" cellspacing="0" cellpadding="0"><tr>
	<td width="8" style="height:28px;background:url('images/left-low-corner.gif')">&nbsp;</td>
	<td style="border-bottom:1px solid #ebb716;text-align:right;background:#fff;">&nbsp;</td>
	<td width="8" style="background:url('images/right-low-corner.gif')">&nbsp;</td>
	</tr></table></td>
</tr>
</table>

<?php
}

function html_page_footer() {
  global $file_root;

?>
			</td>
<?php
  sidebar_start();
  sidebar_end();
?>


		</tr><tr><td class="menus" style="vertical-align:bottom;" >
		<img src="images/tentacle1.gif" style="vertical-align:bottom;" alt="Tentacle" />
		</td>
		</tr>

<tr><td colspan="2">
<table width="100%" cellspacing="0" cellpadding="0" ><!-- class="main-container" -->
<tr><td style="background:#fbf1ce;height:51px;" colspan=2>
    <table style="border-spacing:0px;margin:0px;width:80%;margin-left:auto;margin-right:auto;" align="center" cellspacing="0"><!-- width="80%" -->
	<tr>
		<td>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" style="margin:0px;"><div>
		<input type="hidden" name="cmd" value="_xclick">
		<input type="hidden" name="business" value="paypal@enderboi.com">
		<input type="hidden" name="item_name" value="ScummVM donation">
		<input type="image" src="<?=$file_root?>/images/ppdonate.gif" name="submit" alt="Donate to ScummVM with PayPal!">
		</div></form>	
		</td>
		<td>
			<a href="http://sourceforge.net/"><img src="http://sflogo.sourceforge.net/sflogo.php?group_id=37116" width="88" height="31" alt="SourceForge"></a>
		</td>
		<td>
			<a href="http://validator.w3.org/check/referer"><img src="http://www.w3.org/Icons/valid-html401" width="88" height="31" alt="Valid HTML 4.01!"></a>
		</td>
		<td>
			<a href="http://jigsaw.w3.org/css-validator/"><img src="http://jigsaw.w3.org/css-validator/images/vcss" width="88" height="31" alt="Valid CSS!" ></a>
		</td>
	</tr>
<!-- </td></tr> -->
	</table>
</td><td class="menus" style="width:163px;vertical-align:top;border:0px;" rowspan="2"><img src="images/tentacle2.gif" style="margin:0px;border:0px;
	vertical-align:bottom" alt="" /></td>
</tr><tr>
<td colspan="2">
<table width="100%" cellspacing="0" style="padding:0px;">
<tr>
<td width="12" style="height:5px;line-height:5px;width:12px;"><img alt="" src="images/content-left-bottom.gif" height="12" width="12"></td>
   <td style="background:#fbf1ce;line-height:2px;">&nbsp;&nbsp;</td>
</tr></table>
</tr>
</table>
</td>
</tr>
		    <tr><td colspan="2">
			<table width="100%" cellspacing="0">
				<tr>
					<td class="legal">LucasArts, Monkey Island, Maniac Mansion, Full Throttle, The Dig, LOOM, and probably lots of other 
					things are registered trademarks of <a href="http://www.lucasarts.com/">LucasArts, Inc.</a>. 
					All other trademarks and registered trademarks are owned by their respective companies. ScummVM is 
					not affiliated in any way with LucasArts, Inc.</td>
					<td width="110"><img src="images/tentacle3.gif" alt="" /></td>
					<td width="29">&nbsp;</td> 
				</tr>
			</table>
		</td></tr>
		</table>
	</body>
</html>

<?php
}

function html_br ($count = 1)
{
	return str_repeat("<br>\n", $count);
}

// HTML A HREF
function html_ahref ($label, $url, $extra = "")
{
	$label = stripslashes($label);
	if (!$label and $url)
	{	
		if (ereg("@",$url))
		{
			return " <a href=\"mailto:$url\" $extra>$url</a> ";
		}
		else
		{
			return " <a href=\"$url\" $extra>$url</a> ";
		}
	}
	else if (!$label)
	{
		return " &nbsp; ";
	}
	else
	{
		return " <a href=\"$url\" $extra>$label</a> ";
	}
}

// HTML P
function html_p ($str = "&nbsp;", $extra = null)
{
	return "<p $extra>$str</p>";
}

function html_blockquote ($str = "&nbsp;")
{
	return '<div style="margin-left: 3em;">'.$str.'</div>';
}
// Draw a Colored Pixel Line
function html_line ($width = "100%", $height = 1, $color = "grey")
{
	global $file_root;
	return '<img src="'.$file_root.'/images/'.$color.'_pixel.gif" height="'.$height.'" width="'.$width.'" alt="-">';
}

function html_frame_start ($title = "", $width = "", $cellPad = 5, $cellSpc = 1, $color = "color2", $extra = "")
{
	global $file_root;
	global $_trcolor;
	$_trcolor = 0;
	if ($width) { $width = " style='width: $width;'"; }

	$str = "";
	$str .= "<div class='frame'".$width.">\n";

	if ($title) {
		$str .= '<div class="frameTop"><span class="frameTitle">'.$title.'</span></div>'."\n";
	}

	$str .= '<table width="100%" border="0" class="'.$color.'" cellpadding="'.$cellPad.'" cellspacing="'.$cellSpc.'" '.$extra.'>'."\n";

	return $str;
}

function html_frame_end ($text = "")
{
	global $file_root;
	$str = "</table>\n";
	if ($text) {
		$str .= '<div class="frameBottom"><span class="frameTitle">'.$text.'</span></div>'."\n";
	}
	$str .= "</div>\n\n";
	return $str;
}

function html_frame_tr ($td = "<td>&nbsp;</td>", $color = "color2", $extra = null)
{
    $str = '<tr valign="top" class="'.$color.'" '.$extra.'>'."\n".$td.'</tr>'."\n";
    return $str;
}

function html_frame_td ($txt = "&nbsp;", $extra = null)
{
    $str = '<td '.$extra.'>'.$txt.'</td>'."\n";
    return $str;
}

function html_back_link ($howmany = 1, $url = "")
{
	if (!$url)
	{
		$url = 'javascript:history.back('.$howmany.');';
	}
	return '<p>&nbsp;&nbsp; <a href="'.$url.'">&lt;&lt; Back</a></p>'."\n";
}

function html_subhead_start($subhead) {
?>
    <div class="par-subhead">
    <?php echo $subhead; ?>
    </div>
    <div class="par-subhead-dots">
	&nbsp;
    </div>
<?php
}

?>
