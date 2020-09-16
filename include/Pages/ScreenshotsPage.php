<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\ScreenshotsModel;

class ScreenshotsPage extends Controller
{
    private $screenshotsModel;
    private $template_category;

    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->screenshotsModel = new ScreenshotsModel();
    }

    /* Display the index page. */
    public function index($args)
    {
        $category = $args['category'];
        $game = $args['game'];

        $this->addJSFiles(
            array(
            'baguetteBox.min.js'
            )
        );

        if (!empty($category)) {
            return $this->getCategory($category, $game);
        }

        $screenshot  = $this->screenshotsModel->getGroupedScreenshots();
        $random_shot = $this->screenshotsModel->getRandomScreenshot();

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
        if (empty($game)) {
            $screenshots = $this->screenshotsModel->getCategoryScreenshots($category);
        } else {
            $screenshots = array(
                'category' => $category,
                'games' => array($this->screenshotsModel->getTargetScreenshots($game))
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
}
