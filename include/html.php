<?php

function html_page_header($title, $extra_css = array()) {
  global $file_root;

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<meta http-equiv="Content-Script-Type" content="text/javascript">
		<link rel="stylesheet" href="<?=$file_root?>/style.css" type="text/css">

<?php
  foreach ($extra_css as $css_file) {
    echo '<link rel="stylesheet" href="./' . $css_file . '" type="text/css">'."\n";
    echo '<link rel="alternate" type="application/atom+xml" title="ScummVM Atom news feed" href="http://www.scummvm.org/feed-atom.php">'."\n";
    echo '<link rel="alternate" type="application/rss+xml" title="ScummVM RSS news feed" href="http://www.scummvm.org/feed-rss20.php">'."\n";
  }

  echo "<title>$title</title>\n";
?>
	</head>
	<body>

        <!-- HTML/CSS coding by Yaroslav Fedevych jaroslaw@nospam.kiev.ua -->

	<table class="main-container" width="90%" cellspacing="0" cellpadding="0" align="center">
		<tr>
			<td colspan="2"><table cellspacing="0" cellpadding="0" style="width:100%;">
	    <tr><td rowspan="2" width="287"><img alt="ScummVM logo" src="<?=$file_root?>/images/scummvm_logo.jpg" width="287" height="118" border="0"></td>
	    <td rowspan="2" style="background:url('<?=$file_root?>/images/bg-upper.gif')">&nbsp;</td>

					<td width="483">

<?php

$heroes = get_files($file_root."/images", null, "(heroes.+\\.png)");

$randImg = rand(0, count($heroes) - 1);

echo '<img alt="Game characters" src="'.$file_root.'/images/'.$heroes[$randImg].'" width="483" height="89">';

?>
</td>
					</tr>
    <tr><td width="483"><img alt="Script creation utility for Maniac Mansion Virtual Machine" src="<?=$file_root?>/images/scummvm-caption.png" width="482" height="29"></td>
					<td width="24">&nbsp;</td></tr>
				</table>
			</td>
		</tr>
		<tr>
			<td class="content" valign="top" rowspan="2" style="padding-right:1px;">

<?php
    }


function html_content_begin($title) {
  global $file_root;
?>

<table style="margin:0px;margin-top:0px;width:100%;" cellspacing="0" cellpadding="0">
<tr><td style="padding-left:8px;padding-right:8px;">
	<table width="100%" cellspacing="0" cellpadding="0">
		<tr>
    <td width="8" style="background:url('<?=$file_root?>/images/header-left-corner.gif');height:28px;">&nbsp;</td>
    <td style="background:url('<?=$file_root?>/images/header-background.gif')"><h2 style="margin:0px;color:#356a02;font-weigth:bold;padding-left:1em;
			font-family:Trebuchet MS,Verdana,Tahoma;font-size:18px;color:#821d06">
<?php
shadowed_text($title, '#821d06', '#ffffff');
?>

</h2></td>
  <td width="8" style="background:url('<?=$file_root?>/images/header-right-corner.gif');height:28px;">&nbsp;</td>
	</tr></table>
</td></tr>
<tr><td style="padding-left:8px;padding-right:8px;"><table width="100%" cellspacing="0"><tr><td style="border-left:1px solid #ebb716;border-right:1px solid #ebb716;padding:12px;background:#fff;">
<?php
}

function html_content_end() {
  global $file_root;
?>
	</td></tr></table></td>
<tr>
	<td style="padding-left:8px;padding-right:8px;"><table width="100%" cellspacing="0" cellpadding="0"><tr>
	<td width="8" style="height:28px;background:url('<?=$file_root?>/images/left-low-corner.gif')">&nbsp;</td>
	<td style="border-bottom:1px solid #ebb716;text-align:right;background:#fff;">&nbsp;</td>
	<td width="8" style="background:url('<?=$file_root?>/images/right-low-corner.gif')">&nbsp;</td>
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
		<img src="<?=$file_root?>/images/tentacle1.gif" style="vertical-align:bottom;" alt="Tentacle" width="163" height="159">
		</td>
		</tr>

<tr><td colspan="2">
<table width="100%" cellspacing="0" cellpadding="0" ><!-- class="main-container" -->
<tr><td style="background:#fbf1ce;height:51px;" colspan=2>
    <table style="border-spacing:0px;margin:0px;width:80%;margin-left:auto;margin-right:auto;" align="center" cellspacing="0"><!-- width="80%" -->
	<tr>
		<td> &nbsp; 
		</td>
		<td>
			<a href="http://sourceforge.net/"><img src="http://sflogo.sourceforge.net/sflogo.php?group_id=37116&amp;type=1" width="88" height="31" alt="SourceForge"></a>
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
</td><td class="menus" style="width:163px;vertical-align:top;border:0px;" rowspan="2"><img src="<?=$file_root?>/images/tentacle2.gif" style="margin:0px;border:0px;
	vertical-align:bottom" alt="" width="150" height="63"></td>
</tr><tr>
<td colspan="2">
<table width="100%" cellspacing="0" style="padding:0px;">
<tr>
<td width="12" style="height:5px;line-height:5px;width:12px;"><img alt="" src="<?=$file_root?>/images/content-left-bottom.gif" height="12" width="12"></td>
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
					<td width="110"><img src="<?=$file_root?>/images/tentacle3.gif" alt="" width="116" height="74"></td>
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

function html_nav_item($href, $text) {
  global $file_root;

  echo "  <tr><td class='nav-bullet'><img src='$file_root/images/bullet-section.gif' alt='*' width='10' height='7'></td><td class='nav-item'><a href='$href'>$text</a></td></tr>\n";
}

?>
