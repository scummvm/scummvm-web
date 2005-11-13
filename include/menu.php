<?
class htmlmenu {

  function htmlmenu($name, $style, $extra = "") {
    echo '<table class="menu" cellspacing="0">';
    echo '<tr class="'.$style.'">';
    echo "  <th>$name</th>";
?>

  </tr>
  <tfoot>
    <tr>
      <td><img src="images/menu-bottom.gif" alt="" /></td>
    </tr>

<?php
     if ($extra) {
       echo "<tr><td>$extra</td></tr>\n";
     }
?>


  </tfoot>
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
