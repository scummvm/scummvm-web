<?php
/**
 * An XML parser that will build a multidimensional array (aka a tree) from the
 * given XML data, either by filename or by data. The parser is namespace aware,
 * and will add anything found in a namespace as data to the current open
 * element.
 *
 * @access public
 * @author Fredrik Wendel
 * @version 1.0
 */
class XMLParser {
	const FILE_NOT_FOUND = 'The filename specified doesn\'t point to an exiting file.';
	const FILE_NOT_READABLE = 'Unable to read the contents of the file.';
	const DATA_NOT_XML = 'The data provided is not XML.';
	const PARSER_ERROR = 'Error parsing XML.';

	const NS_HTML4 = 'http://www.w3.org/TR/html4/';
	const NS_XHTML = 'http://www.w3.org/TR/xhtml1/';

	static private $empty_elements = array('br', 'hr', 'img');
	private $_tree;
	private $_data;
	private $_ptr;

	/**
	 * Constructor.
	 *
	 * @access public
	 * @since 1.0
	 */
	public function XMLParser() {
		$this->_tree = array();
		$this->_data = null;
		$this->_ptr = null;
	}

	/**
	 * Parse XML by filename, will read the XML data from a file and then parse
	 * it. Returns a multidimensional array (aka tree). Optionally it will also
	 * clear the tree and remove nested single arrays and link the values to the
	 * parent directly instead.
	 *
	 * @param string $filename full path the XML file to parse
	 * @return bool|array
	 * @access public
	 * @since 1.0
	 * @throws ErrorException
	 */
	public function parseByFilename($filename) {
		$file = "\n\nFilename: " . basename($filename) . "\n";
		/* If we can't read the file there is nothing we can do. */
		if (!is_file($filename) || !is_readable($filename)) {
			throw new ErrorException(self::FILE_NOT_FOUND . $file);
		}
		/* Read the file contents. */
		if (!($xml = @file_get_contents($filename))) {
			throw new ErrorException(self::FILE_NOT_READABLE . $file);
		}

		/* Parse the XML. */
		try {
			return $this->parseByData($xml);
		} catch (ErrorException $e) {
			$msg = "{$e->getMessage()}{$file}";
			throw new ErrorException($msg);
		}
	}

	/**
	 * Parses the XML data and returns a multidimensional array (aka tree).
	 * Optionally it will also clear the tree and remove nested single arrays
	 * and link the values to the parent directly instead.
	 *
	 * @param string $xml the XML to parse
	 * @param bool $destroy_single_arrays whether to keep nested single arrays or not
	 * @return bool|array
	 * @access public
	 * @since 1.0
	 * @throws ErrorException
	 */
	public function parseByData($xml) {
		if (!is_string($xml) || strlen($xml) == 0) {
			throw new ErrorException(self::DATA_NOT_XML);
		}
		/* Create a parser and set the options */
		$parser = xml_parser_create_ns();
		xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
		xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
		xml_set_object($parser, $this);
		xml_set_element_handler($parser, 'startElement', 'endElement');
		xml_set_character_data_handler($parser, 'getElement');

		/**
		 * Workaround the XML-parser not being able to handle HTML-entities by
		 * encapsulating them as CDATA.
		 */
		$pattern = '/(&(?:(?!quot|amp|apos|lt|gt)([a-z]+)|(#\d+));)/iU';
		$replace = '<![CDATA[\\1]]>';
		$xml = preg_replace($pattern, $replace, $xml);
		/* Parse the data and free the parser resource. */
		if (!xml_parse($parser, $xml, true)) {
			$error = "\n\nError code: " . xml_get_error_code($parser) . "\n";
			$error .= "Line: " . xml_get_current_line_number($parser) . ", character: " . xml_get_current_column_number($parser) . "\n";
			$error .= "Error message: " . xml_error_string(xml_get_error_code($parser)) . "\n";
			xml_parser_free($parser);
			throw new ErrorException(self::PARSER_ERROR . $error);
		}
		xml_parser_free($parser);
		/**
		 * The root element will contain an array with an empty key, so we can
		 * skip that one right now.
		 */
		$tree = $this->_tree[''];
		$this->simplifyArray($tree);
		return $tree;
	}

	/**
	 * Handles new tags opening in the XML-document.
	 *
	 * @param resource $parser XML parser resource
	 * @param string $name name of the tag
	 * @param array $attrs list of all attributes for the tag (if any)
	 * @access private
	 * @since 1.0
	 */
	private function startElement($parser, $name, $attrs) {
		/* If we find a colon in the name, we need to check the namespace. */
		if (strpos($name, ':') !== false) {
			$namespace = implode(':', explode(':', $name, -1));
			/* Got (X)HTML data. */
			if (in_array($namespace, array(self::NS_HTML4, self::NS_XHTML))) {
				$pos = strrpos($name, ':');
				$namespace = substr($name, 0, $pos);
				$name = substr($name, ($pos+1));
				$data = "<{$name}";
				foreach ($attrs as $key => $value) {
					$data .= " {$key}=\"{$value}\"";
				}
				/* Handle HTML "empty" elements (ie: <br>, <hr>) properly. */
				if ($namespace == self::NS_XHTML && in_array($name, self::$empty_elements)) {
					$data .= " /";
				}
				$data .= ">";
				$this->getElement($parser, $data);
			}
	    /* If not we can just rock on. */
		} else {
			if (!is_array($attrs) || (is_array($attrs) && count($attrs) == 0)) {
				$element = null;
			} else {
				$element = $attrs;
				/*$element = array();
				foreach ($attrs as $key => $value) {
					$element[$key] = $value;
				}*/
			}

			/* Get the key for the last node in the tree. */
			end($this->_tree);
			$key = key($this->_tree);

			/* Store the position so we can add the data later. */
			$this->_ptr = &$this->_tree[$key][$name];
			/* Store a reference the attributes. */
			if ($element != null) {
				$this->_ptr['@attributes'] = &$element;
			} else {
				/**
				 * For one reason or another that escapes me, we must do this,
				 * or the tree won't be properly built. We will work against it
				 * in endElement() by overwriting the empty elements created
				 * here.
				 */
				$this->_ptr[] = &$element;
			}
			/**
			 * Store the reference directly in the tree until this node (and
			 * it's children) are done. Will get removed in endElement().
			 */
			$this->_tree[$name] = &$element;
		}
	}

	/**
	 * Handles data between tags in the XML-document.
	 *
	 * @param resource $parser XML parser resource
	 * @param mixed $data data found between tags
	 * @access private
	 * @since 1.0
	 */
	private function getElement($parser, $data) {
		$this->_data .= $data;
	}

	/**
	 * Handles tags closing in the XML-document.
	 *
	 * @param resource $parser XML parser resource
	 * @param string $name name of the tag
	 * @access private
	 * @since 1.0
	 */
	private function endElement($parser, $name) {
		/* If we find a colon in the name, we need to check the namespace. */
		if (strpos($name, ':') !== false) {
			$namespace = implode(':', explode(':', $name, -1));
			/* Got (X)HTML data. */
			if (in_array($namespace, array(self::NS_HTML4, self::NS_XHTML)))  {
				$pos = strrpos($name, ':');
				$namespace = substr($name, 0, $pos);
				$name = substr($name, ($pos+1));
				/* Handle HTML "empty" elements (ie: <br>, <hr>) properly. */
				if (!in_array($name, self::$empty_elements)) {
					$this->getElement($parser, "</{$name}>");
				}
			}
		/* Otherwise we can just add the data. */
		} else {
			$data = trim($this->_data);
			if (!empty($data)) {
				/* If we got an empty element in the array, overwrite it. */
				$pos = count($this->_ptr);
				if (is_null($this->_ptr[($pos-1)])) {
					$pos--;
				}
				$this->_ptr[$pos] = $data;
			}

			/* Reset the internal data holder. */
			$this->_data = null;
			/* Remove the reference. */
			$pop = array_pop($this->_tree);
		}
	}

	/**
	 * Removes unnecessary arrays in an array tree, if an array contains an
	 * array with just one element in it, the middle array will be removed.
	 * It won't touch 'attributes' keys though.
	 *
	 * @param array $array reference to the array tree
	 * @param string $parent name of the parent
	 * @param boolean $all_singles remove named single arrays or just 0 ones
	 * @access private
	 * @since 1.0
	 */
	private function simplifyArray(&$array, $parent='', $all_singles=false) {
		if (is_array($array) && count($array) > 0) {
			foreach ((array)$array as $key => $value) {
				if (is_array($value) && $key !== '@attributes') {
					$this->simplifyArray($array[$key], $key);
				}
				if (count($array) == 1) {
					if (array_key_exists(0, $array)) {
						// HACK: The compatibility page assumes that the entry
						// 'game' is always an array. In case only one 'game'
						// tag is specified in a 'games' tag this would result
						// in the array of 'game' being simplified (i.e.
						// replaced by its contents). This breaks the
						// compatibility page. We work around this issue by
						// simply not simplifying arrays when the parent is
						// named 'game'.
						if ($parent !== 'game') {
							$array = $array[0];
						}
					} else {
						$keys = array_keys($array);
						$this->simplifyArray($array[$keys[0]], $keys[0]);
					}
				}
			}
		}
	}
}
?>
