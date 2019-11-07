<?php

namespace Website\Libs\BeerSpid\Controller\Contracts;

interface IController {

    public function render(string $view, array $parameters);
}