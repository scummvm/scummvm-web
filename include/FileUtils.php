<?php
namespace ScummVM;

use DateTime;

/**
* Utility functions related to files on a file system.
*/
class FileUtils
{
    private const DOUBLE_EXTENSIONS = ['.bz2', '.gz', '.lz', '.xz', '.7z'];

    /**
    * Returns whether or not the file exists and is readable
    *
    * @param $path the path to the file that will be analyzed
    * @return bool whether or not the file exists
    */
    public static function exists(string $path): bool
    {
        $path = FileUtils::toAbsolutePathIfOnServer($path);
        return is_file($path) && is_readable($path);
    }

    /**
    * Returns the file size in a human-readable form (e.g. 75.2M).
    *
    * @param $path the path to the file that will be analyzed
    * @return string the file size in a human-readable form
    */
    public static function getFileSize(string $path): string
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
    * @return string the extension
    */
    public static function getExtension(string $path): string
    {
        $path = FileUtils::toAbsolutePathIfOnServer($path);
        // Get everything to the right of the last period
        $extension = substr($path, (strrpos($path, '.')));

        // For certain extensions, check for another extension (e.g. foo.tar.gz => tar.gz)
        if (in_array($extension, self::DOUBLE_EXTENSIONS)) {
            $extension = substr($path, strrpos($path, '.', -(strlen($path) - strrpos($path, '.') + 1)));
        }
        return $extension;
    }

    /**
    * Returns the SHA-256 hash of the given file.
    *
    * @param $path the path to the file that will be analyzed
    * @return string the SHA-256 hash
    */
    public static function getSha256(string $path): string
    {
        $path = FileUtils::toAbsolutePathIfOnServer($path);
        // Check if we already have a generated hash file
        if ((is_file($path . '.sha256') && is_readable($path . '.sha256'))
            && (@filemtime($path . '.sha256') > @filemtime($path))
        ) {
            // Read the file and return the included hash
            $contents = file_get_contents($path . '.sha256');
            if ($contents !== false) {
                return $contents;
            }
        }
        // Generate a SHA-256 hash, save it to a file for later, then return the hash
        $hash = hash_file('sha256', $path);
        if ($hash === false) {
            return '';
        }
        file_put_contents($path . '.sha256', $hash);
        return $hash;
    }

    /**
    * Returns the date (in ISO 8601 format) that the given file was last modified.
    *
    * @param $path the path to the file that will be analyzed
    * @return string the date
    */
    public static function getLastModified(string $path): string
    {
        $path = FileUtils::toAbsolutePathIfOnServer($path);
        $mtime = @filemtime($path);
        if ($mtime === false) {
            return '';
        }
        $date = new DateTime();
        return $date->setTimestamp($mtime)->format("Y-m-d");
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
    * @return string the path of the file, either relative or absolute
    */
    private static function toAbsolutePathIfOnServer(string $relativePath): string
    {
        return is_file(DIR_SERVER_ROOT . '/'. $relativePath) ? DIR_SERVER_ROOT . '/'. $relativePath : $relativePath;
    }
}
