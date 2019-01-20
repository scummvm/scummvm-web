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
        global $Smarty;

        return $this->renderPage(
            array(
                'title' => $Smarty->getConfigVars('demosTitle'),
                'content_title' => $Smarty->getConfigVars('demosContentTitle'),
                'demos' => $demos,
            ),
            $this->template
        );
    }
}
