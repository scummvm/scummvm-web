<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\DownloadsModel;
use DeviceDetector\Parser\OperatingSystem AS OsParser;

class DownloadsPage extends Controller
{


    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->template = 'pages/downloads.tpl';
    }

    private function getRecommendedDownload($downloads)
    {
        if (!isset($_SERVER['HTTP_USER_AGENT'])) {
            return false;
        }

        $osParser = new OsParser();
        $osParser->setUserAgent($_SERVER['HTTP_USER_AGENT']);
        $os = $osParser->parse();

        foreach ($downloads as $dsection) {
            foreach ($dsection->getSubSections() as $dsubsection) {
                $version = array_filter(
                    $dsubsection->getItems(), function ($item) use ($os) {
                        if ($item->getUserAgent() != "") {
                            return preg_match("/({$item->getUserAgent()})/i", $os['name']);
                        }
                    }
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

    /* Display the index page. */
    public function index()
    {
        $downloads = DownloadsModel::getAllDownloads();
        $sections = DownloadsModel::getAllSections();
        $recommendedDownload = $this->getRecommendedDownload($downloads);
        return $this->renderPage(
            array(
                'title' => $this->getConfigVars('downloadsTitle'),
                'content_title' => $this->getConfigVars('downloadsContentTitle'),
                'downloads' => $downloads,
                'sections' => $sections,
                'release_tools' => RELEASE_TOOLS,
                'release' => RELEASE,
                'recommendedDownload' => $recommendedDownload
            )
        );
    }
}
