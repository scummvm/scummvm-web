<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\SponsorModel;

class SponsorsPage extends Controller
{
    private $sponsorsModel;

    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->template = 'pages/sponsors.tpl';
        $this->sponsorsModel = new SponsorModel();
    }

    /* Display the index page. */
    public function index()
    {
        $sponsors = $this->sponsorsModel->getAllSponsors();
        return $this->renderPage(
            array(
                'title' => $this->getConfigVars('sponsorsTitle'),
                'content_title' => $this->getConfigVars('sponsorsContentTitle'),
                'sponsors' => $sponsors,
            )
        );
    }
}
