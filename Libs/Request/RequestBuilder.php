<?php

namespace Website\Libs\BeerSpid\Request;

use Website\Libs\BeerSpid\DependencyInjection\DIContainer;
use Website\Libs\BeerSpid\Request\Contracts\IParametersCollection;
use Website\Libs\BeerSpid\Request\Contracts\IRequest;
use Website\Libs\BeerSpid\Request\Contracts\IRequestBuilder;
use Website\Libs\BeerSpid\Router\Contracts\IRoute;
use Website\Libs\BeerSpid\Request\Contracts\Bags\IBag;
use Website\Libs\Request\Bags\BagBuilder;

class RequestBuilder implements IRequestBuilder {

    protected $request;
    protected $container;
    public function __construct(IRequest $request, DIContainer $container)
    {
        $this->request = $request;
        $this->container = $container;
    }

    public function create(IRoute $route): IRequest
    {
        $paramsCollection = $this->container->getInstance(IParametersCollection::class, [
            "rawGetParams" => $_GET,
            "rawPostParams" => $_POST
        ]);

        return $this->request->setRoute($route)
            ->setMethod($_SERVER['REQUEST_METHOD'])
            ->setParameters($paramsCollection);
    }
}