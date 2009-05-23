<?php
require_once('Objects/BasicObject.php');
/**
 * The Person class represents a person entry on the credits page on the
 * website.
 */
class Person extends BasicObject {
	private $_name;
	private $_alias;
	private $_description;

	/* Person object constructor. */
	public function __construct($args) {
		$this->_name = $args['name'];
		$this->_alias = $args['alias'];
		$this->_description = $args['description'];
	}

	/* Get the name. */
	public function getName() {
		return $this->_name;
	}

	/* Get the alias. */
	public function getAlias() {
		return $this->_alias;
	}

	/* Get the description. */
	public function getDescription() {
		return $this->_description;
	}
}
?>
