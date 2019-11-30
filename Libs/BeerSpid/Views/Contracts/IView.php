<?php


namespace Website\Libs\BeerSpid\Views\Contracts;


interface IView
{
    function __construct();

    public function setPath($path) : IView;
    public function getPath(): string;
    public function getName(): string;
    public function setName(string $name): IView;
}