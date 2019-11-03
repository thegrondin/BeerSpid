<?php

namespace Website;

use Website\Libs\BeerSpid\TestClass;
use Website\Libs\BeerSpid\ITestClass;
use Website\Libs\BeerSpid\DependencyInjection\DIContainer;
use Website\Libs\BeerSpid\DependencyInjection\DIRessource;

require_once "../vendor/autoload.php";
require_once "../index.php";
/*$container = new DIContainer();

$container->register(DIRessource::default(ITestClass::class, TestClass::class, ["bonjour test"]));
$testClass = $container->getInstance(ITestClass::class);
var_dump($testClass->getVar());*/

//$container->registerSingle(new DIRessource::single(TestClass::class, ["bonjour test"]))
