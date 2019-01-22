<?php
namespace ScummVM\Pages;

class ExceptionsPage extends \ScummVM\Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->template = 'components/exception.tpl';
    }

    /* Display the index page. */
    public function index($exception)
    {
        return $this->renderPage(
            array(
                'title' => $this->getConfigVars('exceptionsTitle'),
                'content_title' => $this->getConfigVars('exceptionsContentTitle'),
                'exception' => $exception,
            )
        );
    }
}
