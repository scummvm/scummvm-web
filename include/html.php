<?php

/*
 * HTML lib for ScummVM
 * by Jeremy Newman <jnewman@dracowulf.com>
 *
 */
 
$_trcolor = 0;

// Set the current Indent Level
function do_indent ($str, $v = 0)
{
	return $str;
}

// HTML BR
function html_br ($count = 1)
{
	return do_indent(str_repeat("<br>\n", $count));
}

// HTML A HREF
function html_ahref ($label, $url, $extra = "")
{
	$label = stripslashes($label);
	if (!$label and $url)
	{	
		if (ereg("@",$url))
		{
			return do_indent(" <a href=\"mailto:$url\" $extra>$url</a> ");
		}
		else
		{
			return do_indent(" <a href=\"$url\" $extra>$url</a> ");
		}
	}
	else if (!$label)
	{
		return do_indent(" &nbsp; ");
	}
	else
	{
		return do_indent(" <a href=\"$url\" $extra>$label</a> ");
	}
}

// HTML echo a string
function html_echo ($str)
{
	return do_indent($str);
}

// HTML B (bold)
function html_b ($str)
{
	return do_indent("<b>$str</b>");
}

// HTML SMALL (small text)
function html_small ($str)
{
	return do_indent("<small>$str</small>");
}

// HTML P
function html_p ($str = "&nbsp;", $extra = null)
{
	return do_indent("<p $extra>$str</p>");
}

// HTML blockquote
function html_blockquote ($str = "&nbsp;")
{
	return do_indent('<div style="margin-left: 3em;">'.$str.'</div>');
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
	$str .= "</table>\n";
	if ($text) {
		$str .= '<div class="frameBottom"><span class="frameTitle">'.$text.'</span></div>'."\n";
	}
	$str .= "</div>\n\n";
	return $str;
}

function html_round_frame_start ($title = "", $extra = "")
{
	global $file_root;

	$str .= "<div class='frame'>\n";
	
	if ($title) {
		$str .= '<div class="frameTop"><div class="cornerLeft"><div class="cornerRight">';
		$str .= '<span class="frameTitle">'.$title.'</span>';
		$str .= '</div></div></div>'."\n";
	}
	
	$str .= "<div class='frameBody' style='background-color: #ffffff'>\n";
//	$str .= '<table width="100%" border="0" cellpadding='.$innerPad.' cellspacing=1 '.$extra.'><tr><td class="color2">'."\n";

	return $str;
}

function html_round_frame_end ($text = "&nbsp;")
{
	global $file_root;
	$str .= "</div>\n";
//	$str .= '</td></tr></table>'."\n";
	if ($text) {
		$str .= '<div class="frameBottom"><div class="cornerLeft"><div class="cornerRight">';
		$str .= '<span class="frameTitle">'.$text.'</span>';
		$str .= '</div></div></div>'."\n";
	}
	$str .= "</div>\n\n";
	return $str;
}

function html_frame_row_color ($text = "&nbsp;")
{
    global $_trcolor;
    if ($_trcolor % 2 == 1) { $trcolor = 'color2'; } else { $trcolor = 'color1'; }
    $str = '<tr class="'.$trcolor.'"><td>'.$text.'</td></tr>'."\n";
    $_trcolor++;
    return $str;
}

function html_frame_row ($text = "&nbsp;", $extra = null)
{
    $str = '<tr class=color2 '.$extra.'><td>'.$text.'</td></tr>'."\n";
    return $str;
}

function html_frame_tr ($td = "<td>&nbsp;</td>", $color = "color2", $extra = null)
{
    $str = '<tr valign="top" class="'.$color.'" '.$extra.'>'."\n".$td.'</tr>'."\n";
    return do_indent($str);
}

function html_frame_td ($txt = "&nbsp;", $extra = null)
{
    $str = '<td '.$extra.'>'.$txt.'</td>'."\n";
    return do_indent($str);
}

function html_back_link ($howmany = 1, $url = "")
{
	if (!$url)
	{
		$url = 'javascript:history.back('.$howmany.');';
	}
	return '<p>&nbsp;&nbsp; <a href="'.$url.'">&lt;&lt; Back</a></p>'."\n";
}

function html_form_start ($script, $name, $method = "post")
{
	$str = '<form name="'.$name.'" action="'.$script.'" method="'.$method.'">'."\n";
	return $str;
}

function html_form_end ()
{
	return '</form>'."\n";
}

function html_form_input_text ($name, $size = 20, $value = "")
{
	$str = '<input type=text name="'.$name.'" size="'.$size.'" value="'.$value.'">'."\n";
	return $str;
}

function html_form_input_password ($name, $size = 20, $value = "")
{
	$str = '<input type=password name="'.$name.'" size="'.$size.'" value="'.$value.'">'."\n";
	return $str;
}

function html_form_input_hidden ($name, $value = "")
{
	$str = '<input type=hidden name="'.$name.'" value="'.$value.'">'."\n";
	return $str;
}

function html_form_input_textarea ($name, $cols = 20, $rows = 5, $value = "")
{
	$str = '<textarea name="'.$name.'" cols="'.$cols.'" rows="'.$rows.'">'.$value.'</textarea>'."\n";
	return $str;
}

function html_form_input_select ($name, $options, $selected = "")
{
	$str = '<select name="'.$name.'">'."\n";
	while(list($key, $val) = each($options))
	{	
		if ($key == $selected)
		{
			$str .= '<option value="'.$key.'" selected>'.$val.'</option>'."\n";
		} else {
			$str .= '<option value="'.$key.'">'.$val.'</option>'."\n";		
		}
	}
	$str .= '</select>'."\n";
	return $str;
}

function html_form_input_checkbox ($name, $checked = null)
{
	if ($checked == 1)
		$str = '<input type="checkbox" name="'.$name.'" checked>'."\n";
	else
		$str = '<input type="checkbox" name="'.$name.'">'."\n";
	return $str;	
}

function html_form_submit ($value = "")
{
	$str = '<input type=submit name="submit" value="'.$value.'">'."\n";
	return $str;
}

function html_form_js_button ($url = null)
{
	global $PHP_SELF;
	if (!$url) { $url = $PHP_SELF; }
	$str = '<input type=button value=" &lt;&lt; Back " name="jsback" onClick="javascript:self.location=\''.$url.'\';">'."\n";
	return $str;
}

function html_add_br ($text = "")
{
	$text = ereg_replace("\n","<br>\n",$text);
	return $text;
}

// url-ify urls
function html_urlify ($text)
{
	$text = htmlspecialchars($text);

	$urlreg = "([a-zA-Z]+://([^\t\r\n ]+))";
	if (ereg($urlreg,$text))
	{
		$text = ereg_replace($urlreg, "<a href=\"\\1\"> \\2 </a>", $text);
	}
	
	$emailreg = "([a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+\.[a-zA-Z0-9_-]+)";
	if (ereg($emailreg,$text))
	{
		$text = ereg_replace($emailreg, "<a href='mailto:\\1'>\\1</a>", $text);
	}

	return $text;
}

// simple httpd header redirect 
function redirect ($url = ".")
{
	header("Location: ".$url);
}


function html_header ($title, $extra = "")
{
	global $file_root;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
	<title><?=$title?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<meta name="author" content="Jeremy Newman <jnewman at dracowulf.com>">
	<link rel="stylesheet" href="<?=$file_root?>/styles.css" type="text/css">
	<?=$extra?>
	<script src="<?=$file_root?>/scripts.js" type="text/javascript"></script>
</head>

<body>

<div style="width: 100%; height: 111px; background-image:url(<?=$file_root?>/images/scummvm_top_tile.png)">
	<img src="<?=$file_root?>/images/scummvm_logo.png"  width="407" height="111" alt="ScummVM" style="float: left">
	<img src="<?=$file_root?>/images/scummvm_chars.png" width="193" height="111" alt="-" style="float: right">
</div>
<?
}

function html_footer ()
{
?>

<div id="copyright">
LucasArts, Monkey Island, Maniac Mansion, Full Throttle,
The Dig, LOOM, and probably lots of other things are
registered trademarks of <a href="http://www.lucasarts.com">LucasArts, Inc.</a>.
All other trademarks and registered trademarks are
owned by their respective companies.
ScummVM is not affiliated in any way with LucasArts, Inc.
</div>

</body>
</html>
<?

}

?>
