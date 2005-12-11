<?
class htmlmenu {

  function htmlmenu($name, $style, $extra = "") {
    global $file_root;
    echo '<table class="menu" cellspacing="0">';
?>
  <tfoot>
    <tr>
      <td><img src="<?=$file_root?>/images/menu-bottom.gif" alt="" width="145" height=13" /></td>
    </tr>

<?php
     if ($extra) {
       echo "<tr><td>$extra</td></tr>\n";
     }
?>
  </tfoot>

<?php
    echo '<tr class="'.$style.'">';
    echo "  <th>$name</th>";
?>

  </tr>
  <tbody>
    <tr>
      <td>
        <ul>
<?php
 }

 /* add a table row */
 function add($name, $url = null) {
   if($url) {
     echo "          <li><a href='$url'><b>{$name[0]}</b>".substr($name, 1)."</a></li>";
   } else {
     echo "          <li><b>{$name[0]}</b>".substr($name, 1)."</li>";
   }
 }

 function done() {
?>
        </ul>
      </td>
    </tr>
  </tbody>
</table>

<?php
 }
}
?>
