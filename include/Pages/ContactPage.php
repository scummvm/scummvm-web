<?php
namespace ScummVM\Pages;

use ScummVM\Controller;

class ContactPage extends Controller
{


    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->template = 'pages/contact.tpl';
    }

    /* Display the index page. */
    public function index()
    {
        global $Smarty;

        return $this->renderPage(
            array(
                'title' => $Smarty->getConfigVars('contactTitle'),
                'content_title' => $Smarty->getConfigVars('contactContentTitle'),
            ),
            $this->template
        );
    }
}
