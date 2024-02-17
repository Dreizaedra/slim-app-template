<?php

use Symfony\Component\Dotenv\Dotenv;
use Slim\Factory\AppFactory;
use DI\Container;

require_once __DIR__ . '/../vendor/autoload.php';

// Load .env file
$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/../.env');

// Setting containers
$container = new Container();
require_once __DIR__ . '/../config/containers.php';
AppFactory::setContainer($container);

// Create slim application
$app = AppFactory::create();

$app->getContainer()->get('database');

// Register routes in app
require_once __DIR__ . '/../config/routes.php';

$app->addErrorMiddleware(true, true, true);

$app->run();