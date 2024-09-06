<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\GameDemosModel;

class DemosPage extends Controller
{
    private $gameDemosModel;

    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->template = 'pages/game_demos.tpl';
        $this->gameDemosModel = new GameDemosModel();
    }

    /* Display the index page. */
    public function index()
    {
        $demos = $this->gameDemosModel->getAllGroupsAndDemos();
        return $this->renderPage(
            array(
                'title' => $this->getConfigVars('demosTitle'),
                'description' => $this->getConfigVars('gamesDemosContentP1'),
                'content_title' => $this->getConfigVars('demosContentTitle'),
                'demos' => $demos,
            )
        );
    }
}
