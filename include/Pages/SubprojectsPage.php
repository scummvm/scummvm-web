<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\SubprojectsModel;

class SubprojectsPage extends Controller
{


    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->template = 'pages/subprojects.tpl';
    }

    /* Display the index page. */
    public function index()
    {
        $subprojects = SubprojectsModel::getAllSubprojects();
        return $this->renderPage(
            array(
                'title' => $this->getConfigVars('subprojectsTitle'),
                'content_title' => $this->getConfigVars('subprojectsContentTitle'),
                'subprojects' => $subprojects,
            )
        );
    }
}
