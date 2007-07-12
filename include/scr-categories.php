<?php

$categories = array();

function display_categories_list() {
  global $categories;
  global $file_root;

  echo "<table border=0>\n";
  foreach ($categories as $cat) {
    html_nav_item("#cat".$cat->_catnum, $cat->_name);
  }
  echo "</table>\n";
}

function display_categories() {
  global $categories;

  foreach ($categories as $cat) {
    html_subhead_start('<a name="cat'.$cat->_catnum.'"></a><a href="?cat1='.
		       $cat->_catnum .'&amp;cat2=-1">'.$cat->_name.'</a>');

    echo '<div class="par-scr-content-cat'.$cat->_catnum.'">';

    $cat->display();
    echo "<br><br>\n";
    echo "</div>\n";
  }
}

class category {
  var $_name;
  var $_list;
  var $_catnum;

  function category($catnum, $name) {
    global $categories;

    $this->_list = array();
    $this->_name = $name;
    $this->_catnum = $catnum;

    array_push($categories, & $this);
  }

  function add($scrnum, $filename, $description) {
    array_push ($this->_list, array("filename" => $filename, "description" => $description,
				    "catnum" => $scrnum));
  }

  function display() {
    global $scrcatnums;
    global $file_root;

    echo "<table border=0>\n";
    foreach($this->_list as $cat) {
      echo "<tr><td class='cat-bullet'><img src='$file_root/images/".$cat['filename'].
      	"' alt=\"\"></td><td class='cat-link'><a href=\"?cat1=".$this->_catnum."&amp;cat2=".$cat['catnum']."\">".
      	$cat['description'].
      	"</a> <font class='cat-count'>(".count($scrcatnums[$this->_catnum][$cat['catnum']])." shots)</font></td></tr>\n";
    }
    echo "</table>\n";
  }
}

// LEC games
$cat = & new category(0, "LucasArts games");

$cat->add(0, "cat-maniac.png", "Maniac Mansion");
$cat->add(1, "cat-zak.png", "Zak McKracken and the Alien Mindbenders");
$cat->add(2, "cat-indy3.png", "Indiana Jones and the Last Crusade");
$cat->add(6, "cat-loom.png", "Loom");
$cat->add(4, "cat-monkey1.png", "The Secret of Monkey Island");
$cat->add(5, "cat-monkey2.png", "Monkey Island 2: Le Chuck's Revenge");
$cat->add(3, "cat-indy4.png", "Indiana Jones and the Fate of Atlantis");
$cat->add(8, "cat-tentacle.png", "Day of the Tentacle");
$cat->add(7, "cat-samnmax.png", "Sam &amp; Max Hit the Road ");
$cat->add(9, "cat-ft.png", "Full Throttle");
$cat->add(10, "cat-dig.png", "The Dig");
$cat->add(11, "cat-comi.png", "The Curse of Monkey Island");

// AGI games
$cat = & new category(3, "Sierra AGI games");
$cat->add(1, "cat-bc.png", "The Black Cauldron");
$cat->add(2, "cat-gr.png", "Gold Rush");
$cat->add(3, "cat-kq.png", "King's Quest series");
$cat->add(4, "cat-lsl.png", "Leisure Suit Larry");
$cat->add(5, "cat-mh.png", "Manhunter series");
$cat->add(6, "cat-mumg.png", "Mixed-Up Mother Goose");
$cat->add(7, "cat-pq.png", "Police Quest");
$cat->add(8, "cat-sq.png", "Space Quest series");
$cat->add(9, "cat-fan.png", "Fanmade games");

// Other games
$cat = & new category(2, "Other games");
$cat->add(11, "cat-bargon.png", "Bargon Attack");
$cat->add(5, "cat-sky.png", "Beneath a Steel Sky");
$cat->add(0, "cat-sword.png", "Broken Sword series");
$cat->add(3, "cat-queen.png", "Flight of the Amazon Queen");
$cat->add(8, "cat-fw.png", "Future Wars: Time Travelers");
$cat->add(1, "cat-gob.png", "Gobliiins series");
$cat->add(2, "cat-ite.png", "Inherit the Earth: Quest for the Orb");
$cat->add(12, "cat-nippon.png", "Nippon Safes Inc.");
$cat->add(4, "cat-simon.png", "Simon the Sorcerer series");
$cat->add(7, "cat-feeble.png", "The Feeble Files");
$cat->add(6, "cat-kyra.png", "The Legend of Kyrandia series");
$cat->add(10, "cat-touche.png", "Touch&eacute;: The Adventures of the Fifth Musketeer");
$cat->add(9, "cat-ween.png", "Ween: The Prophecy");

// HE games
$cat = & new category(1, "Humongous Entertainment games");
$cat->add(0, "cat-thinkers.png", "Big Thinkers series");
$cat->add(4, "cat-fbear.png", "Fatty Bear series");
$cat->add(6, "cat-ffish.png", "Freddi Fish series");
$cat->add(1, "cat-field.png", "Junior Field Trips series");
$cat->add(5, "cat-sports.png", "Junior Sports series");
$cat->add(7, "cat-pajama.png", "Pajama Sam series");
$cat->add(8, "cat-puttputt.png", "Putt-Putt series");
$cat->add(3, "cat-spyfox.png", "Spy Fox series");

?>
