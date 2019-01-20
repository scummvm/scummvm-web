<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\DocumentationModel;

class DocumentationPage extends Controller
{


    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->template = 'pages/documentation.tpl';
    }

    /* Display the index page. */
    public function index()
    {
        $document = $_GET['d'];
        global $Smarty;

        $documents = DocumentationModel::getAllDocuments();

        return $this->renderPage(
            array(
                'title' => $Smarty->getConfigVars('documentationTitle'),
                'content_title' => $Smarty->getConfigVars('documentationContentTitle'),
                'documents' => $documents,
            ),
            $this->template
        );
    }
}
