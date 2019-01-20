<?php
namespace ScummVM\Objects;

/**
 * The QASection class represents a section with questions and answers on the
 * website F.A.Q. page.
 */
class QASection extends BasicObject
{
    private $title;
    private $entries;
    private $toc;

    /**
     * QASection object constructor.
     *
     * @param array $data list containing all qasection data
     * @param int $section_number used in the TOC
     * @param array $xref reference to xref map
     */
    public function __construct($data, $section_number, &$xref)
    {
        $this->title = $data['title'];
        $this->entries = array();
        $this->toc = array();
        parent::toArray($data['entry']);
        $count = 1;
        foreach ($data['entry'] as $key => $value) {
            $qa = new QAEntry($value, $section_number, $count++, $xref);
            $this->entries[] = $qa;
            $this->toc[$qa->getHref()] = $qa->getQuestion();
        }
    }

    /* Get the title of this section. */
    public function getTitle()
    {
        return $this->title;
    }

    /* Get a list with all question-answer entries for this section. */
    public function getEntries()
    {
        return $this->entries;
    }

    /* Get the table of contents for this section. */
    public function getTOC()
    {
        return $this->toc;
    }
}
