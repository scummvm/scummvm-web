<?php
namespace ScummVM\Objects;

/**
 * The FaqSection class represents a section with questions and answers on the
 * website F.A.Q. page.
 */
class FaqSection extends BasicSection
{
    private $entries;
    private $toc;

    /**
     * FaqSection object constructor.
     *
     * @param array $data list containing all qasection data
     * @param int $section_number used in the TOC
     * @param array $xref reference to xref map
     */
    public function __construct($data, $section_number, &$xref)
    {
        parent::__construct($data);
        $this->title = $data['title'];
        $this->entries = array();
        $this->toc = array();
        parent::toArray($data['entry']);
        $count = 1;
        foreach ($data['entry'] as $key => $value) {
            $qa = new FaqEntry($value, $section_number, $count++, $xref);
            $this->entries[] = $qa;
            $this->toc[$qa->getHref()] = $qa->getQuestion();
        }
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
