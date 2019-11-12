<?php

namespace Website\src\Controllers;

use Website\Libs\BeerSpid\Controller\ControllerBase;
use Website\Libs\BeerSpid\Request\Contracts\IRequest;

class HomeController extends ControllerBase {

    function __construct()
    {
    }

    public function about() {
        dump("about");
    }

    public function index(IRequest $request) {
        //dump($request);
        echo "<html><body style='font-family: arial;'><h1>Home Controller <br />Index page</h1></body></html>";

        return $this->render('/home/index', [$request]);
    }

    public function contact(IRequest $request) {
        dump($request);
    }

    public function subscribe() {

    }
}