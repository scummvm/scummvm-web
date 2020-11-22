<?php

namespace ScummVM\Models;

use ScummVM\Objects\DownloadsSection;
use Symfony\Component\Yaml\Yaml;
use DeviceDetector\Parser\OperatingSystem as OsParser;

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
            $fname = $this->getLocalizedFile('scummvm_downloads.yaml');
            $parsedData = @Yaml::parseFile($fname);
            // error check yaml

            $sections = [];
            $sectionsData = $this->getSectionData();
            foreach ($parsedData as $data) {
                if (!$data['enabled'] === TRUE) {
                    continue;
                }

                // Create Sections
                $category = $data['category'];
                if (!isset($sections[$category])) {
                    $sections[$category] = new DownloadsSection([
                        'anchor' => $category,
                        'title' => $sectionsData[$category]['title'],
                        'notes' => $sectionsData[$category]['notes']
                    ]);
                }

                // Create Subsections
                $subCategory = $data['subcategory'];
                if (!isset($sections[$category]->getSubSections()[$subCategory])) {
                    $sections[$category]->addSubsection(new DownloadsSection([
                        'anchor' => $subCategory,
                        'title' => $sectionsData[$subCategory]['title'],
                        'notes' => $sectionsData[$subCategory]['notes']
                    ]));
                }

                // Add Download to subsection
                $sections[$category]->getSubsections()[$subCategory]->addItem($data);
            }
            $this->saveToCache($sections);
        }
        return $sections;
    }

    private function getSectionData() {
        return [
            "current"=>["title"=>"{#downloadsXMLTitle#} {#downloadsXMLVersion#}"],
            "release"=>["title"=>"{#downloadsBinaries#}","notes"=>"{#downloadsBinariesNote1#} <a href='https://downloads.scummvm.org/frs/scummvm/{ldelim}release{rdelim}/ReleaseNotes.html'>{#downloadsBinariesNote2#}</a>.<p>{#downloadsBinariesNote3#}</p>"],
            "source"=>["title"=>"{#downloadsSourceCode#}"],
            "tools"=>["title"=>"{#downloadsTools#}"],
            "legacy"=>["title"=>"{#downloadsOldBinaries#}"],
            "old"=>["title"=>"{#downloadsOld#}","notes"=>"{#downloadsOldBinariesNote#} {#downloadsOldBinariesFrsNote1#} <a href='https://downloads.scummvm.org/frs/scummvm/'>{#downloadsOldBinariesFrsNote2#}</a> {#downloadsOldBinariesFrsNote3#}"],
            "extras"=>["title"=>"{#downloadsExtra#}"],
            "games"=>["title"=>"{#downloadsGames#}"],
            "engine"=>["title"=>"{#downloadEngineData#}"],
            "subprojects"=>["title"=>"{#downloadsSubprojects#}"],
            "daily"=>["title"=>"{#downloadsDailyBuilds#}"],
            "daily_downloads"=>["title"=>"{#downloadsDailyBuilds#}","notes"=>"<strong>{#downloadsDailyNote1#}</strong> {#downloadsDailyNote2#}<p>{#downloadsDailyLink1#}{#downloadsDailyLink2#}</p><p>View the ChangeLog to see the latest updates of ScummVM.</p><p>{#downloadsDailyLink3#}</p>"],
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

        $downloads = $this->getAllDownloads();

        $osParser = new OsParser();
        $osParser->setUserAgent($_SERVER['HTTP_USER_AGENT']);
        $os = $osParser->parse();

        foreach ($downloads as $section) {
            foreach ($section->getSubSections() as $subsection) {
                $version = array_values(
                    array_filter(
                        $subsection->getItems(),
                        function ($item) use ($os) {
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

                    return [
                        'os' => $name,
                        'ver' => $version,
                        'desc' => $extra_text,
                        'url' => $url,
                    ];
                }
            }
        }

        return false;
    }
}
