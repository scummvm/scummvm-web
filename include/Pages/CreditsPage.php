<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\CreditsModel;

class CreditsPage extends Controller
{
    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->template = 'pages/credits.tpl';
    }

    /* Display the index page. */
    public function index()
    {
        $credits = CreditsModel::getAllCredits();
        return $this->renderPage(
            array(
                'title' => $this->getConfigVars('creditsTitle'),
                'content_title' => $this->getConfigVars('creditsContentTitle'),
                'credits' => $credits,
            )
        );
    }
}
