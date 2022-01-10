<?php

namespace ScummVM\Models;

use ScummVM\Objects\DownloadsSection;
use DeviceDetector\Parser\OperatingSystem as OsParser;
use ScummVM\OrmObjects\DownloadQuery;
use Propel\Runtime\ActiveQuery\Criteria;

/**
 * The DownloadsModel will produce DownloadsSection objects.
 */
class DownloadsModel extends BasicModel
{
    /* Get all download entries. */
    public function getAllDownloads()
    {
        $sections = $this->getFromCache();
        if (is_null($sections)) {
            $parsedData = DownloadQuery::create()
                    ->findByEnabled(true);
            $sections = [];
            $sectionsData = $this->getSectionData();
            foreach ($parsedData as $data) {
                // Source and tools should be under the current section
                // TODO Clean this up when we remove subcategories
                // Tools are always go to the current section
                if ($data->getVersion() == RELEASE || $data->getCategory() == 'tools') {
                    $category = 'current';
                    if ($data->getCategory() == 'source') {
                        $subCategory = 'source';
                    } elseif ($data->getCategory() == 'tools') {
                        $subCategory = 'tools';
                    } else {
                        $subCategory = 'release';
                    }
                } elseif ($data->getVersion() == 'Daily') {
                    $category = 'daily';
                    $subCategory = 'daily_downloads';
                } elseif ($data->getVersion() == null) {
                    $category = $data->getCategory();
                    $subCategory = $data->getSubcategory();
                } else {
                    $category = 'legacy';
                    $subCategory = 'old';
                }

                // Create Sections
                if (!isset($sections[$category])) {
                    $sections[$category] = new DownloadsSection([
                        'anchor' => $category,
                        'title' => $sectionsData[$category]['title'],
                        'notes' => $sectionsData[$category]['notes'] ?? null
                    ]);
                }

                // Create Subsections
                if (!isset($sections[$category]->getSubSections()[$subCategory])) {
                    $sections[$category]->addSubsection(new DownloadsSection([
                        'anchor' => $subCategory,
                        'title' => $sectionsData[$subCategory]['title'],
                        'notes' => $sectionsData[$subCategory]['notes'] ?? null
                    ]));
                }

                // Add Download to subsection
                $sections[$category]->getSubsections()[$subCategory]->addItem($data);
            }
            $this->saveToCache($sections);
        }
        return $sections;
    }

    private function getSectionData()
    {
        return [
            "current"=>["title"=>"{#downloadsXMLTitle#} {#downloadsXMLVersion#}"],
            "release"=>["title"=>"{#downloadsBinaries#}","notes"=>"{#downloadsBinariesNote1#} <a href='https://downloads.scummvm.org/frs/scummvm/{ldelim}release{rdelim}/ReleaseNotes.html'>{#downloadsBinariesNote2#}</a>.<p>{#downloadsBinariesNote3#}</p>"],
            "source"=>["title"=>"{#downloadsSourceCode#}"],
            "tools"=>["title"=>"{#downloadsTools#}"],
            "legacy"=>["title"=>"{#downloadsOldBinaries#}"],
            "old"=>["title"=>"{#downloadsOld#}","notes"=>"{#downloadsOldBinariesNote#} {#downloadsOldBinariesFrsNote1#} <a href='https://downloads.scummvm.org/frs/scummvm/'>{#downloadsOldBinariesFrsNote2#}</a> {#downloadsOldBinariesFrsNote3#}"],
            "daily"=>["title"=>"{#downloadsDailyBuilds#}"],
            "daily_downloads"=>["title"=>"{#downloadsDailyBuilds#}","notes"=>"<strong>{#downloadsDailyNote1#}</strong> {#downloadsDailyNote2#}<p>{#downloadsDailyNote3#}</p>"],
            "libs"=>["title"=>"{#downloadsLibraries#}"],
            "required"=>["title"=>"{#downloadsRequiredLibraries#}"],
            "optional"=>["title"=>"{#downloadsOptionalLibraries#}"]
          ];
    }

    /* Get the recommended download */
    public function getRecommendedDownload()
    {
        if (!isset($_SERVER['HTTP_USER_AGENT'])) {
            return false;
        }

        $osParser = new OsParser();
        $osParser->setUserAgent($_SERVER['HTTP_USER_AGENT']);
        $os = $osParser->parse();

        $downloads = DownloadQuery::create()
            ->setIgnoreCase(true)
            ->findByUserAgent($os['name']);

        // If we found a user agent for this platform, then generate a download link
        if (!empty($downloads) && ($downloads[0] !== null)) {
            $download = $downloads[0];

            $name = strip_tags($download->getName());
            if (str_starts_with($download->getURL(), 'http')) {
                $url = $download->getURL();
                $url = str_replace('{$version}', $version, $url);
            } else {
                // Construct the URL and fill in the version
                $url = DOWNLOADS_BASE . "/" . DOWNLOADS_URL . $download->getURL();
                $version = $download->getVersion();
                $url = str_replace('{$version}', $version, $url);
            }

            $data = ""; //$download->getExtraInfo();
            if (is_array($data)) {
                $extra_text = $data['size'] . " ";
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

            return [
                'os' => $name,
                'ver' => $version,
                'desc' => $extra_text,
                'url' => $url,
            ];
        }
        return false;
    }
}
