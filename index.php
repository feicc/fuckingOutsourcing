<?php

include "./vendor/autoload.php";
use OutSource\Kernel\Application;



$option = [
    "basePath" => dirname(__FILE__),
];

$application = new Application($option);
//dd($application->config->get('controller'));