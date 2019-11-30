<?php

namespace Website\src\Controllers;

use Website\Libs\BeerSpid\Controller\ControllerBase;
use Website\Libs\BeerSpid\Request\Contracts\IRequest;
use Website\Libs\BeerSpid\Request\HttpMethodTypes;
use Website\Libs\BeerSpid\Views\Contracts\IView;
use Website\Libs\BeerSpid\Views\Contracts\IViewRenderer;

class HomeController extends ControllerBase {

    function __construct(IViewRenderer $viewRenderer, IView $view)
    {
        parent::__construct($viewRenderer, $view);
    }

    public function about() {
        dump("about");
    }

    public function index(IRequest $request) {


        $user = (object) [
            "firstname" => "Thomas",
            "lastname" => "Dion-Grondin",
            "age" => 19
        ];

        return $this->render('/home/', 'index.html', ["user" => $user]);
    }

    public function contact(IRequest $request) {
        dump($request);
    }

    public function subscribe() {

    }
}