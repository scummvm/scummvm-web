<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\CreditsModel;

class CreditsPage extends Controller
{
    private $template;

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
        global $Smarty;

        return $this->renderPage(
            array(
                'title' => $Smarty->getConfigVars('creditsTitle'),
                'content_title' => $Smarty->getConfigVars('creditsContentTitle'),
                'credits' => $credits,
            ),
            $this->template
        );
    }
}
