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
        $this->renderPage(
            array(
                'title' => $this->getConfigVars('gamesTitle'),
                'description' => strip_tags($this->getConfigVars('gamesContentP1')),
                'content_title' => $this->getConfigVars('gamesContentTitle'),
                'downloads' => $downloads,
            )
        );
    }
}
