<?php
require_once('Objects/BasicObject.php');
require_once('Objects/QAEntry.php');
/**
 * The QASection class represents a section with questions and answers on the
 * website F.A.Q. page.
 */
class QASection extends BasicObject {
	private $_title;
	private $_entries;
	private $_toc;

	/**
	 * QASection object constructor.
	 *
	 * @param array $data list containing all qasection data
	 * @param int $section_number used in the TOC
	 * @param array $xref reference to xref map
	 */
	public function QASection($data, $section_number, &$xref) {
		$this->_title = $data['title'];
		$this->_entries = array();
		$this->_toc = array();
		parent::toArray($data['entry']);
		$count = 1;
		foreach ($data['entry'] as $key => $value) {
			$qa = new QAEntry($value, $section_number, $count++, $xref);
			$this->_entries[] = $qa;
			$this->_toc[$qa->getHref()] = $qa->getQuestion();
		}
	}

	/* Get the title of this section. */
	public function getTitle() {
		return $this->_title;
	}

	/* Get a list with all question-answer entries for this section. */
	public function getEntries() {
		return $this->_entries;
	}

	/* Get the table of contents for this section. */
	public function getTOC() {
		return $this->_toc;
	}
}
?>
