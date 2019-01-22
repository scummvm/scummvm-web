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
        return $this->renderPage(
            array(
                'title' => $this->getConfigVars('contactTitle'),
                'content_title' => $this->getConfigVars('contactContentTitle'),
            )
        );
    }
}
