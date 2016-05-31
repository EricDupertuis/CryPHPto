<?php

require_once '../vendor/autoload.php';
$config = require_once '../app/config/config.php';
$routing = require_once '../app/config/routing.php';

$app = new \EricDupertuis\Cryphpto\App($config, $routing);

$silex = new Silex\Application();

$silex->get('/', function() use ($silex) {
    $loader = new Twig_Loader_Filesystem('../public/views');
    $twig = new Twig_Environment($loader, [
        'cache' => '/cache',
        'debug' => true
    ]);

    $template = $twig->loadTemplate('base.html.twig');
    return $template->render([]);
});

$silex->get('/generatekey', function() use ($silex) {
    $crypto = new \EricDupertuis\Cryphpto\Crypto();
    return $crypto->generateKeyPair();
});

$silex->run();
