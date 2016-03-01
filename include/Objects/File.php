<?php
require_once('Objects/BasicObject.php');
/**
 * The File object represents a file on the website.
 */
class File extends BasicObject {
	private $_category_icon;
	private $_url;
	private $_name;
	private $_type;
	private $_extra_info;
	private $_user_agent;

	public function __construct($data, $baseurl=null, $baseturl=null) {
		$this->_category_icon = $data['category_icon'];
		$this->_name = $data['name'];
		$this->_extra_info = $data['extra_info'];
		$this->_type = strtolower($data['type']);
		$this->_user_agent = isset($data["user_agent"]) ? $data["user_agent"] : "";

		$fname = "";

		/* If it's not an array, we didn't get any attributes. */
		if (!is_array($data['url'])) {
			$url = $data['url'];
			$attributes = array();
		} else {
			$url = $data['url'][0];
			$attributes = $data['url']['@attributes'];
		}

		if (!preg_match('/^((https?)|(ftp)):\/\//', $url)) {
			if ($attributes['type'] == 'downloads') {
				$url = DIR_DOWNLOADS . "/{$url}";
			} else if ($attributes['type'] == 'tools') {
				$url = $baseturl . $url;
			} else {
				$url = $baseurl . $url;
			}

			$fname = "." . $url;

			if (is_file($fname) && is_readable($fname)) {
				$this->_extra_info = array();
				$this->_extra_info['size'] = round((@filesize($fname) / 1024));
				$this->_extra_info['ext'] = substr($url, (strrpos($url, '.')+1));
			}
		}
		$this->_url = $url;

		/**
		 * Get the filesize/last modified information and put it in
		 * $this->_extra_info.
		 */
		if ($attributes['extra_info'] == 'true') {
			if (is_file($fname) && is_readable($fname)) {
				$this->_extra_info['date'] = date('F j, Y, g:i a', @filemtime($fname));
				if (!is_null($data['extra_info'])) {
					$this->_extra_info['info'] = $data['extra_info'];
				}
			}
		}
	}

	/* Get the category icon. */
	public function getCategoryIcon() {
		return $this->_category_icon;
	}

	/* Get the URL. */
	public function getURL() {
		return $this->_url;
	}

	/* Get the name. */
	public function getName() {
		return $this->_name;
	}

	/* Get the type. */
	public function getType() {
		return $this->_type;
	}

	/* Get the extra information. */
	public function getExtraInfo() {
		return $this->_extra_info;
	}

	/* Get the user-agent. */
	public function getUserAgent() {
		return $this->_user_agent;
	}
}
?>
