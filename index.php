<?php

namespace Website;

define ("__WEBSITE_BASE_DIR__", __DIR__);

require_once "vendor/autoload.php";

$whoops = new \Whoops\Run;
$whoops->prependHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

require_once "Libs/BeerSpid/root.php";
