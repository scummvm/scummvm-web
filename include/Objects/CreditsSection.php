<?php
namespace ScummVM\Objects;

/**
 * The BasicSection class represens a section (or a subsection) on the credits page
 * on the website.
 */
class CreditsSection extends BasicSection
{
    private $groups;
    private $paragraphs;

    /* CreditsSection object constructor. */
    public function __construct($data)
    {
        parent::__construct($data);
        $this->groups = array();
        $this->paragraphs = array();

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

    /* Get the optional list of groups. */
    public function getGroups()
    {
        return $this->groups;
    }

    /* Get the optional list of paragraphs. */
    public function getParagraphs()
    {
        return $this->paragraphs;
    }
}
