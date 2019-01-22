<?php
namespace ScummVM\Objects;

/**
 * The File object represents a file on the website.
 */
class File extends BasicObject
{
    private $category_icon;
    private $url;
    private $type;
    private $extra_info;
    private $user_agent;

    public function __construct($data)
    {
        parent::__construct($data);
        $this->category_icon = $data['category_icon'];
        $this->extra_info = $data['extra_info'];
        $this->type = strtolower($data['type']);
        $this->user_agent = isset($data["user_agent"]) ? $data["user_agent"] : "";

        $fname = "";

        /* If it's not an array, we didn't get any attributes. */
        if (!is_array($data['url'])) {
            $url = $data['url'];
            $attributes = array();
        } else {
            $url = $data['url'][0];
            $attributes = $data['url']['@attributes'];
        }

        if (!preg_match('/^((https?)|(ftp)):\/\//', $url)) {
            if ($attributes['type'] == 'downloads') {
                $url = DIR_DOWNLOADS . "/{$url}";
            } elseif ($attributes['type'] == 'tools') {
                $url = DOWNLOADS_TOOLS_URL . $url;
            } else {
                $url = DOWNLOADS_URL . $url;
            }

            $fname = "." . $url;
            $fname = str_replace('{$release}', RELEASE, $fname);
            $fname = str_replace('{$release_tools}', RELEASE_TOOLS, $fname);

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
                && (@filemtime($fname . '.sha256') > @filemtime($fname)) ) {
                    $this->extra_info['sha256'] = file_get_contents($fname . '.sha256');
                } else {
                    $hash = hash_file('sha256', $fname);
                    $this->extra_info['sha256'] = $hash;
                    file_put_contents($fname . '.sha256', $hash);
                }

                $this->extra_info['ext'] = $ext;
                $this->extra_info['msg'] = $data['extra_msg'];
            }
        }
        $this->url = $url;

        /**
         * Get the filesize/last modified information and put it in
         * $this->extra_info.
         */
        if ($attributes['extra_info'] == 'true') {
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

    /* Get the type. */
    public function getType()
    {
        return $this->type;
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
