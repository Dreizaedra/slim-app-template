<?php

use Symfony\Component\Dotenv\Dotenv;

require_once __DIR__ . '/../vendor/autoload.php';

// Load .env file
$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/../.env');

// DB connexion
$pdo = new PDO(
    $_ENV['DB_DRIVER'] . ':host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD']
);

echo 'Hello World';