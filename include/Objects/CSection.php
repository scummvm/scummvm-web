<?php
require_once('Objects/BasicObject.php');
require_once('Objects/Person.php');
/**
 * The Section class represens a section (or a subsection) on the credits page
 * on the website.
 */
class CSection extends BasicObject {
	private $_title;
	private $_groups;
	private $_subsections;
	private $_paragraphs;

	/* CSection object constructor. */
	public function __construct($data) {
		$this->_title = $data['title'];
		$this->_groups = array();
		$this->_subsections = array();
		$this->_paragraphs = array();

		if (isset ($data['subsection'])) {
			foreach ($data['subsection'] as $value) {
				$this->_subsections[] = new CSection($value);
			}
		}
		if (isset ($data['group'])) {
			parent::toArray($data['group']);
			foreach ($data['group'] as $value) {
				$persons = array();
if (is_string($value['person'])) {
	var_dump($value);
	die();
}
				parent::toArray($value['person']);
				foreach ($value['person'] as $args) {
					$persons[] = new Person($args);
				}
				if (count($persons) > 0) {
					$this->_groups[] = array(
						'name' => $value['name'],
						'persons' => $persons,
					);
				}
			}
		}
		if (isset ($data['paragraph'])) {
			parent::toArray($data['paragraph']);
			$this->_paragraphs = $data['paragraph'];
		}
	}

	/* Get the title. */
	public function getTitle() {
		return $this->_title;
	}

	/* Get the optional list of groups. */
	public function getGroups() {
		return $this->_groups;
	}

	/* Get the optional list of subsections. */
	public function getSubSections() {
		return $this->_subsections;
	}

	/* Get the optional list of paragraphs. */
	public function getParagraphs() {
		return $this->_paragraphs;
	}
}
?>
