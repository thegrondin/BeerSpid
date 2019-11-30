<?php

namespace Website\Libs\BeerSpid;

use Website\Libs\BeerSpid\Bootstrapper\Bootstrap;
use Website\Libs\BeerSpid\Libs\Config;
use Website\Libs\BeerSpid\Libs\Path;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


define('__BEER_SPID_BASE_PATH__', __DIR__);
$bootstrap = new Bootstrap();
$bootstrap->initializeConstants(Config::get('environment-variables.json'));
$bootstrap->registerRessources(Config::get('dependencies.json'));
$bootstrap->initializeRoutes(Path::normalize(Path::getStatic(ROUTES_DIR)));
$bootstrap->start();



/*$container = new DIContainer();

$container->register(new DIRessource::default(ITestClass::class, TestClass::class, ["bonjour test"]));
$container->registerSingle(new DIRessource::single(TestClass::class, ["bonjour test"]))
$container->get(ITestClass::class);
dump("test");*/
