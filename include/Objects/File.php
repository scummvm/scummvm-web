<?php
namespace ScummVM\Objects;

use ScummVM\FileUtils;

/**
 * The File object represents a file on the website.
 */
class File extends BasicObject
{
    private $autoId;
    private $category;
    private $category_icon;
    private $url;
    private $extra_info;
    private $notes;
    private $subcategory;
    private $user_agent;
    private $version;

    public function __construct($data, $baseUrl = null)
    {
        parent::__construct($data);
        $this->autoId = $data['auto_id'] ?? null;
        $this->category = $data['category'];
        $this->category_icon = $data['category_icon'];
        $this->notes = isset($data['notes']) ? $data['notes'] : '';
        $this->subcategory = $data['subcategory'] ?? null;
        $this->user_agent = isset($data["user_agent"]) ? $data["user_agent"] : "";
        $this->version = isset($data['version']) ? strtolower($data['version']) : null;

        /* If it's not an array, we didn't get any attributes. */
        if (!is_array($data['url'])) {
            $url = $data['url'];
            $attributes = array();
        } else {
            $url = $data['url'][0];
            $attributes = $data['url']['@attributes'];
        }

        $this->extra_info = array();
        if (preg_match('/^((https?)|(ftp)):\/\//', $url)) {
            // If the URL is given, keep it as is
            $this->url = $url;
        } else {
            // Construct the URL based on its type
            if ($this->category == 'games' || $this->category == 'addons') {
                $fname = DOWNLOADS_EXTRAS_URL . $url;
            } elseif (str_starts_with($url, '/frs') || str_starts_with($url, 'http')) {
                $fname = $url;
            } else {
                // E.g. frs/scummvm/1.2.3/scummvm-1.2.3.zip
                $fname = 'frs/' . $this->category . '/' . $this->version . '/' . $url;
            }
            $fname = str_replace('{$release_tools}', RELEASE_TOOLS, $fname);
            $fname = str_replace('{$version}', "$this->version", $fname);

            if (FileUtils::exists($fname)) {
                $this->extra_info['size'] = FileUtils::getFileSize($fname);
                $this->extra_info['sha256'] = FileUtils::getSha256($fname);
                $this->extra_info['ext'] = FileUtils::getExtension($fname);
                $this->extra_info['date'] = FileUtils::getLastModified($fname);
            }
            $this->url = $fname;
        }
    }

    /* Get the category icon. */
    public function getCategoryIcon()
    {
        return $this->category_icon;
    }

    /* Get the URL. */
    public function getURL()
    {
        return $this->url;
    }

    /* Get the extra information. */
    public function getExtraInfo()
    {
        return $this->extra_info;
    }

    public function getNotes()
    {
        return $this->notes;
    }

    /* Get the user-agent. */
    public function getUserAgent()
    {
        return $this->user_agent;
    }

    /* Get the auto-id (the order it is listed in the data source). */
    public function getAutoId(): ?int
    {
        return $this->autoId;
    }

    /* Get the version. */
    public function getVersion(): ?string
    {
        return $this->version;
    }
}
