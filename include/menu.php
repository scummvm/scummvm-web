<?php
class htmlmenu {

  function htmlmenu($name, $style, $extra = "") {
    global $file_root;
?>
  <table class="menu" cellspacing="0">
  <tfoot>
    <tr>
      <td><img src="<?php echo $file_root; ?>/images/menu-bottom.gif" alt="" width="145" height="13"></td>
    </tr>
<?php
     if ($extra) {
       echo "<tr><td>$extra</td></tr>";
     }
?>
  </tfoot>
  <tr class="<?php echo $style; ?>"><th><?php echo $name; ?></th></tr>
  <tbody><tr><td><ul>
<?php
 }

 /* add a table row */
 function add($name, $url) {
     echo "<li><a href='$url'>$name</a></li>";
 }

 function done() {
    echo "</ul></td></tr></tbody></table>";
 }
}
?>
