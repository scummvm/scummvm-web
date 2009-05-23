<?php
require_once('Objects/BasicObject.php');
/**
 * The news class represents a news item on the website.
 */
class News extends BasicObject {
	private $_title;
	private $_date;
	private $_author;
	private $_image;
	private $_content;

	/**
	 * News object constructor that extracts the data from the pseudo-XML scheme
	 * used. The format looks like this:
	 *
	 * <NAME>Schwag</NAME>
	 * <DATE>1st january, 1770</DATE>
	 * <AUTHOR>Guybrush Threepwood</AUTHOR>
	 * <IMG>path/to/treasure.jpg</IMG>
	 * <BODY>All I got was this lousy t-shirt!</BODY>
	 *
	 *
	 * FIXME: It currently fails at grabbing the image (see 20020214.xml)
	 */
	public function __construct($data) {
		$vars = array();
		preg_match("/<NAME>(.*)<\/NAME>.*		# Grab the title
					<DATE>(.*)<\/DATE>.*		# Grab the date
					<AUTHOR>(.*)<\/AUTHOR>.*	# Grab the author
					(?:<IMG>(.*)<\/IMG>.*)?		# image if set (only once)
					<BODY>(.*)<\/BODY>			# Grab the body
					/sUx", $data, $vars);
		if (count($vars) == 6) {
			$this->_title = $vars[1];
			/* Store the date as an unix timestamp*/
			$this->_date = intval(strtotime($vars[2]));
			$this->_author = $vars[3];
			$this->_image = $vars[4];
			$this->_content = $vars[5];
		}
	}

	/* Get the title. */
	public function getTitle() {
		return $this->_title;
	}

	/* Get the date. */
	public function getDate() {
		return $this->_date;
	}

	/* Get the author. */
	public function getAuthor() {
		return $this->_author;
	}

	/* Get the optional image. */
	public function getImage() {
		return $this->_image;
	}

	/* Get the content. */
	public function getContent() {
		return $this->_content;
	}
}
?>
