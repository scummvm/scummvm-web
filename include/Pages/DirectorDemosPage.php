<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\DirectorDemosModel;

class DirectorDemosPage extends Controller
{
    private $gameDemosModel;

    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->template = 'pages/director_demos.tpl';
        $this->gameDemosModel = new DirectorDemosModel();
    }

    /* Display the index page. */
    public function index()
    {
        $demos = $this->gameDemosModel->getAllGroupsAndDemos();
        return $this->renderPage(
            array(
                'title' => $this->getConfigVars('directorDemosTitle'),
                'content_title' => $this->getConfigVars('directorDemosContentTitle'),
                'demos' => $demos,
            )
        );
    }
}
