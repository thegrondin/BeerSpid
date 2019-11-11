<?php

namespace Website\Libs\BeerSpid\Request\Contracts;

use Website\Libs\BeerSpid\Router\Contracts\IRoute;

interface IRequest {

    function __construct(IRequestValidator $requestValidator);

    public function isValid();
}