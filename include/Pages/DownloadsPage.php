<?php
namespace ScummVM\Pages;

require_once('Controller.php');
require_once('Models/DownloadsModel.php');

class DownloadsPage extends Controller
{
    private $_template;

    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->_template = 'pages/downloads.tpl';
    }

    function getRecommendedDownloadsJS(&$downloads)
    {
        $js = "var versions = {\n";

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

                        $js .= "\t\t\t'{$userAgent}':\t{ 'os':\t'{$name}', 'ver':\t'{$version}', 'desc':\t'{$extra_text}', 'url':\t'{$url}'},\n";
                    }
                }
            }
        }
        $js .= "};\n";

        return $js;
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
            $this->_template
        );
    }
}
