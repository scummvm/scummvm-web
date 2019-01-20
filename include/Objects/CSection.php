<?php
namespace ScummVM\Objects;

/**
 * The Section class represens a section (or a subsection) on the credits page
 * on the website.
 */
class CSection extends BasicObject
{
    private $title;
    private $groups;
    private $subsections;
    private $paragraphs;
    private $anchor;

    /* CSection object constructor. */
    public function __construct($data)
    {
        $this->title = $data['title'];
        $this->anchor = $data['anchor'];
        $this->groups = array();
        $this->subsections = array();
        $this->paragraphs = array();

        if (isset($data['subsection'])) {
            foreach ($data['subsection'] as $value) {
                $this->subsections[] = new CSection($value);
            }
        }
        if (isset($data['group'])) {
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
                    $this->groups[] = array(
                        'name' => $value['name'],
                        'persons' => $persons,
                    );
                }
            }
        }
        if (isset($data['paragraph'])) {
            parent::toArray($data['paragraph']);
            $this->paragraphs = $data['paragraph'];
        }
    }

    /* Get the title. */
    public function getTitle()
    {
        return $this->title;
    }

  /* Get the anchor. */
    public function getAnchor()
    {
        return $this->anchor;
    }

    /* Get the optional list of groups. */
    public function getGroups()
    {
        return $this->groups;
    }

    /* Get the optional list of subsections. */
    public function getSubSections()
    {
        return $this->subsections;
    }

    /* Get the optional list of paragraphs. */
    public function getParagraphs()
    {
        return $this->paragraphs;
    }
}
