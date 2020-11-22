<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\GameDownloadsModel;

class GamesPage extends Controller
{
    private $gameDownloadsModel;

    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->template = 'pages/games.tpl';
        $this->gameDownloadsModel = new GameDownloadsModel();
    }

    /* Display the index page. */
    public function index()
    {
        $downloads = $this->gameDownloadsModel->getAllDownloads();
        return $this->renderPage(
            array(
                'title' => $this->getConfigVars('gamesTitle'),
                'content_title' => $this->getConfigVars('gamesContentTitle'),
                'downloads' => $downloads,
            )
        );
    }
}
