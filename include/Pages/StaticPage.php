<?php
namespace ScummVM\Pages;

use ScummVM\Controller;

class StaticPage extends Controller
{
    const FILE_NOT_FOUND = 'The filename %s could not be found';
    private string $filename;

    public function __construct(string $key)
    {
        parent::__construct();

        $this->filename = DIR_STATIC . "/html/$key.html";
        if (!is_file($this->filename) || !is_readable($this->filename)) {
            throw new \ErrorException(\sprintf(self::FILE_NOT_FOUND, $this->filename));
        }
    }

    /* Display the index page. */
    public function index(): void
    {
        readfile($this->filename);
    }
}
