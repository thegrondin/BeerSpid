<?php


namespace Website\Libs\BeerSpid\Request\Contracts;


use Website\Libs\BeerSpid\Router\Contracts\IRoute;

interface IRequestValidator
{
    function __construct();

    public function validate(IRequest $request, IRoute $route);
}