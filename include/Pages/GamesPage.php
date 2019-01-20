<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\GamesModel;

class GamesPage extends Controller
{
    protected $_template;

    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->_template = 'pages/games.tpl';
    }

    /* Display the index page. */
    public function index()
    {
        $downloads = GamesModel::getAllDownloads();
        $sections = GamesModel::getAllSections();
        global $Smarty;

        return $this->renderPage(
            array(
                'title' => $Smarty->getConfigVars('gamesTitle'),
                'content_title' => $Smarty->getConfigVars('gamesContentTitle'),
                'downloads' => $downloads,
                'sections' => $sections,
                'release_tools' => RELEASE_TOOLS,
                'release_debian' => RELEASE_DEBIAN,
            ),
            $this->_template
        );
    }
}
