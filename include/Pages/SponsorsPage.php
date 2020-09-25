<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\SimpleModel;

class SponsorsPage extends Controller
{
    private $sponsorsModel;

    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->template = 'pages/sponsors.tpl';
        $this->sponsorsModel = new SimpleModel("Sponsor", "sponsors.yaml");
    }

    /* Display the index page. */
    public function index()
    {
        $sponsors = $this->sponsorsModel->getAllData(false);
        return $this->renderPage(
            array(
                'title' => $this->getConfigVars('sponsorsTitle'),
                'content_title' => $this->getConfigVars('sponsorsContentTitle'),
                'sponsors' => $sponsors,
            )
        );
    }
}
