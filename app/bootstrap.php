<?php

require_once '../vendor/autoload.php';

use App\Controllers\App;

$config = App::getYamlConfig(file_get_contents('../app/config/config.yml'));
$routing = App::getYamlConfig(file_get_contents('../app/config/routing.yml'));

$loader = new Twig_Loader_Filesystem('../public/views');
$twig = new Twig_Environment($loader, [
    'cache' => './cache',
    'debug' => true
]);

$app = new App($config, $routing, $loader, $twig);
