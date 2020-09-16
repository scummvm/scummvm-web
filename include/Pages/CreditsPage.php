<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\CreditsModel;

class CreditsPage extends Controller
{
    private $creditsModel;

    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->template = 'pages/credits.tpl';
        $this->creditsModel = new CreditsModel();
    }

    /* Display the index page. */
    public function index()
    {
        $credits = $this->creditsModel->getAllCredits();
        return $this->renderPage(
            array(
                'title' => $this->getConfigVars('creditsTitle'),
                'content_title' => $this->getConfigVars('creditsContentTitle'),
                'credits' => $credits,
            )
        );
    }
}
