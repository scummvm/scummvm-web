<?php
/**
 * The BasicObject class is inherited by all other objects and houses all common
 * functions.
 */
abstract class BasicObject {
	/**
	 * If the input array doesn't contain the numerical key 0, wrap it inside
	 * an array. This functions operates on the data directly.
	 *
	 * @param mixed &$data the input
	 */
	public function toArray(&$data) {
		if (!is_array($data) || !array_key_exists(0, $data)) {
			$data = array($data);
		}
	}
}
?>
