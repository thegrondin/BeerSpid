<?php


namespace Website\Libs\BeerSpid\Request;


use Website\Libs\BeerSpid\Request\Contracts\IRequest;
use Website\Libs\BeerSpid\Request\Contracts\IRequestValidator;
use Website\Libs\BeerSpid\Router\Contracts\IRoute;

final class RequestValidator implements IRequestValidator
{

    function __construct()
    {
    }

    public function validate(IRequest $request, IRoute $route)
    {
        if (!in_array($request->getMethod(), $route->getTypes())) {
            return false;
        }

        return true;
    }
}