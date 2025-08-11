<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\ScreenshotsModel;

class ScreenshotsPage extends Controller
{
    private ScreenshotsModel $screenshotsModel;

    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        $this->screenshotsModel = new ScreenshotsModel();
    }

    /**
     * Display the index page.
     *
     * @param array{'category'?: string, 'game'?: string} $args
     */
    public function index(array $args): void
    {
        $category = $args['category'] ?? null;
        $game = $args['game'] ?? null;

        $this->addJSFiles(
            array(
            'baguetteBox.min.js'
            )
        );

        if ($category) {
            $this->getCategory($category, $game);
            return;
        }

        $screenshot  = $this->screenshotsModel->getAllCategories();
        $random_shot = $this->screenshotsModel->getRandomScreenshot();

        $this->template = 'pages/screenshots.tpl';

        $this->renderPage(
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
    public function getCategory(string $category, ?string $game): void
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

        $this->renderPage(
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
