<?php

use Website\Libs\BeerSpid\Bootstrapper\Boostrap;
use Website\Libs\BeerSpid\Libs\Config;

$bootstrap = new Boostrap();
$bootstrap->initializeConstants(Config::get('environment-variables.json'), __DIR__);
$bootstrap->registerRessources(Config::get('dependencies.json'));
$bootstrap->initializeRoutes(Config::get('routes-collection.json'));
$bootstrap->start();



/*
$container = new DIContainer();

$container->register(new DIRessource::default(ITestClass::class, TestClass::class, ["bonjour test"]));
$container->registerSingle(new DIRessource::single(TestClass::class, ["bonjour test"]))
$container->get(ITestClass::class);*/