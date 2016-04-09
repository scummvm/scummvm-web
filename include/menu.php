<?php

/*
 * Menu class for ScummVM
 * by Jeremy Newman <jnewman@dracowulf.com>
 *
 */

class htmlmenu {

    function htmlmenu($name)
    {
		echo "<div class='sideMenu'>";
		echo "<div class='header'><div class='headerRight'>".$name."</div></div>";
    }

    /* add a table row */
    function add($name, $url = null)
    {
		echo '<div class="item">';
		if($url) {
			echo "<a href='$url'>$name</a>";
		} else {
			echo "$name";
		}
		echo "</div>\n";
    }

    function done($extra = "")
    {
		echo "<div class='footer'><div class='footerRight'>&nbsp;</div></div></div>\n";
		echo $extra;
		echo "<br>\n";
    }
}
?>
