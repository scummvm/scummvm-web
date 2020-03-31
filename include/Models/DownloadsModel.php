<?php
namespace ScummVM\Models;

use ScummVM\Objects\DownloadsSection;
use ScummVM\XMLParser;
use DeviceDetector\Parser\OperatingSystem AS OsParser;

/**
 * The DownloadsModel will produce DownloadsSection objects.
 */
abstract class DownloadsModel
{
    /* Get all download entries. */
    public static function getAllDownloads()
    {
        $fname = DIR_DATA . '/downloads.xml';
        /* Now parse the data. */
        $parser = new XMLParser();
        $a = $parser->parseByFilename($fname);
        $sections = array();
        foreach ($a['downloads']['section'] as $key => $value) {
            $sections[] = new DownloadsSection($value);
        }
        return $sections;
    }

    /* Get all sections and their anchors. */
    public static function getAllSections()
    {
        /* Get the list with all downloads/sections. */
        $downloads = self::getAllDownloads();
        $sections = array();
        foreach ($downloads as $dsection) {
            if ($dsection->getAnchor() != '' && $dsection->getTitle() != '') {
                $sections[] = array(
                    'title' => $dsection->getTitle(),
                    'anchor' => $dsection->getAnchor(),
                );
            }
            foreach ($dsection->getSubSections() as $dsubsection) {
                $title = $dsubsection->getTitle();
                /**
                 * If there is no title for this subsection, use the section
                 * title instead.
                 */
                if (empty($title)) {
                    $title = $dsection->getTitle();
                }
                $anchor = $dsubsection->getAnchor();
                if (!empty($anchor)) {
                    $sections[] = array(
                        'title' => $title,
                        'anchor' => $anchor,
                    );
                }
            }
        }
        return $sections;
    }

    /* Get the recommended download */
    public static function getRecommendedDownload()
    {
        if (!isset($_SERVER['HTTP_USER_AGENT'])) {
            return false;
        }

        $downloads = self::getAllDownloads();

        $osParser = new OsParser();
        $osParser->setUserAgent($_SERVER['HTTP_USER_AGENT']);
        $os = $osParser->parse();

        foreach ($downloads as $dsection) {
            foreach ($dsection->getSubSections() as $dsubsection) {
                $version = array_values(
                    array_filter(
                        $dsubsection->getItems(), function ($item) use ($os) {
                            if ($item->getUserAgent() != "") {
                                $ua = preg_quote($item->getUserAgent(), '/');
                                return preg_match("/({$ua})/i", $os['name']);
                            }
                        }
                    )
                );

                if ($version) {
                    $curItem = $version[0];
                    $url = str_replace('{$release}', RELEASE, $curItem->getURL());
                    sscanf($url, "/frs/scummvm/%s", $versionStr);
                    $version = substr($versionStr, 0, strpos($versionStr, "/"));
                    $name = strip_tags($curItem->getName());
                    $data = $curItem->getExtraInfo();
                    if (is_array($data)) {
                        $extra_text = $data['size'] . " ";
                        if ($data['ext'] == '.exe') {
                            $extra_text = $extra_text . 'Win32 ';
                        }

                        $extra_text .= $data['ext'] . " " . $data['msg'];
                    } else {
                        $extra_text = $data;
                    }

                    /*
                    Get the version information for our store releases for
                    Android and the Snap store. Since we can't rely on the
                    file names here, we set them via Constants.php
                    */
                    if ($os['name'] === 'Android') {
                        $version = RELEASE_ANDROID_STORE;
                    }

                    if ($os['name'] === 'Ubuntu') {
                        $version = RELEASE_SNAP_STORE;
                        $extra_text = '(snap install scummvm)';
                    }

                    /*
                    HACK: Hard-code the version for Mac and Win32 due to the 2.1.2
                          interim release. Setting it to the Snap Store version since
                          that's always up to date. REMOVE with the next major release!
                    */

                    if ($os['name'] === 'windows' || 'Mac') {
                        $version = RELEASE_SNAP_STORE;
                    }

                    return array(
                    'os' => $name,
                    'ver' => $version,
                    'desc' => $extra_text,
                    'url' => $url,
                    );
                }
            }
        }

        return false;
    }
}
