<?php
namespace ScummVM\Objects;

/**
 * The BasicSection class is inherited by all other Sections and houses all common
 * functions.
 *
 * @phpstan-consistent-constructor
 */
abstract class BasicSection extends BasicObject
{
    protected string $title;
    protected string $anchor;
    /** @var array<static> */
    protected array $subsections;

    /**
     * @param array{'title': string, 'anchor': string, 'subsection'?: array<mixed>, ...} $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->title = $data['title'];
        $this->anchor = $data['anchor'];
        $this->subsections = array();
        if (isset($data['subsection'])) {
            parent::toArray($data['subsection']);
            foreach ($data['subsection'] as $value) {
                $this->subsections[] = new static($value);
            }
        }
    }

    /* Get the title. */
    public function getTitle(): string
    {
        return $this->title;
    }

    /* Get the anchor. */
    public function getAnchor(): string
    {
        return $this->anchor;
    }

    /**
     * Get the optional list of subsections.
     *
     * @return array<static>
     */
    public function getSubSections(): array
    {
        return $this->subsections;
    }
}
