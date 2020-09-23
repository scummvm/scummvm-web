<?php
namespace ScummVM\Models;

use ScummVM\Objects\News;

/**
 * The NewsModel class will generate News objects
 */
class NewsModel extends BasicModel
{
    const NO_FILES = 'No news files found.';
    const INVALID_DATE = 'Invalid date, use yyyyMMdd. or yyyyMMddHHmm';
    const FILE_NOT_FOUND = 'The requested news file doesn\'t exist.';

    /* Get a list of all the available news files. */
    private function getListOfNewsFilenames()
    {
        if (!($files = scandir(join(DIRECTORY_SEPARATOR, [DIR_NEWS, DEFAULT_LOCALE])))) {
            throw new \ErrorException(self::NO_FILES);
        }
        $filenames = array();
        foreach ($files as $file) {
            if (substr($file, -9) != '.markdown') {
                continue;
            }
            $filenames[] = substr($file, 0, -9);
        }
        sort($filenames, SORT_STRING);
        return $filenames;
    }

    /* Get all news items ordered by date, descending. */
    public function getAllNews($processContent = false)
    {
        $news = $this->getFromCache();
        if (is_null($news)) {
            if (!($files = scandir(join(DIRECTORY_SEPARATOR, [DIR_NEWS, DEFAULT_LOCALE])))) {
                throw new \ErrorException(self::NO_FILES);
            }
            global $lang;
            $news = array();
            foreach ($files as $filename) {
                if (substr($filename, -9) != '.markdown') {
                    continue;
                }
                if (!is_file(($fname = join(DIRECTORY_SEPARATOR, [DIR_NEWS,$lang,basename($filename)])))
                    || !is_readable($fname) || !($data = @file_get_contents($fname))
                ) {
                    if (!($data = @file_get_contents(join(DIRECTORY_SEPARATOR, [DIR_NEWS, DEFAULT_LOCALE, $filename])))) {
                        continue;
                    }
                }
                $news[] = new News($data, $filename, $processContent);
            }
            $news = array_reverse($news);
            $this->saveToCache($news);
        }
        return $news;
    }

    /* Get the latest number of news items, or if no number is specified get all news items. */
    public function getLatestNews($num = -1, $processContent = false)
    {
        if ($num == -1) {
            return $this->getAllNews($processContent);
        } else {
            if (!($newslist = $this->getListOfNewsFilenames())) {
                throw new \ErrorException(self::NO_FILES);
            }
            rsort($newslist, SORT_STRING);
            $newslist = array_slice($newslist, 0, $num);
            $news = array();
            foreach ($newslist as $filename) {
                $news[] = $this->getOneByFilename($filename, $processContent);
            }
            return $news;
        }
    }

    /* Get the news item that was posted on a specific date. */
    public function getOneByFilename($filename, $processContent = false)
    {
        if (is_null($filename) || !preg_match('/^\d{8,12}[a-z]?$/', $filename)) {
            throw new \ErrorException(self::INVALID_DATE);
        }
        global $lang;

        if (!is_file(($fname = join(DIRECTORY_SEPARATOR, [DIR_NEWS, $lang, "{$filename}.markdown"])))
            || !is_readable($fname) || !($data = @file_get_contents($fname))
        ) {
            if (!is_file(($fname = join(DIRECTORY_SEPARATOR, [DIR_NEWS, DEFAULT_LOCALE, "/{$filename}.markdown"])))
                || !is_readable($fname) || !($data = @file_get_contents($fname))
            ) {
                throw new \ErrorException(self::FILE_NOT_FOUND);
            }
        }

        return new News($data, $fname, $processContent);
    }
}
