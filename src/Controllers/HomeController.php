<?php

namespace Website\src\Controllers;

use Website\Libs\BeerSpid\Controller\ControllerBase;

class HomeController extends ControllerBase {

    public function about() {
        dump("about");
    }

    public function index() {
        echo "<html><body style='font-family: arial;'><h1>Home Controller <br />Index page</h1></body></html>";
    }

    public function contact() {

    }

    public function subscribe() {

    }
}