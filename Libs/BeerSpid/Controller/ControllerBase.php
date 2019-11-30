<?php

namespace Website\Libs\BeerSpid\Controller;

use Website\Libs\BeerSpid\Controller\Contracts\IController;
use Website\Libs\BeerSpid\Libs\Path;
use Website\Libs\BeerSpid\Views\Contracts\IView;
use Website\Libs\BeerSpid\Views\Contracts\IViewRenderer;

class ControllerBase implements IController {

    private $viewRenderer;
    private $view;

    function __construct(IViewRenderer $viewRenderer, IView $view)
    {
        $this->viewRenderer = $viewRenderer;
        $this->view = $view;
    }

    public function render(string $path, string $file, array $parameters)
    {
        $this->view
            ->setPath(Path::getNormalizedStatic(VIEW_PATH . $path))
            ->setName($file);

        $this->viewRenderer->addView($this->view);
        $this->viewRenderer->render($parameters);
    }
}