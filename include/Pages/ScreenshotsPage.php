<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\ScreenshotsModel;

class ScreenshotsPage extends Controller
{

    private $template_category;

    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
    }

    /* Display the index page. */
    public function index()
    {
        $category = $_GET['cat'];
        $game = $_GET['game'];
        $json = $_POST['json'];

        if (!empty($json)) {
            return $this->getAllJSON();
        } elseif (!empty($category)) {
            return $this->getCategory($category, $game);
        }

        $this->addJSFiles(array(
            'baguetteBox.min.js'
        ));

        $screenshot  = ScreenshotsModel::getAllScreenshots();
        $random_shot = ScreenshotsModel::getRandomScreenshot();

        $this->template = 'pages/screenshots.tpl';

        return $this->renderPage(
            array(
                'title' => $this->getConfigVars('screenshotsTitle'),
                'content_title' => $this->getConfigVars('screenshotsContentTitle'),
                'screenshots' => $screenshot,
                'random_shot' => $random_shot,
            )
        );
    }

    /* Display the selected category. */
    public function getCategory($category, $game)
    {
        $this->addJSFiles(array(
            'baguetteBox.min.js'
        ));

        if (empty($game)) {
            $screenshots = ScreenshotsModel::getCategoryScreenshots($category);
        } else {
            $screenshots = array(
                'category' => $category,
                'games' => array(ScreenshotsModel::getTargetScreenshots($game))
            );
        }

        $this->template = 'pages/screenshots_category.tpl';

        return $this->renderPage(
            array(
                'title' => $this->getConfigVars('screenshotsTitle'),
                'content_title' => $this->getConfigVars('screenshotsContentTitle'),
                'screenshots' => $screenshots,
                'category' => $category,
                'game' => $game,
            )
        );
    }

    /* Get a list with all screenshot filenames/captions as a JSON list. */
    public function getAllJSON()
    {
        $sshots = array();
        foreach (ScreenshotsModel::getAllScreenshots() as $category) {
            foreach ($category['games'] as $screenshot) {
                foreach ($screenshot->getFiles() as $files) {
                    $files['filename'] = DIR_SCREENSHOTS . "/{$files['filename']}-full.png";
                    $sshots[] = array_values($files);
                }
            }
        }
        print json_encode($sshots);
        return true;
    }
}
