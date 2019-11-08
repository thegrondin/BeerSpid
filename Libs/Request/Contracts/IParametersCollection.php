<?php


namespace Website\Libs\BeerSpid\Request\Contracts;

use Website\Libs\BeerSpid\Request\Contracts\Elements\IElement;
use Website\Libs\Request\Contracts\IParameter;



interface IParametersCollection {
    public function get(string $name): IParameter;
    public function post(string $name): IParameter;
    function __construct(array $rawGetParams, array $rawPostParams);
    public function all(string $filter): array;
}