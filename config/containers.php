<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;

// TWIG container
$container->set('twig', function () {
    $loader = new FilesystemLoader(__DIR__ . $_ENV['TEMPLATE_PATH']);
    $twig = new Environment($loader, [
        'cache' => ($_ENV['ENV'] === 'prod') ? __DIR__ . $_ENV['CACHE_PATH'] : false
    ]);
    // $twig->addExtension();
    return $twig;
});

// DB container
$container->set('database', function () {
    $capsule = new Manager();
    $capsule->addConnection([
        'driver'    => $_ENV['DB_DRIVER'],
        'host'      => $_ENV['DB_HOST'],
        'database'  => $_ENV['DB_NAME'],
        'username'  => $_ENV['DB_USER'],
        'password'  => $_ENV['DB_PASSWORD'],
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => ''
    ]);

    $capsule->setEventDispatcher(new Dispatcher(new Container()));

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
});