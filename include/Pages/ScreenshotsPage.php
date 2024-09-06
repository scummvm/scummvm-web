<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\ScreenshotsModel;

class ScreenshotsPage extends Controller
{
    private $screenshotsModel;

    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->screenshotsModel = new ScreenshotsModel();
    }

    /* Display the index page. */
    public function index($args)
    {
        $category = $args['category'] ?? null;
        $game = $args['game'] ?? null;

        $this->addJSFiles(
            array(
            'baguetteBox.min.js'
            )
        );

        if ($category) {
            return $this->getCategory($category, $game);
        }

        $screenshot  = $this->screenshotsModel->getAllCategories();
        $random_shot = $this->screenshotsModel->getRandomScreenshot();

        $this->template = 'pages/screenshots.tpl';

        return $this->renderPage(
            [
                'title' => $this->getConfigVars('screenshotsTitle'),
                // TODO: Add a description
                'content_title' => $this->getConfigVars('screenshotsContentTitle'),
                'screenshots' => $screenshot,
                'random_shot' => $random_shot,
            ]
        );
    }

    /* Display the selected category. */
    public function getCategory($category, $game)
    {
        if (empty($game)) {
            $screenshots = $this->screenshotsModel->getScreenshotsByCompanyId($category);
            $subtitle = $screenshots['title'];
        } else {
            $screenshots = [
                'category' => $category,
                'games' => $this->screenshotsModel->getScreenshotsBySubcategory($game)
            ];
            $subtitle = $screenshots['games'][0]->getName();
        }
        $this->template = 'pages/screenshots_category.tpl';

        return $this->renderPage(
            [
                'title' => $this->getConfigVars('screenshotsTitle'),
                // TODO: Add a description
                'subtitle' => $subtitle,
                'content_title' => $this->getConfigVars('screenshotsContentTitle'),
                'screenshots' => $screenshots,
                'category' => $category,
                'game' => $game,
            ]
        );
    }
}
