<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\DocumentationModel;

class DocumentationPage extends Controller
{
    private $documentationModel;

    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->template = 'pages/documentation.tpl';
        $this->documentationModel = new DocumentationModel();
    }

    /* Display the index page. */
    public function index()
    {
        $documents = $this->documentationModel->getAllDocuments();

        return $this->renderPage(
            array(
                'title' => $this->getConfigVars('documentationTitle'),
                'content_title' => $this->getConfigVars('documentationContentTitle'),
                'documents' => $documents,
            )
        );
    }
}
