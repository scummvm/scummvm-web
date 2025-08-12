<?php
namespace ScummVM\Objects;

/**
 * The BasicSection class represents a section (or a subsection) on the credits page
 * on the website.
 */
class CreditsSection extends BasicSection
{
    /** @var array<array{'name': string, 'persons': array<Person>}> */
    private array $groups;
    /** @var string[] */
    private array $paragraphs;

    /**
     * CreditsSection object constructor.
     *
     * @param array{'title': string, 'anchor': string, 'subsection'?: array<mixed>,
     *      'group'?: array<array{
     *          'person': array<array{'description'?: string, 'name'?: string, 'alias': string}>,
     *          'name': string}>,
     *      'paragraph'?: string[]} $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->groups = [];
        $this->paragraphs = [];

        if (isset($data['group'])) {
            foreach ($data['group'] as $value) {
                $persons = [];
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
            $this->paragraphs = $data['paragraph'];
        }
    }

    /**
     * Get the optional list of groups.
     *
     * @return array<array{'name': string, 'persons': array<Person>}>
     */
    public function getGroups(): array
    {
        return $this->groups;
    }

    /**
     * Get the optional list of paragraphs.
     *
     * @return string[]
     */
    public function getParagraphs(): array
    {
        return $this->paragraphs;
    }
}
