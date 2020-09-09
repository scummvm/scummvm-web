<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\GameDownloadsModel;

class GamesPage extends Controller
{


    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->template = 'pages/games.tpl';
    }

    /* Display the index page. */
    public function index()
    {
        $downloads = GameDownloadsModel::getAllDownloads();
        $sections = GameDownloadsModel::getAllSections();
        return $this->renderPage(
            array(
                'title' => $this->getConfigVars('gamesTitle'),
                'content_title' => $this->getConfigVars('gamesContentTitle'),
                'downloads' => $downloads,
                'sections' => $sections,
                'release_tools' => RELEASE_TOOLS,
                'release_debian' => RELEASE_DEBIAN,
            )
        );
    }
}
