<?php
namespace ScummVM\Web\Models;

require_once('Models/BasicModel.php');
require_once('Objects/News.php');
/**
 * The NewsModel class will generate News objects
 */
abstract class NewsModel extends BasicModel
{
    const NO_FILES = 'No news files found.';
    const INVALID_DATE = 'Invalid date, use yyyyMMdd. or yyyyMMddHHmm';
    const FILE_NOT_FOUND = 'The requested news file doesn\'t exist.';

    /* Get a list of all the available news files. */
    public static function getListOfNewsFilenames()
    {
        if (!($files = scandir(DIR_NEWS))) {
            throw new ErrorException(self::NO_FILES);
        }
        $filenames = array();
        foreach ($files as $file) {
            if (substr($file, -5) != '.json') {
                continue;
            }
            $filenames[] = substr($file, 0, -5);
        }
        sort($filenames, SORT_STRING);
        return $filenames;
    }

    /* Get all news items ordered by date, descending. */
    public static function getAllNews($processContent = false)
    {
        if (!($files = scandir(DIR_NEWS))) {
            throw new ErrorException(self::NO_FILES);
        }
        global $lang;
        $news = array();
        foreach ($files as $filename) {
            if (substr($filename, -5) != '.json') {
                continue;
            }
            if (!is_file(($fname = DIR_NEWS . "/$lang/" . basename($filename)))
                || !is_readable($fname) || !($data = @file_get_contents($fname))) {
                if (!($data = @file_get_contents(DIR_NEWS . "/{$filename}"))) {
                    continue;
                }
            }
            $news[] = new News(json_decode($data), $filename, $processContent);
        }
        return array_reverse($news);
    }

    /* Get the latest number of news items, or if no number is specified get all news items. */
    public static function getLatestNews($num = -1, $processContent = false)
    {
        if ($num == -1) {
            return NewsModel::getAllNews($processContent);
        } else {
            if (!($newslist = NewsModel::getListOfNewsFilenames())) {
                throw new ErrorException(self::NO_FILES);
            }
            rsort($newslist, SORT_STRING);
            $newslist = array_slice($newslist, 0, $num);
            $news = array();
            foreach ($newslist as $filename) {
                $news[] = NewsModel::getOneByFilename($filename, $processContent);
            }
            return $news;
        }
    }

    /* Get the news item that was posted on a specific date. */
    public static function getOneByFilename($filename, $processContent = false)
    {
        if (is_null($filename) || !preg_match('/^\d{8,12}[a-z]?$/', $filename)) {
            throw new ErrorException(self::INVALID_DATE);
        }
        global $lang;
        if (!is_file(($fname = DIR_NEWS . "/$lang/{$filename}.json"))
            || !is_readable($fname) || !($data = @file_get_contents($fname))) {
            if (!is_file(($fname = DIR_NEWS . "/{$filename}.json"))
                || !is_readable($fname) || !($data = @file_get_contents($fname))) {
                throw new ErrorException(self::FILE_NOT_FOUND);
            }
        }
        return new News(json_decode($data), $fname, $processContent);
    }
}
