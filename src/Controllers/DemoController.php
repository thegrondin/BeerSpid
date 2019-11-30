<?php

namespace Website\src\Controllers;

use Website\Libs\BeerSpid\Controller\ControllerBase;
use Website\Libs\BeerSpid\Request\Contracts\IRequest;

class DemoController extends ControllerBase {

    function __construct()
    {
    }

    public function index() {
        dump("test");
    }

    public function test(IRequest $request, int $id, string $name) {

        echo 'Bonjour mon nom est ' . $name . '<br /> mon Id est ' . $id;
    }

    public function save() {

    }
}