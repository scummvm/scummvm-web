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

    $categories[] = &$this;
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
      	"' alt=\"\" width=24 height=24></td><td class='cat-link'><a href=\"?cat1=".$this->_catnum."&amp;cat2=".$cat['catnum']."\">".
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

// AGOS games
$cat = & new category(4, "Adventuresoft/Horrorsoft games");
$cat->add(0, "cat-simon.png", "Simon the Sorcerer series");
$cat->add(2, "cat-elvira.png", "Elvira series");
$cat->add(1, "cat-feeble.png", "The Feeble Files");
$cat->add(3, "cat-waxworks.png", "Waxworks");

// Coktel Vision games
$cat = & new category(5, "Coktel Vision games");
$cat->add(2, "cat-bargon.png", "Bargon Attack");
$cat->add(3, "cat-woodruff.png", "The Bizarre Adventures of Woodruff and the Schnibble");
$cat->add(0, "cat-gob.png", "Gobliiins series");
$cat->add(4, "cat-lostintime.png", "Lost In Time");
$cat->add(1, "cat-ween.png", "Ween: The Prophecy");

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
$cat->add(12, "cat-mickey.png", "Mickey's Space Adventure");
$cat->add(10, "cat-troll.png", "Troll's Tale");
$cat->add(11, "cat-winnie.png", "Winnie the Pooh in the Hundred Acre Wood");

// Other games
$cat = & new category(2, "Other games");
$cat->add(3, "cat-sky.png", "Beneath a Steel Sky");
$cat->add(0, "cat-sword.png", "Broken Sword series");
$cat->add(15, "cat-tucker.png", "Bud Tucker in Double Trouble");
$cat->add(10, "cat-drascula.png", "Drascula: The Vampire Strikes Back");
$cat->add(2, "cat-queen.png", "Flight of the Amazon Queen");
$cat->add(5, "cat-fw.png", "Future Wars: Time Travelers");
$cat->add(8, "cat-ihnm.png", "I Have no Mouth and I Must Scream");
$cat->add(1, "cat-ite.png", "Inherit the Earth: Quest for the Orb");
$cat->add(11, "cat-lgop2.png", "Leather Goddesses of Phobos 2");
$cat->add(12, "cat-manhole.png", "The Manhole");
$cat->add(13, "cat-rtz.png", "Return to Zork");
$cat->add(14, "cat-rodney.png", "Rodney's Funscreen");
$cat->add(7, "cat-nippon.png", "Nippon Safes Inc.");
$cat->add(4, "cat-kyra.png", "The Legend of Kyrandia series");
$cat->add(9, "cat-lure.png", "Lure of the Temptress");
$cat->add(16, "cat-t7g.png", "The 7th Guest");
$cat->add(6, "cat-touche.png", "Touch&eacute;: The Adventures of the Fifth Musketeer");

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
