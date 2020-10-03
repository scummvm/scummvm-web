<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\SimpleModel;

class CreditsPage extends Controller
{
    private $creditsModel;

    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->template = 'pages/credits.tpl';
        $this->creditsModel = new SimpleModel("CreditsSection", "credits.yaml");
    }

    /* Display the index page. */
    public function index()
    {
        $credits = $this->creditsModel->getAllData();
        return $this->renderPage(
            [
                'title' => $this->getConfigVars('creditsTitle'),
                'content_title' => $this->getConfigVars('creditsContentTitle'),
                'credits' => $credits,
            ]
        );
    }
}
