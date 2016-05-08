<?php

require_once '../vendor/autoload.php';

$app = new Silex\Application();

$app->get('/', function() use ($app) {
    $loader = new Twig_Loader_Filesystem('../public/views');
    $twig = new Twig_Environment($loader, [
        'cache' => '/cache',
        'debug' => true
    ]);

    $template = $twig->loadTemplate('base.html.twig');
    return $template->render([]);
});

$app->get('/generatekey', function() use ($app) {
    $crypto = new \EricDupertuis\Cryphpto\Crypto();
    return $crypto->generateKeyPair();
});

$app->run();
