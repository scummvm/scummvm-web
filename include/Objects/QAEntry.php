<?php
require_once('Objects/BasicObject.php');
/**
 * The QAEntry class represents a question-answer pair on the website
 * F.A.Q. page.
 */
class QAEntry extends BasicObject {
	private $_href;
	private $_question;
	private $_answer;
	private $_xref;

	/**
	 * QAEntry object constructor.
	 *
	 * @param array $data list containing all qaentry data
	 * @param int $section_number the section this entry belongs too
	 * @param int $entry_number part of the href value incase it's not set
	 * @param array $xref reference to xref map
	 */
	public function __construct($data, $section_number, $entry_number, &$xref) {
		if (empty($data['href'])) {
			$this->_href = "{$section_number}_{$entry_number}";
		} else {
			$this->_href = $data['href'];
			$xref[$data['href']] = $data['question'];
		}
		$this->_question = $data['question'];
		$this->_answer = $data['answer'];
		/* Save a reference to the xref table for later use. */
		$this->_xref = &$xref;
	}

	/* Get the anchor name for this entry. */
	public function getHref() {
		return $this->_href;
	}

	/* Get the question for this entry. */
	public function getQuestion() {
		return $this->_question;
	}

	/* Get the answer for this entry. */
	public function getAnswer() {
		$answer = &$this->_answer;
		$xref = &$this->_xref;
		/* If we find a xref we need to make the final conversion to HTML. */
		if (strpos($answer, '<a xref') !== false) {
			/**
			 * For each entry in our xref lookup table we need to build a list
			 * of patterns that match the xrefs. We also need to build a list
			 * with replacements for the xrefs. Only generate the lists once.
			 */
			if (!isset($xref['pattern']) || !isset($xref['replace'])) {
				$pattern = array();
				$replace = array();
				foreach ($this->_xref as $anchor => $text) {
					$xref['pattern'][] = "/<a xref=\"{$anchor}\"><\/a>/";
					$xref['replace'][] = "<a href=\"faq/#{$anchor}\">{$text}</a>";
				}
			}
			$answer = preg_replace($xref['pattern'], $xref['replace'], $answer);
		}
		return $this->_answer;
	}
}
?>
