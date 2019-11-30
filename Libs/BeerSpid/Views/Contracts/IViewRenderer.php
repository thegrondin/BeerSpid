<?php


namespace Website\Libs\BeerSpid\Views\Contracts;


use Website\Libs\BeerSpid\DependencyInjection\DIContainer;

interface IViewRenderer
{

    function __construct(DIContainer $container);
    public function addView(IView $view);
    public function render(array $parameters);
}