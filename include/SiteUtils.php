<?php
namespace ScummVM;

class SiteUtils
{
    public static function localizePath($path, $checkStaticFiles = false)
    {
        global $lang;
        // No lang needed
        if ($lang == DEFAULT_LOCALE || !$lang) {
            return $path;
        }

        $parts = parse_url($path);
        // Invalid URL
        if ($parts === false) {
            return $path;
        }

        $host = $parts['host'] ?? '';
        $host .= isset($parts['port']) ? ':' . $parts['port'] : '';
        if (!empty($host)) {
            if (!in_array($host, SITE_HOSTS)) {
                // Absolute path pointing outside of the website
                return $path;
            }

            // Rewrite the path to match from where the user came
            $parts['host'] = URL_HOST;
            unset($parts['port']);
            if (!empty($parts['scheme'])) {
                $parts['scheme'] = URL_SCHEME;
            }
        }

        $ppath = $parts['path'] ?? '';

        // Don't replace images or static files (if asked)
        if (!$checkStaticFiles || empty($ppath) || \str_ends_with($ppath, '/') ||
            (!\str_ends_with($ppath, '.png') &&
             !\str_ends_with($ppath, '.jpg') &&
             !file_exists(DIR_STATIC . '/' . $ppath))) {
            // Prepend the language to the path part
            $parts['path'] = "/$lang" . $ppath;
        }

        // Now build back the path
        $path = isset($parts['scheme']) ? $parts['scheme'] . ':' : '';
        if (!empty($parts['host'])) {
            $path .= '//';
            if (!empty($parts['user'])) {
                $path .= $parts['user'];
                if (isset($parts['pass'])) {
                    $path .= ':' . $parts['pass'];
                }
                $path .= '@';
            }
            $path .= $parts['host'];
            $path .= isset($parts['port']) ? ':' . $parts['port'] : '';
        }
        $path .= $parts['path'] ?? '';
        $path .= isset($parts['query']) ? '?' . $parts['query'] : '';
        $path .= isset($parts['fragment']) ? '#' . $parts['fragment'] : '';

        return $path;
    }
}
