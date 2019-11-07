<?php

namespace Website\Libs\BeerSpid\Controller;

use Website\Libs\BeerSpid\Controller\Contracts\IController;

class ControllerBase implements IController {

    public function render(string $view, array $parameters)
    {
        dump("MOCK RENDERING FOR" . $view, $parameters);
    }
}