<?

/*
 * Menu class for ScummVM
 * by Jeremy Newman <jnewman@dracowulf.com>
 *
 */
 
class htmlmenu {

    function htmlmenu($name, $form = null)
    {
	global $file_root;

	if ($form)
	{
	    echo "<form action='$form' method=get>\n";
	}

        echo "<table width=120 border=0 cellspacing=0 cellpadding=0>\n";
        echo "<tr>\n";
	echo "  <td width='100%' class=topMenu><span class=menuTitle>&nbsp;$name</span></td>\n";
        echo "  <td align=right valign=top class=topMenu><img src='".$file_root."/images/main_right_top.gif' border=0 alt='---'></td>\n";
        echo " </tr>\n";
        echo "</table>\n";
        echo  "<table width=120 border=0 cellspacing=0 cellpadding=2>\n";
        echo "<tr>\n";
        echo "  <td class=sideMenu><img src='".$file_root."/images/blank.gif' border=0 height=5 width=1 alt='---'></td>\n";
        echo "</tr>\n";	
    }

    /* add a table row */
    function add($name, $url = null)
    {
	if($url)
	{
	    echo "  <tr><td width='100%' class=sideMenu><span class=menuItem>&nbsp;<a href='$url' class=menuItem>$name</a></span></td></tr>\n";
	} else {
	    echo "  <tr><td width='100%' class=sideMenu><span class=menuItem>&nbsp;$name</span></td></tr>\n";
	}
    }

    function addmisc($stuff, $align = "left")
    {
	echo " <tr><td width='100%' class=sideMenu align=$align><span class=menuItem>&nbsp;$stuff</span></td></tr>\n";
    }

    function done($form = null, $extra = "")
    {
	global $file_root;

	echo "</table>\n";
        echo "<table width=120 border=0 cellspacing=0 cellpadding=0>\n";
        echo "<tr>\n";
        echo "  <td align=right class=sideMenu><img src='".$file_root."/images/main_right_bottom.gif' border=0 alt='---'></td>\n";
        echo "</tr>\n";
        echo "</table>";
	echo $extra;
	echo "<br>\n";
	
	if ($form)
	{
	    echo "</form>\n";
	}
	
    }
}
?>
