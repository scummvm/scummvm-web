<?php
namespace ScummVM\Objects;

/**
 * The File object represents a file on the website.
 */
class File extends BasicObject
{
    private $category_icon;
    private $url;
    private $extra_info;
    private $user_agent;

    public function __construct($data, $baseUrl = null)
    {
        parent::__construct($data);
        $this->category_icon = $data['category_icon'];
        $this->extra_info = $data['extra_info'] ?? null;
        $this->subcategory = $data['subcategory'] ?? null;
        $this->user_agent = isset($data["user_agent"]) ? $data["user_agent"] : "";
        $this->version = strtolower($data['version'] ?? null);

        /* If it's not an array, we didn't get any attributes. */
        if (!is_array($data['url'])) {
            $url = $data['url'];
            $attributes = array();
        } else {
            $url = $data['url'][0];
            $attributes = $data['url']['@attributes'];
        }

        if (preg_match('/^((https?)|(ftp)):\/\//', $url)) {
            // If the URL is given, keep it as is
            $this->url = $url;
        } else {
            // Construct the URL based on its type
            if ($this->version == 'daily') {
                $fname = DOWNLOADS_DAILY_URL . $url;
            } elseif ($this->subcategory == 'tools') {
                $fname = DOWNLOADS_TOOLS_URL . $url;
            } elseif (str_starts_with($url, '/frs') || str_starts_with($url, 'http')) {
                $fname = $url;
            } else {
                $fname = DOWNLOADS_URL . $url;
            }
            $fname = str_replace('{$version}', "$this->version", $fname);

            // If the file is on this server, we can check file size etc.
            if (is_file($fname) && is_readable($fname)) {
                $this->extra_info = array();
                $sz = round((@filesize($fname) / 1024));

                if ($sz < 1024) {
                    $sz = $sz . "K";
                } else {
                    $sz /= 1024;

                    if ($sz < 1024) {
                        $sz = round($sz, 1) . "M";
                    } else {
                        $sz /= 1024;
                        $sz = round($sz, 2) . "G";
                    }
                }
                $this->extra_info['size'] = $sz;
                $ext = substr($url, (strrpos($url, '.')));

                if ($ext == '.bz2' || $ext == '.gz' || $ext == '.xz' || $ext == '.7z') {
                    $ext = substr($url, strrpos($url, '.', -(strlen($url) - strrpos($url, '.') + 1)));
                }

                if ((is_file($fname . '.sha256') && is_readable($fname . '.sha256'))
                    && (@filemtime($fname . '.sha256') > @filemtime($fname))
                ) {
                    $this->extra_info['sha256'] = file_get_contents($fname . '.sha256');
                } else {
                    $hash = hash_file('sha256', $fname);
                    $this->extra_info['sha256'] = $hash;
                    file_put_contents($fname . '.sha256', $hash);
                }

                $this->extra_info['ext'] = $ext;
                $this->extra_info['msg'] = $data['extra_msg'];
            }
            $this->url = $fname;
        }
        /**
         * Get the filesize/last modified information and put it in
         * $this->extra_info.
         */
        if (isset($attributes['extra_info'])
            && $attributes['extra_info'] == 'true') {
            if (is_file($fname) && is_readable($fname)) {
                $this->extra_info['date'] = date('F j, Y, g:i a', @filemtime($fname));
                if (!is_null($data['extra_info'])) {
                    $this->extra_info['info'] = $data['extra_info'];
                }
            }
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

    /* Get the user-agent. */
    public function getUserAgent()
    {
        return $this->user_agent;
    }
}
