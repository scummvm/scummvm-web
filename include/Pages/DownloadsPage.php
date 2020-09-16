<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\DownloadsModel;

class DownloadsPage extends Controller
{
    private $downloadsModel;
    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->template = 'pages/downloads.tpl';
        $this->downloadsModel = new DownloadsModel();
    }

    /* Display the index page. */
    public function index()
    {
        $downloads = $this->downloadsModel->getAllDownloads();
        $sections = $this->downloadsModel->getAllSections();
        $recommendedDownload = $this->downloadsModel->getRecommendedDownload();
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
