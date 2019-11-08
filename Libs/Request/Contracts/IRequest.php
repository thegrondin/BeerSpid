<?php

namespace Website\Libs\BeerSpid\Request\Contracts;

use Website\Libs\BeerSpid\Router\Contracts\Iroute;

interface IRequest {


    public function handleDispatch();
}