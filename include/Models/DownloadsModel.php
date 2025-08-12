<?php

namespace ScummVM\Models;

use ScummVM\FileUtils;
use ScummVM\Objects\DownloadsSection;
use DeviceDetector\Parser\OperatingSystem as OsParser;
use ScummVM\OrmObjects\DownloadQuery;

/**
 * The DownloadsModel will produce DownloadsSection objects.
 */
class DownloadsModel extends BasicModel
{
    /* Get all download entries. */
    /**
     * @return array<string, DownloadsSection>
     */
    public function getAllDownloads(): array
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
                if ($data->getVersion() == 'Daily') {
                    $category = 'daily';
                    $subCategory = 'daily_downloads';
                } elseif ($data->getVersion() == RELEASE || $data->getCategory() == 'scummvm-tools') {
                    $category = 'current';
                    if ($data->getSubCategory() == 'source') {
                        $subCategory = 'source';
                    } elseif ($data->getCategory() == 'scummvm-tools') {
                        $subCategory = 'scummvm-tools';
                    } else {
                        $subCategory = 'release';
                    }
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
                        'notes' => $sectionsData[$category]['notes'] ?? ''
                    ]);
                }

                // Create Subsections
                if (!isset($sections[$category]->getSubSections()[$subCategory])) {
                    $sections[$category]->addSubsection(new DownloadsSection([
                        'anchor' => $subCategory,
                        'title' => $sectionsData[$subCategory]['title'],
                        'notes' => $sectionsData[$subCategory]['notes'] ?? ''
                    ]));
                }

                // Add Download to subsection
                $sections[$category]->getSubsections()[$subCategory]->addItem($data);
            }
            $this->saveToCache($sections);
        }
        return $sections;
    }

    /**
     * @return array<string, array{'title': string, 'notes'?: string}>
     */
    private function getSectionData(): array
    {
        return [
            "current"=>["title"=>"{#downloadsXMLTitle#} {#downloadsXMLVersion#}"],
            "release"=>["title"=>"{#downloadsBinaries#}",
                "notes"=>"{#downloadsBinariesNote1#} <a href='https://downloads.scummvm.org/frs/scummvm/" .
                "{ldelim}release{rdelim}/ReleaseNotes.html'>{#downloadsBinariesNote2#}</a>." .
                "<p>{#downloadsBinariesNote3#}</p>"],
            "source"=>["title"=>"{#downloadsSourceCode#}"],
            "scummvm-tools"=>["title"=>"{#downloadsTools#}"],
            "legacy"=>["title"=>"{#downloadsOldBinaries#}"],
            "old"=>["title"=>"{#downloadsOld#}",
                "notes"=>"{#downloadsOldBinariesNote#} {#downloadsOldBinariesFrsNote1#} " .
                "<a href='https://downloads.scummvm.org/frs/scummvm/'>{#downloadsOldBinariesFrsNote2#}</a> " .
                "{#downloadsOldBinariesFrsNote3#}"],
            "daily"=>["title"=>"{#downloadsDailyBuilds#}"],
            "daily_downloads"=>["title"=>"{#downloadsDailyBuilds#}",
                "notes"=>"<strong>{#downloadsDailyNote1#}</strong> {#downloadsDailyNote2#}" .
                "<p>{#downloadsDailyNote3#}</p>"],
            "libs"=>["title"=>"{#downloadsLibraries#}"],
            "required"=>["title"=>"{#downloadsRequiredLibraries#}"],
            "optional"=>["title"=>"{#downloadsOptionalLibraries#}"]
          ];
    }

    /* Get the recommended download */
    /**
     * @return ?array{'os': string, 'version': string, 'extra_text': string, 'url': string}
     */
    public function getRecommendedDownload(): ?array
    {
        if (!isset($_SERVER['HTTP_USER_AGENT'])) {
            return null;
        }

        $osParser = new OsParser();
        $osParser->setUserAgent($_SERVER['HTTP_USER_AGENT']);
        $os = $osParser->parse();
        // Should never happen: the DeviceDetector signature seems wrong
        assert($os !== null);

        $downloads = DownloadQuery::create()
            ->setIgnoreCase(true)
            ->findByUserAgent($os['name']);

        // If we found a user agent for this platform, then generate a download link
        if (!empty($downloads) && ($downloads[0] !== null)) {
            $download = $downloads[0];
            $version = $download->getVersion();

            $name = strip_tags($download->getName());
            if (str_starts_with($download->getURL(), 'http')) {
                $url = $download->getURL();
                $url = str_replace('{$version}', $version, $url);
            } else {
                // Construct the URL and fill in the version
                $file_name = str_replace('{$version}', $version, DOWNLOADS_URL . $download->getURL());
                $url = DOWNLOADS_BASE .  "/" . $file_name;
                if (FileUtils::exists($file_name)) {
                    $extra_text = FileUtils::getFileSize($file_name) . " " . FileUtils::getExtension($file_name);
                }
            }

            if ($os['name'] === 'Ubuntu') {
                $extra_text = '(snap install scummvm)';
            }

            return [
                'os' => $name,
                'version' => $version,
                'extra_text' => isset($extra_text) ? $extra_text : "",
                'url' => $url,
            ];
        }
        return null;
    }
}
