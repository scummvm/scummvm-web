<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\SubprojectsModel;

class SubprojectsPage extends Controller
{
    private $subprojectsModel;
    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->template = 'pages/subprojects.tpl';
        $this->subprojectsModel = new SubprojectsModel();
    }

    /* Display the index page. */
    public function index()
    {
        $subprojects = $this->subprojectsModel->getAllSubprojects();
        return $this->renderPage(
            array(
                'title' => $this->getConfigVars('subprojectsTitle'),
                'content_title' => $this->getConfigVars('subprojectsContentTitle'),
                'subprojects' => $subprojects,
            )
        );
    }
}
