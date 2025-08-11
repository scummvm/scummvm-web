<?php
namespace ScummVM\Objects;

/**
 * The WebLink class represents a link item on the website.
 */
class WebLink extends BasicObject
{
    private string $notes;
    private string $url;

    /**
     * WebLink object constructor.
     * @param array{'description'?: string, 'name'?: string, 'notes': string, 'url': string} $data
     */
    public function __construct($data)
    {
        parent::__construct($data);
        $this->notes = $data['notes'];
        $this->url = $data['url'];
    }

    public function getNotes(): string
    {
        return $this->notes;
    }

    /* Get the URL of the link. */
    public function getURL(): string
    {
        return $this->url;
    }

    /* Get the user-agent. */
    public function getUserAgent(): string
    {
        return "";
    }
}
