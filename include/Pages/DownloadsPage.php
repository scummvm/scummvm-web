<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\DownloadsModel;

class DownloadsPage extends Controller
{


    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->template = 'pages/downloads.tpl';
    }

    private function getRecommendedDownloadsJS(&$downloads)
    {
        $versions = new \stdClass();
        foreach ($downloads as $dsection) {
            foreach ($dsection->getSubSections() as $dsubsection) {
                foreach ($dsubsection->getItems() as $curItem) {
                    $userAgent = $curItem->getUserAgent();

                    if ($userAgent != "") {
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

                        $versions->$userAgent = array(
                            'os' => $name,
                            'ver' => $version,
                            'desc' => $extra_text,
                            'url' => $url,
                        );
                    }
                }
            }
        }

        return 'var versions = ' . JSON_ENCODE($versions);
    }

    /* Display the index page. */
    public function index()
    {
        $downloads = DownloadsModel::getAllDownloads();
        $sections = DownloadsModel::getAllSections();
        $recommendedDownloadsJS = $this->getRecommendedDownloadsJS($downloads);
        global $Smarty;

        return $this->renderPage(
            array(
                'title' => $Smarty->getConfigVars('downloadsTitle'),
                'content_title' => $Smarty->getConfigVars('downloadsContentTitle'),
                'downloads' => $downloads,
                'sections' => $sections,
                'release_tools' => RELEASE_TOOLS,
                'release_debian' => RELEASE_DEBIAN,
                'recommendedDownloadsJS' => $recommendedDownloadsJS
            ),
            $this->template
        );
    }
}
