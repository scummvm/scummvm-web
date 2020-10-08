<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\SimpleModel;

class SimplePage extends Controller
{
    const FILE_NOT_FOUND = 'The filename %s could not be found';
    const PAGE_MODELS = [
        //key => [$model, $datafile]
        'sponsors' => ['Sponsor', 'sponsors.yaml'],
        'press' => ['Article', 'press_articles.yaml'],
        'credits' => ['CreditsSection', 'credits.yaml'],
        'documentation' => ['Document', 'documentation.yaml'],
    ];

    private $model;
    private $key;

    /* Constructor. */
    public function __construct($key)
    {
        parent::__construct();
        $this->template = "pages/$key.tpl";
        $this->key = $key;
        $templateFile = SMARTY_DIR_TEMPLATE . "/$this->template";
        if (!is_file($templateFile) || !is_readable($templateFile)) {
            throw new \ErrorException(\sprintf(self::FILE_NOT_FOUND, $templateFile));
        }
        if (array_key_exists($key, self::PAGE_MODELS)) {
            [$model, $data] = self::PAGE_MODELS[$key];
            $this->model = new SimpleModel($model, $data);
        }
    }

    /* Display the index page. */
    public function index($data = null)
    {
        if ($this->model) {
            $data = $this->model->getAllData();
        }

        return $this->renderPage([
            'title' => $this->getConfigVars("{$this->key}Title"),
            'content_title' => $this->getConfigVars("{$this->key}ContentTitle"),
            'data' => $data
        ]);
    }
}
