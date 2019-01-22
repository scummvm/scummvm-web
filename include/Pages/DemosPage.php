<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\GameDemosModel;

class DemosPage extends Controller
{


    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->template = 'pages/game_demos.tpl';
    }

    /* Display the index page. */
    public function index()
    {
        $demos = GameDemosModel::getAllGroupsAndDemos();
        return $this->renderPage(
            array(
                'title' => $this->getConfigVars('demosTitle'),
                'content_title' => $this->getConfigVars('demosContentTitle'),
                'demos' => $demos,
            )
        );
    }
}
