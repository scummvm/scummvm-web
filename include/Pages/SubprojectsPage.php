<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\SubprojectsModel;

class SubprojectsPage extends Controller
{
    protected $_template;

    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->_template = 'pages/subprojects.tpl';
    }

    /* Display the index page. */
    public function index()
    {
        $subprojects = SubprojectsModel::getAllSubprojects();
        global $Smarty;

        return $this->renderPage(
            array(
                'title' => $Smarty->getConfigVars('subprojectsTitle'),
                'content_title' => $Smarty->getConfigVars('subprojectsContentTitle'),
                'subprojects' => $subprojects,
            ),
            $this->_template
        );
    }
}
