<?php

namespace Website\Libs\BeerSpid\Request\Contracts\Bags;

use Website\Libs\BeerSpid\Request\Contracts\Elements\IElement;

interface IBag {
    public function add(IElement $el): void;
    public function addBunch(array $elements): void;
    public function get(): IElement;
    public function getAll(): array;
}