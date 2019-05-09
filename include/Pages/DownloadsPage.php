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

    /* Display the index page. */
    public function index()
    {
        $downloads = DownloadsModel::getAllDownloads();
        $sections = DownloadsModel::getAllSections();
        $recommendedDownload = DownloadsModel::getRecommendedDownload();
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
