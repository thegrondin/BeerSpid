<?php

namespace Website\Libs\BeerSpid\Request\Contracts;

interface IParametersCollection {
    public function get(string $name);
    public function post(string $name);
    function __construct(array $rawGetParams, array $rawPostParams);
    public function all(string $filter): array;
}