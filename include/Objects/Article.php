<?php
namespace ScummVM\Objects;

/**
 * The article class represents a link on the website to an article covering
 * ScummVM in some way.
 */
class Article extends BasicObject
{
    private ?string $url;
    private ?string $language;
    private ?string $source;
    private ?string $date;

    /**
     * Article object constructor.
     * @param array{'url'?: string, 'language'?: string, 'source'?: string, 'date'?: string} $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->url = $data['url'] ?? null;
        $this->language = $data['language'] ?? null;
        $this->source = $data['source'] ?? null;
        $this->date = $data['date'] ?? null;
    }

    /* Get the URL. */
    public function getURL(): ?string
    {
        return $this->url;
    }

    /* Get the language. */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /* Get the source that published it. */
    public function getSource(): ?string
    {
        return $this->source;
    }

    /* Get the date it was posted. */
    public function getDate(): ?string
    {
        return $this->date;
    }
}
