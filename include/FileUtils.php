<?php
namespace ScummVM;

use DateTime;
use DateTimeInterface;

/**
* Utility functions related to files on a file system.
*/
class FileUtils
{
    /**
    * Returns whether or not the file exists and is readable
    *
    * @param $path the path to the file that will be analyzed
    * @return whether or not the file exists
    */
    public static function exists($path)
    {
        $path = FileUtils::toAbsolutePathIfOnServer($path);
        return is_file($path) && is_readable($path);
    }

    /**
    * Returns the file size in a human-readable form (e.g. 75.2M).
    *
    * @param $path the path to the file that will be analyzed
    * @return the file size in a human-readable form
    */
    public static function getFileSize($path)
    {
        $path = FileUtils::toAbsolutePathIfOnServer($path);
        // Get the file size, rounded to the nearest kilobyte
        $file_size = round((@filesize($path) / 1024));
        
        if ($file_size < 1024) {
            $file_size = $file_size . " KiB";
        } else {
            $file_size /= 1024;

            if ($file_size < 1024) {
                $file_size = round($file_size, 1) . " MiB";
            } else {
                $file_size /= 1024;
                $file_size = round($file_size, 2) . " GiB";
            }
        }
        return $file_size;
    }

    /**
    * Returns the extension of the given file.
    *
    * @param $path the path to the file that will be analyzed
    * @return the extension
    */
    public static function getExtension($path)
    {
        $path = FileUtils::toAbsolutePathIfOnServer($path);
        // Get everything to the right of the last period
        $extension = substr($path, (strrpos($path, '.')));

        // For certain extensions, check for another extension (e.g. foo.tar.gz => tar.gz)
        if ($extension == '.bz2' || $extension == '.gz' || $extension == '.lz' || $extension == '.xz' || $extension == '.7z') {
            $extension = substr($path, strrpos($path, '.', -(strlen($path) - strrpos($path, '.') + 1)));
        }
        return $extension;
    }

    /**
    * Returns the SHA-256 hash of the given file.
    *
    * @param $path the path to the file that will be analyzed
    * @return the SHA-256 hash
    */
    public static function getSha256($path)
    {
        $path = FileUtils::toAbsolutePathIfOnServer($path);
        // Check if we already have a generated hash file
        if ((is_file($path . '.sha256') && is_readable($path . '.sha256'))
            && (@filemtime($path . '.sha256') > @filemtime($path))
        ) {
            // Read the file and return the included hash
            return file_get_contents($path . '.sha256');
        } else {
            // Generate a SHA-256 hash, save it to a file for later, then return the hash
            $hash = hash_file('sha256', $path);
            file_put_contents($path . '.sha256', $hash);
            return $hash;
        }
    }

    /**
    * Returns the date (in ISO 8601 format) that the given file was last modified.
    *
    * @param $path the path to the file that will be analyzed
    * @return the date
    */
    public static function getLastModified($path)
    {
        $path = FileUtils::toAbsolutePathIfOnServer($path);
        $date = new DateTime();
        return $date->setTimestamp(@filemtime($path))->format("Y-m-d");
    }

    /**
    * Returns the path of the file. If the file exists on the ScummVM web server at the expected location, convert to an
    * absolute path. Otherwise, return the relative path provided as input.
    *
    * This method was created due to different behaviors between local developers' machines and the ScummVM server.
    * For instance, code for calculating SHA-256 hashes would work locally for files in `public_html/frs`, but not on
    * the ScummVM web server where an absolute path was the only way that the code would work. Using this method means
    * that code will work in both environments.
    *
    * @param $path the relative path to the file that will be analyzed
    * @return the path of the file, either relative or absolute
    */
    private static function toAbsolutePathIfOnServer($relativePath)
    {
        return is_file(DIR_SERVER_ROOT . '/'. $relativePath) ? DIR_SERVER_ROOT . '/'. $relativePath : $relativePath;
    }
}
